<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Album example · Bootstrap v5.3</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">




</head>

<body>
    <?php
    $conexion = mysqli_connect("localhost","root","","albumdatabase");
    if(isset($_POST["submitUpload"])){
        $tituloUpload = $_POST["tituloUpload"];
        $descripcionUpload = $_POST["descripcionUpload"];
        $imageUpload0 = file_get_contents($_FILES["imagenUpload"]["tmp_name"]);
        $imageUpload = $conexion->real_escape_string($imageUpload0);
        $actualDate = date("Y-m-d H:i:s");

        $statement = $conexion->prepare("INSERT INTO albumtable (imageBlob, tittle, description, last_update) VALUES (?, ?, ?, ?)");
        $statement->bind_param("ssss", $imageUpload0, $tituloUpload, $descripcionUpload, $actualDate);

        if($statement->execute()){
            echo "Salio bien";
            header("Location: index.php?upload=true");
            exit;
        }else{
            echo "Salio mal";
            
        }
    }
    ?>
    <header data-bs-theme="dark">
        <div class="collapse text-bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4>Sobre</h4>
                        <p class="text-body-secondary">En este ejemplo he usado JavaScript, PHP, MySQL, HTML, CSS y
                            Boostrap</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4>Contacto</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Follow on Twitter <img src="imagenes/twitter.png" alt=""
                                        width="25px"></a></li>
                            <li><a href="#" class="text-white">Like on Facebook<img src="imagenes/facebook.png" alt=""
                                        width="25px"></a></li>
                            <li><a href="#" class="text-white">Email me <img src="imagenes/instagram.png" alt=""
                                        width="25px"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2"
                        viewBox="0 0 24 24">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
                        <circle cx="12" cy="13" r="4" />
                    </svg>
                    <strong>Album</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>

    <main>

        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Subir Imagen</h1>
                    <p class="lead text-body-secondary">Rellena todos los campos y pulsa el boton</p>
                    <p>
                        <a href="index.php" class="btn btn-primary my-2">Volver al album</a>
                    </p>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post" onsubmit=" return validate()">
                    <div class="row">
                        <div class="col-sm-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="tituloUpload" class="form-control" id="titulo" placeholder="" required>
                                <label for="titulo">Titulo</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-floating">
                                <input type="text" name="descripcionUpload" class="form-control" id="descripcion" placeholder="" required>
                                <label for="descripcion">Descripcion</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-8">
                            <label for="imagen">Elije la imagen</label>
                            <input type="file" name="imagenUpload" id="imagen" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-8">
                            <input type="submit" name="submitUpload" class="btn btn-outline-success" value="Subir">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-8">
                            <div class="alert alert-danger" id="alerta"></div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </main>

    <footer class="text-body-secondary py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Volver arriba</a>
            </p>
            <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>

        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="upload.js"></script>
</body>

</html>