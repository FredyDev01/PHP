<?php 
    $connect = new PDO("mysql:host=localhost;port=3306;dbname=db_url", "root", "");
    $slug = '';

    if(isset($_POST['crear_slug'])){
        $slug = preg_replace("/[^a-z0-9]/i", "-", trim(strtolower($_POST['titulo'])));
        $query = "SELECT slug_url FROM slug WHERE slug_url LIKE '$slug%'";
        $statement = $connect->prepare($query);        
        if($statement->execute()){
            $totalRow = $statement->rowCount();
            if($totalRow > 0){
                $result = $statement->fetchAll();
                foreach($result as $row){
                    $data[] = $row['slug_url'];
                }
                if(in_array($slug, $data)){
                    $count = 0;
                    while(in_array(($slug . "-" . ++$count),  $data)){
                        $slug = $slug . "-" . $count;
                    }
                }
            }
        }
        $insertData = [
            ':slug_titulo' => $_POST['titulo'],
            ':slug_url' => $slug,
        ];
        $query = "INSERT INTO slug VALUES(NULL, :slug_titulo, :slug_url)";
        $statement = $connect->prepare($query);
        $statement->execute($insertData);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Como crear URL unica en PHP</title>
    <!--Estilos de Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">    
    <!--Funcionalidad de JS y Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<style>
    * {
        margin: 0px;
        box-sizing: border-box;
    }

    body {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .box {
        max-width: 600px;
        width: 100%;
        margin: 0 auto;
    }
</style>
<body class="bg-light">
    <div class="p-4 container box bg-white rounded shadow-sm">
        <br>
        <h3 align="center">Como crear URL unica en PHP</h3>
        <br>
        <br>
        <form method="POST" action="./">
            <div class="form-group">
                <label for="txtTitulo">Ingrese el titulo a crear slug</label>
                <input name="titulo" id="txtTitulo" class="form-control mt-2" type="text">
            </div>
            <div class="form-group mt-4">
                <button name="crear_slug" class="btn btn-primary w-100">Crear slug</button>
            </div>
            <br>
            <br>
        </form>
        <?php if(isset($_POST['crear_slug'])): ?>
            <h4>Titulo ingrezado: </h4>
            <div class="alert alert-primary" role="alert">
                <?= $_POST['titulo'] ?>
            </div>
            <h4>Slug generado: </h4>
            <div class="alert alert-success" role="alert">
                <?= $slug ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>