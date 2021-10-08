<?php

declare(strict_types=1);

namespace Whereat\Domain\Validator;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
class PhoneNumber extends Constraint
{
    public string $message = 'The phone number "{{ value }}" is not valid.';
}
