<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Calculadora;

class CalculadoraTest extends TestCase
{
    // PRUEBA DE SUMA
    public function testSumar()
    {
        // ARRANGE
        $calc = new Calculadora();
        // ACT
        $resultado = $calc->sumar(5, 3);
        // ASSERT
        $this->assertEquals(8, $resultado);
    }

    // PRUEBA DE RESTA
    public function testRestar()
    {
        // ARRANGE
        $calc = new Calculadora();
        // ACT
        $resultado = $calc->restar(10, 4);
        // ASSERT
        $this->assertEquals(6, $resultado);
    }

    // PRUEBA DE MULTIPLICACIÓN
    public function testMultiplicar()
    {
        // ARRANGE
        $calc = new Calculadora();
        // ACT
        $resultado = $calc->multiplicar(4, 5);
        // ASSERT
        $this->assertEquals(20, $resultado);
    }

    // PRUEBA DE DIVISIÓN
    public function testDividir()
    {
        // ARRANGE
        $calc = new Calculadora();
        // ACT
        $resultado = $calc->dividir(10, 2);
        // ASSERT
        $this->assertEquals(5, $resultado);
    }

    // PRUEBA DE EXCEPCIÓN (DIVISIÓN ENTRE CERO)
    public function testDividirEntreCero()
    {
        // ARRANGE
        $this->expectException(\Exception::class);
        $calc = new Calculadora();
        // ACT
        $calc->dividir(10, 0);
    }
    public function testEsPar() {
        $calc = new Calculadora();
        $this->assertTrue($calc->esPar(4));
        $this->assertFalse($calc->esPar(5));
        $this->assertTrue($calc->esPar(0));
    }

    public function testEsPositivo() {
        $calc = new Calculadora();
        $this->assertTrue($calc->esPositivo(10));
        $this->assertFalse($calc->esPositivo(-5));
        $this->assertFalse($calc->esPositivo(0));
    }

    public function testEsNegativo() {
        $calc = new Calculadora();
        $this->assertTrue($calc->esNegativo(-10));
        $this->assertFalse($calc->esNegativo(5));
        $this->assertFalse($calc->esNegativo(0));
    }

    public function testEsCero() {
        $calc = new Calculadora();
        $this->assertTrue($calc->esCero(0));
        $this->assertFalse($calc->esCero(5));
        $this->assertFalse($calc->esCero(-5));
    }
}