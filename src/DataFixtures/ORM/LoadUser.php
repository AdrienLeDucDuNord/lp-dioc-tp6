<?php

namespace App\DataFixtures\ORM;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUser extends Fixture
{
    const USER_PASSWORD = 'user';

    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setFirstname('John');
        $user->setLastname('Doe');
        $user->setEmail('user@exemple.org');

        $password = $this->container->get('security.password_encoder')->encodePassword($user, self::USER_PASSWORD);
        $user->setPassword($password);

        $u1 = new User();

        $u1->setFirstname('Adrien');
        $u1->setLastname('Leduc');
        $u1->setEmail('adri@exemple.org');

        $password = $this->container->get('security.password_encoder')->encodePassword($u1, self::USER_PASSWORD);
        $u1->setPassword($password);
        $u1->setIsAuthor(true);

        $this->addReference('user', $user);

        $manager->persist($u1);
        $manager->persist($user);
        $manager->flush();
    }
}
