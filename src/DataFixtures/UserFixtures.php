<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setEmail('admin@aperture.com');
        $hashedPassword = $this->passwordHasher->hashPassword(
            $admin,
            'admin'
        );
        $admin->setPassword($hashedPassword);
        $manager->persist($admin);

        $user = new User();
        $user->setEmail('user@aperture.com');
        $user->setRoles(['ROLE USER']);
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            'user'
        );
        $user->setPassword($hashedPassword);
        $this->addReference($user->getEmail(), $user);
        $manager->persist($user);

        $manager->flush();
    }
}
