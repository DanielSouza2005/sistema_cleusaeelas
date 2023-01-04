<?php

require_once('../../conexao/banco.php');

$clientes = filter_input(INPUT_POST, 'cliente', FILTER_UNSAFE_RAW);
$genero = filter_input(INPUT_POST, 'genero', FILTER_UNSAFE_RAW);
$dataNascInicial = filter_input(INPUT_POST, 'dataNascInicial');
$dataNascFinal = filter_input(INPUT_POST, 'dataNascFinal');
$dataIncluInicial = filter_input(INPUT_POST, 'dataIncluInicial');
$dataIncluFinal = filter_input(INPUT_POST, 'dataIncluFinal');


$resultData = "select count(cli_codigo) as agendamentos, date_format(cli_data_inclusao,'%d/%m/%Y') as data_inclusao
                from tb_cliente c
                where
                  1=1";

  if ($dataNascInicial != '' && $dataNascFinal != '')
    $resultData .= " AND c.cli_data_nascimento BETWEEN  '" . $dataNascInicial . "' AND '" . $dataNascFinal . "' ";

  if ($dataIncluInicial != '' && $dataIncluFinal != '')
    $resultData .= " AND c.cli_data_inclusao BETWEEN  '" . $dataIncluInicial . "' AND '" . $dataIncluFinal . "' ";

  if ($clientes != '')
    $resultData .= " AND c.cli_nome LIKE '%" . $clientes . "%' ";

  if ($genero != '')
    $resultData .= " AND c.cli_sexo LIKE '%" . $genero . "%' ";

$resultData .= " GROUP BY cli_data_inclusao";

$resultadoData = mysqli_query($con, $resultData);

if (($resultadoData) and ($resultadoData->num_rows != 0)) {
  while ($rowData = mysqli_fetch_assoc($resultadoData)) {
    $aux_array[] = [
      $rowData['data_inclusao'],
      $rowData['agendamentos']
    ];
  }
  echo json_encode($aux_array);
} else {
  $aux_array = [];
  echo json_encode($aux_array);
}
