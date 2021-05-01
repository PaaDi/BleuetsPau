<?php

namespace App\DataFixtures;

use Proxies\__CG__\App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
   private $passwordEncoder;
   public function __construct(UserPasswordEncoderInterface $passwordEncoder)
   {
      $this->passwordEncoder = $passwordEncoder;
   }

   public function load(ObjectManager $manager)
   {
      $user = new User();
      $user->setUsername('admin');
      $user->setRoles( array_unique( ['ROLE_ADMIN']) );
      $password = $this->passwordEncoder->encodePassword($user, 'test');
      $user->setPassword($password);           
      $manager->persist($user);
      $manager->flush();
   }
}
