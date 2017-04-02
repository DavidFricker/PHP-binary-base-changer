<?php 

namespace DavidFricker\BaseChanger;

/**
  * Enables alphanumeric encoding and decoding of binary data for easy transportation over a medium
  * Works using the GMP extension to avoid PHP's base_convert loss of preceision when working with large numbers e.g. a 256 bit key
  *
  * Class is optimized for conversion of input to/from binary to aritbrary bases
  * however it also provides an artibrtary base changer in baseChange()
*/
class GMP {
   const INTERMEDIATE_BASE = 16;

   public static function changeTo($binary_data, $base_to) {
      $hexadecimal = bin2hex($binary_data);

      return self::baseChange($hexadecimal, self::INTERMEDIATE_BASE, $base_to);
   }

   public static function changeFrom($encoded_hex, $base_from) {
      $hexadecimal = self::baseChange($encoded_hex, $base_from, self::INTERMEDIATE_BASE); 

      // if its not even it will be rejected by hex2bin
      // add a precceding zero if its uneven
      if (strlen($hexadecimal) % 2 != 0) {
         $hexadecimal = '0' . $hexadecimal;
      }
      
      return hex2bin($hexadecimal);
   }

   /**
    * This method cannot convert raw binary bytes. Ethier encode the binary in string format (e.g. 1011) or change it to hex and then change to your desired base
    * 
    * @param  [type] $input     [description]
    * @param  [type] $base_from [description]
    * @param  [type] $base_to   [description]
    * @return [type]            [description]
    */
   public static function baseChange($input, $base_from, $base_to) {
      return gmp_strval(gmp_init($input, $base_from), $base_to);
   }
}
