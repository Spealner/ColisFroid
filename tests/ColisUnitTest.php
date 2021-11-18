<?php

namespace App\Tests;

use App\Entity\Colis;
use App\Entity\Vehicules;
use PHPUnit\Framework\TestCase;

class ColisUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $colis = new Colis();
        $vehicule = new Vehicules();

        $colis->setNumber(1)
            ->setNombre(1)
            ->setLoadinglab('loadinglab')
            ->setDeliverylab('deliverylab')
            ->addVehicule($vehicule);

        $this->assertTrue($colis->getNumber() === 1);
        $this->assertTrue($colis->getNombre() === 1);
        $this->assertTrue($colis->getLoadinglab() === 'loadinglab');
        $this->assertTrue($colis->getDeliverylab() === 'deliverylab');
        $this->assertContains($vehicule, $colis->getVehicule());
    }

    public function testIsFalse()
    {
        $colis = new Colis();
        $vehicule = new Vehicules();

        $colis->setNumber(1234)
            ->setNombre(123)
            ->setLoadinglab('loadinglab')
            ->setDeliverylab('deliverylab')
            ->addVehicule($vehicule);

        $this->assertFalse($colis->getNumber() === 4321);
        $this->assertFalse($colis->getNombre() === 321);
        $this->assertFalse($colis->getLoadinglab() === 'false');
        $this->assertFalse($colis->getDeliverylab() === 'false');
        $this->assertNotContains(new Vehicules(), $colis->getVehicule());
    }

    public function testIsEmpty()
    {
        $colis = new Colis();

        $this->assertEmpty($colis->getNumber());
        $this->assertEmpty($colis->getNombre());
        $this->assertEmpty($colis->getLoadinglab());
        $this->assertEmpty($colis->getDeliverylab());
        $this->assertEmpty($colis->getVehicule());
    }
}
