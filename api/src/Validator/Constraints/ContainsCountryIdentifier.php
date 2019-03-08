<?php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
* @Annotation
*/
class ContainsCountryIdentifier extends Constraint
{
    public $message = 'Le champs doit contenir l\'identifiant du pays.';
}
