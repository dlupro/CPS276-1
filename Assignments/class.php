<?php

class Calculator


{
    public function calc($operator, $num1, $num2)

    {

        if (!is_string($operator) || !is_numeric($num1) || !is_numeric($num2)) {

            return "You must enter a string and two numbers";

        }



        if ($operator === '+') {

            $result = $num1 + $num2;

            return "The sum of the numbers is $result";

        } elseif ($operator === '-') {

            $result = $num1 - $num2;

            return "The difference of the numbers is $result";

        } elseif ($operator === '*') {

            $result = $num1 * $num2;

            return "The product of the numbers is $result";

        } elseif ($operator === '/') {

            if ($num2 == 0) {

                return "Cannot divide by zero";

            }

            $result = $num1 / $num2;

            return "The division of the numbers is $result";

        } else {

            return "Invalid operator. Supported operators are +, -, *, and /";
        }
    }