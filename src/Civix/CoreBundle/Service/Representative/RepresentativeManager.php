<?php

namespace Civix\CoreBundle\Service\Representative;

use Civix\CoreBundle\Entity\Representative;

class RepresentativeManager
{
    private $entityManager;
    private $encoderFactory;
    private $ciceroService;
    
    public function __construct(
        \Doctrine\ORM\EntityManager $entityManager,
        \Symfony\Component\Security\Core\Encoder\EncoderFactory $encoder,
        \Civix\CoreBundle\Service\CiceroApi $cicero
    ) {
        $this->entityManager = $entityManager;
        $this->encoderFactory = $encoder;
        $this->ciceroService = $cicero;
    }

    public function approveRepresentative(Representative $representative)
    {
        $representative->setStatus(Representative::STATUS_ACTIVE);

        //find in current representative storage
        $reprStorageObj = $this->entityManager
            ->getRepository('CivixCoreBundle:RepresentativeStorage')
            ->getSTRepresentativeByOfficialInfo(
                $representative->getFirstName(),
                $representative->getLastName(),
                $representative->getOfficialTitle()
            );
        
        if (!$reprStorageObj) {
            //update database from api
            $district = $this->ciceroService->updateByRepresentativeInfo($representative);

            //if no representative in cicero api
            if (!$district) {
                //try to get info by address
                $districts = $this->ciceroService
                    ->getRepresentativeByLocation(
                        $representative->getOfficialAddress(),
                        $representative->getCity(),
                        $representative->getState()->getCode(),
                        $representative->getCountry(),
                        true
                    );

                if (!empty($districts)) {
                    $district = array_shift($districts);
                    $representative->setIsNonLegislative(1);
                } else {
                    return false;
                }
            }

            $representative->setDistrict($district);
        } else {
            $representative->setDistrict($reprStorageObj->getDistrict());
            $representative->setStorageId($reprStorageObj->getStorageId());
        }

        return $representative;
    }

    /**
     * Generate representative username by name and set new username
     *
     * @param Representative $representative
     * @param int            $iteration
     *
     * @return string New username
     */
    public function generateRepresentativeUsername(Representative $representative, $iteration = 0)
    {
        // Generate canonical name
        $name = $representative->getFirstName() . $representative->getLastName();
        $name = preg_replace('/[^\w]/i', '', $name);
        $name = strtolower($name);
        $name = $iteration ? ($name . $iteration) : $name;

        $representByUsername = $this->entityManager
            ->getRepository('CivixCoreBundle:Representative')
            ->findOneBy(array('username' => $name));

        if (is_null($representByUsername)) {
            $representative->setUsername($name);
        } else {
            $name = $this->generateRepresentativeUsername($representative, ++$iteration);
        }

        return $name;
    }

    /**
     * Generate representative password and set to representative
     *
     * @param Representative $representative
     *
     * @return string New password
     */
    public function generateRepresentativePassword(Representative $representative)
    {
        $newPassword = substr(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36), 0, 9);

        $encoder = $this->encoderFactory->getEncoder($representative);
        $password = $encoder->encodePassword($newPassword, $representative->getSalt());
        $representative->setPassword($password);

        return $newPassword;
    }
}
