<?php

require_once('../seguranca.php');
require_once('../conexao/banco.php');

$sqlServicosPrest = "select *, date_format(age_data,'%d/%m/%Y') as data_atendimento
                     from tb_agendamento a
                        inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                        inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
                        inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                        inner join tb_status s ON a.sta_codigo = s.sta_codigo
                        inner join tb_tipopgto tp ON a.tpg_codigo = tp.tpg_codigo
                      where s.sta_codigo IN (1, 2)";

$sqlServicosPrest = mysqli_query($con, $sqlServicosPrest) or die("Erro na sqlServicosPrest!");

$sqlMasculino = " select count(cli_sexo) as masculino
                  from tb_agendamento a
                    inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                    inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
                    inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                    inner join tb_status s ON a.sta_codigo = s.sta_codigo
                    inner join tb_tipopgto tp ON a.tpg_codigo = tp.tpg_codigo
                  where  s.sta_codigo IN (1, 2)
                  AND cli_sexo = 'M'";

$sqlMasculino = mysqli_query($con, $sqlMasculino) or die("Erro na sqlMasculino!");
$dadosMasculino = mysqli_fetch_array($sqlMasculino);

$sqlFeminino = " select count(cli_sexo) as feminino
                  from tb_agendamento a
                    inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                    inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
                    inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                    inner join tb_status s ON a.sta_codigo = s.sta_codigo
                    inner join tb_tipopgto tp ON a.tpg_codigo = tp.tpg_codigo
                  where cli_sexo = 'F'
                  AND s.sta_codigo IN (1, 2)";

$sqlFeminino = mysqli_query($con, $sqlFeminino) or die("Erro na sqlFeminino!");
$dadosFeminino = mysqli_fetch_array($sqlFeminino);

$sqlNaoBinario = " select count(cli_sexo) as NaoBinario
                  from tb_agendamento a
                    inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                    inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
                    inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                    inner join tb_status s ON a.sta_codigo = s.sta_codigo
                    inner join tb_tipopgto tp ON a.tpg_codigo = tp.tpg_codigo
                  where cli_sexo LIKE 'N'
                  and s.sta_codigo IN (1, 2)";

$sqlNaoBinario = mysqli_query($con, $sqlNaoBinario) or die("Erro na sqlNaoBinario!");
$dadosNaoBinario = mysqli_fetch_array($sqlNaoBinario);

$sqlOutro = " select count(cli_sexo) as Outro
                  from tb_agendamento a
                    inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                    inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
                    inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                    inner join tb_status s ON a.sta_codigo = s.sta_codigo
                    inner join tb_tipopgto tp ON a.tpg_codigo = tp.tpg_codigo
                  where cli_sexo LIKE 'O'
                  and s.sta_codigo IN (1, 2)";

$sqlOutro = mysqli_query($con, $sqlOutro) or die("Erro na sqlOutro!");
$dadosOutro = mysqli_fetch_array($sqlOutro);

$sqlNaoInformado = " select count(cli_sexo) as NaoInformado
                  from tb_agendamento a
                    inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                    inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
                    inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                    inner join tb_status s ON a.sta_codigo = s.sta_codigo
                    inner join tb_tipopgto tp ON a.tpg_codigo = tp.tpg_codigo
                  where cli_sexo LIKE 'I'
                  and s.sta_codigo IN (1, 2)";

$sqlNaoInformado = mysqli_query($con, $sqlNaoInformado) or die("Erro na sqlNaoInformado!");
$dadosNaoInformado = mysqli_fetch_array($sqlNaoInformado);

$sqlServicosPrestadosServicos = "select *
                                  from tb_agendamento a
                                      inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                                      inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
                                      inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                                      inner join tb_status s ON a.sta_codigo = s.sta_codigo
                                      inner join tb_tipopgto tp ON a.tpg_codigo = tp.tpg_codigo
                                  where s.sta_codigo IN (1, 2)
                                  group by t.tps_codigo";

