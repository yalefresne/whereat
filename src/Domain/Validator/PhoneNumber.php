<?php

declare(strict_types=1);

namespace App\Domain\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class PhoneNumber extends Constraint
{
    public string $message = 'The phone number "{{ value }}" is not valid.';
}
