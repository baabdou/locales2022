<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Entity\User;
use App\Entity\Profil;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class AppFixtures extends Fixture
{
private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder=$encoder;

    }
    public function load(ObjectManager $manager): void
    {   
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr_FR');


        $profils =["Agent" ,"Administrateur" ,"Super Admin"];
        foreach ($profils as $key => $libelle) {
            $profil =new Profil() ;
            $profil ->setLibelle ($libelle );
            $profil ->setDescription ($libelle );
            $manager ->persist ($profil );
            $manager ->flush();
            for ($i=1; $i <=2 ; $i++) {
                $user = new User();
                $user->setProfil ($profil);
                // $user->setPhone($faker->phoneNumber);
                $user->setEmail($faker->email);
                $user->setPrenom("tttt");
                $user->setNom("yyyy");
                $user->setZone("test");
                // $user->setDateNaissance(new DateTime());
                $user->setLieuNaissance(" ");
                $user->setTelephone("");
                $user->setAdresse("");
                //Génération des Users
                $password = $this->encoder->encodePassword ($user, 'passer1234' );
                $user->setPassword($password);
                $manager->persist($user);
 }

        $manager->flush();
    }

}
}
