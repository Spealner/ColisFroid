<?php

namespace App\Tests;

use App\Entity\Vehicules;
use PHPUnit\Framework\TestCase;

class VehiculesUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new Vehicules();

        $user->setNom('vehicule');

        $this->assertTrue($user->getNom() === 'vehicule');
    }

    public function testIsFalse()
    {
        $user = new Vehicules();

        $user->setNom('vehicule');

        $this->assertFalse($user->getNom() === 'false');
    }

    public function testIsEmpty()
    {
        $user = new Vehicules();

        $this->assertEmpty($user->getNom());
    }
}
