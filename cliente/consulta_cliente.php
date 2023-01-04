<?php

require_once('../seguranca.php');
require_once('../conexao/banco.php');

$sqlClientes = "select *, date_format(cli_data_nascimento,'%d/%m/%Y') as data_nascimento
                from tb_cliente";

$sqlClientes = mysqli_query($con, $sqlClientes) or die("Erro na sql!");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Clientes | Visão Geral</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../dist/css/alt/_tables.scss">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <link href="../dist/img/favicon.png" rel="icon">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <?php
    include('../pages/cabecalho.php')
    ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    <?php
    include('../pages/menu.php')
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Clientes / <small>Visão Geral</small></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <!--<li class="breadcrumb-item"><a href="#">Home</a></li> -->
                <!--<li class="breadcrumb-item active"> Clientes</li> -->
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Clientes Cadastrados</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                      <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Cliente</th>
                              <th>Nascimento</th>
                              <th>Gênero</th>
                              <th>Celular</th>
                              <th style="border-right:none;">Email</th>
                              <th style="border-left:none;" class="no-sort"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php while ($dadosClientes = mysqli_fetch_array($sqlClientes)) { ?>
                              <tr >
                                <td><?php echo $dadosClientes['cli_codigo']; ?></td>
                                <td><?php echo $dadosClientes['cli_nome']; ?></td>
                                <td><?php echo $dadosClientes['data_nascimento']; ?></td>

                                <td><?php if($dadosClientes['cli_sexo'] == 'F') echo "Feminino";
                                          else if($dadosClientes['cli_sexo'] == 'M') echo "Masculino";
                                          else if($dadosClientes['cli_sexo'] == 'N') echo "Não Binário";
                                          else if($dadosClientes['cli_sexo'] == 'O') echo "Outro";
                                          else if($dadosClientes['cli_sexo'] == 'I') echo "Não Informado"; ?></td>
                                <td><?php echo $dadosClientes['cli_celular']; ?></td>
                                <td style="border-right: none;"><?php echo $dadosClientes['cli_email']; ?></td>
                                <td>
                                  <div class="dropdown">
                                    <a class="nav-link" data-toggle="dropdown" href="#" style="color:#212529;" >
                                      <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                      <a href="form_atualizar_cliente.php?cli_codigo=<?php echo $dadosClientes['cli_codigo']; ?>" class="dropdown-item">
                                        <i class="fas fa-edit" style="padding-right: 15px;"></i> Editar
                                      </a>
                                      <div class="dropdown-divider"></div>
                                      <a href="delete_cliente.php?cli_codigo=<?php echo $dadosClientes['cli_codigo']; ?>" onclick="excluir_registro(event)" class="dropdown-item">
                                        <i class="fas fa-trash" style="padding-right: 15px;"></i> Apagar
                                      </a>
                                    </div>
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>

                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  include('../pages/rodape.php')
  ?>

  <!-- Control Sidebar -->
  <?php
  include('../pages/config.php')
  ?>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../plugins/jszip/jszip.min.js"></script>
  <script src="../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": true/*,
        "buttons": ["excel", "pdf", "print"]*/,
        "columnDefs": [{
          "orderable": false,
          "targets": 'no-sort'
        },]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script type="text/javascript">
    function excluir_registro() {
      if (!confirm('Deseja realmente excluir este registro?')) {
        if (window.event)
          window.event.returnValue = false;
        else
          e.preventDefault();
      }
    }
  </script>
</body>

</html>
