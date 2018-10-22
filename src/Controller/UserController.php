<?php

namespace App\Controller;

use App\Entity\ApiToken;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

// use @IsGranted("ROLE_ADMIN") as an annotation
// this forces all routes in this class be at least ROLE_ADMIN
class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    // use @IsGranted("ROLE_ADMIN") as an annotation
    // this is the same as using $this->denyAccessUnlessGranted('ROLE_ADMIN')
    public function index()
    {
        // Deny access unless user has ROLE_ADMIN
        //$this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/make-users-just-this-once")
     */
    public function makeUsers(UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();

        $user->setEmail('dragon@reborn.net');
        $user->setFirstName('Rand');
        $user->setRoles(['ROLE_DRAGON']);
        $user->setPassword($passwordEncoder->encodePassword($user, 'althor'));
        $user->setTwitterUsername('theRealDragonReborn');
        $apiToken1 = new ApiToken($user);
        $apiToken2 = new ApiToken($user);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->persist($apiToken1);
        $em->persist($apiToken2);
        $em->flush();

        $user2 = new User();
        $user2->setEmail('egwene@thetower.net');
        $user2->setFirstName('Egwene');
        $user2->setRoles(['ROLE_ADMIN']);
        $user2->setPassword($passwordEncoder->encodePassword($user2, 'almere'));
        $user2->setTwitterUsername('GreenAjah');
        $apiToken3 = new ApiToken($user2);
        $apiToken4 = new ApiToken($user2);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user2);
        $em->persist($apiToken3);
        $em->persist($apiToken4);
        $em->flush();

        return $this->index();
    }
}
