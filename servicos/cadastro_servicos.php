<?PHP



require_once('../conexao/banco.php');



$descricao = $_REQUEST['txt_descricao'];
$profissional = $_REQUEST['txt_profissional'];


$sql = "insert into tb_tiposervico (tps_descricao, prf_codigo) 

								values ('$descricao', '$profissional')";



mysqli_query($con, $sql) or die ("Erro na sql!") ;



header("Location: consulta_servicos.php");



?>





