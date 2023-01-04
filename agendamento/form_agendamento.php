<?php

require_once('../conexao/banco.php');

$sql = "select * from tb_cliente
        order by cli_nome";
$sql = mysqli_query($con, $sql) or die("Erro na sql!");

$sql2 = "select * from tb_tiposervico";
$sql2 = mysqli_query($con, $sql2) or die("Erro na sql2!");

$sql3 = "select * from tb_tipopgto";
$sql3 = mysqli_query($con, $sql3) or die("Erro na sql3!");

$sql4 = "select * from tb_horario";
$sql4 = mysqli_query($con, $sql4) or die("Erro na sql4!");

?>
<div class="modal fade" id="cadastrar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cadastrar Agendamento</h4>
        <button type="button" onclick="limpa_dados();" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--<span id="msg_alerta"></span> -->
      <div class="modal-body">
        <form method="post" id="frm_agendamento" name="frm_agendamento" action="cadastro_agendamento.php">
          <div class="row">
            <div class="card-body " style="padding-bottom: 0px; padding-top: 0vh;">
              <div class="form-group">
                <label>Cliente</label>

                <select class="form-control select2bs4" name="txt_cliente" id="txt_cliente" style="width: 100%;">
                  <option value=" ">Selecione um Cliente...</option>

                  <?php while ($dados = mysqli_fetch_array($sql)) { ?>

                    <option value="<?php echo $dados['cli_codigo']; ?>"> <?php echo $dados['cli_nome']; ?> </option>

                  <?php } ?>

                </select>
              </div>
              <div class="form-group">
                <label>Tipo de Serviço</label>
                <select class="form-control" name="txt_tiposervico" id="txt_tiposervico" style="width: 100%;" onchange="pesquisaHorariosDisponiveis();">
                  <option value=" ">Selecione o Tipo de Serviço...</option>

                  <?php while ($dados2 = mysqli_fetch_array($sql2)) { ?>

                    <option value="<?php echo $dados2['tps_codigo']; ?>"> <?php echo $dados2['tps_descricao']; ?> </option>

                  <?php } ?>

                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Descrição</label>
                <select class="form-control" name="txt_especificacao" id="txt_especificacao" style="width: 100%;">
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
                <input type="text" class="form-control" name="txt_preco" id="txt_preco" placeholder="Digite o valor do serviço (Ex: 10,00)">
              </div>
            </div>

            <div class="card-body " style="padding-bottom: 0px; padding-top: 0vh;">
              <div class="form-group">
                <label for="exampleInputEmail1">Data</label>
                <input type="date" name="txt_data" class="form-control" id="txt_data" onchange="pesquisaHorariosDisponiveis();">
              </div>

              <div class="form-group">
                <div class="bootstrap-timepicker">
                  <label>Horário</label>
                  <select class="form-control resultado_horarios" name="txt_horario" id="txt_horario" style="width: 100%;" onclick="return valida_horario();" onselect="pesquisaHorariosDisponiveis();">
                    <option value="">Selecione o Horário...</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Status</label>
                <select class="form-control" name="txt_status" id="txt_status" style="width: 100%;">

                  <option value=""> Selecione o Status... </option>
                  <option value="2" selected> Confirmado </option>
                  <option value="1"> Realizado </option>

                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Forma de Pagamento</label>
                <select class="form-control" name="txt_tipopgto" id="txt_tipopgto" style="width: 100%;">
                  <option value=" "> Selecione o Tipo de Pagamento... </option>

                  <option value="6" selected> Pendente </option>
                  <option value="4"> Dinheiro </option>
                  <option value="1"> Crédito </option>
                  <option value="2"> Débito </option>
                  <option value="5"> Pix </option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" onclick="limpa_dados();" id="btn_fechar" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary" onclick="return validar_dados();" id="btn_cadastrar">Cadastrar</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>
