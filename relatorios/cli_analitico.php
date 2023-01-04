<?php

require_once('../seguranca.php');
require_once('../conexao/banco.php');

$sqlClientes = "select *, date_format(cli_data_nascimento,'%d/%m/%Y') as data_nascimento,
                          date_format(cli_data_inclusao,'%d/%m/%Y') as data_inclusao
                        from tb_cliente c";

$sqlClientes = mysqli_query($con, $sqlClientes) or die("Erro na sqlClientes!");

$sqlMasculino = " select count(cli_sexo) as masculino
                  from tb_cliente
                  where cli_sexo = 'M'";

$sqlMasculino = mysqli_query($con, $sqlMasculino) or die("Erro na sqlMasculino!");
$dadosMasculino = mysqli_fetch_array($sqlMasculino);

$sqlFeminino = " select count(cli_sexo) as feminino
                  from tb_cliente
                  where cli_sexo = 'F'";

$sqlFeminino = mysqli_query($con, $sqlFeminino) or die("Erro na sqlFeminino!");
$dadosFeminino = mysqli_fetch_array($sqlFeminino);

$sqlNaoBinario = " select count(cli_sexo) as NaoBinario
                  from tb_cliente
                  where cli_sexo LIKE 'N'";

$sqlNaoBinario = mysqli_query($con, $sqlNaoBinario) or die("Erro na sqlNaoBinario!");
$dadosNaoBinario = mysqli_fetch_array($sqlNaoBinario);

$sqlOutro = " select count(cli_sexo) as Outro
                  from tb_cliente
                  where cli_sexo LIKE 'O'";

$sqlOutro = mysqli_query($con, $sqlOutro) or die("Erro na sqlOutro!");
$dadosOutro = mysqli_fetch_array($sqlOutro);

$sqlNaoInformado = " select count(cli_sexo) as NaoInformado
                  from tb_cliente
                  where cli_sexo LIKE 'I'";

