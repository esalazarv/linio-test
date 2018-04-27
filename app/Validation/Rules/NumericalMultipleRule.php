<?php
/**
 * Created by PhpStorm.
 * User: eduardo
 * Date: 26/04/18
 * Time: 22:49
 */

namespace App\Validation\Rules;


class NumericalMultipleRule extends Rule
{
    /**
     * @var int
     */
    protected $divisor;

    /**
     * NumericMultipleRule constructor.
     * @param int $divisor
     */
    public function __construct(int $divisor)
    {
        $this->divisor = $divisor;
    }

    /**
     * @param int $value
     * @return bool
     */
    public function evaluate($value): bool
    {
        return !((bool) ($value % $this->divisor));
    }
}