<?php

namespace Civix\CoreBundle\Service\Representative;

use Civix\CoreBundle\Entity\RepresentativeStorage;
use Civix\CoreBundle\Entity\Representative;

class RepresentativeSTManager
{
    private $entityManager;
    private $ciceroService;
    private $ciceroStorageService;
    
    public function __construct(
        \Doctrine\ORM\EntityManager $entityManager,
        \Civix\CoreBundle\Service\CiceroApi $ciceroStorageService,
        \Civix\CoreBundle\Service\CiceroCalls $ciceroService
    ) {
        $this->entityManager = $entityManager;
        $this->ciceroService = $ciceroService;
        $this->ciceroStorageService = $ciceroStorageService;
    }

    /**
     * Synchronize $storageRepresentative with Cicero representative.
     * 
     * @param \Civix\CoreBundle\Entity\RepresentativeStorage $storageRepresentative
     * @return boolean
     */
    public function synchronizeRepresentative(RepresentativeStorage $storageRepresentative)
    {
        $ciceroRepresentative = $this->ciceroService->findRepresentativeByNameAndId(
            $storageRepresentative->getFirstName(),
            $storageRepresentative->getLastName(),
            $storageRepresentative->getStorageId()
        );
        $civixRepresentative = $storageRepresentative->getRepresentative();

        if ($ciceroRepresentative) {
            //update current data of representative from cicero
            $this->ciceroStorageService->fillStorRepresentativeByApiObj($storageRepresentative, $ciceroRepresentative);
            $this->entityManager->persist($storageRepresentative);

            //update representative in civix
            if ($civixRepresentative instanceof Representative) {
                $civixRepresentative->setOfficialTitle($storageRepresentative->getOfficialTitle());
                $civixRepresentative->setDistrict($storageRepresentative->getDistrict());
                $this->entityManager->persist($civixRepresentative);
                $this->entityManager->flush($civixRepresentative);
            }
            $this->entityManager->flush($storageRepresentative);
        } else {
            //unlink district and storage
            if ($civixRepresentative instanceof Representative) {
                $civixRepresentative->setDistrict(null);
                $civixRepresentative->setStorageId(null);
                $this->entityManager->persist($civixRepresentative);
                $this->entityManager->flush($civixRepresentative);
            }
            $this->entityManager->remove($storageRepresentative);
            $this->entityManager->flush($storageRepresentative);
            
            return false;
        }

        return true;
    }

    public function synchronizeByStateCode($stateCode)
    {
        $representatives = $this->entityManager->getRepository('CivixCoreBundle:RepresentativeStorage')
                ->findSTRepresentativeByState($stateCode);
        foreach ($representatives as $storageRepresentative) {
            $this->synchronizeRepresentative($storageRepresentative);
        }
    }
}
