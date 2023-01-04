<?PHP

require_once('../conexao/banco.php');



$id = $_REQUEST['tps_codigo'];



$sql = "delete from tb_tiposervico where tps_codigo = '$id'";



mysqli_query($con, $sql) or die ("Erro na sql!") ;



header("Location: consulta_servicos.php");



?>





