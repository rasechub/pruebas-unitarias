<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Cliente;

/**
 * @covers \App\Cliente
 * @group cliente
 */
class ClienteTest extends TestCase
{
    /**
     * @testdox Nombre vacio
     */
    public function testLanzaExcepcionSiNombreEstaVacio(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Cliente("", "correo@test.com", "123456789");
    }

    /**
     * @testdox Email invalido
     */
    public function testLanzaExcepcionSiEmailEsInvalido(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Cliente("Juan", "correo-invalido", "123456789");
    }
}