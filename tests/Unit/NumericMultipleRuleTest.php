<?php
/**
 * Created by PhpStorm.
 * User: eduardo
 * Date: 26/04/18
 * Time: 22:42
 */

namespace Tests;


use App\Interfaces\RuleInterface;
use App\Validation\Rules\NumericalMultipleRule;
use App\Validation\Rules\Rule;
use PHPUnit\Framework\TestCase;

class NumericMultipleRuleTest extends TestCase
{
    /**
     * Check if extends from Rule and implements RuleInterface
     */
    public function testExtendsRuleAndImplementsRuleInterface()
    {
        $rule = new NumericalMultipleRule(5);
        $this->assertInstanceOf(Rule::class, $rule);
        $this->assertInstanceOf(RuleInterface::class, $rule);
    }

    /**
     * Check if a number is multiple of 5
     * 15 must return true
     * 30 must return true
     * 11 must return false
     * 2 must return false
     */
    public function testEvaluateIfNumberGivenIsMultipleOfANumber()
    {
        $rule = new NumericalMultipleRule(5);
        $this->assertTrue($rule->evaluate(15));
        $this->assertTrue($rule->evaluate(30));
        $this->assertFalse($rule->evaluate(11));
        $this->assertFalse($rule->evaluate(2));
    }
}