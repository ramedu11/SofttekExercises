<?php
/**
 * Created by PhpStorm.
 * User: Ramon Mendoza
 * Date: 4/10/2018
 * Time: 10:02 PM
 */

class SofttekExercises
{
    /**
     * This function returns all odd numbers between two given values.
     * @param int $first
     * @param int $second
     * @return string with either the result or a warning text.
     */
    public function oddNumbers($first = 1, $second = 100)
    {
        $result = "";
        //First validate that values are integer and that the first parameter is greater than the second one.
        if(is_int($first) && is_int($second) && ($first < $second)) {
            //Iterate all numbers between first and second value.
            for($i = $first; $i <= $second; $i++) {
                //Validate that $i is an odd number obtaining the remainder of $i divided by 2
                if($i%2 !== 0) {
                    $result .= $i . '<br>';
                }
            }
        } else {
            $result = "Please verify that the second value is greater than the first one," .
                " only Integers are supported.";
        }
        return $result;
    }

    /**
     * This function calculates the sum of the two largest elements in an array.
     * @param array $values
     * @return mixed|string with either the sum or a warning text
     */
    public function sumOfLargestValues ($values = array())
    {
        $length = count($values);
        //Validate that the input is an array and has at least 2 elements
        if(is_array($values) and $length >= 2){
            //Compare values on position 0 and 1, to know which one is larger.
            //$aux1 will save the largest value, and $aux2 the second largest.
            $aux1 = $values[0] > $values[1] ? $values[0] : $values[1];
            $aux2 = $values[0] > $values[1] ? $values[1] : $values[0];
            //Iterate all the array, starting from position 2 (since we already evaluate position 0 and 1).
            for($i = 2; $i < $length; $i++){
                //Evaluate if the element on position $i is larger than the one we had identified
                //as the largest in the previous iteration, if so, we now save the value we had on $aux1
                //into $aux2, and the new largest value in $aux1. Else, we validate if the element on
                //position $i is larger than $value2, if so, we save it on $value2. If none of the above
                //are true, we do nothing and continue with the iterations if apply.
                if($values[$i] > $aux1){
                    $aux2 = $aux1;
                    $aux1 = $values[$i];
                } elseif ($values[$i] > $aux2) {
                    $aux2 = $values[$i];
                }
            }
            //Now that we iterate all our array, we can sum our two largest values.
            $result = $aux1 + $aux2;
        } else {
            $result = "You must input an array with at least 2 elements.";
        }
        return $result;
    }

    /**
     *
     * @param $firstString
     * @param $secondString
     * @return int with the longest overlap
     */
    public function overlap($firstString, $secondString)
    {
        $aux1 = strval($firstString);
        $aux2 = strval($secondString);
        $length1 = strlen($aux1);
        $length2 = strlen($aux2);
        $overlap = array();
        $result = 0;
        //Validates that both Strings have at least one char each one.
        if($length1 > 0 && $length2 >0){
            //Iterates all the chars from the first String.
            for($i = 0; $i < $length1; $i++){
                //Iterates all the chars from the second String
                for($j = 0; $j < $length2; $j++){
                    //Evaluates if the char from the first String in position $i is exactly the same
                    //as the one in the second String in position $j.
                    if($aux1[$i] === $aux2[$j]){
                        //If either $i or $j is equal to 0, we set &overlap[$i][$j] to 1.
                        if($i === 0 || $j === 0){
                            $overlap[$i][$j] = 1;
                        } else {
                            //Here we validate if the previous element of the matrix is set, if true
                            //we add 1 and save it to the current position of the matrix, if false, we
                            //just restart the count in 1.
                            $overlap[$i][$j] = isset($overlap[$i-1][$j-1])? $overlap[$i-1][$j-1] + 1 : 1;
                        }
                        //In order to save the largest overlap, we validate if the current value
                        //on our matrix is greater than the one that is already assigned on $result
                        //if true, then we save the new greatest value in $result, if false, we do nothing.
                        if($overlap[$i][$j] > $result){
                            $result = $overlap[$i][$j];
                        }
                    }
                }
            }
        } else {
            $result = "You must input two valid Strings with at least one char each one.";
        }
        return $result;
    }
}