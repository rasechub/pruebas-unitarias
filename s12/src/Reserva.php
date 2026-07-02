<?php
namespace App;

use DateTime;

class Reserva
{
    private Cliente $cliente;
    private Habitacion $habitacion;
    private string $fechaIngreso;
    private string $fechaSalida;

    public function __construct(Cliente $cliente, Habitacion $habitacion, string $fechaIngreso, string $fechaSalida)
    {
        $dIngreso = DateTime::createFromFormat('Y-m-d', $fechaIngreso);
        $dSalida = DateTime::createFromFormat('Y-m-d', $fechaSalida);

        if (!$dIngreso || $dIngreso->format('Y-m-d') !== $fechaIngreso) {
            throw new \InvalidArgumentException("El formato de fecha de ingreso debe ser YYYY-MM-DD");
        }

        $hoy = new DateTime('today');
        if ($dIngreso < $hoy) {
            throw new \InvalidArgumentException("La fecha de ingreso no puede ser en el pasado");
        }

        if ($dSalida <= $dIngreso) {
            throw new \InvalidArgumentException("La fecha de salida debe ser posterior a la de ingreso");
        }

        $this->cliente = $cliente;
        $this->habitacion = $habitacion;
        $this->fechaIngreso = $fechaIngreso;
        $this->fechaSalida = $fechaSalida;
    }

    public function calcularTotal(): float
    {
        $ingreso = new DateTime($this->fechaIngreso);
        $salida = new DateTime($this->fechaSalida);
        
        $dias = $ingreso->diff($salida)->days;
        
        return $dias * $this->habitacion->getPrecio();
    }
}