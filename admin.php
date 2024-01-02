<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #D87B25;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #D87B25;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #D87B25;
        }

        td input[type="submit"] {
            background-color: #D87B25;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        td input[type="checkbox"] {
            width: 20px;
            height: 20px;
        }

        /* Estilos para dispositivos móveis */
        @media screen and (max-width: 600px) {
            table {
                font-size: 12px; /* Reduzir o tamanho da fonte para telas menores */
            }

            td, th {
                padding: 6px;
            }

            td input[type="submit"] {
                padding: 4px 8px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
<?php
require_once 'conecta.php';
session_start(); 

if (!isset($_SESSION['moderator']) || $_SESSION['moderator'] != 1) {
    header('Location: painel.php');
    exit();
}
$usuarios = "SELECT id, email, nome, publisher, moderator FROM usuarios";
$con = $mysqli->query($usuarios) or die($mysqli->error);
?>

<h2>Usuarios</h2>
<form method="post">
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>E-mail</th>
                <th>Nome</th>
                <th>Publisher/moderator e salvar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($usuario = $con->fetch_array()) { ?>
                <tr>
                <td> <?php echo $usuario['id'] ?></td>
                <td> <?php echo $usuario['email'] ?></td>
                <td> <?php echo $usuario['nome'] ?></td>
                <td>
                    <form method="post" action="editar_user.php">
                        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                        <input type="checkbox" name="publisher" value="" <?php if($usuario['publisher']){echo "checked";}else{echo "";}?>>
                        <input type="checkbox" name="moderator" value="" <?php if($usuario['moderator']){echo "checked";}else{echo "";}?>>
                        <input type="submit" value="Salvar">
                    </form>
                </td>

                </tr>
           <?php } ?>
        </tbody>
    </table>
</form>

<?php
$news = "SELECT id, titulo, resumo, stat FROM news ORDER BY DATACADASTRO DESC";
$connews = $mysqli->query($news) or die($mysqli->error);
?>
<h2>Noticias</h2>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Titulo</th>
                <th>Resumo</th>
                <th>Status e salvar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($news = $connews->fetch_array()) { ?>
                <tr>
                <td> <?php echo $news['id'] ?></td>
                <td> <?php echo $news['titulo'] ?></td>
                <td> <?php echo $news['resumo'] ?></td>
                <td>
                    <form method="post" action="editar_not.php">
                        <input type="hidden" name="id" value="<?php echo $news['id']; ?>">
                        <input type="checkbox" name="ativa" value="" <?php if($news['stat']){echo "checked";}else{echo "";}?>>
                        <input type="submit" value="Salvar">
                    </form>
                </td>
                </tr>
           <?php } ?>
        </tbody>
    </table>


<?php
$class = "SELECT id, titulo, descrição, stat FROM classificados ORDER BY DATACADASTRO DESC";
$conclass = $mysqli->query($class) or die($mysqli->error);
?>
<h2>Vagas de emprego</h2>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Titulo</th>
                <th>Descrição da vaga</th>
                <th>Status e salvar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($class = $conclass->fetch_array()) { ?>
                <tr>
                <td> <?php echo $class['id'] ?></td>
                <td> <?php echo $class['titulo'] ?></td>
                <td> <?php echo $class['descrição'] ?></td>
                <td>
                    <form method="post" action="editar_class.php">
                        <input type="hidden" name="id" value="<?php echo $class['id']; ?>">
                        <input type="checkbox" name="ativa" value="" <?php if($class['stat']){echo "checked";}else{echo "";}?>>
                        <input type="submit" value="Salvar">
                    </form>
                </td>
                </tr>
           <?php } ?>
        </tbody>
    </table>

    <?php
$movie = "SELECT id, titulo, produtora, stat FROM filmes ORDER BY DATACADASTRO DESC";
$confilm = $mysqli->query($movie) or die($mysqli->error);
?>
<h2>Filmes</h2>
<table>
        <thead>
            <tr>
                <th>id</th>
                <th>Titulo</th>
                <th>Produtora</th>
                <th>Status e salvar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($movie = $confilm->fetch_array()) { ?>
                <tr>
                <td> <?php echo $movie['id'] ?></td>
                <td> <?php echo $movie['titulo'] ?></td>
                <td> <?php echo $movie['produtora'] ?></td>
                <td>
                    <form method="post" action="editar_filmes.php">
                        <input type="hidden" name="id" value="<?php echo $movie['id']; ?>">
                        <input type="checkbox" name="ativa" value="" <?php if($movie['stat']){echo "checked";}else{echo "";}?>>
                        <input type="submit" value="Salvar">
                    </form>
                </td>
                </tr>
           <?php } ?>
        </tbody>
    </table>


    <?php
$recla = "SELECT id, nome, email, assunto, reclamação FROM contato ORDER BY DATACADASTRO DESC";
$conre = $mysqli->query($recla) or die($mysqli->error);
?>
<h2>Tentativas de contato</h2>
<table>
        <thead>
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>assunto</th>
                <th>Reclamação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($recla = $conre->fetch_array()) { ?>
                <tr>
                <td> <?php echo $recla['id'] ?></td>
                <td> <?php echo $recla['nome'] ?></td>
                <td> <?php echo $recla['email'] ?></td>
                <td> <?php echo $recla['assunto'] ?></td>
                <td> <?php echo $recla['reclamação'] ?></td>
                </tr>
           <?php } ?>
        </tbody>
    </table>
    </body>
</html>