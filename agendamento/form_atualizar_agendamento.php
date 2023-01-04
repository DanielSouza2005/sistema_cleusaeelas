<?php

require_once('../conexao/banco.php');

$sql = "select * from tb_cliente
        order by cli_nome";
$sql = mysqli_query($con, $sql) or die("Erro na sql!");

$sql2 = "select * from tb_tiposervico";
$sql2 = mysqli_query($con, $sql2) or die("Erro na sql2!");

$sql3 = "select * from tb_tipopgto";
$sql3 = mysqli_query($con, $sql3) or die("Erro na sql3!");

$dados3 = mysqli_fetch_array($sql3);

$sql4 = "select * from tb_horario";
$sql4 = mysqli_query($con, $sql4) or die("Erro na sql4!");


?>

<div class="modal fade" id="atualizar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detalhes do Agendamento</h4>
        <button type="button" class="close" id="btn_fechar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding-bottom: 0px; padding-top: 0vh;">
        <div class="visevent" style="display: block;">
          <div class="row">
            <div class="card-body" style="padding-right:0vh;">
              <dl class="row">
                <input type="hidden" class="col-sm-9" name="codigo" id="codigo"></input>
              </dl>
              <dl class="row">
                <dt class="col-sm-3">Cliente</dt>
                <dd class="col-sm-9" id="cliente"></dd>
              </dl>
              <dl class="row">
                <dt class="col-sm-3">Serviço</dt>
                <dd class="col-sm-9" id="servico"></dd>
              </dl>
              <dl class="row">
                <dt class="col-sm-3">Descrição</dt>
                <dd class="col-sm-9" id="especificacao"></dd>
              </dl>
              <dl class="row">
                <dt class="col-sm-3">Preço</dt>
                <dd class="col-sm-9" id="preco">R$</dd>
              </dl>
            </div>
            <div class="card-body" style="padding-top: 6vh; padding-left: 0vh;">
              <dl class="row">
                <dt class="col-sm-3">Data</dt>
                <dd class="col-sm-9" id="data"></dd>
              </dl>
              <dl class="row">
                <dt class="col-sm-3">Horário</dt>
                <span class="badge bg-info text-dark">
                  <dd class="col-sm-9" style="padding-top:1vh; font-size: 110%" id="horario"></dd>
                </span>
              </dl>
              <dl class="row">
                <dt class="col-sm-3">Status</dt>
                <span class="badge" id="badge_status">
                  <dd class="col-sm-9" style="padding-top:1vh; font-size: 110%" id="status"></dd>
                </span>
              </dl>
              <dl class="row">
                <dt class="col-sm-3">Pagamento</dt>
                <dd class="col-sm-9" id="pagto" style="padding-left: 2vh;"></dd>
              </dl>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>

            <div>

              <a href="" class="btn btn-danger" id="btn_apagar" onclick="excluir_registro(event)">Apagar
              </a>
              <button type="button" class="btn btn-primary btn_canc_visualizar">Atualizar</button>

            </div>


          </div>
        </div>

        <div class="formedit" style="display: none;">
          <form method="post" id="frm_atualizar_agendamento" action="atualizar_agendamento.php">
            <input type="hidden" name="txt_atualizar_codigo" id="txt_atualizar_codigo">
            <div class="row">
              <div class="card-body">
                <div class="form-group">
                  <label>Cliente</label>

                  <select class="form-control select2bs4" name="txt_atualizar_cliente" id="txt_atualizar_cliente" style="width: 100%;">
                    <option value=" ">Selecione um Cliente...</option>

                    <?php while ($dados = mysqli_fetch_array($sql)) { ?>

                      <option value="<?php echo $dados['cli_codigo']; ?>"> <?php echo $dados['cli_nome']; ?> </option>

                    <?php } ?>

                  </select>

                </div>
                <div class="form-group">
                  <label>Tipo de Serviço</label>
                  <select class="form-control" disabled name="txt_atualizar_tiposervico" id="txt_atualizar_tiposervico" style="width: 100%;">
                    <option value=" ">Selecione o Tipo de Serviço...</option>

                    <?php while ($dados2 = mysqli_fetch_array($sql2)) { ?>

                      <option value="<?php echo $dados2['tps_codigo']; ?>"> <?php echo $dados2['tps_descricao']; ?> </option>

                    <?php } ?>

                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Descrição</label>
                  <select class="form-control"  name="txt_atualizar_especificacao" id="txt_atualizar_especificacao" style="width: 100%;">
                    <option value=" ">Selecione a Descrição...</option>

                    <option value="Corte"> Corte </option>
                    <option value="Escova"> Escova </option>
                    <option value="Hidratação"> Hidratação </option>
                    <option value="Coloração"> Coloração </option>
                    <option value="Cauterização"> Cauterização </option>
                    <option value="Selagem"> Selagem </option>
                    <option value="Luzes"> Luzes </option>

                    <option value="Unhas"> Unhas </option>
                    <option value="Polimento"> Polimento </option>
                    <option value="Esmaltagem"> Esmaltagem </option>

                    <option value="Braços"> Braços </option>
                    <option value="Pernas"> Pernas </option>
                    <option value="Tronco"> Tronco </option>
                    <option value="Costas"> Costas </option>
                    <option value="Geral"> Geral </option>

                    <option value="Simples"> Simples </option>
                    <option value="Eventos"> Eventos </option>

                    <option value="Outra"> Outra </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Preço (R$)</label>
                  <input type="text" class="form-control" name="txt_atualizar_preco" id="txt_atualizar_preco" placeholder="Digite o valor do serviço (Ex: 10,00)">
                </div>
              </div>
              <div class="card-body " style="padding-bottom: 0px; padding-top: 3vh;">
                <div class="form-group">
                  <label for="exampleInputEmail1">Data</label>
                  <input type="date" name="txt_atualizar_data" disabled class="form-control" id="txt_atualizar_data">
                </div>

                <div class="form-group">
                  <div class="bootstrap-timepicker">
                    <label>Horário</label>
                    <select class="form-control" disabled name="txt_atualizar_horario" id="txt_atualizar_horario" style="width: 100%;">
                      <option value=" ">Selecione o Horário...</option>

                      <?php while ($dados4 = mysqli_fetch_array($sql4)) { ?>

                        <option value="<?php echo $dados4['hor_codigo']; ?>"> <?php echo substr($dados4['hor_horario'], 0, -9); ?> </option>

                      <?php } ?>

                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Status</label>
                  <select class="form-control" name="txt_atualizar_status" id="txt_atualizar_status" style="width: 100%;">

                    <option value=" "> Selecione o Status... </option>
                    <option value="1"> Realizado </option>
                    <option value="2"> Confirmado </option>
                    <option value="3"> Desmarcado </option>

                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tipo de Pagamento</label>
                  <select class="form-control" name="txt_atualizar_tipopgto" id="txt_atualizar_tipopgto" style="width: 100%;">
                    <option value=" "> Selecione o Tipo de Pagamento... </option>

                    <option value="1"> Crédito </option>
                    <option value="2"> Débito </option>
                    <option value="4"> Dinheiro </option>
                    <option value="5"> Pix </option>
                    <option value="6"> Pendente </option>

                  </select>
                </div>
              </div>
            </div>


            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn_canc_edit">Cancelar</button>
              <button type="submit" onclick="return validar_dados_atualizar();" id="btn_atualizar" class="btn btn-primary">Salvar</button>
            </div>
          </form>
        </div>
      </div>


    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
