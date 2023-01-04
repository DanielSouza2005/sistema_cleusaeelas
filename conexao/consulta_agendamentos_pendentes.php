<?php

require_once('../conexao/banco.php');

$sql = "select * from tb_agendamento a
            inner join tb_tiposervico t on (a.tps_codigo = t.tps_codigo)
            inner join tb_status s on (a.sta_codigo = s.sta_codigo)
            inner join tb_profissional pr on (t.prf_codigo = pr.prf_codigo)
            inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
        where a.sta_codigo = 4 and a.tpg_codigo = 6";

$sql = mysqli_query($con, $sql) or die("Erro na sql!");

$total = mysqli_num_rows($sql);

?>