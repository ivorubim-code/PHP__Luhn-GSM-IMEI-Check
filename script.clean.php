<?php

class php___Luhn_Check{

  private static $status =
  [
    "success" => "Valid IMEI",

    "err_01" => "Invalid: IMEI does not contain 15 digits",
    "err_02" => "Invalid: non numeric IMEI",
    "err_03" => "Invalid: IMEI did not pass the Luhn check"
  ];

  public static function gsm_imei($imei_get){

    $imei_trim = trim($imei_get);

    if (strlen($imei_trim) != 15){ $return_status = self::$status['err_01']; }

    if (is_numeric($imei_trim) == false){ $return_status = self::$status['err_02']; }

    if (isset($return_status)){ return $return_status; }

    $imei = str_split($imei_trim);

    for ($i=1; $i <= 13; $i+=2){

      $imei[$i] += $imei[$i];

      if ($imei[$i] >= 10){ $imei[$i] = array_sum(str_split($imei[$i])); }

    }

    $sum = array_sum($imei) - end($imei);

    $check_digit = intval((10-($sum%10))%10);

    $return_status = ($check_digit === intval(end($imei))) ? self::$status['success'] : self::$status['err_03'];

    return $return_status;

  }

}

?>