<?php

require_once('../../conexao/banco.php');

$clientes = filter_input(INPUT_POST, 'cliente', FILTER_UNSAFE_RAW);
$servicos = filter_input(INPUT_POST, 'servico', FILTER_UNSAFE_RAW);
$status = filter_input(INPUT_POST, 'status', FILTER_UNSAFE_RAW);
$dataInicial = filter_input(INPUT_POST, 'dataInicial');
$dataFinal = filter_input(INPUT_POST, 'dataFinal');


$resultMasculino = "select count(cli_sexo) as masculino
              from tb_agendamento a
                  inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                  inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
                  inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                  inner join tb_status s ON a.sta_codigo = s.sta_codigo
                  inner join tb_tipopgto tp ON a.tpg_codigo = tp.tpg_codigo
              where
                  1=1";

  if ($dataInicial != '' && $dataFinal != '')
    $resultMasculino .= " AND a.age_data BETWEEN  '" . $dataInicial . "' AND '" . $dataFinal . "' ";

  if ($clientes != '')
    $resultMasculino .= " AND c.cli_nome like '%" . $clientes . "%' ";
  if ($servicos != ' ') {
    if ($servicos != '2') {
      $resultMasculino .= " AND t.tps_codigo <> 2 ";
    } else {
      $resultMasculino .= " AND t.tps_codigo = '" . $servicos . "' ";
    }
  }
  if ($status != ''){
      $resultMasculino .= " AND s.sta_codigo = '" . $status . "' ";
  }

  $resultMasculino .= " AND c.cli_sexo LIKE 'M' ";

  $resultMasculino .= "order by age_data";

$resultadoMasculino = mysqli_query($con, $resultMasculino);

$resultFeminino = "select count(cli_sexo) as feminino
              from tb_agendamento a
                  inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                  inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
                  inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                  inner join tb_status s ON a.sta_codigo = s.sta_codigo
                  inner join tb_tipopgto tp ON a.tpg_codigo = tp.tpg_codigo
              where
                  1=1";

  if ($dataInicial != '' && $dataFinal != '')
    $resultFeminino .= " AND a.age_data BETWEEN  '" . $dataInicial . "' AND '" . $dataFinal . "' ";

  if ($clientes != '')
    $resultFeminino .= " AND c.cli_nome like '%" . $clientes . "%' ";
  if ($servicos != ' ') {
    if ($servicos != '2') {
      $resultFeminino .= " AND t.tps_codigo <> 2 ";
    } else {
      $resultFeminino .= " AND t.tps_codigo = '" . $servicos . "' ";
    }
  }
  if ($status != ''){
      $resultFeminino .= " AND s.sta_codigo = '" . $status . "' ";
  }

  $resultFeminino .= " AND c.cli_sexo LIKE 'F' ";



  $resultFeminino .= "order by age_data";

$resultadoFeminino = mysqli_query($con, $resultFeminino);

$resultNaoBinario = "select count(cli_sexo) as NaoBinario
              from tb_agendamento a
                  inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                  inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
                  inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                  inner join tb_status s ON a.sta_codigo = s.sta_codigo
                  inner join tb_tipopgto tp ON a.tpg_codigo = tp.tpg_codigo
              where
                  1=1";

  if ($dataInicial != '' && $dataFinal != '')
    $resultNaoBinario .= " AND a.age_data BETWEEN  '" . $dataInicial . "' AND '" . $dataFinal . "' ";

  if ($clientes != '')
    $resultNaoBinario .= " AND c.cli_nome like '%" . $clientes . "%' ";
  if ($servicos != ' ') {
    if ($servicos != '2') {
      $resultNaoBinario .= " AND t.tps_codigo <> 2 ";
    } else {
      $resultNaoBinario .= " AND t.tps_codigo = '" . $servicos . "' ";
    }
  }
  if ($status != ''){
      $resultNaoBinario .= " AND s.sta_codigo = '" . $status . "' ";
  }

  $resultNaoBinario .= " AND c.cli_sexo LIKE 'N' ";



  $resultNaoBinario .= "order by age_data";