$sqlServicosPrestadosServicos = mysqli_query($con, $sqlServicosPrestadosServicos) or die("Erro na sqlServicosPrestadosServicos!");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Relatório | Serviços Prestados </title>

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

<body class="hold-transition sidebar-mini layout-fixed" onload="pesquisaGenero();">
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
              <h1>Relatório / <small>Serviços Prestados</small></h1>
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
                              <label for="exampleInputEmail1">Serviço</label>
                              <select class="form-control" style="padding-top: 0vh;" name="txt_servico" onchange="pesquisaServPrest(); pesquisaGenero(); pesquisaPagto(); pesquisaAgendamentos(); pesquisaValorTotal(); pesquisaCabelo(); pesquisaEstetica(); pesquisaServicosPrestados();" id="txt_servico">

                                <option value=" "> Serviço... </option>
                                <option value="2"> Cabelo </option>
                                <option value="E"> Estética </option>
                              </select>
                            </div>

                          </div>
                          <div class="card-body " style="padding-bottom: 0vh;">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Status</label>
                              <select class="form-control" style="padding-top: 0vh;" name="txt_status" onchange="pesquisaServPrest(); pesquisaGenero(); pesquisaPagto(); pesquisaAgendamentos(); pesquisaValorTotal(); pesquisaCabelo(); pesquisaEstetica(); pesquisaServicosPrestados();" id="txt_status">

                                <option value=""> Status... </option>
                                <option value="1"> Realizados </option>
                                <option value="2"> Confirmados </option>
                                <option value="3"> Desmarcados </option>

                              </select>
                            </div>
                          </div>
                          <div class="card-body" style="padding-bottom: 0vh;">
                            <div class="form-group">
                              <label for="exampleInputPassword1">Período Inicial</label>
                              <input type="date" name="txt_inicial" class="form-control" id="txt_inicial" onchange="pesquisaServPrest(); pesquisaGenero(); pesquisaPagto(); pesquisaAgendamentos(); pesquisaValorTotal(); pesquisaCabelo(); pesquisaEstetica(); pesquisaServicosPrestados();">
                            </div>
                          </div>
                          <div class="card-body" style="padding-bottom: 0vh;">
                            <div class="form-group">
                              <label for="exampleInputPassword1">Período Final</label>
                              <input type="date" name="txt_final" class="form-control" id="txt_final" onchange="pesquisaServPrest(); pesquisaGenero(); pesquisaPagto(); pesquisaAgendamentos(); pesquisaValorTotal(); pesquisaCabelo(); pesquisaEstetica(); pesquisaServicosPrestados();">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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
                  <h3 class="card-title" style="padding-top: 1%; font-size: 18px;">Serviços Prestados</h3>
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
                            <th>Gênero</th>
                            <th>Serviço</th>
                            <th>Descrição</th>
                            <th>Data</th>
                            <th>Preço</th>
                            <th>Status</th>
                            <th>Pagto</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php while ($dadosServPrest = mysqli_fetch_array($sqlServicosPrest)) { ?>
                            <tr>
                              <td><?php echo $dadosServPrest['age_codigo']; ?></td>
                              <td><?php echo $dadosServPrest['cli_nome']; ?></td>
                              <td><?php if ($dadosServPrest['cli_sexo'] == 'F') echo "Feminino";
                                  else if ($dadosServPrest['cli_sexo'] == 'M') echo "Masculino";
                                  else if ($dadosServPrest['cli_sexo'] == 'N') echo "Não Binário";
                                  else if ($dadosServPrest['cli_sexo'] == 'O') echo "Outro";
                                  else if ($dadosServPrest['cli_sexo'] == 'I') echo "Não Informado"; ?></td>
                              <td><?php echo $dadosServPrest['tps_descricao']; ?></td>
                              <td><?php echo $dadosServPrest['age_especificacao']; ?></td>
                              <td><?php echo $dadosServPrest['data_atendimento']; ?></td>
                              <td><?php echo number_format($dadosServPrest['age_preco'], 2, ',', ''); ?></td>

                              <td><?php echo $dadosServPrest['sta_descricao']; ?></td>

                              <td><?php echo $dadosServPrest['tpg_descricao']; ?></td>
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
  include('modal_rel_servicos.php')
  ?>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
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
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
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

  <script type="text/javascript">
    function excluir_registro() {
      if (!confirm('Deseja realmente excluir este registro?')) {
        if (window.event)
          window.event.returnValue = false;
        else
          e.preventDefault();
      }
    }

    function pesquisaServPrest() {
      var pesquisaCliente = $('#txt_cliente').val();
      var pesquisaServico = $('#txt_servico').val();
      var pesquisaStatus = $('#txt_status').val();
      var pesquisaDataInicial = $('#txt_inicial').val();
      var pesquisaDataFinal = $('#txt_final').val();

      if (pesquisaCliente != '' || pesquisaServico != '' || pesquisaStatus != '' || pesquisaDataInicial != '' || pesquisaDataFinal != '') {
        var dados = {
          cliente: pesquisaCliente,
          servico: pesquisaServico,
          status: pesquisaStatus,
          dataInicial: pesquisaDataInicial,
          dataFinal: pesquisaDataFinal
        }
        //console.log(dados);
        $.post('pesquisa_rel_serv_prestados.php', dados, function(retorna) {
          //$('.resultado_pesquisa').html(retorna);
          aux_data = JSON.parse(retorna);
          //console.log(aux_data);
          $("#example1").DataTable().clear().rows.add(aux_data).draw();
        })
      }
    }
  </script>

  <script>
    $('#btn_gerar_relatorio').on('click', function() {
      if ($('#txt_status').val() == '') {
        alert("Você deve preencher o campo Status!");
        $('#txt_status').focus();
      } else {
        $('#rel_servicos').modal('show');
      }


    });

    $('#txt_status').on('click', function() {
      if ($('#txt_status').val() == '1') {
        if ($('#pagto_geral').length != 1) {
          $('#pagto_geral_pai').append('<section class="col-lg-6" id="pagto_geral"><div class="card"><div class="card-header"><h3 class="card-title"><i class="fas fa-chart-pie mr-1"></i> Formas de Pagamento</h3></div><div class="card-body"><div class="tab-content p-0" id="pagto"><canvas id="donut_pagto" height="200" style="height: 200px;"></canvas></div></div></section>');
        }
      } else {
        $('#pagto_geral').remove();
      }

    });

    //gera grafico rosquinha de genero
    var ctx = document.getElementById('donut_genero').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Masculino', 'Feminino', 'Não Binário', 'Outro', 'Não Informado'],
        datasets: [{
          label: 'Gêneros mais atendidos',
          data: [<?php echo $dadosMasculino['masculino'] ?>,
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

    //gera o grafico de barra de servicos prestados
    var ctx = document.getElementById('serv_prest').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['15/10/2022', '16/10/2022', '17/10/2022', '18/10/2022'],
        datasets: [{
          label: 'Serviços Prestados',
          data: [2, 2, 2, 4],
          backgroundColor: [
            'rgba(54, 162, 235)',
            'rgba(255, 99, 132)',
            'rgba(255, 206, 86)',
            'rgba(75, 192, 192)',
            'rgba(153, 102, 255)'
          ],
          borderColor: [
            'rgba(54, 162, 235, 1)',
            'rgba(255, 99, 132)',
            'rgba(255, 206, 86)',
            'rgba(75, 192, 192)',
            'rgba(153, 102, 255)'
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
      var pesquisaServico = $('#txt_servico').val();
      var pesquisaStatus = $('#txt_status').val();
      var pesquisaDataInicial = $('#txt_inicial').val();
      var pesquisaDataFinal = $('#txt_final').val();

      if (pesquisaCliente != '' || pesquisaServico != '' || pesquisaStatus != '' || pesquisaDataInicial != '' || pesquisaDataFinal != '') {
        var dados = {
          cliente: pesquisaCliente,
          servico: pesquisaServico,
          status: pesquisaStatus,
          dataInicial: pesquisaDataInicial,
          dataFinal: pesquisaDataFinal
        }
        //console.log(dados);
        $.post('graficos/pesquisa_rel_serv_prestados_genero.php', dados, function(retorna) {
          aux_data = JSON.parse(retorna);
          //console.log(aux_data);

          atualizaGraficoGenero(aux_data[0]);
        })
      }
    }

    function pesquisaPagto() {
      var pesquisaCliente = $('#txt_cliente').val();
      var pesquisaServico = $('#txt_servico').val();
      var pesquisaStatus = $('#txt_status').val();
      var pesquisaDataInicial = $('#txt_inicial').val();
      var pesquisaDataFinal = $('#txt_final').val();

      if (pesquisaCliente != '' || pesquisaServico != '' || pesquisaStatus != '' || pesquisaDataInicial != '' || pesquisaDataFinal != '') {
        var dados = {
          cliente: pesquisaCliente,
          servico: pesquisaServico,
          status: pesquisaStatus,
          dataInicial: pesquisaDataInicial,
          dataFinal: pesquisaDataFinal
        }
        //console.log(dados);
        $.post('graficos/pesquisa_rel_serv_prestados_pagto.php', dados, function(retorna) {
          aux_data = JSON.parse(retorna);
          //console.log(aux_data);

          atualizaGraficoPagto(aux_data[0]);
        })
      }
    }

    function pesquisaAgendamentos() {
      var pesquisaCliente = $('#txt_cliente').val();
      var pesquisaServico = $('#txt_servico').val();
      var pesquisaStatus = $('#txt_status').val();
      var pesquisaDataInicial = $('#txt_inicial').val();
      var pesquisaDataFinal = $('#txt_final').val();

      if (pesquisaCliente != '' || pesquisaServico != '' || pesquisaStatus != '' || pesquisaDataInicial != '' || pesquisaDataFinal != '') {
        var dados = {
          cliente: pesquisaCliente,
          servico: pesquisaServico,
          status: pesquisaStatus,
          dataInicial: pesquisaDataInicial,
          dataFinal: pesquisaDataFinal
        }
        //console.log(dados);
        $.post('graficos/pesquisa_rel_serv_prestados_qtde.php', dados, function(retorna) {
          aux_data = JSON.parse(retorna);
          //console.log(aux_data);

          $('#agendamentos_realizados').text(aux_data);

          //atualizaGraficoGenero(aux_data[0]);
        })
      }
    }

    function pesquisaValorTotal() {
      var pesquisaCliente = $('#txt_cliente').val();
      var pesquisaServico = $('#txt_servico').val();
      var pesquisaStatus = $('#txt_status').val();
      var pesquisaDataInicial = $('#txt_inicial').val();
      var pesquisaDataFinal = $('#txt_final').val();

      if (pesquisaCliente != '' || pesquisaServico != '' || pesquisaStatus != '' || pesquisaDataInicial != '' || pesquisaDataFinal != '') {
        var dados = {
          cliente: pesquisaCliente,
          servico: pesquisaServico,
          status: pesquisaStatus,
          dataInicial: pesquisaDataInicial,
          dataFinal: pesquisaDataFinal
        }
        //console.log(dados);
        $.post('graficos/pesquisa_rel_serv_prestados_valortotal.php', dados, function(retorna) {
          aux_data = JSON.parse(retorna);
          //console.log(aux_data);

          $('#valor_total').text('R$' + aux_data);

          //atualizaGraficoGenero(aux_data[0]);
        })
      }
    }

    function pesquisaCabelo() {
      var pesquisaCliente = $('#txt_cliente').val();
      var pesquisaServico = $('#txt_servico').val();
      var pesquisaStatus = $('#txt_status').val();
      var pesquisaDataInicial = $('#txt_inicial').val();
      var pesquisaDataFinal = $('#txt_final').val();

      if (pesquisaCliente != '' || pesquisaServico != '' || pesquisaStatus != '' || pesquisaDataInicial != '' || pesquisaDataFinal != '') {
        var dados = {
          cliente: pesquisaCliente,
          servico: pesquisaServico,
          status: pesquisaStatus,
          dataInicial: pesquisaDataInicial,
          dataFinal: pesquisaDataFinal
        }
        //console.log(dados);
        $.post('graficos/pesquisa_rel_serv_prestados_cabelo.php', dados, function(retorna) {
          aux_data = JSON.parse(retorna);
          //console.log(aux_data);

          $('#cabelo').text(aux_data);

          //atualizaGraficoGenero(aux_data[0]);
        })
      }
    }

    function pesquisaEstetica() {
      var pesquisaCliente = $('#txt_cliente').val();
      var pesquisaServico = $('#txt_servico').val();
      var pesquisaStatus = $('#txt_status').val();
      var pesquisaDataInicial = $('#txt_inicial').val();
      var pesquisaDataFinal = $('#txt_final').val();

      if (pesquisaCliente != '' || pesquisaServico != '' || pesquisaStatus != '' || pesquisaDataInicial != '' || pesquisaDataFinal != '') {
        var dados = {
          cliente: pesquisaCliente,
          servico: pesquisaServico,
          status: pesquisaStatus,
          dataInicial: pesquisaDataInicial,
          dataFinal: pesquisaDataFinal
        }
        //console.log(dados);
        $.post('graficos/pesquisa_rel_serv_prestados_estetica.php', dados, function(retorna) {
          aux_data = JSON.parse(retorna);
          //console.log(aux_data);

          $('#estetica').text(aux_data);

          //atualizaGraficoGenero(aux_data[0]);
        })
      }
    }

    function pesquisaServicosPrestados() {
      var pesquisaCliente = $('#txt_cliente').val();
      var pesquisaServico = $('#txt_servico').val();
      var pesquisaStatus = $('#txt_status').val();
      var pesquisaDataInicial = $('#txt_inicial').val();
      var pesquisaDataFinal = $('#txt_final').val();

      if (pesquisaCliente != '' || pesquisaServico != '' || pesquisaStatus != '' || pesquisaDataInicial != '' || pesquisaDataFinal != '') {
        var dados = {
          cliente: pesquisaCliente,
          servico: pesquisaServico,
          status: pesquisaStatus,
          dataInicial: pesquisaDataInicial,
          dataFinal: pesquisaDataFinal
        }
        //console.log(dados);
        $.post('graficos/pesquisa_rel_serv_prestados_datas.php', dados, function(retorna) {
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

          //console.log(textAgendamento);

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
            label: 'Gêneros mais atendidos',
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

    function atualizaGraficoPagto(data) {
      $('#donut_pagto').remove();
      $('#pagto').append('<canvas id="donut_pagto" height="200" style="height: 200px;"></canvas>');


      var ctx = document.getElementById('donut_pagto').getContext("2d");
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: ['Crédito', 'Débito', 'Dinheiro', 'Pix'],
          datasets: [{
            label: 'Gêneros mais atendidos',
            data: data,
            backgroundColor: [
              'rgba(54, 162, 235)',
              'rgba(255, 99, 132)',
              'rgba(255, 206, 86)',
              'rgba(75, 192, 192)',
              'rgba(153, 102, 255)'
            ],
            borderColor: [
              'rgba(54, 162, 235, 1)',
              'rgba(255, 99, 132, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)'
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
      $('#serv_prest').remove();
      $('#serv_prest_geral').append('<canvas id="serv_prest" height="200" style="height: 200px;"></canvas>');

      var ctx = document.getElementById('serv_prest').getContext("2d");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: data,
          datasets: [{
            label: 'Serviços Prestados',
            data: agendamentos,
            backgroundColor:'rgba(54, 162, 235, 0.1)',
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
