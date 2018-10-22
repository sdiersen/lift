<?php
/**
 * Created by PhpStorm.
 * User: cippio
 * Date: 10/18/18
 * Time: 3:25 PM
 */

namespace App\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

abstract class BaseController extends AbstractController
{
    protected function getUser(): User
    {
        return parent::getUser();
    }
}