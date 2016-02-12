<?php

namespace Civix\CoreBundle\Service;

use Civix\CoreBundle\Entity\RepresentativeStorage;
use Civix\CoreBundle\Entity\Representative;
use Civix\CoreBundle\Entity\Group;
use Civix\CoreBundle\Entity\District;
use Civix\CoreBundle\Service\API\ServiceApi;
use Symfony\Component\Security\Core\Util\SecureRandom;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;

class CiceroApi extends ServiceApi
{
    private $ciceroService;
    private $logger;
    private $entityManager;
    private $cropImageService;
    private $congressService;
    private $openstatesService;

    protected $vichService;
    protected $rootPath;

    public function __construct(
        \Civix\CoreBundle\Service\CiceroCalls $ciceroService,
        \Symfony\Bridge\Monolog\Logger $logger,
        $entityManager,
        $vichUploader,
        $cropImage,
        $kernel,
        \Civix\CoreBundle\Service\CongressApi $congress,
        \Civix\CoreBundle\Service\OpenstatesApi $openstates
    ) {
        $this->ciceroService = $ciceroService;
        $this->logger = $logger;
        $this->entityManager = $entityManager;
        $this->setCropImage($cropImage);
        $this->setVichService($vichUploader);
        $this->rootPath = $kernel->getRootDir().'/../web';
        $this->congressService = $congress;
        $this->openstatesService = $openstates;
    }

    /**
     * Get all representatives by address from api, save them, get districs ids
     * @param string  $address   Address
     * @param string  $city      City
     * @param string  $state     State
     * @param string  $country   Country
     * @param boolean $onlyLocal Get only local districts
     *
     * @return array
     */
    public function getRepresentativeByLocation($address, $city, $state, $country = 'US', $onlyLocal = false)
    {
        $representatives = $this->ciceroService
            ->findRepresentativeByLocation($address, $city, $state, $country);

        if ($representatives) {
            return $this->getUserDistrictsFromApi($representatives, $onlyLocal);
        }

        return false;
    }

    /**
     * Get representative from api, save his, get district id
     * @param Representative $representative Representative object
     *
     * @return integer
     */
    public function updateByRepresentativeInfo(Representative $representative)
    {
        $representativesFromApi = $this->ciceroService
            ->findRepresentativeByOfficialData(
                $representative->getFirstName(),
                $representative->getLastName(),
                $representative->getOfficialTitle()
            );
        if ($representativesFromApi) {
            return $this->updateRepresentativeStorage($representativesFromApi, $representative);
        }

        return false;
    }

    /**
     * Save representative from api in representative storage. 
     * Set link between representative and representative storage
     * 
     * @param Object         $resultApiCollection Object from Cicero API
     * @param Representative $representative      Representative object
     *
     * @return District
     */
    protected function updateRepresentativeStorage($resultApiCollection, Representative $representative)
    {
        $lastReprDistrict = false;
        foreach ($resultApiCollection as $repr) {
            $storRepr = $this->entityManager->getRepository('CivixCoreBundle:RepresentativeStorage')
                    ->findOneByStorageId($repr->id);
            if (!$storRepr) {
                $storRepr = $this->createStorRepresentativeByApiObj($repr);
                $this->entityManager->persist($storRepr);
            }

            //Update link between representative and representative storage
            $representative->setStorageId($storRepr->getStorageId());

            $lastReprDistrict = $storRepr->getDistrict();
        }
        $this->entityManager->flush();

        return $lastReprDistrict;
    }

    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function setCropImage($cropImage)
    {
        $this->cropImageService = $cropImage;
    }

    public function setVichService($vichService)
    {
        $this->vichService = $vichService;
    }
    
    public function setCongressApi($congressService)
    {
        $this->congressService = $congressService;
    }

    public function setOpenstatesApi($openstatesService)
    {
        $this->openstatesService = $openstatesService;
    }
    
    public function setCiceroCalls($ciceroService)
    {
        $this->ciceroService = $ciceroService;
    }

    public function setLogger($logger)
    {
        $this->logger = $logger;
    }
    
