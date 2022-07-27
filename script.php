<?php

class php___Luhn_Check{

  // All status that can occur during an IMEI luhn check
  private static $status =
  [
    "success" => "Valid IMEI",

    "err_01" => "Invalid: IMEI does not contain 15 digits",
    "err_02" => "Invalid: non numeric IMEI",
    "err_03" => "Invalid: IMEI did not pass the Luhn check"
  ];

  // GSM IMEI Check - Main Function
  public static function gsm_imei($imei_get){

    // Trimming IMEI to avoid bad copy spaces
    $imei_trim = trim($imei_get);

    if (strlen($imei_trim) != 15){ $return_status = self::$status['err_01']; }

    if (is_numeric($imei_trim) == false){ $return_status = self::$status['err_02']; }

    // If the IMEI does not fill the mandatory size of 15 digits, or if the content is not completely numeric, then aborts before proceeding to the Luhn Check.
    if (isset($return_status)){ return $return_status; }

    // Transform each digit of IMEI in 15 array elements
    $imei = str_split($imei_trim);

    // -- IMEI Luhn Check Starts --

    // Step +2 loop increment to reach the gap between digits
    for ($i=1; $i <= 13; $i+=2){

      // Double the same digit
      $imei[$i] += $imei[$i];

      // If the double of the digit is higher than 10, then sum each digit of the double calc result
      if ($imei[$i] >= 10){ $imei[$i] = array_sum(str_split($imei[$i])); }

    }

    // Sum entire array less the last element value -- last element value will be used as check digit
    $sum = array_sum($imei) - end($imei);

    // Calc to getting the check digit althrought the sum of the entire array
    $check_digit = intval((10-($sum%10))%10);

    // Last check - if the check digit calc is equal to the last imei digit, then is a valid imei
    $return_status = ($check_digit === intval(end($imei))) ? self::$status['success'] : self::$status['err_03'];

    return $return_status;

  }

}


//print examples:

echo php___Luhn_Check::gsm_imei("49015420323751"); //print example 1 -> Invalid: IMEI does not contain 15 digits
echo php___Luhn_Check::gsm_imei("X0142Y918285179"); //print example 2 -> Invalid: non numeric IMEI
echo php___Luhn_Check::gsm_imei("355626052070019"); //print example 3 -> Invalid: IMEI did not pass the Luhn check
echo php___Luhn_Check::gsm_imei("868066052341676  "); //print example 4 -> Valid IMEI
echo php___Luhn_Check::gsm_imei("866799049992993"); //print example 5 -> Valid IMEI


/*

font-pages:

about IMEI -- https://en.wikipedia.org/wiki/International_Mobile_Equipment_Identity
imei examples to test -- https://bmobile.in/lost-imei/

php.net documentation:

trim -- https://www.php.net/manual/en/function.trim.php
strlen -- https://www.php.net/manual/en/function.strlen.php
is_numeric -- https://www.php.net/manual/en/function.is-numeric.php
isset -- https://www.php.net/manual/en/function.isset.php
str_split -- https://www.php.net/manual/en/function.str-split.php
array_sum -- https://www.php.net/manual/en/function.array-sum.php
end -- https://www.php.net/manual/en/function.end.php
intval -- https://www.php.net/manual/en/function.intval.php

*/

?>