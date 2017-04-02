<?php 

namespace DavidFricker\BaseChanger;

/**
  * GMP Base converter
  * 
  * Enables alphanumeric encoding and decoding of binary data for easy 
  * transportation over a medium. Works using the GMP extension to avoid 
  * PHP's base_convert loss of preceision when working with large numbers.
  *
  * Class is optimized for conversion of input to/from binary to aritbrary bases.
  * However it also provides an artibrtary base changer in baseChange().
*/
class GMP {
    /**
     * Intermediate base between binary and the base of choice.
     */
   const INTERMEDIATE_BASE = 16;

   /**
    * Convert raw binary bytes to arbitrary base
    * 
    * @param  binary $binary_data binary bytes not binary string (e.g. 1011)
    * @param  integer $base_to base to convert to
    * @return string encoded binary data
    */
   public static function changeTo($binary_data, $base_to) {
      $hexadecimal = bin2hex($binary_data);

      return self::baseChange($hexadecimal, self::INTERMEDIATE_BASE, $base_to);
   }

   /**
    * Convert from arbitrary base to raw binary data
    * 
    * @param  string $encoded representation of binary data 
    * @param  integer $base_from current base of $encoded
    * @return binary raw binary data
    */
   public static function changeFrom($encoded, $base_from) {
      $hexadecimal = self::baseChange($encoded_hex, $base_from, self::INTERMEDIATE_BASE); 

      // if its not even it will be rejected by hex2bin
      // add a precceding zero if its uneven
      if (strlen($hexadecimal) % 2 != 0) {
         $hexadecimal = '0' . $hexadecimal;
      }
      
      return hex2bin($hexadecimal);
   }

   /**
    * This method cannot convert raw binary bytes. 
    * Either encode the binary in string format (e.g. 1011) or change it to hex and then change to your desired base.
    * 
    * @param  mixed $input raw binary or string encoded version binary
    * @param  integer $base_from current base of $input value
    * @param  integer $base_to base to convert to
    * @return string representation of $input in arbitrary base
    */
   public static function baseChange($input, $base_from, $base_to) {
      return gmp_strval(gmp_init($input, $base_from), $base_to);
   }
}