    /**
     * Change Representative Storage object according to object which was getten from Cicero Api
     * 
     * @param \Civix\CoreBundle\Entity\RepresentativeStorage $storeObj
     * @param Object $repr Cicero Api object
     * 
     * @return \Civix\CoreBundle\Entity\RepresentativeStorage
     */
    public function fillStorRepresentativeByApiObj(RepresentativeStorage $storeObj, $repr)
    {
        $storeObj->setStorageId($repr->id);
        $storeObj->setFirstName(trim($repr->first_name));
        $storeObj->setLastName(trim($repr->last_name));
        $storeObj->setOfficialTitle(trim($repr->office->title));
        $storeObj->setAvatarSrc($repr->photo_origin_url);

        //create district
        $representativeDistrict = $this->createDistrict($repr->office->district);
        $storeObj->setDistrict($representativeDistrict);

        $storeObj->setContactEmail($repr->office->chamber->contact_email);
        $storeObj->setWebsite($repr->office->chamber->url);
        $storeObj->setCountry($repr->office->district->country);
        if (isset($repr->addresses[0])) {
            $storeObj->setPhone($repr->addresses[0]->phone_1);
            $storeObj->setFax($repr->addresses[0]->fax_1);
            $state = $this->entityManager->getRepository('CivixCoreBundle:State')
                ->findOneByCode($repr->addresses[0]->state);
            $storeObj->setState($state);
            $storeObj->setCity($repr->addresses[0]->city);
            $storeObj->setAddressLine1($repr->addresses[0]->address_1);
            $storeObj->setAddressLine2($repr->addresses[0]->address_2);
            $storeObj->setAddressLine3($repr->addresses[0]->address_3);
        }

        //extended profile
        $storeObj->setParty($repr->party);
        if (isset($repr->notes[1]) && \DateTime::createFromFormat('Y-m-d', $repr->notes[1]) !== false) {
            $storeObj->setBirthday(new \DateTime($repr->notes[1]));
        }
        if (isset($repr->current_term_start_date)) {
            $storeObj->setStartTerm(new \DateTime($repr->current_term_start_date));
        }
        if (isset($repr->term_end_date)) {
            $storeObj->setEndTerm(new \DateTime($repr->term_end_date));
        }

        //social networks
        foreach ($repr->identifiers as $identificator) {
            $socialType = strtolower(isset($identificator->identifier_type)?$identificator->identifier_type:'');
            $socialMethod = 'set'.ucfirst($socialType);
            if (method_exists($storeObj, $socialMethod)) {
                $storeObj->$socialMethod($identificator->identifier_value);
            }
        }

        //save photo
        if (!empty($repr->photo_origin_url)) {
            $fileInfo = explode('.', basename($repr->photo_origin_url));
            $fileExt = array_pop($fileInfo);
            $storeObj->setAvatarFileName(uniqid().'.'.$fileExt);

            if (false !== ($header = $this->checkLink($repr->photo_origin_url))) {
                if (strpos($header, 'image') !== false) {
                    //square avatars
                    try {
                        $temp_file = tempnam(sys_get_temp_dir(), 'avatar').'.'.$fileExt;
                        $this->saveImageFromUrl($storeObj->getAvatarSrc(), $temp_file);
                        $this->cropImageService->rebuildImage(
                            $temp_file,
                            $temp_file
                        );
                        $fileUpload = new UploadedFile($temp_file, $storeObj->getAvatarFileName());
                        $storeObj->setAvatar($fileUpload);
                    } catch (\Exception $exc) {
                        $this->logger->addError('Image '.  $storeObj->getAvatarSrc() . '. '.$exc->getMessage());
                        $storeObj->setAvatarFileName(null);
                    }
                }
            }
        }

        //update profile from congress api
        $this->congressService->updateReprStorageProfile($storeObj);

        //update profile from openstate api
        $this->openstatesService->updateReprStorageProfile($storeObj);

        return $storeObj;
    }

    /**
     * Create Representative Storage object by object which was getten from Cicero Api
     * @param Object $repr Cicero Api object
     *
     * @return \Civix\CoreBundle\Entity\RepresentativeStorage
     */
    protected function createStorRepresentativeByApiObj($repr)
    {
        $storeObj = new RepresentativeStorage();
        $this->fillStorRepresentativeByApiObj($storeObj, $repr);

        return $storeObj;
    }

    /**
     * Get districts of user. Save representative in storage if need.
     * @param Object  $resultApiCollection Object from Cicero API
     * @param boolean $onlyLocal           Get only local districts
     *
     * @return array of districts
     */
    protected function getUserDistrictsFromApi($resultApiCollection, $onlyLocal = false)
    {
        $districts = array();
        foreach ($resultApiCollection as $repr) {
            $storeRepr = $this->entityManager->getRepository('CivixCoreBundle:RepresentativeStorage')
                    ->findOneByStorageId($repr->id);
            if (!$storeRepr) {
                $storeRepr = $this->createStorRepresentativeByApiObj($repr);
                $this->entityManager->persist($storeRepr);
            }

            //check district types
            if ($onlyLocal) {
                if ($storeRepr->isLocalLeader()) {
                    if ($storeRepr->getDistrict()->getDistrictType() == District::LOCAL) {
                        array_unshift($districts, $storeRepr->getDistrict());
                    } else {
                        $districts[] = $storeRepr->getDistrict();
                    }
                }
            } else {
                $districts[] = $storeRepr->getDistrict();
            }

        }

        //add nonlegislative districts to current district
        $districts = array_merge($districts, $this->getNonlegislaveDistricts());

        $this->entityManager->flush();

        return array_unique($districts);
    }

    /**
     * Get nonlegilative districts with type CENSUS and subtype SUBDIVISION
     * by coordinats
     *
     * @return Array
     */
    protected function getNonlegislaveDistricts()
    {
        $subdivDistricts = array();

        $districts = $this->ciceroService->findNonLegislativeDistricts();

        foreach ($districts as $district) {
            if ($district->subtype == \Civix\CoreBundle\Service\CiceroCalls::CENSUS_SUBTYPE) {
                //create local district
                $localDistrict = $this->createDistrict($district);
                $subdivDistricts[] = $localDistrict;
            }
        }

        return $subdivDistricts;
    }

    protected function createDistrict($district)
    {
        $currentDistrict = $this->entityManager->getRepository('CivixCoreBundle:District')
            ->findOneById($district->id);
        if (!$currentDistrict) {
            $currentDistrict = new District();
            $currentDistrict->setId($district->id);
            $currentDistrict->setLabel($district->label);

            //set district type (for Nonlegislave district type = LOCAL)
            if ($district->district_type != 'CENSUS') {
                $currentDistrict->setDistrictType(
                    constant('Civix\CoreBundle\Entity\District::' .
                        $district->district_type)
                );
            } else {
                $currentDistrict->setDistrictType(District::LOCAL);
            }

            $this->entityManager->persist($currentDistrict);
            $this->entityManager->flush($currentDistrict);
        }

        return $currentDistrict;
    }
}
