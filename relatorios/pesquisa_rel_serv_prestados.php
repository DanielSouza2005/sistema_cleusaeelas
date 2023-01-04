<?php

require_once('../conexao/banco.php');

$clientes = filter_input(INPUT_POST, 'cliente', FILTER_UNSAFE_RAW);
$servicos = filter_input(INPUT_POST, 'servico', FILTER_UNSAFE_RAW);
$status = filter_input(INPUT_POST, 'status', FILTER_UNSAFE_RAW);
$dataInicial = filter_input(INPUT_POST, 'dataInicial');
$dataFinal = filter_input(INPUT_POST, 'dataFinal');


  $result = "select *,  date_format(age_data,'%d/%m/%Y') as data
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

  $result .= "order by age_data";

$resultado = mysqli_query($con, $result);

if (($resultado) and ($resultado->num_rows != 0)) {
  $aux_array = [];
  while ($row = mysqli_fetch_assoc($resultado)) {
    if($row['cli_sexo'] == 'F') $row['cli_sexo'] = 'Feminino';
    else if($row['cli_sexo'] == 'M') $row['cli_sexo'] = 'Masculino';
    else if($row['cli_sexo'] == 'N') $row['cli_sexo'] = 'Não Binário';
    else if($row['cli_sexo'] == 'O') $row['cli_sexo'] = 'Outro';
    else if($row['cli_sexo'] == 'I') $row['cli_sexo'] = 'Não Informado';

    $aux_array[] = [
      $row['age_codigo'],
      $row['cli_nome'],
      $row['cli_sexo'],
      $row['tps_descricao'],
      $row['age_especificacao'],
      $row['data'],
      number_format($row['age_preco'], 2, ',', ''),
      $row['sta_descricao'],
      $row['tpg_descricao']
    ];
    /*echo "
      <tr>
        <td> '" . str_replace("'", "", $row['age_codigo']) . "'</td>
        <td> '" . $row['cli_nome'] . "'</td>
        <td> '" . $row['tps_descricao'] . "'</td>
        <td> '" . $row['age_especificacao'] . "'</td>
        <td> '" . $row['data'] . "'</td>
        <td> '" . substr($row['hor_horario'], 0, -9) . "'</td>
        <td> '" . number_format($row['age_preco'], 2, ',', '') . "'</td>
        <td> '" . $row['sta_descricao'] . "'</td>
        <td> '" . $row['tpg_descricao'] . "'</td>
      </tr>
      "; */
  }
  echo json_encode($aux_array);
} else {
  $aux_array = [];
  echo json_encode($aux_array);
}
