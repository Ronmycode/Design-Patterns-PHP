<?PHP
//Strategy Pattern
interface SalidaInterface {
    public function mostrar($mensaje);
}

class ConsolaSalida implements SalidaInterface {
    public function mostrar($mensaje) {
        echo "Consola: $mensaje" . PHP_EOL;
    }
}

class JSONSalida implements SalidaInterface {
    public function mostrar($mensaje) {
        echo json_encode(["mensaje" => $mensaje]) . PHP_EOL;
    }
}

class TXTSalida implements SalidaInterface {
    public function mostrar($mensaje) {
        file_put_contents("mensaje.txt", $mensaje);
        echo "Mensaje guardado en mensaje.txt" . PHP_EOL;
    }
}

class SistemaMensajes {
    private $salida;

    public function __construct(SalidaInterface $salida) {
        $this->salida = $salida;
    }

    public function setSalida(SalidaInterface $salida) {
        $this->salida = $salida;
    }

    public function enviarMensaje($mensaje) {
        $this->salida->mostrar($mensaje);
    }
}

$sistema = new SistemaMensajes(new ConsolaSalida());
$sistema->enviarMensaje("Hola desde consola.");

$sistema->setSalida(new JSONSalida());
$sistema->enviarMensaje("Hola en formato JSON.");

$sistema->setSalida(new TXTSalida());
$sistema->enviarMensaje("Hola en archivo TXT.");

?>