# PHP-binary-base-changer
Change raw binary bytes to and from an arbitrary base e.g. 36, 58, or 64. This package stands in place of PHP's native `base_convert()` function and in doing so provides support for arbitrarily large numbers.

## Requirements
This package requires the `GMP` PHP extension to be installed.

## Install
Via composer:

`composer require davidfricker/basechanger`

## Usage
```PHP
use DavidFricker\BaseChanger\GMP;

$bytes = openssl_random_pseudo_bytes(32);
$base = 64;

$base_converted = GMP::changeTo($bytes, $base);
$base_reversed = GMP::changeFrom($base_converted, $base);
```

## Licence
This code is released under MIT. Full licence can be found in the licence file.
