<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $comment = new Comment();
        $comment->setComment('This picture looks great!');
        $comment->setAuthor($this->getReference('ApertureFan99'));
        $comment->setPost($this->getReference('Crowded Time Square'));
        $manager->persist($comment);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProfileFixtures::class,
            PostFixtures::class
        ];
    }
}
