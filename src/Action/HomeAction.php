<?php

declare(strict_types=1);

namespace App\Action;

use App\Responder\HtmlResponderInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/")
 */
class HomeAction
{
    private HtmlResponderInterface $responder;

    public function __construct(HtmlResponderInterface $responder)
    {
        $this->responder = $responder;
    }

    public function __invoke()
    {
        return $this->responder->render('index.html.twig');
    }
}
