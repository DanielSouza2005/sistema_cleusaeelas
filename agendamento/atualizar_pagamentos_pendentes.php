<?PHP
require_once('../conexao/banco.php');

print_r($_POST);
echo '<br><br><br>';
foreach ($_POST['id_pagamento'] as $id) {
	//COMANDO SQL AQUI DE TROCA DE TIPO DE PAGAMENTO	
	$status = $_POST['status_pagamento'][$id];
	$tipo_pagto = $_POST['valor_pagamento'][$id];
	

	$sql = "update tb_agendamento set
					 	tpg_codigo = '$tipo_pagto',
						sta_codigo = '$status'
					where
						age_codigo = '$id'";

	mysqli_query($con, $sql) or die("Erro na sql!");
}

header("Location: consulta_agendamento.php");
