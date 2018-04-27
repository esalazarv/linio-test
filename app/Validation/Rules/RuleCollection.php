<?php
/**
 * Created by PhpStorm.
 * User: eduardo
 * Date: 26/04/18
 * Time: 23:06
 */

namespace App\Validation\Rules;


use App\Interfaces\RuleCollectionInterface;
use App\Interfaces\RuleInterface;

class RuleCollection implements RuleCollectionInterface
{
    /**
     * @var array
     */
    protected $collection = [];

    /**
     * @param RuleInterface $rule
     */
    public function addRule(RuleInterface $rule)
    {
        array_push($this->collection, $rule);
    }

    /**
     * @return array RuleInterface[]
     */
    public function getCollection()
    {
        return $this->collection;
    }
}