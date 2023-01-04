<?PHP

session_start();

require_once("conexao/banco.php");

$nome = $_SESSION["nome"];
$senha   = $_SESSION["senha"];

$sql = "select  
			usu_login, 
			usu_senha 
		from tb_usuario
		where usu_login = '$nome' and usu_senha = '$senha'";
		
$sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;

$total = mysqli_num_rows($sql);

if ($total == 0) {
	header("Location: ../acesso_negado.php");
} 

?>




