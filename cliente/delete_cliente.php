<?PHP
require_once('../conexao/banco.php');

$id = $_REQUEST['cli_codigo'];

$sql = "delete from tb_cliente where cli_codigo = '$id'";

mysqli_query($con, $sql) or die ("Erro na sql!") ;

header("Location: consulta_cliente.php");

?>


