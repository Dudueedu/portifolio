<?php
require_once 'conecta.php';
session_start(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewsPira</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link rel="shortcut icon" type="imagex/png" href="./Assets/logo_piranews.png">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="./contato.php">Contato</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body small" href="./login.php">Login</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row align-items-center bg-white py-3 px-lg-5">
            <div class="logo">
                <a href="index.php" class="navbar-brand p-0 d-none d-lg-block">
                    <img src="./Assets/logo_piranews2.png" alt="NewsPira">
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand d-block d-lg-none">
                <img src="./Assets/logo_piranews3.png" alt="NewsPira">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="noticias.php" class="nav-item nav-link">Noticias</a>
                    <a href="Classificados.php" class="nav-item nav-link">Classificados</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Main News Slider Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 px-0">
                <div class="owl-carousel main-carousel position-relative">
                    <?php
                        require_once 'conecta.php'; 
                        $consulta = "SELECT titulo, imagem, DATACADASTRO  FROM news WHERE stat = 1  ORDER BY DATACADASTRO DESC LIMIT 4";
                        $con = $mysqli->query($consulta) or die ($mysqli->error);
                        while($dado = $con->fetch_array()){ 
                            echo '<div class="position-relative overflow-hidden" style="height: 500px;">';
                            echo '<img class="img-fluid h-100" src="'.$dado['imagem'].'" style="object-fit: cover;">';
                            echo '<div class="overlay">';
                            echo '<div class="mb-2">';
                            echo '<a class="badge badge-danger text-uppercase font-weight-semi-bold p-2 mr-2" href="./noticias.php">Noticias</a>';
                            echo '<a class="text-white" href="">'.$dado['DATACADASTRO'].'</a>';
                            echo '</div>';
                            echo '<a class="h2 m-0 text-white text-uppercase font-weight-bold" href="./noticias.php">'.$dado['titulo'].'</a>';
                            echo '</div>';
                            echo '</div>';
                    } ?>
                </div>
                </div>
            <div class="col-lg-5 px-0">
                <div class="row mx-0">
                    <?php
                        require_once 'conecta.php'; 
                        $consulta = "SELECT titulo, imagem, DATACADASTRO  FROM classificados WHERE stat = 1  ORDER BY DATACADASTRO DESC LIMIT 4";
                        $con = $mysqli->query($consulta) or die ($mysqli->error);
                        while($dado = $con->fetch_array()){ 
                            echo '<div class="col-md-6 px-0" width:700; height:435;>';
                            echo '<div class="position-relative overflow-hidden" style="height: 250px;">';
                            echo '<img class="img-fluid w-100 h-100" src="'.$dado["imagem"].'" style="object-fit: cover;">';
                            echo '<div class="overlay">';
                            echo '<div class="mb-2">';
                            echo '<a class="badge badge-danger text-uppercase font-weight-semi-bold p-2 mr-2" href="">Classificados</a>';
                            echo '<a class="text-white" href=""><small>'.$dado["DATACADASTRO"].'</small></a>';
                            echo '</div>';
                            echo '<a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="./classificados.php">'.$dado["titulo"].'</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->

    <!-- Breaking News Start -->
    <div class="container-fluid bg-dark py-3 mb-3">
        <div class="container">
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                    <div class="bg-dangerbadge-danger text-dark text-center font-weight-medium py-2" style="width: 170px;"><h5 class=' text-uppercase text-danger'>Breaking News<h5></div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                            style="width: calc(100% - 170px); padding-right: 90px;">
                            <?php
                                require_once 'conecta.php'; 
                                $consulta = "SELECT titulo, resumo, imagem FROM news WHERE stat = 1  ORDER BY DATACADASTRO DESC LIMIT 4";
                                $con = $mysqli->query($consulta) or die ($mysqli->error);
                                while($dado = $con->fetch_array()){
                                    echo "<div class='text-truncate'> <a class='text-white text-uppercase font-weight-semi-bold' href='./noticias.php'>" . $dado['titulo'] . "</a></div>";
                            } ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->


    <!-- Featured News Slider Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Filmes em Cartaz</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                <?php
                    require_once 'conecta.php'; 
                    $consulta = "SELECT titulo, DATACADASTRO, imagem, link, produtora FROM filmes WHERE stat = 1  ORDER BY DATACADASTRO DESC LIMIT 10";
                    $con = $mysqli->query($consulta) or die ($mysqli->error);
                    while($dado = $con->fetch_array()){
                            echo "<div class='position-relative overflow-hidden' style='height: 300px;'>";
                            echo "<img class='img-fluid h-100' src='".$dado['imagem']."' style='object-fit: cover;''>";
                            echo '<div class="overlay">';
                            echo '<div class="mb-2">';
                            echo '<a class="badge badge-danger text-uppercase font-weight-semi-bold p-2 mr-2" href="'.$dado['link'].'">Filmes</a>';
                            echo '<a class="text-white" href="'.$dado['link'].'"><small>'.$dado["DATACADASTRO"].'</small></a>';
                            echo '</div>';
                            echo '<a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="'.$dado['link'].'">'. $dado['titulo'] .'</a>';
                            echo "</div>";
                            echo "</div>";
                } ?>
            </div>
        </div>
    </div>
    <!-- Featured News Slider End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Entre em contato</h5>
                <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>Piracicaba</p>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>019 99999-9999</p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>contato@newspira.com</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Nos siga</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Ultimas noticias</h5>
                <?php
                        require_once 'conecta.php'; 
                        $consulta = "SELECT titulo, DATACADASTRO FROM news WHERE stat = 1  ORDER BY DATACADASTRO DESC LIMIT 3";
                        $con = $mysqli->query($consulta) or die ($mysqli->error);
                        while($dado = $con->fetch_array()){ 
                            echo '<div class="mb-3">';
                            echo '<div class="mb-2">';
                            echo '<a class="badge badge-danger text-uppercase font-weight-semi-bold p-2 mr-2" href="./noticias.php">Noticias</a>';
                            echo '<a class="text-white" href="">'.$dado['DATACADASTRO'].'</a>';
                            echo '</div>';
                            echo '<a class="small text-body text-uppercase font-weight-medium" href="./noticias.php">'.$dado['titulo'].'</a>';
                            echo '</div>';
                    } ?>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categorias</h5>
                <div class="m-n1">
                    <a href="./index.php" class="btn btn-sm btn-secondary m-1">Home</a>
                    <a href="./noticias.php" class="btn btn-sm btn-secondary m-1">Noticias</a>
                    <a href="./classificados.php" class="btn btn-sm btn-secondary m-1">Classificados</a>
                    <a href="./index.php" class="btn btn-sm btn-secondary m-1">Filmes</a>
                    <a href="./login.php" class="btn btn-sm btn-secondary m-1">Login</a>
                    <a href="./registrar.php" class="btn btn-sm btn-secondary m-1">Registrar</a>
                    <a href="./contato.php" class="btn btn-sm btn-secondary m-1">Contato</a>
                    <a href="./painel.php" class="btn btn-sm btn-secondary m-1">Painel</a>
                    <a href="./admin.php" class="btn btn-sm btn-secondary m-1">Admin</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Sobre nós</h5>
                <p>O objetivo principal do site "PiraNews" é fornecer aos seus leitores informações atualizadas, confiáveis e relevantes sobre os acontecimentos locais, buscamos ser a principal fonte de notícias para a comunidade, abrangendo uma variedade de tópicos, incluindo política, economia, cultura, esportes, ciência e tecnologia, entre outros.</p>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center">&copy; <a href="#index.php">NewsPira</a>. All Rights Reserved. 
		
		<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
		<!-- Design by <a href="https://htmlcodex.com">HTML Codex</a><br>
        Distributed by <a href="https://themewagon.com">ThemeWagon</a> -->
    </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-dangerbadge-danger btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>