<?PHP

require_once("../conexao/banco.php");



$id = $_REQUEST['txt_codigo'];

$descricao = $_REQUEST['txt_descricao'];
$profissional = $_REQUEST['txt_profissional'];


$sql = "update tb_tiposervico set 

					tps_descricao = '$descricao', 

					prf_codigo = '$profissional'

				where 

					tps_codigo = '$id'";

								

mysqli_query($con, $sql) or die ("Erro na sql!") ;



header("Location: consulta_servicos.php");

?>