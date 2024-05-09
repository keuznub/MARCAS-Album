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
    $arrayCartas = array();
    $conexion = mysqli_connect("localhost","root","","albumdatabase");
    class Carta{
        private string $img, $titulo, $descripcion, $time;
        public function __construct(string $img, string $titulo, string $descripcion, string $time)
        {
            $this->img = $img;
            $this->titulo = $titulo;
            $this->descripcion = $descripcion;
            $this->time = $time;
        }
        public function getImg(){
            return $this->img;
        }
        public function getTitulo(){
            return $this->titulo;
        }
        public function getDescripcion(){
            return $this->descripcion;
        }
        public function getTime(){
            return $this->time;
        }
    }

    $result = mysqli_query($conexion, "SELECT * FROM albumtable");
    while($row = mysqli_fetch_row($result)){
        $cartaNueva = new Carta(base64_encode($row[0]),$row[1],$row[2],$row[3]);
        array_push($arrayCartas, $cartaNueva);
    }
    ?>

    <header data-bs-theme="dark">
        <div class="collapse text-bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4>Sobre</h4>
                        <p class="text-body-secondary">En este ejemplo he usado JavaScript, PHP, MySQL, HTML, CSS y Boostrap</p>
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
                    <h1 class="fw-light">Breixo Album Ejemplo</h1>
                    <p class="lead text-body-secondary">Primera experiencia con bases de datos y HTML</p>
                    <p>
                        <a href="#" class="btn btn-primary my-2">Subir foto</a>
                        <a href="#" class="btn btn-secondary my-2">Actualizar Descripciones</a>
                    </p>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-center">
                    <?php foreach($arrayCartas as $i): ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="image" src="data:image/png;base64,<?php echo $i->getImg(); ?>" alt="">
                            <div class="card-body">
                                <p class="card-text descripcion">
                                    <?php
                                    echo $i->getDescripcion();
                                    
                                    ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-sm btn-outline-secondary view">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary edit">Edit</button>
                                        <button type="button" style="display: none;" class="btn btn-sm btn-outline-secondary acept">Aceptar</button>
                                    </div>
                                    <small class="text-body-secondary updateTime">
                                    <?php
                                    echo $i->getTime();
                                    ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="modal-body">
                            <img src="" alt="" id="imagenCargar" width="100%">
                        </div>
                        <div class="modal-footer">
                            <span id="descripcion">Le has dado "Me gusta" a esta foto</span>
                        </div>
                    </div>
                </div>
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
    <script src="album.js"></script>
</body>

</html>