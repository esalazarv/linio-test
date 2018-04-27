<?php
/**
 * Created by PhpStorm.
 * User: eduardo
 * Date: 26/04/18
 * Time: 23:22
 */

namespace Tests;


use App\Interfaces\RuleInterface;
use App\Validation\Rules\RuleCollection;
use App\Validation\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{

    public function getMockRuleReturnFalse()
    {
        $rule = $this->getMockForAbstractClass(RuleInterface::class);
        $rule->method('evaluate')
        ->willReturn(false);

        return $rule;
    }

    public function getMockRuleReturnTrue()
    {
        $rule = $this->getMockForAbstractClass(RuleInterface::class);
        $rule->method('evaluate')
            ->willReturn(true);
        return $rule;
    }

    /**
     * Validate a single one rule when rule return  true
     */
    public function testValidateRuleWhenEvaluationPass()
    {
        $value = 1;
        $validator = new Validator();
        $rule  = $this->getMockRuleReturnFalse();
        $result = $validator->validate($value, $rule);
        $this->assertFalse($result);
    }

    /**
     * Validate a single one rule when rule return false
     */
    public function testValidateRuleWhenEvaluationFails()
    {
        $value = 1;
        $validator = new Validator();
        $rule  = $this->getMockRuleReturnTrue();
        $result = $validator->validate($value, $rule);
        $this->assertTrue($result);
    }

    /**
     * Check validation for multiple rules return true when each evaluation rule return true
     */
    public function testValidateMultipleRules() {
        $validator = new Validator();
        $value = 15;
        $collection = new RuleCollection();
        $collection->addRule($this->getMockRuleReturnTrue());
        $collection->addRule($this->getMockRuleReturnTrue());
        $result = $validator->validateMultipleRules($value, $collection);
        $this->assertTrue($result);
    }
}