$sqlNaoInformado = mysqli_query($con, $sqlNaoInformado) or die("Erro na sqlNaoInformado!");
$dadosNaoInformado = mysqli_fetch_array($sqlNaoInformado);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Relatório | Clientes</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../dist/css/alt/_tables.scss">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">


  <link href="../dist/img/favicon.png" rel="icon">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <?php
    include('../pages/cabecalho.php')
    ?>

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
              <h1>Relatório / <small>Clientes</small></h1>
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
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Filtros</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="serv_prestados.php" name="frm_serv_prest" id="frm_serv_prest">
                  <div class="card-body p-0">
                    <div class="bs-stepper">
                      <div class="bs-stepper-content">
                        <div class="row">
                          <div class="card-body" style="padding-bottom: 0vh;">
                            <div class="form-group">
                              <label for="exampleInputPassword1">Cliente</label>
                              <input type="text" name="txt_cliente" maxlength="80" class="form-control" onchange="pesquisaCliAnali(); pesquisaGenero(); pesquisaClientes();" id="txt_cliente" placeholder="Digite o Nome">
                            </div>
                          </div>
                          <div class="card-body " style="padding-bottom: 0vh;">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Gênero</label>
                              <select class="form-control" style="padding-top: 0vh;" name="txt_sexo" onchange="pesquisaCliAnali(); pesquisaGenero(); pesquisaClientes();" id="txt_sexo">

                                <option value="">Selecione o Gênero...</option>
                                <option value="F">Feminino</option>
                                <option value="M">Masculino</option>
                                <option value="N">Não Binário</option>
                                <option value="O">Outro</option>
                                <option value="I">Prefiro não Informar</option>

                              </select>
                            </div>
                          </div>

                        </div>
                        <div class="row">
                          <div class="card-body" style="padding-bottom: 0vh;">
                            <div class="form-group">
                              <label for="exampleInputPassword1">Data Nasc. Inicial</label>
                              <input type="date" name="txt_data_nasc_inicial" class="form-control" id="txt_data_nasc_inicial" onchange="pesquisaCliAnali();  pesquisaGenero(); pesquisaClientes();">
                            </div>
                          </div>
                          <div class="card-body" style="padding-bottom: 0vh;">
                            <div class="form-group">
                              <label for="exampleInputPassword1">Data Nasc. Final</label>
                              <input type="date" name="txt_data_nasc_final" class="form-control" id="txt_data_nasc_final" onchange="pesquisaCliAnali();  pesquisaGenero(); pesquisaClientes();">
                            </div>
                          </div>
                          <div class="card-body" style="padding-bottom: 0vh;">
                            <div class="form-group">
                              <label for="exampleInputPassword1">Data Inclu. Inicial</label>
                              <input type="date" name="txt_data_inclu_inicial" class="form-control" id="txt_data_inclu_inicial" onchange="pesquisaCliAnali();  pesquisaGenero(); pesquisaClientes();">
                            </div>
                          </div>
                          <div class="card-body" style="padding-bottom: 0vh;">
                            <div class="form-group">
                              <label for="exampleInputPassword1">Data Inclu. Final</label>
                              <input type="date" name="txt_data_inclu_final" class="form-control" id="txt_data_inclu_final" onchange="pesquisaCliAnali();  pesquisaGenero(); pesquisaClientes();">
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- /.card-body
                  <div class="card-footer" style="background-color: white; padding-top:0vh;">
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                  </div>-->
                </form>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title" style="padding-top: 1%; font-size: 18px;">Clientes / Analítico</h3>
                  <div class="card-tools">
                    <button class="btn btn-primary" id="btn_gerar_relatorio">Gerar Gráficos</button>
                  </div>
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
                            <th>Idade</th>
                            <th>Gênero</th>
                            <th>Inclusão</th>
                            <th>Celular</th>
                            <th>Email</th>
                          </tr>
                        </thead>
                        <tbody class="resultado_pesquisa">
                          <?php while ($dadosClientes = mysqli_fetch_array($sqlClientes)) { ?>
                            <tr>
                              <td><?php echo $dadosClientes['cli_codigo']; ?></td>
                              <td><?php echo $dadosClientes['cli_nome']; ?></td>
                              <td><?php echo $dadosClientes['data_nascimento']; ?></td>
                              <td><?php
                                  $dateOfBirth = $dadosClientes['cli_data_nascimento'];
                                  $today = date("Y-m-d");
                                  $diff = date_diff(date_create($dateOfBirth), date_create($today));
                                  echo $diff->format('%y'); ?>
                              </td>
                              <td><?php if ($dadosClientes['cli_sexo'] == 'F') echo "Feminino";
                                  else if ($dadosClientes['cli_sexo'] == 'M') echo "Masculino";
                                  else if ($dadosClientes['cli_sexo'] == 'N') echo "Não Binário";
                                  else if ($dadosClientes['cli_sexo'] == 'O') echo "Outro";
                                  else if ($dadosClientes['cli_sexo'] == 'I') echo "Não Informado"; ?></td>
                              <td><?php echo $dadosClientes['data_inclusao']; ?></td>
                              <td><?php echo $dadosClientes['cli_celular']; ?></td>
                              <td><?php echo $dadosClientes['cli_email']; ?></td>
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


  <?php
  include('modal_rel_clientes.php')
  ?>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <script src="../plugins/jquery/jquery.min.js"></script>
  <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../plugins/summernote/summernote-bs4.min.js"></script>
  <script src="../plugins/moment/moment.min.js"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>

  <script src="../plugins/sparklines/sparkline.js"></script>
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
  <script src="../plugins/chart.js/Chart.min.js"></script>
  <script src="../dist/js/pages/dashboard.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "searching": false,
        "lengthChange": false,
        "autoWidth": true,
        "buttons": ["excel", "pdf", "print"],
        "columnDefs": [{
          "orderable": false,
          "targets": 'no-sort'
        }, ]
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

    function pesquisaCliAnali() {
      var pesquisaCliente = $('#txt_cliente').val();
      var pesquisaGenero = $('#txt_sexo').val();
      var pesquisaDataNascInicial = $('#txt_data_nasc_inicial').val();
      var pesquisaDataNascFinal = $('#txt_data_nasc_final').val();
      var pesquisaDataIncluInicial = $('#txt_data_inclu_inicial').val();
      var pesquisaDataIncluFinal = $('#txt_data_inclu_final').val();


      if (pesquisaCliente != '' || pesquisaGenero != '' || pesquisaDataNascInicial != '' || pesquisaDataNascFinal != '' ||
        pesquisaDataIncluInicial != '' || pesquisaDataIncluFinal != '') {
        var dados = {
          cliente: pesquisaCliente,
          genero: pesquisaGenero,
          dataNascInicial: pesquisaDataNascInicial,
          dataNascFinal: pesquisaDataNascFinal,
          dataIncluInicial: pesquisaDataIncluInicial,
          dataIncluFinal: pesquisaDataIncluFinal
        }
        //console.log(dados);
        $.post('pesquisa_rel_cli_analitico.php', dados, function(retorna) {
          //$('.resultado_pesquisa').html(retorna);
          aux_data = JSON.parse(retorna);
          //console.log(aux_data);
          $("#example1").DataTable().clear().rows.add(aux_data).draw();
        })
      }
    }

    $('#btn_gerar_relatorio').on('click', function() {
      if ($('#txt_data_inclu_inicial').val() == '' || $('#txt_data_inclu_final').val() == '') {
        alert("Você deve preencher o campo Data de Inclusão Inicial e Data de Inclusão Final!");
      } else {
        pesquisaGenero();
        $('#cli_analitico').modal('show');
      }
    });

    //gera grafico rosquinha de genero
    var ctx = document.getElementById('donut_genero').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Masculino', 'Feminino', 'Não Binário', 'Outro', 'Não Informado'],
        datasets: [{
          label: 'Gêneros',
          data: [
            <?php echo $dadosMasculino['masculino'] ?>,
            <?php echo $dadosFeminino['feminino'] ?>,
            <?php echo $dadosNaoBinario['NaoBinario'] ?>,
            <?php echo $dadosOutro['Outro'] ?>,
            <?php echo $dadosNaoInformado['NaoInformado'] ?>
          ],
          backgroundColor: [
            'rgba(54, 162, 235)',
            'rgba(255, 99, 132)',
            'rgba(255, 206, 86)',
            'rgba(75, 192, 192)',
            'rgba(153, 102, 255)',
            'rgba(255, 159, 64)'
          ],
          borderColor: [
            'rgba(54, 162, 235, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 0
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    var ctx = document.getElementById('donut_inclusao').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['15/10/2022'],
        datasets: [{
          label: 'Serviços Prestados',
          data: [2],
          backgroundColor: [
            'rgba(54, 162, 235, 0.1)'
          ],
          borderColor: [
            'rgba(54, 162, 235, 1)'
          ],
          borderWidth: 0
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    function pesquisaGenero() {
      var pesquisaCliente = $('#txt_cliente').val();
      var pesquisaGenero = $('#txt_sexo').val();
      var pesquisaDataInicial = $('#txt_data_nasc_inicial').val();
      var pesquisaDataFinal = $('#txt_data_nasc_final').val();
      var pesquisaIncluInicial = $('#txt_data_inclu_inicial').val();
      var pesquisaIncluFinal = $('#txt_data_inclu_final').val();

      if (pesquisaCliente != '' || pesquisaGenero != '' || pesquisaDataInicial != '' || pesquisaDataFinal != '' ||
        pesquisaIncluInicial != '' || pesquisaIncluFinal != '') {
        var dados = {
          cliente: pesquisaCliente,
          genero: pesquisaGenero,
          dataNascInicial: pesquisaDataInicial,
          dataNascFinal: pesquisaDataFinal,
          dataIncluInicial: pesquisaIncluInicial,
          dataIncluFinal: pesquisaIncluFinal
        }
        //console.log(dados);
        $.post('graficos/pesquisa_rel_cli_analitico_genero.php', dados, function(retorna) {
          aux_data = JSON.parse(retorna);
          //console.log(aux_data);

          atualizaGraficoGenero(aux_data[0]);
        })
      }
    }

    function pesquisaClientes() {
      var pesquisaCliente = $('#txt_cliente').val();
      var pesquisaGenero = $('#txt_sexo').val();
      var pesquisaDataInicial = $('#txt_data_nasc_inicial').val();
      var pesquisaDataFinal = $('#txt_data_nasc_final').val();
      var pesquisaIncluInicial = $('#txt_data_inclu_inicial').val();
      var pesquisaIncluFinal = $('#txt_data_inclu_final').val();

      if (pesquisaCliente != '' || pesquisaGenero != '' || pesquisaDataInicial != '' || pesquisaDataFinal != '' ||
        pesquisaIncluInicial != '' || pesquisaIncluFinal != '') {
        var dados = {
          cliente: pesquisaCliente,
          genero: pesquisaGenero,
          dataNascInicial: pesquisaDataInicial,
          dataNascFinal: pesquisaDataFinal,
          dataIncluInicial: pesquisaIncluInicial,
          dataIncluFinal: pesquisaIncluFinal
        }
        //console.log(dados);
        $.post('graficos/pesquisa_rel_cli_analitico_datas.php', dados, function(retorna) {
          aux_data = JSON.parse(retorna);

          let textData = [];
          for (let i in aux_data) {
            textData[i] = aux_data[i][0];
          }

          let textAgendamento = [];
          for (let i in aux_data) {
            textAgendamento[i] = aux_data[i][1];
          }

          textAgendamento.push('0');

          const date = new Date();

          let day = date.getDate();
          let month = date.getMonth() + 1;
          let year = date.getFullYear();

          let currentDate = `${day}/${month}/${year}`;

          //console.log(currentDate);
          textData.push(currentDate);

          atualizaGraficoData(textData, textAgendamento);
        })

      }
    }

    function atualizaGraficoGenero(data) {

      $('#donut_genero').remove();
      $('#genero').append('<canvas id="donut_genero" height="200" style="height: 200px;"></canvas>');

      var ctx = document.getElementById('donut_genero').getContext("2d");
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: ['Masculino', 'Feminino', 'Não Binário', 'Outro', 'Não Informado'],
          datasets: [{
            label: 'Gêneros',
            data: data,
            backgroundColor: [
              'rgba(54, 162, 235)',
              'rgba(255, 99, 132)',
              'rgba(255, 206, 86)',
              'rgba(75, 192, 192)',
              'rgba(153, 102, 255)',
              'rgba(255, 159, 64)'
            ],
            borderColor: [
              'rgba(54, 162, 235, 1)',
              'rgba(255, 99, 132, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 0
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });

    }

    function atualizaGraficoData(data, agendamentos) {
      $('#donut_inclusao').remove();
      $('#inclusao').append('<canvas id="donut_inclusao" height="200" style="height: 200px;"></canvas>');

      var ctx = document.getElementById('donut_inclusao').getContext("2d");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: data,
          datasets: [{
            label: 'Inclusões',
            data: agendamentos,
            backgroundColor: 'rgba(54, 162, 235, 0.1)',
            borderColor: 'rgba(54, 162, 235)',
            borderWidth: 0
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });

    }
  </script>


</body>

</html>
