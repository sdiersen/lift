<?php
/**
 * Created by PhpStorm.
 * User: cippio
 * Date: 10/19/18
 * Time: 12:46 PM
 */

namespace App\Service;


use Psr\Log\LoggerInterface;
use Symfony\Component\Security\Core\Security;

class AccountHelper
{
    private $security;
    private $logger;

    public function __construct(Security $security, LoggerInterface $logger)
    {
        $this->security = $security;
        $this->logger = $logger;
    }

    public function logUser()
    {
        $message = "User was logged at " . date("H:i:s");
        $this->logger->info($message, [
            $this->security->getUser()
        ]);
    }
}