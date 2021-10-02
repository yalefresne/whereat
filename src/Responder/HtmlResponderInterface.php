<?php

declare(strict_types=1);

namespace Whereat\Responder;

use Symfony\Component\HttpFoundation\Response;

interface HtmlResponderInterface
{
    public function render(string $name, array $context): Response;
}
