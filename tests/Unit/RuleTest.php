<?php
/**
 * Created by PhpStorm.
 * User: eduardo
 * Date: 26/04/18
 * Time: 22:43
 */

namespace Tests;


use App\Interfaces\RuleInterface;
use App\Validation\Rules\Rule;
use PHPUnit\Framework\TestCase;

class RuleTest extends TestCase
{
    /**
     * This check if this abstract class implements RuleInterface
     */
    public function testImplementsRuleInterface()
    {
        $rule = $this->getMockForAbstractClass(Rule::class);
        $this->assertInstanceOf(RuleInterface::class, $rule);
    }
}