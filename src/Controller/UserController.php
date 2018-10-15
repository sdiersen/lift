<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/make-users-just-this-once")
     */
    public function makeUsers()
    {
//        $user = new User();
//        $user->setEmail('dragon@reborn.net');
//        $user->setFirstName('Rand');
//        $user->setRoles(['ROLE_DRAGON']);
//
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($user);
//        $em->flush();
        return $this->index();
    }
}
