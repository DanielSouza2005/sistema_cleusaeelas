<?php

//require_once('../conexao/banco.php');

$sql5 = "select *,  date_format(age_data,'%d/%m/%Y') as data
         from tb_agendamento a
            inner join tb_tiposervico t on (a.tps_codigo = t.tps_codigo)
            inner join tb_profissional pr on (t.prf_codigo = pr.prf_codigo)
            inner join tb_status s on (a.sta_codigo = s.sta_codigo)
            inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
            inner join tb_tipopgto tp on (a.tpg_codigo = tp.tpg_codigo)
        where a.tpg_codigo=6 and a.sta_codigo = 1
        order by age_data DESC";

$sql5 = mysqli_query($con, $sql5) or die("Erro na sql5!");

//$dados5 = mysqli_fetch_array($sql5);


$sql6 = "select * from tb_tipopgto";
$sql6 = mysqli_query($con, $sql6) or die("Erro na sql6!");

$sqlCliente = "select * from tb_cliente
                order by cli_nome";
$sqlCliente = mysqli_query($con, $sqlCliente) or die("Erro na sqlCliente!");

$sqlServico = "select * from tb_tiposervico";
$sqlServico = mysqli_query($con, $sqlServico) or die("Erro na sqlServico!");

?>

<div class="modal fade" id="pagamentos">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Agendamentos Pendentes</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding-bottom: 0px; padding-top: 4vh;">
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="bs-stepper">
                  <div class="bs-stepper-content">
                    <div class="card-body" style="padding-bottom: 0vh;">
                      <div class="row">
                        <div class="card-body" style="padding-bottom: 0vh; padding-left: 0vh; padding-right: 0vh;">
                          <div class="form-group">
                            <label>Filtrar por...</label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="card-body" style="padding-top: 0vh; padding-right: 0vh; padding-left: 0vh; padding-bottom: 0vh;">
                          <div class="form-group" style="padding-right: 8px; padding-top: 0vh;">
                            <label>Cliente</label>
                            <select class="form-control" style="padding-top: 0vh;" name="txt_atualizar_cliente_pendente_pesquisar" id="txt_atualizar_cliente_pendente_pesquisar" onchange="pesquisaPagtoPendente();">
                              <option value="%">Selecione o Cliente...</option>

                              <?php while ($dadosCliente = mysqli_fetch_array($sqlCliente)) { ?>

                                <option value="<?php echo $dadosCliente['cli_codigo']; ?>"> <?php echo $dadosCliente['cli_nome']; ?> </option>

                              <?php } ?>

                            </select>
                          </div>
                        </div>
                        <div class="card-body" style="padding-top: 0vh; padding-left: 0vh; padding-right: 0vh; padding-bottom: 0vh;">
                          <div class="form-group" style="padding-right: 8px; padding-top: 0vh;">
                            <label>Serviço</label>
                            <select class="form-control" style="padding-top: 0vh;" name="txt_atualizar_servico_pendente_pesquisar" id="txt_atualizar_servico_pendente_pesquisar" onchange="pesquisaPagtoPendente();">
                              <option value="%">Selecione o Serviço...</option>

                              <?php while ($dadosServico = mysqli_fetch_array($sqlServico)) { ?>

                                <option value="<?php echo $dadosServico['tps_codigo']; ?>"> <?php echo $dadosServico['tps_descricao']; ?> </option>

                              <?php } ?>

                            </select>
                          </div>
                        </div>
                        <div class="card-body" style="padding-top: 0vh; padding-left: 0vh; padding-right: 0vh; padding-bottom: 0vh;">
                          <label>Data Inicial</label>
                          <div class="form-group" style="padding-right: 8px; padding-top: 0vh;">
                            <input type="date" style="padding-top: 0vh;" placeholder="Data..." name="txt_atualizar_data1_pendente_pesquisar" class="form-control" id="txt_atualizar_data1_pendente_pesquisar" onchange="pesquisaPagtoPendente();">
                          </div>
                        </div>
                        <div class="card-body" style="padding-top: 0vh; padding-left: 0vh; padding-right: 0vh;">
                          <label>Data Final</label>
                          <div class="form-group" style="padding-right: 0vh; padding-top: 0vh;">
                            <input type="date" style="padding-top: 0vh;" placeholder="Data..." name="txt_atualizar_data2_pendente_pesquisar" class="form-control" id="txt_atualizar_data2_pendente_pesquisar" onchange="pesquisaPagtoPendente();">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="modal-body" style="padding-bottom: 0px; padding-top: 0vh;">
        <div class="formedit">
          <div class="card-body" style="padding-top: 0vh;">
            <form method='post' id='frm_atualizar_pagamentos_pendentes' action='atualizar_pagamentos_pendentes.php'>
              <div class="resultado_pesquisa_pagamentos" style="padding-bottom: 4vh;">

              </div>
              <div class=" modal-footer justify-content-between">
                <button type="button" class="btn btn-default" id="btn_fechar" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary" id="btn_finalizar">Finalizar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
