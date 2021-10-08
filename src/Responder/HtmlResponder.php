<?php

declare(strict_types=1);

namespace Whereat\Responder;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HtmlResponder implements HtmlResponderInterface
{
    public function __construct(
        private Environment $twig
    ) {
    }

    public function render(string $name, array $context = []): Response
    {
        return new Response(
            $this->twig->render($name, $context)
        );
    }
}
