<?php
    try {
        $nombre = 'mysql:host=localhost;dbname=mibasedatos';
        $usuario = 'nataly';
        $psswd='1234';
        $mbd = new PDO($nombre,$usuario,$psswd);

        //SELECTS
        selectAll($mbd);
        selectWhere($mbd);
        existe($mbd);
        //insert($mbd);
        //update($mbd);
        //delete($mbd);


        $baseDatos = null;
        $mbd = null;

    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "\n";
        die();
    }

    function selectAll($mbd){
        $baseDatos = $mbd->prepare('SELECT * FROM Ciclistas');
        $baseDatos->setFetchMode(PDO::FETCH_ASSOC); 
        $baseDatos->execute();
        ?>
        <table>
            <tr><b>ALL</b></tr>
        <?php
        foreach ($baseDatos as $valor) {?>
            <tr>
                <td><?=$valor['id'] ?></td>
                <td><?=$valor['nombre'] ?></td>
                <td><?=$valor['num_trofeos'] ?></td>
            </tr>
        <?php    
        }
        ?>
        </table>
        <br>
        <?php
    }

    function selectWhere($mbd){
        $id=2;
        $baseDatos = $mbd->prepare("SELECT * FROM Ciclistas WHERE id = $id");

        /*CON LIKE: a% que tenga a pero no tenga nada mas*/  

        $baseDatos->setFetchMode(PDO::FETCH_ASSOC); 
        $baseDatos->execute();

        ?>
        <table>
            <tr><b>SELECT WHERE</b> </tr>
        <?php
        foreach ($baseDatos as $valor) {?>
            <tr>
                <td><?=$valor['id'] ?></td>
                <td><?=$valor['nombre'] ?></td>
                <td><?=$valor['num_trofeos'] ?></td>
            </tr>
        <?php    
        }
        ?>
        </table>
        <br>
        <?php
    }

    function insert($mbd){
        $insert = $mbd->prepare("INSERT INTO Ciclistas (id, nombre, num_trofeos) VALUES (:id, :nombre, :num_trofeos)");
        $id = 8;
        $nombre = 'Sofia';
        $num_trofeos = '4';
        //metodo de pasarlo con un array
        if($insert->execute(array(':id'=>$id, ':nombre'=>$nombre, ':num_trofeos'=>$num_trofeos))) {
            echo "Se ha creado el nuevo registro!";
        }

        //value hace que se guarde el primer nombre que le hayas puesto, no se sobrescribe
        // $insert->bindValue(':id', $id);
        // $insert->bindValue(':nombre', $nombre);
        // $insert->bindValue(':num_trofeos', $num_trofeos);
    }

    function update($mbd){
        //UPDATE on WHERE 2
        $update = $mbd->prepare("UPDATE Ciclistas SET nombre = :nombre WHERE id = :id");

        $id=8;
        $nombre='Santiago';

        if ($update->execute(array(':nombre' => $nombre, ':id' => $id))) {
            echo 'se ha actualizado la tabla';
        }

    //UPDATE
        // $update = $db->prepare("UPDATE `table` SET `col` = 1");
        // $update->execute();
    }

    function delete($mbd){
        //DELETE
        $delete = $mbd->prepare("DELETE FROM Ciclistas WHERE id = :id");
        $id=7;
        if ($delete->execute(array(':id' => $id))) {
            echo 'borrado';
        }
    }

    function existe($mbd){
        //Check if row exists
        $select = $mbd->prepare("SELECT * FROM Ciclistas WHERE num_trofeos = :num_trofeos");
        $num_trofeos=8;
        $select->execute(array(':num_trofeos' => $num_trofeos));
        $result = $select->fetchColumn();
        if ($result > 0) {
            echo "Row has been found";
        } else {
            echo "No row in DB";
        }
    }
?>