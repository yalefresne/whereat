<?php

declare(strict_types=1);

namespace App\Responder;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HtmlResponder implements HtmlResponderInterface
{
    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function render(string $name, array $context = []): Response
    {
        return new Response(
            $this->twig->render($name, $context)
        );
    }
}