$resultadoNaoBinario = mysqli_query($con, $resultNaoBinario);

$resultOutro = "select count(cli_sexo) as Outro
              from tb_agendamento a
                  inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                  inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
                  inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                  inner join tb_status s ON a.sta_codigo = s.sta_codigo
                  inner join tb_tipopgto tp ON a.tpg_codigo = tp.tpg_codigo
              where
                  1=1";

  if ($dataInicial != '' && $dataFinal != '')
    $resultOutro .= " AND a.age_data BETWEEN  '" . $dataInicial . "' AND '" . $dataFinal . "' ";

  if ($clientes != '')
    $resultOutro .= " AND c.cli_nome like '%" . $clientes . "%' ";
  if ($servicos != ' ') {
    if ($servicos != '2') {
      $resultOutro .= " AND t.tps_codigo <> 2 ";
    } else {
      $resultOutro .= " AND t.tps_codigo = '" . $servicos . "' ";
    }
  }
  if ($status != ''){
      $resultOutro .= " AND s.sta_codigo = '" . $status . "' ";
  }

  $resultOutro .= " AND c.cli_sexo LIKE 'O' ";

  $resultOutro .= "order by age_data";

$resultadoOutro = mysqli_query($con, $resultOutro);

$resultNaoInformado = "select count(cli_sexo) as NaoInformado
              from tb_agendamento a
                  inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                  inner join tb_tiposervico t on a.tps_codigo = t.tps_codigo
                  inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                  inner join tb_status s ON a.sta_codigo = s.sta_codigo
                  inner join tb_tipopgto tp ON a.tpg_codigo = tp.tpg_codigo
              where
                  1=1";

  if ($dataInicial != '' && $dataFinal != '')
    $resultNaoInformado .= " AND a.age_data BETWEEN  '" . $dataInicial . "' AND '" . $dataFinal . "' ";

  if ($clientes != '')
    $resultNaoInformado .= " AND c.cli_nome like '%" . $clientes . "%' ";
  if ($servicos != ' ') {
    if ($servicos != '2') {
      $resultNaoInformado .= " AND t.tps_codigo <> 2 ";
    } else {
      $resultNaoInformado .= " AND t.tps_codigo = '" . $servicos . "' ";
    }
  }
  if ($status != ''){
      $resultNaoInformado .= " AND s.sta_codigo = '" . $status . "' ";
  }

  $resultNaoInformado .= " AND c.cli_sexo LIKE 'I' ";

  $resultNaoInformado .= "order by age_data";

$resultadoNaoInformado = mysqli_query($con, $resultNaoInformado);

$aux_array = [];

if (($resultadoMasculino) and ($resultadoMasculino->num_rows != 0) and ($resultadoFeminino) and ($resultadoFeminino->num_rows != 0)
and ($resultadoNaoBinario) and ($resultadoNaoBinario->num_rows != 0) and ($resultadoOutro) and ($resultadoOutro->num_rows != 0)
and ($resultadoNaoInformado) and ($resultadoNaoInformado->num_rows != 0)) {

  while ($rowMasculino = mysqli_fetch_assoc($resultadoMasculino)) {
    while ($rowFeminino = mysqli_fetch_assoc($resultadoFeminino)) {
      while ($rowNaoBinario = mysqli_fetch_assoc($resultadoNaoBinario)) {
        while ($rowOutro = mysqli_fetch_assoc($resultadoOutro)) {
          while ($rowNaoInformado = mysqli_fetch_assoc($resultadoNaoInformado)) {
            $aux_array[] = [
              $rowMasculino['masculino'],
              $rowFeminino['feminino'],
              $rowNaoBinario['NaoBinario'],
              $rowOutro['Outro'],
              $rowNaoInformado['NaoInformado']
            ];
          }
        }
      }
    }
  }
  echo json_encode($aux_array);
} else {
  $aux_array = [];
  echo json_encode($aux_array);
}
