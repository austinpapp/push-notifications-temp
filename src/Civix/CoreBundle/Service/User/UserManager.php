<?php

namespace Civix\CoreBundle\Service\User;

use Civix\CoreBundle\Entity\User;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UserManager
{
    const USER_RESET_PASSWORD_INTERVAL_HOURS = 24;
    
    private $entityManager;
    private $ciceroApi;
    private $groupManager;
    private $cropImageService;
    private $kernelRootDir;
    
    public function __construct(
        \Doctrine\ORM\EntityManager $entityManager,
        \Civix\CoreBundle\Service\CiceroApi $ciceroApi,
        \Civix\CoreBundle\Service\Group\GroupManager $groupManager,
        \Civix\CoreBundle\Service\CropImage $cropImageService,
        $kernelRootDir
    ) {
        $this->entityManager = $entityManager;
        $this->ciceroApi = $ciceroApi;
        $this->groupManager = $groupManager;
        $this->cropImageService = $cropImageService;
        $this->kernelRootDir = $kernelRootDir;
    }

    public function updateDistrictsIds(User $user)
    {
        $districts = $this->ciceroApi->getRepresentativeByLocation(
            $user->getLineAddress(),
            $user->getCity(),
            $user->getState(),
            $user->getCountry()
        );
        if (!empty($districts)) {
            $user->getDistricts()->clear();

            foreach ($districts as $userDistrict) {
                $user->addDistrict($userDistrict);
            }

            $user->setUpdateProfileAt(new \DateTime());
        }

        return $user;
    }

    public function updateSettings(User $user, User $userWithSettings)
    {
        $settings = array(
            'DoNotDisturb', 'IsNotifQuestions', 'IsNotifDiscussions',
            'IsNotifMessages', 'IsNotifMicroFollowing', 'IsNotifMicroGroup',
            'IsNotifScheduled', 'ScheduledFrom', 'ScheduledTo'
        );

        foreach ($settings as $setting) {
            $setMethod = 'set'.$setting;
            $getMethod = 'get'.$setting;
            $user->$setMethod($userWithSettings->$getMethod());
        }

        return $user;
    }

    public function updateProfileFull(User $user, User $new)
    {
        $this->updateProfileCommon($user, $new);
        $this->updateProfileDemographics($user, $new);
        $this->updateProfilePolitical($user, $new);

        return $user;
    }

    public function updateProfileCommon(User $user, User $new)
    {
        $user
            ->setFirstName($new->getFirstName())
            ->setLastName($new->getLastName())
            ->setBirth($new->getBirth())
            ->setAddress1($new->getAddress1())
            ->setAddress2($new->getAddress2())
            ->setCity($new->getCity())
            ->setState($new->getState())
            ->setCountry($new->getCountry())
            ->setZip($new->getZip())
            ->setEmail($new->getEmail())
            ->setPhone($new->getPhone())
            ->setFacebookLink($new->getFacebookLink())
            ->setTwitterLink($new->getTwitterLink())
            ->setUpdateProfileAt(new \DateTime())
            ->setBio($new->getBio())
            ->setSlogan($new->getSlogan())
            ->setInterests($new->getInterests())
        ;

        if ($new->getPassword()) {
            $user->setPassword($new->getPassword())
                ->setSalt($new->getSalt());
        }

        if ($new->getAvatarFileName() && $new->getAvatarFileName() !== $user->getAvatarFileName()) {
            $img = imagecreatefromstring(base64_decode($new->getAvatarFileName()));

            if ($img != false) {
                $filename = $user->getId() . '_' .uniqid() . '.jpeg';
                $temp_file = tempnam(sys_get_temp_dir(), 'avatar');
                if (imagejpeg($img, $temp_file)) {

                    //square avatars
                    try {
                        $this->cropImageService->rebuildImage(
                            $temp_file,
                            $temp_file);
                    } catch (\Exception $exc) {
                    }

                    $fileUpload = new UploadedFile($temp_file, $filename);
                    $user->setAvatar($fileUpload);
                }
            }
        }

        $user->setIsRegistrationComplete(true);
    }
    
    public function updateProfileDemographics(User $user, User $new)
    {
        $user->setSex($new->getSex());
        $user->setOrientation($new->getOrientation());
        $user->setRace($new->getRace());
        $user->setBirth($new->getBirth());
        $user->setIncomeLevel($new->getIncomeLevel());
        $user->setEmploymentStatus($new->getEmploymentStatus());
        $user->setEducationLevel($new->getEducationLevel());
        $user->setMaritalStatus($new->getMaritalStatus());
        $user->setReligion($new->getReligion());

        return $user;
    }

    public function updateProfilePolitical(User $user, User $new)
    {
        $user->setParty($new->getParty());
        $user->setPhilosophy($new->getPhilosophy());
        $user->setDonor($new->getDonor());
        $user->setRegistration($new->getRegistration());

        return $user;
    }

    public function checkResetInterval(User $user)
    {
        $lastResetDate = $user->getResetPasswordAt();
        if (is_null($lastResetDate)) {
            return true;
        }

        $currentDate = new \DateTime();
        $resetIntervalHours = ($currentDate->getTimestamp() - $lastResetDate->getTimestamp())/3600;

        if ($resetIntervalHours >= 24) {
            return true;
        }

        return false;
    }
}
