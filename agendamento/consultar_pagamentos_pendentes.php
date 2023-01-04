<?php

require_once('../conexao/banco.php');

$result = "select *,  date_format(age_data,'%d/%m/%Y') as data
            from tb_agendamento a
                inner join tb_tiposervico t on (a.tps_codigo = t.tps_codigo)
                inner join tb_horario h on (a.hor_codigo = h.hor_codigo)
                inner join tb_status s on (a.sta_codigo = s.sta_codigo)
                inner join tb_profissional pr on (t.prf_codigo = pr.prf_codigo)
                inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                inner join tb_tipopgto tp on (a.tpg_codigo = tp.tpg_codigo)
            where a.tpg_codigo = 6 and a.sta_codigo = 2
            order by a.age_data DESC";

$resultado = mysqli_query($con, $result);
//$qtdeTotal = mysqli_num_rows($resultado);

if (($resultado) and ($resultado->num_rows != 0)) {
  while ($row = mysqli_fetch_assoc($resultado)) {
    echo "
        <section class='content'>
          <div class='container-fluid'>
            <div class='row'>
              <div class='col-md-12'>
                <div class='bs-stepper' >
                  <div class='bs-stepper-content' style='padding-bottom: 0vh;'>
                    <input type='hidden' name='id_pagamento[]' value='" . $row['age_codigo'] . "' id='txt_atualizar_codigo_pagamento_pendente" . $row['age_codigo'] . "'>
                    <div class='row'>
                      <div class='card-body' style='padding-top: 0vh; padding-right: 0vh; padding-left: 0vh; padding-bottom:0vh;'>
                        <div class='form-group' style='padding-right: 8px; padding-left: 0vh; margin-bottom: 0vh;'>
                          <select class='form-control' readonly name='txt_atualizar_cliente_pagamento_pendente' id='txt_atualizar_cliente_pagamento_pendente'>
                            <option value='" . $row['cli_codigo'] . "' selected> " . $row['cli_nome'] . "</option>
                          </select>
                        </div>
                      </div>
                      <div class='card-body' style='padding-top: 0vh; padding-right: 0vh; padding-left: 0vh; padding-bottom:0vh;'>
                        <div class='form-group' style='padding-right: 8px;'>
                          <select class='form-control' readonly name='txt_atualizar_servico_pagamento_pendente' id='txt_atualizar_servico_pagamento_pendente'>
                            <option value='" . $row['tps_codigo'] . "'selected>" . $row['tps_descricao'] . "</option>
                          </select>
                        </div>
                      </div>
                      <div class='card-body' style='padding-top: 0vh; padding-right: 0vh; padding-left: 0vh; padding-bottom:0vh;'>
                        <div class='form-group' style='padding-right: 8px;'>
                          <select class='form-control' readonly name='txt_atualizar_data_pagamento_pendente' id='txt_atualizar_data_pagamento_pendente'>
                            <option value='" . $row['data'] . "' selected>" . $row['data'] . "</option>
                          </select>
                        </div>
                      </div>
                      <div class='card-body' style='padding-top: 0vh; padding-right: 0vh; padding-left: 0vh; padding-bottom:0vh;'>
                        <div class='form-group' style='padding-right: 8px;'>
                            <div class='bootstrap-timepicker'>
                                <select class='form-control' readonly name='txt_atualizar_horario_pagamento_pendente' id='txt_atualizar_horario_pagamento_pendente'>

                                    <option value='" . $row['hor_codigo'] . "' selected> " . substr($row['hor_horario'], 0, -9) . " </option>

                                </select>
                            </div>
                        </div>
                      </div>
                      <div class='card-body' style='padding-top: 0vh; padding-right: 0vh; padding-left: 0vh; padding-bottom:0vh; '>
                        <div class='form-group' style='padding-right: 8px;'>
                          <select class='form-control' readonly name='txt_atualizar_preco_pagamento_pendente' id='txt_atualizar_preco_pagamento_pendente  '>
                            <option value='" . number_format($row['age_preco'], 2, ',', '') . "' selected>" .number_format($row['age_preco'], 2, ',', '') . "</option>
                          </select>
                        </div>
                      </div>
                      <div class='card-body' style='padding-top: 0vh; padding-right: 0vh; padding-left: 0vh; padding-bottom:0vh;'>
                        <div class='form-group' style='padding-right: 8px;'>
                          <select class='form-control' name='status_pagamento[" . $row['age_codigo'] . "]' id='txt_atualizar_status_pagamento_pendente" . $row['age_codigo'] . "'>


                              <option value='2'> Confirmado </option>
                              <option value='3'> Desmarcado </option>
                              <option value='1'> Realizado </option>

                          </select>
                        </div>
                      </div>
                      <div class='card-body' style='padding-top: 0vh; padding-right: 0vh; padding-left: 0vh; padding-bottom:0vh;'>
                        <div class='form-group'>
                            <select class='form-control' name='valor_pagamento[" . $row['age_codigo'] . "]' id='txt_atualizar_tipopgto_pagamento_pendente" . $row['age_codigo'] . "'>

                                <option value='" . $row['tpg_codigo'] . "' selected>" . $row['tpg_descricao'] .  "</option>

                                <option value='4'> Dinheiro </option>
                                <option value='1'> Crédito </option>
                                <option value='2'> Débito </option>
                                <option value='5'> Pix </option>

                            </select>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>

                <script>
                    $('#txt_atualizar_tipopgto_pagamento_pendente" . $row['age_codigo'] . "').on('change', function() {
                        if($('#txt_atualizar_tipopgto_pagamento_pendente" . $row['age_codigo'] . "').val() != 6){
                            $('#txt_atualizar_status_pagamento_pendente" . $row['age_codigo'] . "').val('1');
                        } else{
                            $('#txt_atualizar_status_pagamento_pendente" . $row['age_codigo'] . "').val('2');
                        }
                    })
                    $('#txt_atualizar_status_pagamento_pendente" . $row['age_codigo'] . "').on('change', function() {

                        if($('#txt_atualizar_status_pagamento_pendente" . $row['age_codigo'] . "').val() != 1){
                            $('#txt_atualizar_tipopgto_pagamento_pendente" . $row['age_codigo'] . "').val('6');
                        }

                    });
                    $('#btn_finalizar').on('click', function() {
                        if(($('#txt_atualizar_status_pagamento_pendente" . $row['age_codigo'] . "').val() == 1) && ($('#txt_atualizar_tipopgto_pagamento_pendente" . $row['age_codigo'] . "').val() == 6)){
                            alert('Selecione uma Forma de Pagamento!');
                            event.preventDefault();
                            $('#txt_atualizar_tipopgto_pagamento_pendente" . $row['age_codigo'] . "').focus();
                        }
                    });

                </script>



        ";
  }
} else {
  echo '<p style="padding-right: 8px; padding-left:4vh;">Nenhum cliente encontrado :(</p>';
}
