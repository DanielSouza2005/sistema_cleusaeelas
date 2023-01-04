<?php

require_once('../../conexao/banco.php');

$clientes = filter_input(INPUT_POST, 'cliente', FILTER_UNSAFE_RAW);
$genero = filter_input(INPUT_POST, 'genero', FILTER_UNSAFE_RAW);
$dataNascInicial = filter_input(INPUT_POST, 'dataNascInicial');
$dataNascFinal = filter_input(INPUT_POST, 'dataNascFinal');
$dataIncluInicial = filter_input(INPUT_POST, 'dataIncluInicial');
$dataIncluFinal = filter_input(INPUT_POST, 'dataIncluFinal');

if($genero == 'M' ||  $genero == ''){
  $resultMasculino = "select count(cli_sexo) as masculino
                      from tb_cliente c
                      where
                        1=1";

  if ($dataNascInicial != '' && $dataNascFinal != '')
    $resultMasculino .= " AND c.cli_data_nascimento BETWEEN  '" . $dataNascInicial . "' AND '" . $dataNascFinal . "' ";

  if ($dataIncluInicial != '' && $dataIncluFinal != '')
    $resultMasculino .= " AND c.cli_data_inclusao BETWEEN  '" . $dataIncluInicial . "' AND '" . $dataIncluFinal . "' ";

  if ($clientes != '')
    $resultMasculino .= " AND c.cli_nome like '%" . $clientes . "%' ";

  $resultMasculino .= " AND c.cli_sexo LIKE 'M' ";
} else {
  $resultMasculino = "SELECT 0 as masculino";
}

$resultadoMasculino = mysqli_query($con, $resultMasculino);

if($genero == 'F' ||  $genero == ''){
  $resultFeminino = "select count(cli_sexo) as feminino
                      from tb_cliente c
                      where
                      1=1";

  if ($dataNascInicial != '' && $dataNascFinal != '')
  $resultFeminino .= " AND c.cli_data_nascimento BETWEEN  '" . $dataNascInicial . "' AND '" . $dataNascFinal . "' ";

  if ($dataIncluInicial != '' && $dataIncluFinal != '')
  $resultFeminino .= " AND c.cli_data_inclusao BETWEEN  '" . $dataIncluInicial . "' AND '" . $dataIncluFinal . "' ";

  if ($clientes != '')
  $resultFeminino .= " AND c.cli_nome like '%" . $clientes . "%' ";

  $resultFeminino .= " AND c.cli_sexo LIKE 'F' ";
} else{
  $resultFeminino = "SELECT 0 as feminino";
}

$resultadoFeminino = mysqli_query($con, $resultFeminino);

if($genero == 'N' ||  $genero == ''){
  $resultNaoBinario = "select count(cli_sexo) as NaoBinario
                        from tb_cliente c
                        where
                        1=1";

  if ($dataNascInicial != '' && $dataNascFinal != '')
  $resultNaoBinario .= " AND c.cli_data_nascimento BETWEEN  '" . $dataNascInicial . "' AND '" . $dataNascFinal . "' ";

  if ($dataIncluInicial != '' && $dataIncluFinal != '')
  $resultNaoBinario .= " AND c.cli_data_inclusao BETWEEN  '" . $dataIncluInicial . "' AND '" . $dataIncluFinal . "' ";

  if ($clientes != '')
  $resultNaoBinario .= " AND c.cli_nome like '%" . $clientes . "%' ";

  $resultNaoBinario .= " AND c.cli_sexo LIKE 'N' ";
} else{
  $resultNaoBinario = "SELECT 0 as NaoBinario";
}

$resultadoNaoBinario = mysqli_query($con, $resultNaoBinario);

if($genero == 'O' ||  $genero == ''){
  $resultOutro = "select count(cli_sexo) as Outro
                    from tb_cliente c
                    where
                    1=1";

  if ($dataNascInicial != '' && $dataNascFinal != '')
  $resultOutro .= " AND c.cli_data_nascimento BETWEEN  '" . $dataNascInicial . "' AND '" . $dataNascFinal . "' ";

  if ($dataIncluInicial != '' && $dataIncluFinal != '')
  $resultOutro .= " AND c.cli_data_inclusao BETWEEN  '" . $dataIncluInicial . "' AND '" . $dataIncluFinal . "' ";

  if ($clientes != '')
  $resultOutro .= " AND c.cli_nome like '%" . $clientes . "%' ";

  $resultOutro .= " AND c.cli_sexo LIKE 'O' ";

} else {
  $resultOutro = "SELECT 0 as Outro";
}

$resultadoOutro = mysqli_query($con, $resultOutro);

if($genero == 'I' ||  $genero == ''){
  $resultNaoInformado = "select count(cli_sexo) as NaoInformado
                          from tb_cliente c
                          where
                          1=1";

  if ($dataNascInicial != '' && $dataNascFinal != '')
  $resultNaoInformado .= " AND c.cli_data_nascimento BETWEEN  '" . $dataNascInicial . "' AND '" . $dataNascFinal . "' ";

  if ($dataIncluInicial != '' && $dataIncluFinal != '')
  $resultNaoInformado .= " AND c.cli_data_inclusao BETWEEN  '" . $dataIncluInicial . "' AND '" . $dataIncluFinal . "' ";

  if ($clientes != '')
  $resultNaoInformado .= " AND c.cli_nome like '%" . $clientes . "%' ";

  $resultNaoInformado .= " AND c.cli_sexo LIKE 'I' ";

} else{
  $resultNaoInformado = "SELECT 0 as NaoInformado";
}

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
