<?php
/**
 * Created by PhpStorm.
 * User: csalv
 * Date: 27/04/2018
 * Time: 10:40 AM
 */

namespace App;

use App\Validation\Rules\NumericalMultipleRule;
use App\Validation\Rules\RuleCollection;
use App\Validation\Validator;

class Application
{
    /**
     * @param int $start
     * @param int $end
     * @return array
     */
    protected function getOutputForRange(int $start, int $end)
    {
        $range = range($start, $end);
        $validator = new Validator();

        return array_map(function ($number) use ($validator) {
            $ruleForThree = new NumericalMultipleRule(3);
            $ruleForFive = new NumericalMultipleRule(5);

            $ruleCollection = new RuleCollection();
            $ruleCollection->addRule($ruleForThree);
            $ruleCollection->addRule($ruleForFive);

            $output = $number;
            $output = $this->makeLine($validator->validate($number, $ruleForThree), $number, $output, 'Linio');
            $output = $this->makeLine($validator->validate($number, $ruleForFive), $number, $output, 'It');
            $output = $this->makeLine($validator->validateMultipleRules($number, $ruleCollection), $number, $output, 'Linianos');

            return $output;
        }, $range);
    }

    /**
     * @param $result
     * @param $number
     * @param $currentOutput
     * @param $message
     * @return string
     */
    protected function makeLine($result, $number, $currentOutput, $message)
    {
        if ($result) {
            return "{$number}{$message}";
        }
        return $currentOutput;
    }

    /**
     * This is an alternative function to build the same output without call objects using only this one method
     * @param int $start
     * @param int $end
     * @return array
     */
    /*protected function alternative(int $start, int $end) {
        $array = range($start, $end);
        $messages = [
            3 => 'Linio',
            5 => 'It',
        ];

        return array_map(function ($item) use ($messages) {
            $evals = [];

            foreach ($messages as $key => $message) {
                $evals[$key] = !((bool) ($item % $key));
            }
            $matches = array_filter($evals, function ($eval) {
                return $eval;
            });
            if (count($matches) === count($messages)) {
                return "{$item} Linianos";
            }
            $key = key($matches);
            $multiple = $messages[$key] ?? null;
            return $item . " ". $multiple;
        }, $array);
    }*/

    /**
     * Run application
     */
    public function run()
    {
        echo implode('<br>', $this->alternative(1, 100));
    }
}