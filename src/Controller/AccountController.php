<?php

namespace App\Controller;

use App\Service\AccountHelper;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_USER")
 */
class AccountController extends BaseController
{
    /**
     * @Route("/account", name="lift_account")
     */
    public function index(AccountHelper $helper)
    {
        $helper->logUser();
        return $this->render('account/index.html.twig',[

        ]);
    }

    /**
     * @Route("/api/account")
     */
    public function accountApi()
    {
        $user = $this->getUser();

        return $this->json($user, 200, [], [
            'groups' => ['main'],
        ]);
    }
}
