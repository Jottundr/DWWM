<?php

namespace App\DataFixtures;

use App\Entity\Profile;
use DateTime;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProfileFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $profile = new Profile();
        $profile->setUsername('ApertureFan99');
        $profile->setFirstName('Joe');
        $profile->setLastName('Biden');
        $date = new DateTimeImmutable('1942-11-02');
        $profile->setBirthDate($date);
        $profile->setAdress('1600 Pennsylvania Ave NW');
        $profile->setCity('Washington, DC');
        $profile->setPostalCode('20500');
        $profile->setUser($this->getReference('user@aperture.com'));
        $this->addReference($profile->getUsername(), $profile);
        $manager->persist($profile);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class
        ];
    }
}
