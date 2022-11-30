<?php
namespace clasesTipo;

abstract class Atipo
{
    protected $error;
    private $name;
    private $valor;

    public function __construct($valor = "", $name = "") {
        $this->valor = $valor;
        $this->name = $name;
    }
    public function validar($valor)
    { //devuelve true si el valor no es nulo ni está vacío + validaciones específicas de cada tipo.

        if ($valor != "" && $valor != null) {
            return $this->validarEspecifico($valor);
        } else {
            $this->error = "El campo $this->name no puede estar vacío<br>"; //No está devolviendo this name desde que lo puse private y solo en Atipo...
            return false;
        }
    }

    public function getValor() { return $this->valor; }
    public function getName() { return $this->name; }
    public function imprimirError()
    {
        if ($this->error != null) {
            echo "<div class='error'>$this->error</div>";
            return false; //Si hay errores devuelve un false!
        };
    }

    abstract public function pintar(); //A rellenar en la clase específica

    abstract public function validarEspecifico($valor); //A rellenar en la clase específica
}
?>