<?php

declare(strict_types=1);

namespace Whereat\Action;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Whereat\Responder\HtmlResponderInterface;

#[Route('/')]
class HomeAction
{
    public function __construct(
        private HtmlResponderInterface $responder
    ) {
    }

    public function __invoke(): Response
    {
        return $this->responder->render('index.html.twig', []);
    }
}
