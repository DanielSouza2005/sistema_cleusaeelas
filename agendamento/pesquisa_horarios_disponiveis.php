<?php

require_once('../conexao/bancoPDO.php');

//pesquisa os horários ja cadastrados nesse dia e nesse tipo de servico
$servicos = filter_input(INPUT_POST, 'servico', FILTER_UNSAFE_RAW);
$data = filter_input(INPUT_POST, 'data');

if ($servicos == 2) {
  /*$result = "select hor_horario, H.hor_codigo
        from tb_agendamento a
            inner join tb_horario H on A.hor_codigo <> H.hor_codigo
        where
            age_data like '%" . $data . "%'
            and a.tps_codigo = 2
            and sta_codigo IN (1, 2)
        order by hor_horario;"; */
  $result = "select hor_horario, hor_codigo
            FROM tb_horario
            WHERE NOT hor_codigo IN
            (select hor_codigo from tb_agendamento where
            age_data like '%" . $data . "%'
            and tps_codigo = 2
            and sta_codigo IN (1, 2))";
} else {
  $result = "select hor_horario, hor_codigo
    FROM tb_horario
    WHERE NOT hor_codigo IN
    (select hor_codigo from tb_agendamento where
    age_data like '%" . $data . "%'
    and tps_codigo IN (3, 4, 5, 15)
    and sta_codigo IN (1, 2))";
}



/*$result = "SELECT hor_horario

            FROM tb_agendamento A
            INNER JOIN tb_tiposervico T on A.tps_codigo = T.tps_codigo
            INNER JOIN tb_horario H ON A.hor_codigo <> H.hor_codigo
            WHERE A.age_data LIKE '%2022-10-05%'
            AND A.tps_codigo = 4";


            select hor_horario
            from tb_agendamento a
                inner join tb_tiposervico t on (a.tps_codigo = t.tps_codigo)
                inner join tb_profissional pr on (t.prf_codigo = pr.prf_codigo)
                inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                inner join tb_tipopgto tp on (a.tpg_codigo = tp.tpg_codigo)
                inner join tb_horario H on A.hor_codigo <> H.hor_codigo
            where
              age_data like '%" . $data . "%'
              and a.tps_codigo like '" . $servicos . "'
              and sta_codigo IN (1, 2)
            order by age_data;*/





//retorna os horários marcados
$result_events = $conn->prepare($result);
$result_events->execute();

$horariosDisponiveis = [];

while ($row = $result_events->fetch(PDO::FETCH_ASSOC)) {
  $horario = substr($row['hor_horario'], 0, -9);
  $id = $row['hor_codigo'];

  //print_r($row['hor_horario']);

  $horariosDisponiveis[] = [
    'horario' => $horario,
    'id' => $id
  ];
}

//print_r($horariosDisponiveis);


//retorna todos os horarios
/*$result2 = "select * from tb_horario
            order by hor_horario;";

$result2_events = $conn->prepare($result2);
$result2_events->execute();

$horariosTotais = [];

while ($rowTotal = $result2_events->fetch(PDO::FETCH_ASSOC)) {
  $horario2 = substr($rowTotal['hor_horario'], 0, -9);
  $id = $rowTotal['hor_codigo'];

  $horariosTotais[] = [
    'horario' => $horario2,
    'id' => $id
  ];
} */

//print_r($horariosTotais);

//$horariosDisponiveis = array_diff(array_map('serialize', $horariosTotais), array_map('serialize', $horariosReservados));

//print_r($horariosDisponiveis) . '</br>';

//$i = 0;
//if (sizeof($horariosDisponiveis) != 0) {
foreach ($horariosDisponiveis as $value) {
  echo "
            <option value=" . str_replace('"', "", json_encode($value['id'])) . "> " . str_replace('"', "", json_encode($value['horario'])) . "  </option>
        ";
  //$i++;
}
/*} else {
  foreach ($horariosTotais as $value){
    echo "
            <option value='" . json_encode($value['id']) . "'> " . str_replace('"', "", json_encode($value['horario']))  ."  </option>
        ";
        $i++;
  }
}*/
