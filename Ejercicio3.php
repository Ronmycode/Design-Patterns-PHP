<?php

// Decorator Pattern
interface Personaje {
    public function equiparArma();
}

class Guerrero implements Personaje {
    public function equiparArma() {
        return "Guerrero equipado con espada básica.";
    }
}

class Mago implements Personaje {
    public function equiparArma() {
        return "Mago equipado con bastón básico.";
    }
}

abstract class ArmaDecorator implements Personaje {
    protected $personaje;

    public function __construct(Personaje $personaje) {
        $this->personaje = $personaje;
    }
}

class EspadaDeFuego extends ArmaDecorator {
    public function equiparArma() {
        return $this->personaje->equiparArma() . " + Espada de Fuego.";
    }
}

class BastonMagico extends ArmaDecorator {
    public function equiparArma() {
        return $this->personaje->equiparArma() . " + Bastón Mágico.";
    }
}


$guerrero = new Guerrero();
$guerreroConEspadaDeFuego = new EspadaDeFuego($guerrero);
echo $guerreroConEspadaDeFuego->equiparArma() . PHP_EOL;

$mago = new Mago();
$magoConBastonMagico = new BastonMagico($mago);
echo $magoConBastonMagico->equiparArma() . PHP_EOL;


?>