<?php

require_once('../../conexao/banco.php');

$clientes = filter_input(INPUT_POST, 'cliente', FILTER_UNSAFE_RAW);
$servicos = filter_input(INPUT_POST, 'servico', FILTER_UNSAFE_RAW);
$status = filter_input(INPUT_POST, 'status', FILTER_UNSAFE_RAW);
$dataInicial = filter_input(INPUT_POST, 'dataInicial');
$dataFinal = filter_input(INPUT_POST, 'dataFinal');


  $result = "select count(age_codigo) as Agendamentos
    from tb_agendamento a
        inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
        inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
        inner join tb_horario h ON a.hor_codigo = h.hor_codigo
        inner join tb_status s ON a.sta_codigo = s.sta_codigo
        inner join tb_tipopgto tp ON a.tpg_codigo = tp.tpg_codigo
    where
        1=1";

  if ($dataInicial != '' && $dataFinal != '')
    $result .= " AND a.age_data BETWEEN  '" . $dataInicial . "' AND '" . $dataFinal . "' ";

  if ($clientes != '')
    $result .= " AND c.cli_nome like '%" . $clientes . "%' ";
  if ($servicos != ' ') {
    if ($servicos != '2') {
      $result .= " AND t.tps_codigo <> 2 ";
    } else {
      $result .= " AND t.tps_codigo = '" . $servicos . "' ";
    }
  }
  if ($status != ''){
      $result .= " AND s.sta_codigo = '" . $status . "' ";
  }

$resultado = mysqli_query($con, $result);

if (($resultado) and ($resultado->num_rows != 0)) {
  $aux_array = [];
  while ($row = mysqli_fetch_assoc($resultado)) {

    $aux_array[] = [
      $row['Agendamentos']

    ];
  }
  echo json_encode($aux_array);
} else {
  $aux_array = [];
  echo json_encode($aux_array);
}
