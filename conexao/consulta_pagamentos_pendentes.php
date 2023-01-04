<?php

require_once('../conexao/banco.php');

$sql2 = "select * from tb_agendamento a
            inner join tb_tiposervico t on (a.tps_codigo = t.tps_codigo)
            inner join tb_status s on (a.sta_codigo = s.sta_codigo)
            inner join tb_profissional pr on (t.prf_codigo = pr.prf_codigo)
            inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
            inner join tb_tipopgto tp on (a.tpg_codigo = tp.tpg_codigo)
        where a.tpg_codigo=6 and a.sta_codigo = 2";

$sql2 = mysqli_query($con, $sql2) or die("Erro na sql!");

$total2 = mysqli_num_rows($sql2);
