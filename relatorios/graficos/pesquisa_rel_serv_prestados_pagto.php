<?php

require_once('../../conexao/banco.php');

$clientes = filter_input(INPUT_POST, 'cliente', FILTER_UNSAFE_RAW);
$servicos = filter_input(INPUT_POST, 'servico', FILTER_UNSAFE_RAW);
$status = filter_input(INPUT_POST, 'status', FILTER_UNSAFE_RAW);
$dataInicial = filter_input(INPUT_POST, 'dataInicial');
$dataFinal = filter_input(INPUT_POST, 'dataFinal');

  $resultCredito = "select count(tpg_codigo) as Credito
                from tb_agendamento a
                    inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                    inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
                    inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                    inner join tb_status s ON a.sta_codigo = s.sta_codigo
                where
                    1=1";

    if ($dataInicial != '' && $dataFinal != '')
      $resultCredito .= " AND a.age_data BETWEEN  '" . $dataInicial . "' AND '" . $dataFinal . "' ";

    if ($clientes != '')
      $resultCredito .= " AND c.cli_nome like '%" . $clientes . "%' ";
    if ($servicos != ' ') {
      if ($servicos != '2') {
        $resultCredito .= " AND t.tps_codigo <> 2 ";
      } else {
        $resultCredito .= " AND t.tps_codigo = '" . $servicos . "' ";
      }
    }
    if ($status != ''){
        $resultCredito .= " AND s.sta_codigo = '" . $status . "' ";
    }

    $resultCredito .= " AND a.tpg_codigo = 1 ";

    $resultCredito .= "order by age_data";

  $resultadoCredito = mysqli_query($con, $resultCredito);

  $resultDebito = "select count(tpg_codigo) as Debito
                  from tb_agendamento a
                      inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                      inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
                      inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                      inner join tb_status s ON a.sta_codigo = s.sta_codigo
                  where
                      1=1";

    if ($dataInicial != '' && $dataFinal != '')
      $resultDebito .= " AND a.age_data BETWEEN  '" . $dataInicial . "' AND '" . $dataFinal . "' ";

    if ($clientes != '')
      $resultDebito .= " AND c.cli_nome like '%" . $clientes . "%' ";
    if ($servicos != ' ') {
      if ($servicos != '2') {
        $resultDebito .= " AND t.tps_codigo <> 2 ";
      } else {
        $resultDebito .= " AND t.tps_codigo = '" . $servicos . "' ";
      }
    }
    if ($status != ''){
        $resultDebito .= " AND s.sta_codigo = '" . $status . "' ";
    }

    $resultDebito .= " AND a.tpg_codigo = 2 ";

    $resultDebito .= "order by age_data";

  $resultadoDebito = mysqli_query($con, $resultDebito);

  $resultDinheiro = "select count(tpg_codigo) as Dinheiro
                  from tb_agendamento a
                      inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                      inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
                      inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                      inner join tb_status s ON a.sta_codigo = s.sta_codigo
                  where
                      1=1";

    if ($dataInicial != '' && $dataFinal != '')
      $resultDinheiro .= " AND a.age_data BETWEEN  '" . $dataInicial . "' AND '" . $dataFinal . "' ";

    if ($clientes != '')
      $resultDinheiro .= " AND c.cli_nome like '%" . $clientes . "%' ";
    if ($servicos != ' ') {
      if ($servicos != '2') {
        $resultDinheiro .= " AND t.tps_codigo <> 2 ";
      } else {
        $resultDinheiro .= " AND t.tps_codigo = '" . $servicos . "' ";
      }
    }
    if ($status != ''){
        $resultDinheiro .= " AND s.sta_codigo = '" . $status . "' ";
    }

    $resultDinheiro .= " AND a.tpg_codigo = 4 ";

    $resultDinheiro .= "order by age_data";

  $resultadoDinheiro = mysqli_query($con, $resultDinheiro);

  $resultPix = "select count(tpg_codigo) as Pix
                  from tb_agendamento a
                      inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                      inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
                      inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                      inner join tb_status s ON a.sta_codigo = s.sta_codigo
                  where
                      1=1";

    if ($dataInicial != '' && $dataFinal != '')
      $resultPix .= " AND a.age_data BETWEEN  '" . $dataInicial . "' AND '" . $dataFinal . "' ";

    if ($clientes != '')
      $resultPix .= " AND c.cli_nome like '%" . $clientes . "%' ";
    if ($servicos != ' ') {
      if ($servicos != '2') {
        $resultPix .= " AND t.tps_codigo <> 2 ";
      } else {
        $resultPix .= " AND t.tps_codigo = '" . $servicos . "' ";
      }
    }
    if ($status != ''){
        $resultPix .= " AND s.sta_codigo = '" . $status . "' ";
    }

    $resultPix .= " AND a.tpg_codigo = 5 ";

    $resultPix .= "order by age_data";

  $resultadoPix = mysqli_query($con, $resultPix);


$aux_array = [];

if (($resultadoCredito) and ($resultadoCredito->num_rows != 0) and ($resultadoDebito) and ($resultadoDebito->num_rows != 0)
and ($resultadoDinheiro) and ($resultadoDinheiro->num_rows != 0) and ($resultadoPix) and ($resultadoPix->num_rows != 0)) {

  while ($rowCredito = mysqli_fetch_assoc($resultadoCredito)) {
    while ($rowDebito = mysqli_fetch_assoc($resultadoDebito)) {
      while ($rowDinheiro = mysqli_fetch_assoc($resultadoDinheiro)) {
        while ($rowPix = mysqli_fetch_assoc($resultadoPix)) {
          $aux_array[] = [
            $rowCredito['Credito'],
            $rowDebito['Debito'],
            $rowDinheiro['Dinheiro'],
            $rowPix['Pix']
          ];
        }
      }
    }
  }

  echo json_encode($aux_array);

} else {
  $aux_array = [];
  echo json_encode($aux_array);
}
