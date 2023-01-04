<?php

require_once('../seguranca.php');
require_once('../conexao/banco.php');

$sqlServicos = "select * from tb_tiposervico ts
                  inner join tb_profissional p on (ts.prf_codigo = p.prf_codigo)
                ";

$sqlServicos = mysqli_query($con, $sqlServicos) or die("Erro na sql!");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Serviços | Visão Geral</title>

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
              <h1>Serviços / <small>Visão Geral</small></h1>
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
                  <h3 class="card-title">Serviços Cadastrados</h3>

                  <!--<div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>-->
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                  <table class="table table-bordered table-striped dataTable dtr-inline">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Profissional</th>
                        <th style="border-right:none;">Especialidade</th>
                        <th style="border-left:none;"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($dadosServicos = mysqli_fetch_array($sqlServicos)) { ?>
                        <tr>
                          <td><?php echo $dadosServicos['tps_codigo']; ?></td>
                          <td><span><?php echo $dadosServicos['tps_descricao']; ?></span></td>
                          <td><?php echo $dadosServicos['prf_nome']; ?></td>
                          <td style="border-right: none;"><?php echo $dadosServicos['prf_especialidade']; ?></td>
                          <td>
                            <div class="dropdown">
                              <a class="nav-link" data-toggle="dropdown" href="#" style="color:#212529; padding-right:0px;">
                                <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                              </a>
                              <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                <a href="form_atualizar_servicos.php?tps_codigo=<?php echo $dadosServicos['tps_codigo']; ?>" class="dropdown-item">
                                  <i class="fas fa-edit" style="padding-right: 15px;"></i> Editar
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="delete_servicos.php?tps_codigo=<?php echo $dadosServicos['tps_codigo']; ?>" onclick="excluir_registro(event)" class="dropdown-item">
                                  <i class="fas fa-trash" style="padding-right: 15px;"></i> Apagar
                                </a>
                              </div>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
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
        "autoWidth": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "columnDefs": [{
          "orderable": false,
          "targets": [4]
        }, ],
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
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
