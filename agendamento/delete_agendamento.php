<?PHP
require_once('../conexao/bancoPDO.php');

$id = filter_input(INPUT_GET, 'age_codigo', FILTER_SANITIZE_NUMBER_INT);

$query_event = "delete from tb_agendamento where age_codigo=:age_codigo";
$delete_event = $conn->prepare($query_event);

$delete_event->bindParam("age_codigo", $id);
$delete_event->execute();
    
header("Location: consulta_agendamento.php");
