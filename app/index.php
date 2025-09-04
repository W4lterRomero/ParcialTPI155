<?php
    $personajes = [
       [ "nombre" =>"lord", "descripcion" => "el villain", "categoria" => "villano", "imagen" => "img/img1.jpg"],
       [ "nombre" =>"el nena", "descripcion" => "cautiva con la voz", "categoria" => "amigo", "imagen" => "img/img2.jpg"],
       [ "nombre" =>"shrek", "descripcion" => "el prota", "categoria" => "amigo", "imagen" => "img/img3.jpg"],
       [ "nombre" =>"burro", "descripcion" => "el real prota", "categoria" => "amigo", "imagen" => "img/img4.jpg"],
       [ "nombre" =>"gengibre", "descripcion" => "el real real prota", "categoria" => "amigo", "imagen" => "img/img5.jpg"],


    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="">
</head>

<header>
    <a href="conversor.php">COnversor</a>
    <a href="tercerejercicio.php">Tercer ejercicio</a>
</header>
<body>
    <form method="get"> 
        <input type="text" name="categoria" placeholder="Ingrese categoría">
        <input type="submit" value="Filtrar">
    </form>
    <?php
    $categoria = isset($_GET["categoria"]) ? trim($_GET["categoria"]) : '';
    for ($i=0; $i < count($personajes); $i++) {
        if ($categoria === '' || strtolower($personajes[$i]["categoria"]) === strtolower($categoria)) {
            echo "
        <div class='personajesFiltrados' style='display:flex; flex-direction: row; gap: 3rem; padding: 1rem;'>
            <div class='PersonajesFiltrados_nombre'>
                <p>{$personajes[$i]['nombre']} <br></p>
            </div> <br>
            <div class='personajesFiltrados_imagen'>
                <img src='{$personajes[$i]['imagen']}' alt='{$personajes[$i]['nombre']}' style='width:100px;'>
            </div>
            <div class='personajesFiltrados_descripcion'>
                <p>{$personajes[$i]['descripcion']} <br></p>
            </div><br>
            <div class='personajesFiltrados_categoria'>
                <p>{$personajes[$i]['categoria']} <br></p>
            </div><br>
        </div>
        ";
        }
    }
    ?>
</body>
</html>