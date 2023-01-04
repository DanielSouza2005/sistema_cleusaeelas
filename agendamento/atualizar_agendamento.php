<?PHP
require_once('../conexao/banco.php');

$id = $_REQUEST['txt_atualizar_codigo'];

$cliente = $_REQUEST['txt_atualizar_cliente'];
//$tipo_servico = $_REQUEST['txt_atualizar_tiposervico'];
//$especificacao = $_REQUEST['txt_atualizar_especificacao'];
$preco = str_replace(",", ".", $_REQUEST['txt_atualizar_preco']);
//$data = $_REQUEST['txt_atualizar_data'];
//$horario = $_REQUEST['txt_atualizar_horario'];
$status = $_REQUEST['txt_atualizar_status'];
$tipo_pagamento = $_REQUEST['txt_atualizar_tipopgto'];

//$horarioCompleto = $data . ' ' . $horario;

$sql = "update tb_agendamento set
					cli_codigo = '$cliente',
					age_preco= '$preco',
					sta_codigo = '$status',
					tpg_codigo = '$tipo_pagamento'
				where
					age_codigo = '$id'";

mysqli_query($con, $sql) or die("Erro na sql!");

header("Location: consulta_agendamento.php");

?>
