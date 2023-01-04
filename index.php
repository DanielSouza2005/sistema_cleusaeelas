<?php

include_once('conexao/bancoPDO.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cleusa & Elas | Acesso</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <link href="dist/img/favicon.png" rel="icon">

  <style type="text/css">
    body {
      background-image: url(dist/img/login_page2.jpg);
      width: 100%;
      height: auto;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100%;
    }

    @media only screen and (max-width: 1200px) {
      body {
        background-image: url(dist/img/login_page_responsive2.jpg);
        height: 100vh;
        background-size: 100%;
      }

    }

    @media only screen and (max-width: 900px) {
      body {
        background-image: url(dist/img/login_page_responsive3.jpg);
        height: 100vh;
        background-size: 100%;
      }

    }
  </style>

</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#" style="color:white; font-size:35px;"><b>Cleusa & Elas</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg" style="font-size:18px;">Informe seus dados para entrar</p>

        <?php /*
          $login = filter_input_array(INPUT_POST, FILTER_DEFAULT);

          if (!empty($login['sendLogin'])) {
            var_dump($login);
            $query_usuario = "SELECT *
                                FROM tb_usuario
                                WHERE usu_login =:usuario
                                AND usu_senha =:senha";
            $result_usuario = $conn->prepare($query_usuario);
            $result_usuario->bindParam(':usuario', $login['txt_nome'], PDO::PARAM_STR);
            $result_usuario->bindParam(':senha', $login['txt_senha'], PDO::PARAM_STR);
            $result_usuario->execute();

            if (($result_usuario) and ($result_usuario->rowCount()) != 0) {
              $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
              var_dump($login);
              $_SESSION['id'] = $row_usuario['usu_codigo'];
              $_SESSION['nome'] = $row_usuario['usu_login'];
              header("Location: backup/backup_automatico_sistema.php");
            }
            else {
              $_SESSION['msg'] = " <div class='alert alert-danger' role='alert'> Nome ou senha inválidos!</div>";
            }
          }

          if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          } */

        ?>

        <form method="post" action="validacao.php">
          <div class="input-group mb-3">
            <input type="text" name="txt_nome" class="form-control" placeholder="Nome">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="txt_senha" class="form-control" placeholder="Senha">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Lembrar de mim
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4" style="padding-bottom: 2vh; ">
              <button type="submit" name="sendLogin" class="btn btn-primary btn-block">Entrar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <p class="mb-1" style="display:flex; justify-content:center;">
          <a href="" style="font-size:18px;">Esqueci minha senha</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>
