<?php
// Factory Pattern
class Esqueleto {
    public function atacar() {
        return "El Esqueleto lanza un ataque rápido.";
    }

    public function velocidad() {
        return "Velocidad del Esqueleto: Rápida.";
    }
}

class Zombi {
    public function atacar() {
        return "El Zombi lanza un ataque lento pero fuerte.";
    }

    public function velocidad() {
        return "Velocidad del Zombi: Lenta.";
    }
}

class PersonajeFactory {
    public static function crearPersonaje($nivel) {
        if ($nivel === "facil") {
            return new Esqueleto();
        } elseif ($nivel === "dificil") {
            return new Zombi();
        }
        throw new Exception("Nivel no soportado.");
    }
}


$personaje = PersonajeFactory::crearPersonaje("facil");
echo $personaje->atacar() . PHP_EOL;
echo $personaje->velocidad() . PHP_EOL;


?>