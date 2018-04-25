<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Teacher;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadFixtures implements FixtureInterface {

    public function load(ObjectManager $manager) {
        
        $teacher = new Teacher();
        $teacher->setName('Octopus' . rand(1, 100));
        $teacher->setSurname('Octopodinae');
        $teacher->setPesel(rand(1, 100));
        $teacher->setAddress('zadupie' . rand(1, 100));
        $teacher->setEmail('octo' . rand(1, 100) . '@.pl');
        $teacher->setPassword('pass' . rand(1, 100));
        $teacher->setPhone(rand(1000, 4000));
        $manager->persist($teacher);
        $manager->flush();
    }

}
