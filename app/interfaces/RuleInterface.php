<?php
/**
 * Created by PhpStorm.
 * User: eduardo
 * Date: 26/04/18
 * Time: 22:45
 */

namespace App\Interfaces;

interface RuleInterface
{
    /**
     * @param mixed $value
     * @return bool
     */
    public function evaluate($value): bool;
}