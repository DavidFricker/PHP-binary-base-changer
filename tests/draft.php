<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$rounds = 100000;

$argrate_length_hex = 0;
$argrate_length_base64 = 0;
$argrate_length_base36 = 0;
$argrate_length_base62 = 0;
$argrate_length_sha256 = 0;
/*
for ($i=0; $i < $rounds; $i++) {
   $raw = openssl_random_pseudo_bytes(32);
   $argrate_length_hex += strlen(bin2hex($raw));
   $argrate_length_base64 += strlen(base64_encode($raw));
   $argrate_length_base36 += strlen(BinaryBaseChanger::changeTo($raw, 36));
   $argrate_length_base62 += strlen(BinaryBaseChanger::changeTo($raw, 62));
   $argrate_length_sha256 += strlen(hash('sha256', $raw));
}

echo 'avg hex: ' . $argrate_length_hex/$rounds . '<br>';
echo 'avg base64: ' . $argrate_length_base64/$rounds . '<br>';
echo 'avg base36: ' . $argrate_length_base36/$rounds . '<br>';
echo 'avg base62: ' . $argrate_length_base62/$rounds . '<br>';
echo 'avg sha256: ' . $argrate_length_sha256/$rounds . '<br>';

*/


$rounds  = 1000;
for ($i=0; $i < $rounds; $i++) {
   $raw = openssl_random_pseudo_bytes(32);
   echo $raw;
   echo '<br>';
   echo BinaryBaseChanger::changeTo($raw, 61);
   echo '<br>';
   echo BinaryBaseChanger::changeFrom(BinaryBaseChanger::changeTo($raw, 61),61);

   echo '<br>';echo '<br>';echo '<br>';echo '<br>';
}
echo $raw;
echo '<br>';
echo BinaryBaseChanger::changeTo($raw, 61);
echo '<br>';
echo BinaryBaseChanger::changeFrom(BinaryBaseChanger::changeTo($raw, 61),61);

// CHANGING THE BASE64 VALUE TO ENCODE TO RAW MAKES IT THE SAME AS BASE36 WUTG TGE INT SO THATS GOOD I GUESS*/
/*

function gmpBin2Base62($bin) {        
   $scientific_notation = '0x'.(bin2hex($bin));
   // convert from scienitificaiotn notation that hexdec creates on large numebrs
   //$expanded_number = number_format($scientific_notation, 0, '', '');
   return highPrecisionBaseChange($scientific_notation, 16, 60);
}

function gmpBase62ToBin($encoded_number) {    
    #$encoded_number;
    $expanded_number = highPrecisionBaseChange($encoded_number, 60, 16); 
 // var_dump($expanded_number);   
   return $scientific_notation = hex2bin(($expanded_number));
   // convert from scienitificaiotn notation that hexdec creates on large numebrs
  # $expanded_number = number_format($scientific_notation, 0, '', '');
  # return 
}

function highPrecisionBaseChange($input, $base_from, $base_to) {
   # var_dump($input); 
    #echo '<br/>';
   return gmp_strval(gmp_init($input, $base_from), $base_to);
}

$raw = openssl_random_pseudo_bytes(32);
#$dec = hexdec(bin2hex($raw));

#$dec = number_format($dec, 0, '', '');



#echo 'avg hex: ' . strlen(bin2hex($raw)) . '<br>';
#echo 'avg base64: ' . strlen(base64_encode($dec)) . '<br>';
#echo 'avg base62: ' . strlen(gmpBin2Base62($raw)) . '<br>';
echo $raw;
echo '<br>';
echo gmpBin2Base62($raw);
echo '<br>';
echo gmpBase62ToBin(gmpBin2Base62($raw));

// CHANGING THE BASE64 VALUE TO ENCODE TO RAW MAKES IT THE SAME AS BASE36 WUTG TGE INT SO THATS GOOD I GUESS*/