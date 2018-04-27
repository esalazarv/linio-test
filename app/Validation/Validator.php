<?php
/**
 * Created by PhpStorm.
 * User: eduardo
 * Date: 26/04/18
 * Time: 23:26
 */

namespace App\Validation;

use App\Interfaces\RuleCollectionInterface;
use App\Interfaces\RuleInterface;

class Validator
{
    protected $message;

    /**
     * @param $value
     * @param RuleInterface $rule
     * @return bool
     */
    public function validate($value, RuleInterface $rule)
    {
        $result = $rule->evaluate($value);
        return $result;
    }

    /**
     * @param $value
     * @param RuleCollectionInterface $ruleCollection
     * @return bool
     */
    public function validateMultipleRules($value, RuleCollectionInterface $ruleCollection)
    {
        $results = array_filter($ruleCollection->getCollection(), function ($rule) use ($value) {
            /** @var RuleInterface $rule */
            return $rule->evaluate($value);
        });

        return count($ruleCollection->getCollection()) === count($results);
    }
}