<?php


namespace clasesPadre;

use clasesTipo\Texto;
use clasesTipo\Numero;
use clasesTipo\Seleccion;

class Serie
{

    private $valores = array();
    private $esValida = true;

    public function __construct($post)
    {
        //Si no tenemos post, inicializo cada valor como null para no tener problemas.
        //Si tenemos post, inicializo cada valor con el valor del post. (Ese Jorge ahi!)
        $nombre = isset($post['nombre']) ? $post['nombre'] : null;
        $genero = isset($post['generos']) ? $post['generos'] : null;
        $plataforma = isset($post['plataforma']) ? $post['plataforma'] : null;
        $emision = isset($post['emision']) ? 'Si':'No';
        $diaEstreno = isset($post['dia']) ? $post['dia'] : null;
        $valoracion = isset($post['valoracion']) ? $post['valoracion'] : null;
        $resena = isset($post['reseña']) ? $post['reseña'] : null;

        //Estructura del formulario.
        array_push($this->valores, new Texto       ($nombre,"nombre", Texto::LONG_NOMBRE));
        array_push($this->valores, new Seleccion   ($genero, "generos", false, ["Comedia","Terror","Historico","Romantico","Escolar","Misterio","Suspense","Fantasia"]));
        array_push($this->valores, new Seleccion   ($plataforma, "plataforma", true, ["Netflix","Amazon Prime","HBO","Disney+","Otros"]));
        // array_push($this->valores, new Seleccion   ($emision, "emision",true, ["En emisión", ""]));
        array_push($this->valores, new Seleccion   ($diaEstreno, "dia", true, ["L","M","X","J","V","S","D"]));
        array_push($this->valores, new Numero      ($valoracion, "valoracion"));
        array_push($this->valores, new Texto       ($resena, "reseña", Texto::LONG_DESCRIPCION));
    }

    public function validarGlobal()
    {
        if (isset($_POST['valoracion'])) { //valida sólo si se ha enviado mínimo un formulario. Si el post está empty, no valida nada.
            $val = true; //de serie la validación es true
            foreach ($this->valores as $valor) {
                if (!$valor->validar($valor->getValor())) {
                    $val = false; //si SOLAMENTE UN valor no ha sido validado, la validación devuelve false
                }
            }
            return $val;
        }
    }
    
    //pintar todo el formulario
    public function pintarGlobal()
    {
        echo "<form action='index.php' method='post'>";
        foreach ($this->valores as $valor) {
            echo "<div class='elemento'>";
            $valor->pintar();
            echo "</div>";
        }
        echo "<input type='submit' value='Enviar' class='btn btn-primary'></form>";
    }

    //guardado en BD
    public function guardar($post)
    {

        if (!isset($post['emision'])) {$post['emision'] = 'off';}else{$_POST['emision'] = 'on';};

        $file = 'bbdd.txt';

        // Open the file to get existing content
        $current = file_get_contents($file);

        // Append a new series to the file
        $current .= "<tr>";
        foreach ($post as $key => $value) {
                if ($key != 'generos') {
                    $current .= "<td>" . $value . "</td>\n";
                } else {
                    $current .= "<td>";
                    foreach ($post['generos'] as $genero) {
                        $current .= $genero . " ";
                    }
                    $current .= "</td>";
                }
        }

        $current .= "</tr>";
        // Write the contents back to the file
        file_put_contents($file, $current);

    }



}


?>