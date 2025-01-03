<?php
// Adapter Pattern
interface ArchivoInterface {
    public function abrir();
}

class ArchivoWindows7 implements ArchivoInterface {
    public function abrir() {
        return "Archivo abierto en Windows 7.";
    }
}

class ArchivoWindows10 {
    public function abrirArchivo() {
        return "Archivo abierto en Windows 10.";
    }
}

class AdapterWindows10 implements ArchivoInterface {
    private $archivoWindows10;

    public function __construct(ArchivoWindows10 $archivoWindows10) {
        $this->archivoWindows10 = $archivoWindows10;
    }

    public function abrir() {
        return $this->archivoWindows10->abrirArchivo();
    }
}


$archivo7 = new ArchivoWindows7();
echo $archivo7->abrir() . PHP_EOL;

$archivo10 = new AdapterWindows10(new ArchivoWindows10());
echo $archivo10->abrir() . PHP_EOL;
?>