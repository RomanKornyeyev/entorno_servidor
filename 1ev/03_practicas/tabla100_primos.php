<?php
    $cont = 1;
    
    function esPrimo($numero){
        //Si del 2 al $numero sale un mod, no es primo
        for ($i = 2; $i < $numero; $i++) {
            if (($numero % $i) == 0) {
                
                // No es primo
                return false;
            }
        }
        // Es primo
        return true;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola mundo de php</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
            font-family: arial;
        }
        html{
            font-size: 62.5%;
        }
        body{
            font-size: 1.6rem;
            background-color: #eaeaea;
        }
		
		.container{
            margin: 0 auto;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        table{
            border-collapse: collapse;
        }
        thead{
            border: 1px solid black;
            text-align: center;
        }
        td{
            width: 7rem;
            height: 3rem;
            text-align: center;
            background-color: #fff;
            border: 1px solid black;
            font-size: 2rem;
        }
		@keyframes parpadeo{
			0%{
				background-color: #fff;
			}
			
			50%{
				background-color: #fd7333;
			}
			
			100%{
			    background-color: #fff;
			}
		}
    </style>
</head>
<body>
    <div class="container">
        <table>
            <thead>
                <td colspan="100%"><b>NÚMEROS PRIMOS</b></td>
            </thead>
            <tbody>
            <?php for($i=0;$i < 10; $i++) { ?>
                <tr>
                    <?php for($j=0;$j < 10; $j++) { ?>
                        <?php if (esPrimo($cont)){
                            echo "<td style='animation:parpadeo 2s infinite ease-out'><b>".$cont."</b></td>";
                        }
                        else echo "<td>".$cont."</td>";
                    $cont++; } ?>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>