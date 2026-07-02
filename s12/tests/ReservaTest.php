<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Reserva;
use App\Cliente;
use App\Habitacion;

/**
 * @covers \App\Reserva
 * @group reserva
 */
class ReservaTest extends TestCase
{
    private Cliente $cliente;
    private Habitacion $habitacion;

    protected function setUp(): void
    {
        $this->cliente = new Cliente("Juan Perez", "juan@test.com", "123456789");
        $this->habitacion = new Habitacion(101, "Doble", 100.0);
    }

    /**
     * @testdox Fecha ingreso invalida
     */
    public function testLanzaExcepcionSiFormatoIngresoInvalido(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Reserva($this->cliente, $this->habitacion, "25-06-2026", "2026-06-28");
    }

    /**
     * @testdox Fecha ingreso pasado
     */
    public function testLanzaExcepcionSiIngresoEsPasado(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Reserva($this->cliente, $this->habitacion, "2020-01-01", "2020-01-05");
    }

    /**
     * @testdox Fecha salida anterior
     */
    public function testLanzaExcepcionSiSalidaEsAnteriorAIngreso(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Reserva($this->cliente, $this->habitacion, "2026-12-10", "2026-12-05");
    }

    /**
     * @testdox Calcular total
     */
    public function testCalculaCorrectamenteTotalEstadia(): void
    {
        $reserva = new Reserva($this->cliente, $this->habitacion, "2026-12-10", "2026-12-13");
        $this->assertEquals(300.0, $reserva->calcularTotal());
    }
}