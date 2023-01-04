<?php

require_once('../conexao/banco.php');

$clientes = filter_input(INPUT_POST, 'cliente', FILTER_UNSAFE_RAW);
$genero = filter_input(INPUT_POST, 'genero', FILTER_UNSAFE_RAW);
$dataNascInicial = filter_input(INPUT_POST, 'dataNascInicial');
$dataNascFinal = filter_input(INPUT_POST, 'dataNascFinal');
$dataIncluInicial = filter_input(INPUT_POST, 'dataIncluInicial');
$dataIncluFinal = filter_input(INPUT_POST, 'dataIncluFinal');

  $result = "select *, date_format(cli_data_nascimento,'%d/%m/%Y') as data_nascimento,
                          date_format(cli_data_inclusao,'%d/%m/%Y') as data_inclusao
                  from tb_cliente c
                  where
                    1=1";

  if ($dataIncluInicial != '' && $dataIncluFinal != '')
    $result .= " AND c.cli_data_inclusao BETWEEN  '" . $dataIncluInicial . "' AND '" . $dataIncluFinal . "' ";

  if ($dataNascInicial != '' && $dataNascFinal != '')
    $result .= " AND c.cli_data_nascimento BETWEEN  '" . $dataNascInicial . "' AND '" . $dataNascFinal . "' ";

  if ($clientes != '')
    $result .= " AND c.cli_nome like '%" . $clientes . "%' ";

  if ($genero != '')
    $result .= " AND c.cli_sexo like '%" . $genero . "%' ";

$resultado = mysqli_query($con, $result);

if (($resultado) and ($resultado->num_rows != 0)) {
  $aux_array = [];
  while ($row = mysqli_fetch_assoc($resultado)) {
    if ($row['cli_sexo'] == 'F') $row['cli_sexo'] = 'Feminino';
    else if ($row['cli_sexo'] == 'M') $row['cli_sexo'] = 'Masculino';
    else if ($row['cli_sexo'] == 'N') $row['cli_sexo'] = 'Não Binário';
    else if ($row['cli_sexo'] == 'O') $row['cli_sexo'] = 'Outro';
    else if ($row['cli_sexo'] == 'I') $row['cli_sexo'] = 'Não Informado';

    $dateOfBirth = $row['cli_data_nascimento'];
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    //echo $diff->format('%y');

    $aux_array[] = [
      $row['cli_codigo'],
      $row['cli_nome'],
      $row['data_nascimento'],
      $diff->format('%y'),
      $row['cli_sexo'],
      $row['data_inclusao'],
      $row['cli_celular'],
      $row['cli_email']
    ];
  }
  echo json_encode($aux_array);
} else {
  $aux_array = [];
  echo json_encode($aux_array);
}
