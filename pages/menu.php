<?php

require_once('../conexao/consulta_agendamentos_pendentes.php');
require_once('../conexao/consulta_pagamentos_pendentes.php');

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4" style="bottom: -260px;">

  <!-- Brand Logo -->

  <a href="../agendamento/consulta_agendamento.php" class="brand-link" style="padding-left: 10%;">

    <img src="../dist/img/favicon.png" class="logo_link" alt="Cleusa & Elas" width="30px">
    <img src="../dist/img/logo.png" alt="Cleusa & Elas" width="140px" style="padding-bottom: 2%;" class="brand-text font-weight-light">

  </a>

  <!-- Sidebar -->

  <div class="sidebar">

    <!-- Sidebar Menu -->

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../dist/img/hairdresser.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $_SESSION['nome'] ?></a>
      </div>
    </div>

    <nav class="mt-2">

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Add icons to the links using the .nav-icon class

               with font-awesome or any other icon font library -->

        <li class="nav-header">MENU PRINCIPAL</li>

        <li class="nav-item <?php if (strpos($_SERVER['REQUEST_URI'], "agendamento")) echo "menu-is-opening menu-open"; ?>">

          <a href="../agendamento/consulta_agendamento.php" class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], "agendamento")) echo "active"; ?>">

            <i class="nav-icon far fa-calendar-alt" style="padding-right:8px;"></i>

            <p>

              Agendamentos

              <!--<span class="badge badge-info right" style="background-color: #dc3545;"><?php echo $total; ?></span>-->
              <span class="badge badge-info right" style="background-color: #d4173e ;"><?php echo $total2; ?></span>

            </p>

          </a>

        </li>

        <li class="nav-header">CADASTROS</li>

        <li class="nav-item <?php if (strpos($_SERVER['REQUEST_URI'], "cliente")) echo "menu-is-opening menu-open"; ?>">

          <a href="#" class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], "cliente")) echo "active"; ?>">

            <i class="nav-icon fas fa-users" style="padding-right:8px;"></i>

            <p>

              Clientes

              <i class="fas fa-angle-left right"></i>

            </p>

          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">

              <a href="../cliente/form_cliente.php" class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], "form_cliente")) echo "active"; ?>">

                <i class="far fa-circle nav-icon"></i>

                <p>Adicionar</p>

              </a>

            </li>

            <li class="nav-item">

              <a href="../cliente/consulta_cliente.php" class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], "consulta_cliente")) echo "active"; ?>">

                <i class="far fa-circle nav-icon"></i>

                <p>Visão Geral</p>

              </a>

            </li>

          </ul>

        </li>

        <li class="nav-item <?php if (strpos($_SERVER['REQUEST_URI'], "servico")) echo "menu-is-opening menu-open"; ?>">

          <a href="#" class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], "servico")) echo "active"; ?>">

            <i class="nav-icon fas fa-hand-holding-heart" style="padding-right:8px;"></i>

            <p>

              Serviços

              <i class="fas fa-angle-left right"></i>

            </p>

          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">

              <a href="../servicos/form_servicos.php" class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], "form_servico")) echo "active"; ?>">

                <i class="far fa-circle nav-icon"></i>

                <p>Adicionar</p>

              </a>

            </li>

            <li class="nav-item">

              <a href="../servicos/consulta_servicos.php" class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], "consulta_servico")) echo "active"; ?>">

                <i class="far fa-circle nav-icon"></i>

                <p>Visão Geral</p>

              </a>

            </li>

          </ul>

        </li>

        <li class="nav-header">RELATÓRIOS</li>

        <li class="nav-item">
          <a href="../relatorios/serv_prestados.php" class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], "relatorios/serv_prestados.php")) echo "active"; ?>">
            <i class="nav-icon fa fa-book"></i>
            <p>
              Serviços Prestados
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="../relatorios/cli_analitico.php" class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], "relatorios/cli_analitico.php")) echo "active"; ?>">
            <i class="nav-icon fas fa-user"></i>
            <p>
                Clientes Analítico
            </p>
          </a>
        </li>

        <li class="nav-header">BACKUP</li>

        <li class="nav-item">
          <a href="../backup/backup.php" class="nav-link">
            <i class="nav-icon fas fa-cloud"></i>
            <p>
              Sistema
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="../backup/backup_site.php" class="nav-link">
            <ion-icon name="globe-outline" class="nav-icon"></ion-icon>
            <p>
              Site
            </p>
          </a>
        </li>

        <li class="nav-header">DIVERSOS</li>

        <li class="nav-item">
          <a href="../logout.php" class="nav-link">
            <ion-icon name="log-out-outline" class="nav-icon" style="margin: 0px;"></ion-icon>
            <p>
              Sair
            </p>
          </a>
        </li>



    </nav>

    <!-- /.sidebar-menu -->

  </div>

  <!-- /.sidebar -->

</aside>
