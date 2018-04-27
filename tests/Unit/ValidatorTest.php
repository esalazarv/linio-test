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

    public function testValidate()
    {
        $validator = new Validator('Single');
        $rule  = $this->getMockRuleReturnFalse();
        $result = $validator->validate($value, $rule);
        $this->assertFalse($result);
    }

    public function testValidateMultipleRules() {
        $validator = new Validator('Multiple');
        $value = 15;
        $collection = new RuleCollection();
        $collection->addRule($this->getMockRuleReturnTrue());
        $collection->addRule($this->getMockRuleReturnTrue());
        $result = $validator->validateMultipleRules($value, $collection);
        $this->assertTrue($result);
    }
}