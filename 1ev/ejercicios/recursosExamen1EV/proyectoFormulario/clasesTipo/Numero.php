<?php
namespace clasesTipo;
class Numero extends Atipo {

    private const MIN_VALOR=0;
    private const MAX_VALOR=5;

    public function __construct($valor,$name) {
        parent::__construct($valor,$name);
    }

    function validarEspecifico ($valor) {
        if ($valor>=self::MIN_VALOR && $valor<=self::MAX_VALOR): 
            return true;
        else: 
            $this->error="Fuera del rango permitido, debe estar entre 0 y 5 (ambos incluidos).";
            return false;
        endif;
    }

    function pintar() {
        echo "<label for='". $this->getName() . "'>".$this->getName()."</label>";
        echo "<input type='range' name='".$this->getName()."' min='".self::MIN_VALOR."' max='".self::MAX_VALOR."' value='".$this->getName()."'>";
        $this->imprimirError();
    }
}
?>