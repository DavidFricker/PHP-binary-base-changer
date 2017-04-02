<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use DavidFricker\BaseChanger\GMP;

/**
 * @covers BaseChanger\GMP
 */
final class GMPTest extends TestCase
{
    /*
    public function testInsertIncorrectTableName()
    {
        $this->expectException(InvalidArgumentException::class);
    }
    */

    public function testCorrectValBase10()
    {
        $raw = openssl_random_pseudo_bytes(32);
        
        $base = 10;

        $base58Val = BinaryBaseChanger::changeTo($raw, $base);
        $rawConverted =  BinaryBaseChanger::changeFrom($base58Val, $base);

        $this->assertEquals(
            $raw,
            $rawConverted
        );
    }

    public function testCorrectValBase58()
    {
        $raw = openssl_random_pseudo_bytes(32);
        
        $base = 58;

        $base58Val = BinaryBaseChanger::changeTo($raw, $base);
        $rawConverted =  BinaryBaseChanger::changeFrom($base58Val, $base);

        $this->assertEquals(
            $raw,
            $rawConverted
        );
    }

    public function testCorrectValBase62()
    {
        $raw = openssl_random_pseudo_bytes(32);
        
        $base = 62;

        $base58Val = BinaryBaseChanger::changeTo($raw, $base);
        $rawConverted =  BinaryBaseChanger::changeFrom($base58Val, $base);

        $this->assertEquals(
            $raw,
            $rawConverted
        );
    }
}
