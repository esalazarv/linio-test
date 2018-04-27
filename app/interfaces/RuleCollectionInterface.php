<?php
/**
 * Created by PhpStorm.
 * User: eduardo
 * Date: 26/04/18
 * Time: 23:07
 */

namespace App\Interfaces;


interface RuleCollectionInterface
{
    /**
     * @param RuleInterface $rule
     */
    public function addRule(RuleInterface $rule);

    /**
     * @return RuleInterface[]
     */
    public function getCollection();
}