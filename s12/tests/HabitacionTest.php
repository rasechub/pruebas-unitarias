<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Habitacion;

/**
 * @covers \App\Habitacion
 * @group habitacion
 */
class HabitacionTest extends TestCase
{
    /**
     * @testdox Numero cero
     */
    public function testLanzaExcepcionSiNumeroEsCero(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Habitacion(0, "Doble", 150.0);
    }

    /**
     * @testdox Numero negativo
     */
    public function testLanzaExcepcionSiNumeroEsNegativo(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Habitacion(-5, "Doble", 150.0);
    }

    /**
     * @testdox Precio cero
     */
    public function testLanzaExcepcionSiPrecioEsCero(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Habitacion(101, "Doble", 0.0);
    }

    /**
     * @testdox Precio negativo
     */
    public function testLanzaExcepcionSiPrecioEsNegativo(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Habitacion(101, "Doble", -50.0);
    }

    /**
     * @testdox Reservar habitacion disponible
     */
    public function testPermiteReservarSiEstaDisponible(): void
    {
        $habitacion = new Habitacion(101, "Doble", 150.0);
        $habitacion->reservar();
        $this->assertFalse($habitacion->isDisponible());
    }

    /**
     * @testdox Reservar habitacion no disponible
     */
    public function testLanzaExcepcionSiHabitacionNoDisponible(): void
    {
        $habitacion = new Habitacion(101, "Doble", 150.0);
        $habitacion->reservar();
        
        $this->expectException(\Exception::class);
        $habitacion->reservar();
    }
}