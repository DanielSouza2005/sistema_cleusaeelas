<?php
$sqlAgendamentos = "select count(age_codigo) as Agendamentos
                     from tb_agendamento a
                        inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                        inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
                        inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                        inner join tb_status s ON a.sta_codigo = s.sta_codigo
                        inner join tb_tipopgto tp ON a.tpg_codigo = tp.tpg_codigo
                      where s.sta_codigo IN (1, 2)";

$sqlAgendamentos = mysqli_query($con, $sqlAgendamentos) or die("Erro na sqlAgendamentos!");
$dadosAgendamentos = mysqli_fetch_array($sqlAgendamentos);

$sqlValorTotal = "select sum(age_preco) as ValorTotal
                     from tb_agendamento a
                        inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                        inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
                        inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                        inner join tb_status s ON a.sta_codigo = s.sta_codigo
                        inner join tb_tipopgto tp ON a.tpg_codigo = tp.tpg_codigo
                      where s.sta_codigo IN (1, 2)";

$sqlValorTotal = mysqli_query($con, $sqlValorTotal) or die("Erro na sqlValorTotal!");
$dadosValorTotal = mysqli_fetch_array($sqlValorTotal);

$sqlCabelo = "select count(age_codigo) as Cabelo
              from tb_agendamento a
                inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
                inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                inner join tb_status s ON a.sta_codigo = s.sta_codigo
                inner join tb_tipopgto tp ON a.tpg_codigo = tp.tpg_codigo
              where s.sta_codigo IN (1, 2)
              and a.tps_codigo = 2";

$sqlCabelo = mysqli_query($con, $sqlCabelo) or die("Erro sqlCabelo!");
$dadosCabelo = mysqli_fetch_array($sqlCabelo);

$sqlEstetica = "select count(age_codigo) as Estetica
              from tb_agendamento a
                inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
                inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                inner join tb_status s ON a.sta_codigo = s.sta_codigo
                inner join tb_tipopgto tp ON a.tpg_codigo = tp.tpg_codigo
              where s.sta_codigo IN (1, 2)
              and a.tps_codigo <> 2";

$sqlEstetica = mysqli_query($con, $sqlEstetica) or die("Erro sqlEstetica!");
$dadosEstetica = mysqli_fetch_array($sqlEstetica);

?>

<div class="modal fade" id="rel_servicos">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Relatório | Serviços Prestados</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <section class="content">
          <div class="container-fluid">
            <div class="card-body p-0">
              <div class="row">
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3 id="valor_total"><?php echo  'R$' . number_format($dadosValorTotal['ValorTotal'], 2, ',', ''); ?></h3>

                      <p>Valor Total</p>
                    </div>
                    <div class="icon">
                      <i class="nav-icon fas fa-money-bill"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger" style="background-color: rgba(255, 99, 132) !important;">
                    <div class="inner">
                      <h3 id="agendamentos_realizados"><?php echo $dadosAgendamentos['Agendamentos']; ?></h3>

                      <p>Agendtos. Realizados</p>
                    </div>
                    <div class="icon">
                      <i class="nav-icon far fa-calendar-alt"></i>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger" style="background-color: #FE2E8F  !important;">
                    <div class="inner">
                      <h3 id="cabelo"><?php echo $dadosCabelo['Cabelo']; ?></h3>

                      <p>Cabelo</p>
                    </div>
                    <div class="icon">
                      <img class="nav-icon" style="width: 70px; opacity: 0.25; position: absolute; left: 70%; bottom: 20%;" src="../dist/img/cabelo.png" alt="Icone">
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info" style="background-color: #F8A1E0 !important;">
                    <div class="inner">
                      <h3 id="estetica"><?php echo $dadosEstetica['Estetica']; ?></h3>

                      <p>Estética</p>
                    </div>
                    <div class="icon">
                      <img class="nav-icon" style="width: 65px; opacity: 0.25; position: absolute; left: 70%; bottom: 25%;" src="../dist/img/estetica.png" alt="Icone">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <section class="col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-chart-line mr-1"></i>
                        Serviços Prestados
                      </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content p-0" id="serv_prest_geral">
                        <!-- Morris chart - Sales -->
                        <canvas id="serv_prest" height="100" style="height: 100px;"></canvas>
                      </div>
                    </div><!-- /.card-body -->
                  </div>
                </section>
              </div>
              <div class="row" id="pagto_geral_pai">
                <section class="col-lg-6">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Gêneros Atendidos
                      </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content p-0" id="genero">
                        <!-- Morris chart - Sales -->
                        <canvas id="donut_genero" height="200" style="height: 200px;"></canvas>
                      </div>
                    </div><!-- /.card-body -->
                  </div>
                </section>
                <!--<section class="col-lg-6" id="pagto_geral">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Formas de Pagamento
                      </h3>
                    </div>
                    <div class="card-body">
                      <div class="tab-content p-0" id="pagto">
                        <canvas id="donut_pagto" height="200" style="height: 200px;"></canvas>
                      </div>
                    </div>
                </section> -->
              </div>
            </div>
          </div>
      </div>
      </section>
    </div>
  </div>
</div>
</div>
