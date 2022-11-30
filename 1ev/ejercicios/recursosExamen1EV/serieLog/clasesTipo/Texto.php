<?php
namespace clasesTipo;

class Texto extends Atipo
{
    private $longitud;
    //constantes públicas para poder utilizarse fuera
    public const LONG_NOMBRE = 25;
    public const LONG_DESCRIPCION = 500;
    public const LIMITE_LONG_TEXTAREA = 80; //limite para input tipo texto, desde estos chars es textarea

    public function __construct($valor, $name, $longitud)
    {
        parent::__construct($valor,$name);
        $this->longitud = $longitud;
    }
    
    function validarEspecifico($cadena)
    {
        $pattern = "/^[a-zA-Z0-9\s\,\.\¿\?\¡\!\_\-]{1," . $this->longitud . "}$/";

        if (preg_match($pattern, $this->cleanData($cadena)))
            return true;
        else {
            $this->error = "No se admiten carácteres especiales y el tamaño máximo es de $this->longitud caracteres<br>";
            return false;
        }
    }

    function pintar()
    {
        if ($this->longitud >= self::LIMITE_LONG_TEXTAREA) { //si supera LIMITE_LONG_TEXTAREA (80 chars) pinta un textarea, si no, un input tipo texto
            echo "<label for='" . $this->getName() . "'>" . $this->getName() . "</label>";
            echo "<br>";
            echo "<textarea id='" . $this->getName() . "' name='" . $this->getName() . "' placeholder='Me pareció...' rows='10' cols='50'>" . $this->getValor() . "</textarea>";
        } else {
            echo "<label for='" . $this->getName() . "'>" . $this->getName() . "</label>";
            echo "<br>";
            echo "<input type='text' id='" . $this->getName() . "' name='" . $this->getName() . "' placeholder='Serie...' value='" . $this->getValor() . "'>";
        }
        echo "<br>";
        $this->imprimirError();
    }
 
    function cleanData($data) //limpieza de carácteres especiales HTML para evitar cross-site scripting
    {
        if (is_string($data)) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        } else {
            return $data;
        }
    }

}

?>