<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PostFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $post = new Post();
        $post->setTitle('Crowded Time Square');
        $post->setImage('6.jpg');
        $post->setDescription('Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi ut rem magnam culpa laudantium beatae natus unde, assumenda incidunt illo cum earum deserunt enim est excepturi pariatur ad totam similique.');
        $post->setAuthor($this->getReference('ApertureFan99'));
        $this->addReference($post->getTitle(), $post);
        $manager->persist($post);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProfileFixtures::class
        ];
    }
}
