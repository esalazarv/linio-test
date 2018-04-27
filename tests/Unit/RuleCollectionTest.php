<?php
/**
 * Created by PhpStorm.
 * User: eduardo
 * Date: 26/04/18
 * Time: 23:05
 */

namespace Tests;


use App\Interfaces\RuleCollectionInterface;
use App\Interfaces\RuleInterface;
use App\Validation\Rules\RuleCollection;
use PHPUnit\Framework\TestCase;

class RuleCollectionTest extends TestCase
{
    /**
     * Check if an instance of RuleCollection implements RuleCollectionInterface
     */
    public function testIfImplementsRuleCollectionInterface()
    {
        $collection = new RuleCollection();
        $this->assertInstanceOf(RuleCollectionInterface::class, $collection);
    }

    /**
     * Check addRule method
     * Check getCollection method
     * Collection must contains 3 Object that implements RuleInterface
     */
    public function testAddRulesToCollection()
    {
        $collection = new RuleCollection();
        $collection->addRule($this->getMockForAbstractClass(RuleInterface::class));
        $collection->addRule($this->getMockForAbstractClass(RuleInterface::class));
        $collection->addRule($this->getMockForAbstractClass(RuleInterface::class));
        $this->assertCount(3, $collection->getCollection());
        foreach ($collection as $rule) {
            $this->assertInstanceOf(RuleInterface::class, $rule);
        }
    }


}