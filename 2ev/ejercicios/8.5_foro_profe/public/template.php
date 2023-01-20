
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background-color: #eaeaea;
            font-family: arial;
        }
        .container{
            width: 50%;
            background-color: white;
            margin: 0 auto;
            text-align: center;
        }
    </style>
    <title><?=$title?></title>
</head>
<body>
    <nav>p1 p2 etc...</nav>
    <main id="contenido" class="container">
        <h1><?=$pageHeader?></h1>
        <?=$content?>
    </main>
</body>
</html>