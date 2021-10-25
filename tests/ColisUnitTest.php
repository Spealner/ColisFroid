<?php

namespace App\Tests;

use App\Entity\Colis;
use PHPUnit\Framework\TestCase;

class ColisUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new Colis();

        $user->setNumber(1)
            ->setNombre(1)
            ->setLoadinglab('loadinglab')
            ->setDeliverylab('deliverylab');

        $this->assertTrue($user->getNumber() === 1);
        $this->assertTrue($user->getNombre() === 1);
        $this->assertTrue($user->getLoadinglab() === 'loadinglab');
        $this->assertTrue($user->getDeliverylab() === 'deliverylab');
    }

    public function testIsFalse()
    {
        $user = new Colis();

        $user->setNumber(1234)
            ->setNombre(123)
            ->setLoadinglab('loadinglab')
            ->setDeliverylab('deliverylab');

        $this->assertFalse($user->getNumber() === 4321);
        $this->assertFalse($user->getNombre() === 321);
        $this->assertFalse($user->getLoadinglab() === 'false');
        $this->assertFalse($user->getDeliverylab() === 'false');
    }

    public function testIsEmpty()
    {
        $user = new Colis();

        $this->assertEmpty($user->getNumber());
        $this->assertEmpty($user->getNombre());
        $this->assertEmpty($user->getLoadinglab());
        $this->assertEmpty($user->getDeliverylab());
    }
}
