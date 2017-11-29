<?php
/**
 * Created by PhpStorm.
 * User: adrien.leduc
 * Date: 29/11/17
 * Time: 09:26
 */

namespace App\DataFixtures\ORM;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class LoadTag extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $tag = new Tag("Food","food");
        $tags = new Tag("Tennis","tennis");
        $manager->persist($tag);
        $manager->persist($tags);
        $manager->flush();
    }
}