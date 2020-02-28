<?php

namespace App\DataFixtures\Dev;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = $this->getUserIntance('admin@gmail.com', 'admin', ['admin']);
        $user = $this->getUserIntance('user@gmail.com', 'user', ['user']);

        $manager->persist($admin);
        $manager->persist($user);
        $manager->flush();
    }

    private function getUserIntance(string $email, string $password, array $roles): User
    {
        $user = new User();
        $user->setEmail($email);
        $user->setRoles($roles);
        $user->setPassword($this->encoder->encodePassword($user, $password));
        return $user;
    }
}
