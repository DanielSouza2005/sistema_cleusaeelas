<?php

require_once('../conexao/bancoPDO.php');

$query_events = "select * from tb_agendamento a
                        inner join tb_tiposervico t on (a.tps_codigo = t.tps_codigo)
                        inner join tb_tipopgto tp on (a.tpg_codigo = tp.tpg_codigo)
                        inner join tb_status s on (a.sta_codigo = s.sta_codigo)
                        inner join tb_profissional pr on (t.prf_codigo = pr.prf_codigo)
                        inner join tb_cliente c on (a.cli_codigo = c.cli_codigo)
                        inner join tb_horario h ON a.hor_codigo = h.hor_codigo
                    where
                        a.sta_codigo <> 3";

$resultado_events = $conn->prepare($query_events);
$resultado_events->execute();

$agendamentos = [];

while ($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)) {
  $id = $row_events['age_codigo'];

  $extendedProps['tps_codigo'] = $row_events['tps_codigo'];
  $extendedProps['tps_descricao'] = $row_events['tps_descricao'];
  $title = $row_events['tps_descricao'];

  $color = $row_events['sta_cor'];

  $start = $row_events['age_data'] . ' ' . substr($row_events['hor_horario'], 0, -9);
  $extendedProps['hor_codigo'] = $row_events['hor_codigo'];
  $extendedProps['hor_horario'] = substr($row_events['hor_horario'], 0, -9);

  $extendedProps['cli_codigo'] = $row_events['cli_codigo'];
  $extendedProps['cliente'] = $row_events['cli_nome'];

  $extendedProps['especificacao'] = $row_events['age_especificacao'];

  $extendedProps['preco'] = number_format($row_events['age_preco'], 2, ',', '');

  if ($row_events['sta_codigo'] == 2) {
    $extendedProps['status'] = "Confirmado";
    $extendedProps['sta_valor'] = 2;
  } else if ($row_events['sta_codigo'] == 3) {
    $extendedProps['status'] = "Desmarcado";
    $extendedProps['sta_valor'] = 3;
  } else if ($row_events['sta_codigo'] == 4) {
    $extendedProps['status'] = "Pendente";
    $extendedProps['sta_valor'] = 4;
  } else if ($row_events['sta_codigo'] == 1) {
    $extendedProps['status'] = "Realizado";
    $extendedProps['sta_valor'] = 1;
  }

  $extendedProps['tipopgto'] = $row_events['tpg_descricao'];
  $extendedProps['tpg_codigo'] = $row_events['tpg_codigo'];


  $agendamentos[] = [
    'id' => $id,
    'title' => $title,
    'color' => $color,
    'start' => $start,
    'extendedProps' => $extendedProps
    //'end' => $end
  ];
}

echo json_encode($agendamentos);
