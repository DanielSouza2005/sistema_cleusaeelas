<?php
//$session_start();
require_once('../conexao/banco.php');

$cliente = $_REQUEST['txt_cliente'];
$tipo_servico = $_REQUEST['txt_tiposervico'];
$especificacao = $_REQUEST['txt_especificacao'];
$preco = str_replace(",", ".", $_REQUEST['txt_preco']);
$data = $_REQUEST['txt_data'];
$horario = $_REQUEST['txt_horario'];
$status = $_REQUEST['txt_status'];
$tipo_pagamento = $_REQUEST['txt_tipopgto'];

//$horarioCompleto = $data . ' ' . $horario;


$sql = "insert into tb_agendamento (cli_codigo, tps_codigo, age_especificacao, age_preco,
            age_data, hor_codigo, sta_codigo, tpg_codigo)
        values ('$cliente', '$tipo_servico', '$especificacao', '$preco', '$data', '$horario',
            '$status', '$tipo_pagamento')";

mysqli_query($con, $sql) or die("Erro na sql!");

header("Location: consulta_agendamento.php");

/*$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$cad = false;
if ($cad) {
    $retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">
    Agendamento cadastrado com sucesso! </div>'];
    $_session['msg'] ='<div class="alert alert-success" role="alert">
    Agendamento cadastrado com sucesso! </div>';
} else {
    $retorna = ['sit' => true, 'msg' => '<div class="alert alert-danger" role="alert">
    Agendamento não cadastrado com sucesso :( </div>'];
}



header('Content-Type: application/json');
echo json_encode($retorna); */
