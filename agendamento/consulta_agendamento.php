<?php

require_once('../seguranca.php');

//session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agendamentos | Visão Geral</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="../plugins/fullcalendar/main.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">

  <link href="../dist/img/favicon.png" rel="icon">

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body class="hold-transition sidebar-mini">
  <!-- Navbar -->
  <?php
  include('../pages/cabecalho.php')
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
  include('../pages/menu.php')
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Calendário&nbsp;
              <a href="#" id="btn_filtros">
                <ion-icon name="filter-outline"></ion-icon>
              </a>
            </h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Visão Geral</a></li>
              <li class="breadcrumb-item active">Agendamentos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <span id="msg_alerta"></span>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Cadastros</h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
                    <button class="btn btn-info" id="btn_cad_cliente" data-toggle="modal" data-target="#form_cliente" style="width: 100%; font-weight: 600; text-align: left; margin-bottom: 4px; ">
                      Clientes
                    </button>
                    <button class="btn btn-success" id="btn_cad_agendamento" data-toggle="modal" data-target="#cadastrar" style="width: 100%; font-weight: 600; text-align: left; margin-bottom: 4px; ">
                      Agendamentos
                    </button>

                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <div class="mb-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Pendências</h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
                    <button class="btn btn-danger" id="btn_pagamentos" data-toggle="modal" data-target="#pagamentos" style="width: 100%; font-weight: 600; text-align: left; margin-bottom: 4px; ">
                      Geral
                    </button>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
  include('../pages/rodape.php')
  ?>

  <!-- Control Sidebar -->
  <?php
  include('../pages/config.php')
  ?>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <?php
  include('filtros_agendamento.php');
  ?>

  <?php
  include('pagamentos_pendentes.php');
  ?>

  <?php
  include('form_atualizar_agendamento.php');
  ?>

  <?php
  include('form_agendamento.php');
  ?>

  <?php
  include('form_cadastro_cliente.php');
  ?>



  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery UI -->
  <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- fullCalendar 2.2.5 -->
  <script src="../plugins/moment/moment.min.js"></script>
  <script src="../plugins/fullcalendar/main.js"></script>
  <script src="../plugins/fullcalendar/locales/pt-br.js"></script>
  <!-- jquery-validation -->
  <script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="../plugins/jquery-validation/additional-methods.min.js"></script>
  <!-- Select2 -->
  <script src="../plugins/select2/js/select2.full.min.js"></script>
  <!-- Bootstrap4 Duallistbox -->
  <script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
  <!-- InputMask -->
  <script src="../plugins/moment/moment.min.js"></script>
  <script src="../plugins/inputmask/jquery.inputmask.min.js"></script>
  <!-- date-range-picker -->
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- BS-Stepper -->
  <script src="../plugins/bs-stepper/js/bs-stepper.min.js"></script>
  <!-- bootstrap color picker -->
  <script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Bootstrap Switch -->
  <script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <!-- dropzonejs -->
  <script src="../plugins/dropzone/min/dropzone.min.js"></script>

  <script>
    function foco() {
      $('#txt_cliente').select2('focus');
    }

    function limpa_dados() {
      $('#cadastrar #txt_cliente').select2("val", " ");
      $('#cadastrar #txt_tiposervico').val(' ');
      $('#cadastrar #txt_especificacao').val(' ');
      $('#cadastrar #txt_preco').val('');
      //document.frm_agendamento.txt_data.value == "";
      $('#cadastrar #txt_horario').val('');
      $('#cadastrar #txt_status').val('2');
      $('#cadastrar #txt_tipopgto').val('6');
    }

    function validar_dados() {

      if (document.frm_agendamento.txt_cliente.value == " ") {
        alert("Você deve preencher o campo Cliente!");
        document.frm_agendamento.txt_cliente.focus();

        return false;
      }
      if (document.frm_agendamento.txt_tiposervico.value == " ") {
        alert("Você deve preencher o campo Tipo de Serviço!");
        document.frm_agendamento.txt_tiposervico.focus();

        return false;
      }
      if (document.frm_agendamento.txt_especificacao.value == " ") {
        alert("Você deve preencher o campo Descrição!");
        document.frm_agendamento.txt_especificacao.focus();

        return false;
      }
      if (document.frm_agendamento.txt_preco.value == "") {
        alert("Você deve preencher o campo Preço!");
        document.frm_agendamento.txt_preco.focus();

        return false;
      }
      if (document.frm_agendamento.txt_data.value == "") {
        alert("Você deve preencher o campo Data!");
        document.frm_agendamento.txt_data.focus();

        return false;
      }
      if (document.frm_agendamento.txt_horario.value == "") {
        alert("Você deve preencher o campo Horário!");
        document.frm_agendamento.txt_horario.focus();

        return false;
      }
      if (document.frm_agendamento.txt_status.value == "Selecione o Status...") {
        alert("Você deve preencher o campo Status!");
        document.frm_agendamento.txt_status.focus();

        return false;
      }
      if (document.frm_agendamento.txt_tipopgto.value == " ") {
        alert("Você deve preencher o campo Tipo de Pagamento!");
        document.frm_agendamento.txt_tipopgto.focus();

        return false;
      }

      /*var data = document.getElementById('txt_data').value;
      var horario = document.getElementById('txt_horario').value;
      var dataDigitada = new Date(data + ' ' + horario);
      var dataAtual = new Date();

      //valida se o agendamento é menor que dia atual
      if (new Date(dataDigitada).getTime() < new Date(dataAtual).getTime()) {

        alert("O dia deve ser igual ou posterior ao dia de hoje!");
        document.frm_agendamento.txt_data.focus();

        return false;
      } */
    }

    function valida_horario() {
      if (document.frm_agendamento.txt_tiposervico.value == "") {
        alert("Você deve preencher o campo Tipo de Serviço!");
        document.frm_agendamento.txt_tiposervico.focus();
        //e.preventDefault();

        return false;
      }
      if (document.frm_agendamento.txt_data.value == "") {
        alert("Você deve preencher o campo Data!");
        document.frm_agendamento.txt_data.focus();
        //e.preventDefault();

        return false;
      }
    }

    function valida_horario_atualizar() {
      if (document.frm_agendamento.txt_atualizar_tiposervico.value == "") {
        alert("Você deve preencher o campo Tipo de Serviço!");
        document.frm_agendamento.txt_tiposervico.focus();
        //e.preventDefault();

        return false;
      }
      if (document.frm_agendamento.txt_atualizar_data.value == "") {
        alert("Você deve preencher o campo Data!");
        document.frm_agendamento.txt_data.focus();
        //e.preventDefault();

        return false;
      }
    }

    function validar_dados_atualizar() {
      if ($('#atualizar #txt_atualizar_cliente').val() === " ") {
        alert("Você deve preencher o campo Cliente!");
        $('#atualizar #txt_atualizar_cliente').focus();

        return false;
      }
      if ($('#atualizar #txt_atualizar_tiposervico').val() === " ") {
        alert("Você deve preencher o campo Tipo de Serviço!");
        $('#atualizar #txt_atualizar_tiposervico').focus();

        return false;
      }
      if ($('#atualizar #txt_atualizar_preco').val() === "") {
        alert("Você deve preencher o campo Preço!");
        $('#atualizar #txt_atualizar_preco').focus();

        return false;
      }
      if ($('#atualizar #txt_atualizar_data').val() === "") {
        alert("Você deve preencher o campo Data!");
        $('#atualizar #txt_atualizar_data').focus();

        return false;
      }
      if ($('#atualizar #txt_atualizar_horario').val() === " ") {
        alert("Você deve preencher o campo Horário!");
        $('#atualizar #txt_atualizar_horario').focus();

        return false;
      }
      if ($('#atualizar #txt_atualizar_status').val() === " ") {
        alert("Você deve preencher o campo Status!");
        $('#atualizar #txt_atualizar_status').focus();

        return false;
      }
      if ($('#atualizar #txt_atualizar_tipopgto').val() === " ") {
        alert("Você deve preencher o campo Tipo de Pagamento!");
        $('#atualizar #txt_atualizar_tipopgto').focus();

        return false;
      }

    }

    function validar_dados_cliente() {

      if (document.frm_cad_cliente.txt_nome.value == "") {
        alert("Você deve preencher o campo Nome!");
        document.frm_cad_cliente.txt_nome.focus();

        return false;
      }
      if (document.frm_cad_cliente.txt_celular.value == "") {
        alert("Você deve preencher o campo Celular!");
        document.frm_cad_cliente.txt_celular.focus();

        return false;
      }

      if (document.frm_cad_cliente.txt_sexo.value == "") {
        alert("Você deve preencher o campo Sexo!");
        document.frm_cad_cliente.txt_sexo.focus();

        return false;
      }

      if (document.frm_cad_cliente.txt_data_nascimento.value == "") {
        alert("Você deve preencher o campo Data de Nascimento!");
        document.frm_cad_cliente.txt_data_nascimento.focus();

        return false;
      }


    }
  </script>
  <script type="text/javascript">
    function excluir_registro() {
      if (!confirm('Deseja realmente apagar este agendamento?')) {
        if (window.event)
          window.event.returnValue = false;
        else
          e.preventDefault();
      }
    }
  </script>

  <script type="text/javascript">
    $('#btn_pagamentos').on("click", function() {
      $.post('consultar_pagamentos_pendentes.php', function(retorna) {
        $('.resultado_pesquisa_pagamentos').html(retorna);
      });
      //$('#pagamentos #txt_atualizar_cliente_pendente_pesquisar').focus();
    });


    $('#pagamentos').on('shown.bs.modal', function() {
      $('#txt_atualizar_cliente_pendente_pesquisar').focus();
      //$('#btn_finalizar').formAction = "atualizar_pagamentos_pendentes.php";
    });

    $('#btn_filtros').on('click', function() {
      $('#filtros').modal('show');
      //$('#btn_finalizar').formAction = "atualizar_pagamentos_pendentes.php";
    });

    function pesquisaPagtoPendente() {
      var pesquisaCliente = $('#txt_atualizar_cliente_pendente_pesquisar').val();
      var pesquisaServicos = $('#txt_atualizar_servico_pendente_pesquisar').val();
      var pesquisaDataInicial = $('#txt_atualizar_data1_pendente_pesquisar').val();
      var pesquisaDataFinal = $('#txt_atualizar_data2_pendente_pesquisar').val();

      if (pesquisaCliente != '' || pesquisaServico != '' || pesquisaDataInicial != '' || pesquisaDataFinal != '') {
        var dados = {
          cliente: pesquisaCliente,
          servico: pesquisaServicos,
          dataInicial: pesquisaDataInicial,
          dataFinal: pesquisaDataFinal
        }
        $.post('pesquisa_pagamentos_pendentes.php', dados, function(retorna) {
          $('.resultado_pesquisa_pagamentos').html(retorna);
        })
      }
    }

    function pesquisaHorariosDisponiveis() {
      var pesquisaServico = $('#txt_tiposervico').val();
      var pesquisaData = $('#txt_data').val();

      if (pesquisaServico != '' && pesquisaData != '') {
        var dados = {
          servico: pesquisaServico,
          data: pesquisaData
        }
        //console.log(dados);
        $.post('pesquisa_horarios_disponiveis.php', dados, function(retorna) {
          $('.resultado_horarios').html(retorna);
        })
      }
    }

    function pesquisaAgendamentosFiltrados() {
      var pesquisaServicosFiltrados = $('#txt_filtro_servico').val();
      var pesquisaStatusFiltrados = $('#txt_filtro_status').val();

      if (pesquisaServicosFiltrados != '' || pesquisaStatusFiltrados != '') {
        var dados = {
          servicos: pesquisaServicosFiltrados,
          status: pesquisaStatusFiltrados
        }
        console.log(dados);
        $.post('pesquisa_filtros_agendamentos.php', dados, function(retorna) {
          //$('.resultado_horarios').html(retorna);
          //console.log(retorna);
          aux_data = JSON.parse(retorna);
          /*$('#calendar').fullCalendar({
            events: 'pesquisa_filtros_agendamentos.php'
          });
          fullCalendar.render(); */
          $(function() {

            /* initialize the external events
             -----------------------------------------------------------------*/
            function ini_events(ele) {
              ele.each(function() {

                // create an Event Object (https://fullcalendar.io/docs/event-object)
                // it doesn't need to have a start or end
                var eventObject = {
                  title: $.trim($(this).text()) // use the element's text as the event title
                }

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject)

                // make the event draggable using jQuery UI
                $(this).draggable({
                  zIndex: 1070,
                  revert: true, // will cause the event to go back to its
                  revertDuration: 0 //  original position after the drag
                })

              })
            }

            ini_events($('#external-events div.external-event'))

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d = date.getDate(),
              m = date.getMonth(),
              y = date.getFullYear()

            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;

            var containerEl = document.getElementById('external-events');
            var checkbox = document.getElementById('drop-remove');
            var calendarEl = document.getElementById('calendar');

            // initialize the external events
            // -----------------------------------------------------------------

            new Draggable(containerEl, {
              itemSelector: '.external-event',
              eventData: function(eventEl) {
                return {
                  title: eventEl.innerText,
                  backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                  borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                  textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                };
              }
            });

            var calendar = new Calendar(calendarEl, {
              locale: 'pt-br',
              headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
              },
              themeSystem: 'bootstrap',
              events: aux_data,
              editable: true,
              droppable: false, // this allows things to be dropped onto the calendar !!!
              defaultTimedEventDuration: '00:30',
              drop: function(info) {
                // is the "remove after drop" checkbox checked?
                if (checkbox.checked) {
                  // if so, remove the element from the "Draggable Events" list
                  info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
              },
              eventClick: function(info) {
                //apagar evento
                $('#btn_apagar').attr("href", "delete_agendamento.php?age_codigo=" + info.event.id);
                info.jsEvent.preventDefault();

                function truncateString(string, limit) {
                  if (string.length > limit) {
                    return string.substring(0, limit) + ""
                  } else {
                    return string
                  }
                }

                //visualizar evento
                $('#atualizar #codigo').text(info.event.id);
                $('#atualizar #cliente').text(info.event.extendedProps.cliente);
                $('#atualizar #servico').text(info.event.title);
                $('#atualizar #especificacao').text(info.event.extendedProps.especificacao);
                $('#atualizar #preco').text('R$ ' + info.event.extendedProps.preco);
                $('#atualizar #data').text(info.event.start.toLocaleDateString());
                $('#atualizar #horario').text(truncateString(info.event.start.toLocaleTimeString(), 5));
                $('#atualizar #status').text(info.event.extendedProps.status);
                if (info.event.extendedProps.sta_valor == 1) {
                  $("#atualizar #badge_status:first").addClass("badge-primary");
                  $("#atualizar #badge_status:first").removeClass("badge-success");
                  $("#atualizar #badge_status:first").removeClass("badge-warning");
                  //$("#atualizar #badge_status:first").removeClass("badge-danger");
                } else if (info.event.extendedProps.sta_valor == 2) {
                  $("#atualizar #badge_status:first").addClass("badge-success");
                  $("#atualizar #badge_status:first").removeClass("badge-primary");
                  $("#atualizar #badge_status:first").removeClass("badge-warning");
                  //$("#atualizar #badge_status:first").removeClass("badge-danger");
                } else if (info.event.extendedProps.sta_valor == 3) {
                  $("#atualizar #badge_status:first").addClass("badge-warning");
                  $("#atualizar #badge_status:first").removeClass("badge-primary");
                  $("#atualizar #badge_status:first").removeClass("badge-success");
                  //$("#atualizar #badge_status:first").removeClass("badge-danger");
                }

                $('#atualizar #pagto').text(info.event.extendedProps.tipopgto);

                //atualizar evento
                $('#atualizar #txt_atualizar_codigo').val(info.event.id);
                $('#atualizar #txt_atualizar_cliente').val(info.event.extendedProps.cli_codigo).change();
                $('#atualizar #txt_atualizar_tiposervico').val(info.event.extendedProps.tps_codigo).change();
                $('#atualizar #txt_atualizar_especificacao').val(info.event.extendedProps.especificacao).change();
                $('#atualizar #txt_atualizar_preco').val(info.event.extendedProps.preco);
                //Quebra o valor para o formato desejado
                var aux_data = info.event.start.toLocaleDateString().split("/");
                $('#atualizar #txt_atualizar_data').val(aux_data[2] + "-" + aux_data[1] + "-" + aux_data[0]);
                $('#atualizar #txt_atualizar_horario').val(info.event.extendedProps.hor_codigo).change();
                $('#atualizar #txt_atualizar_status').val(info.event.extendedProps.sta_valor).change();
                $('#atualizar #txt_atualizar_tipopgto').val(info.event.extendedProps.tipopgto).change();

                //$('#detalhes #id').text(info.event.id);
                $('#atualizar').modal('show');
              },
              selectable: true,
              select: function(info) {
                //setar a data do dia selecionado
                foco();
                $('#cadastrar #txt_data').val(info.startStr.toLocaleString());
                $('#cadastrar').modal('show');

              },
              dayMaxEventRows: true, // for all non-TimeGrid views
              views: {
                timeGrid: {
                  dayMaxEventRows: 5 // adjust to 6 only for timeGridWeek/timeGridDay
                }
              }
            });

            calendar.render();
            // $('#calendar').fullCalendar()

            /* ADDING EVENTS */
            var currColor = '#3c8dbc' //Red by default
            // Color chooser button
            $('#color-chooser > li > a').click(function(e) {
              e.preventDefault()
              // Save color
              currColor = $(this).css('color')
              // Add color effect to button
              $('#add-new-event').css({
                'background-color': currColor,
                'border-color': currColor
              })
            })
            $('#add-new-event').click(function(e) {
              e.preventDefault()
              // Get value and make sure it is not null
              var val = $('#new-event').val()
              if (val.length == 0) {
                return
              }

              // Create events
              var event = $('<div />')
              event.css({
                'background-color': currColor,
                'border-color': currColor,
                'color': '#fff'
              }).addClass('external-event')
              event.text(val)
              $('#external-events').prepend(event)

              // Add draggable funtionality
              ini_events(event)

              // Remove event from text input
              $('#new-event').val('')
            })
          })
        })
      }
    }
  </script>
  <script>
    $(function() {

      /* initialize the external events
       -----------------------------------------------------------------*/
      function ini_events(ele) {
        ele.each(function() {

          // create an Event Object (https://fullcalendar.io/docs/event-object)
          // it doesn't need to have a start or end
          var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
          }

          // store the Event Object in the DOM element so we can get to it later
          $(this).data('eventObject', eventObject)

          // make the event draggable using jQuery UI
          $(this).draggable({
            zIndex: 1070,
            revert: true, // will cause the event to go back to its
            revertDuration: 0 //  original position after the drag
          })

        })
      }

      ini_events($('#external-events div.external-event'))

      /* initialize the calendar
       -----------------------------------------------------------------*/
      //Date for the calendar events (dummy data)
      var date = new Date()
      var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()

      var Calendar = FullCalendar.Calendar;
      var Draggable = FullCalendar.Draggable;

      var containerEl = document.getElementById('external-events');
      var checkbox = document.getElementById('drop-remove');
      var calendarEl = document.getElementById('calendar');

      // initialize the external events
      // -----------------------------------------------------------------

      new Draggable(containerEl, {
        itemSelector: '.external-event',
        eventData: function(eventEl) {
          return {
            title: eventEl.innerText,
            backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
            borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
            textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
          };
        }
      });

      var calendar = new Calendar(calendarEl, {
        locale: 'pt-br',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        themeSystem: 'bootstrap',
        events: 'list_eventos.php',
        editable: true,
        droppable: false, // this allows things to be dropped onto the calendar !!!
        defaultTimedEventDuration: '00:30',
        drop: function(info) {
          // is the "remove after drop" checkbox checked?
          if (checkbox.checked) {
            // if so, remove the element from the "Draggable Events" list
            info.draggedEl.parentNode.removeChild(info.draggedEl);
          }
        },
        eventClick: function(info) {
          //apagar evento
          $('#btn_apagar').attr("href", "delete_agendamento.php?age_codigo=" + info.event.id);
          info.jsEvent.preventDefault();

          function truncateString(string, limit) {
            if (string.length > limit) {
              return string.substring(0, limit) + ""
            } else {
              return string
            }
          }

          //visualizar evento
          $('#atualizar #codigo').text(info.event.id);
          $('#atualizar #cliente').text(info.event.extendedProps.cliente);
          $('#atualizar #servico').text(info.event.title);
          $('#atualizar #especificacao').text(info.event.extendedProps.especificacao);
          $('#atualizar #preco').text('R$ ' + info.event.extendedProps.preco);
          $('#atualizar #data').text(info.event.start.toLocaleDateString());
          $('#atualizar #horario').text(truncateString(info.event.start.toLocaleTimeString(), 5));
          $('#atualizar #status').text(info.event.extendedProps.status);
          if (info.event.extendedProps.sta_valor == 1) {
            $("#atualizar #badge_status:first").addClass("badge-primary");
            $("#atualizar #badge_status:first").removeClass("badge-success");
            $("#atualizar #badge_status:first").removeClass("badge-warning");
            //$("#atualizar #badge_status:first").removeClass("badge-danger");
          } else if (info.event.extendedProps.sta_valor == 2) {
            $("#atualizar #badge_status:first").addClass("badge-success");
            $("#atualizar #badge_status:first").removeClass("badge-primary");
            $("#atualizar #badge_status:first").removeClass("badge-warning");
            //$("#atualizar #badge_status:first").removeClass("badge-danger");
          } else if (info.event.extendedProps.sta_valor == 3) {
            $("#atualizar #badge_status:first").addClass("badge-warning");
            $("#atualizar #badge_status:first").removeClass("badge-primary");
            $("#atualizar #badge_status:first").removeClass("badge-success");
            //$("#atualizar #badge_status:first").removeClass("badge-danger");
          }

          $('#atualizar #pagto').text(info.event.extendedProps.tipopgto);

          //atualizar evento
          $('#atualizar #txt_atualizar_codigo').val(info.event.id);
          $('#atualizar #txt_atualizar_cliente').val(info.event.extendedProps.cli_codigo).change();
          $('#atualizar #txt_atualizar_tiposervico').val(info.event.extendedProps.tps_codigo).change();
          $('#atualizar #txt_atualizar_especificacao').val(info.event.extendedProps.especificacao);
          $('#atualizar #txt_atualizar_preco').val(info.event.extendedProps.preco);
          //Quebra o valor para o formato desejado
          var aux_data = info.event.start.toLocaleDateString().split("/");
          $('#atualizar #txt_atualizar_data').val(aux_data[2] + "-" + aux_data[1] + "-" + aux_data[0]);
          $('#atualizar #txt_atualizar_horario').val(info.event.extendedProps.hor_codigo).change();
          $('#atualizar #txt_atualizar_status').val(info.event.extendedProps.sta_valor).change();
          $('#atualizar #txt_atualizar_tipopgto').val(info.event.extendedProps.tipopgto).change();

          //$('#detalhes #id').text(info.event.id);
          $('#atualizar').modal('show');
        },
        selectable: true,
        select: function(info) {
          //setar a data do dia selecionado
          foco();
          $('#cadastrar #txt_data').val(info.startStr.toLocaleString());
          $('#cadastrar').modal('show');

        },
        dayMaxEventRows: true, // for all non-TimeGrid views
        views: {
          timeGrid: {
            dayMaxEventRows: 5 // adjust to 6 only for timeGridWeek/timeGridDay
          }
        }
      });

      calendar.render();
      // $('#calendar').fullCalendar()

      /* ADDING EVENTS */
      var currColor = '#3c8dbc' //Red by default
      // Color chooser button
      $('#color-chooser > li > a').click(function(e) {
        e.preventDefault()
        // Save color
        currColor = $(this).css('color')
        // Add color effect to button
        $('#add-new-event').css({
          'background-color': currColor,
          'border-color': currColor
        })
      })
      $('#add-new-event').click(function(e) {
        e.preventDefault()
        // Get value and make sure it is not null
        var val = $('#new-event').val()
        if (val.length == 0) {
          return
        }

        // Create events
        var event = $('<div />')
        event.css({
          'background-color': currColor,
          'border-color': currColor,
          'color': '#fff'
        }).addClass('external-event')
        event.text(val)
        $('#external-events').prepend(event)

        // Add draggable funtionality
        ini_events(event)

        // Remove event from text input
        $('#new-event').val('')
      })
    });
  </script>

  <script>
    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
      })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
      })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date picker
      $('#reservationdate').datetimepicker({
        format: 'L'
      });

      //Date and time picker
      $('#reservationdatetime').datetimepicker({
        icons: {
          time: 'far fa-clock'
        }
      });

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker({
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function(start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })

      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()

      $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })

    })
  </script>


  <script>
    $(function() {
      $.validator.setDefaults({
        submitHandler: function() {
          alert("Form successful submitted!");
        }
      });
      $('#quickForm').validate({
        rules: {
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 5
          },
          terms: {
            required: true
          },
        },
        messages: {
          email: {
            required: "Digite um endereço de email",
            email: "Digite um endereço de email válido"
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
          },
          terms: "Please accept our terms"
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>
  <script>
    $(document).ready(function() {

      $("#btn_cadastrar").on("submit", function(event) {
        event.preventDefault();
        $.ajax({
          method: "POST",
          url: "cadastro_agendamento.php",
          data: new FormData(this),
          contentType: false,
          processData: false
        })
      });
      $("#btn_atualizar").on("submit", function(event) {
        event.preventDefault();
      });

      $("#btn_filtrar").on("click", function(event) {
        pesquisaAgendamentosFiltrados();
      });

    });

    $('.btn_canc_visualizar').on("click", function() {
      $('.visevent').slideToggle();
      $('.formedit').slideToggle();

    });
    $('.btn_canc_edit').on("click", function() {
      $('.formedit').slideToggle();
      $('.visevent').slideToggle();
    });
    $('#btn_pagamentos').on("click", function() {
      $('#pagamentos').modal('show');
    });

    $('#btn_pagamentos').on("click", function() {
      $('#pagamentos').modal('show');
    });


    $("#cadastrar").on('shown.bs.modal', function() {
      //var x = $('#txt_tipopgto').val();
      //habilita e desabilita os valores dos selects da forma de pagto e status
      if ($('#cadastrar #txt_status').val() === '1') {
        $("#cadastrar #txt_tipopgto option[value=' ']").removeAttr('disabled');
        $("#cadastrar #txt_tipopgto option[value='" + 4 + "']").removeAttr('disabled');
        $("#cadastrar #txt_tipopgto option[value='" + 1 + "']").removeAttr('disabled');
        $("#cadastrar #txt_tipopgto option[value='" + 2 + "']").removeAttr('disabled');
        $("#cadastrar #txt_tipopgto option[value='" + 5 + "']").removeAttr('disabled');
        $("#cadastrar #txt_tipopgto option[value='" + 6 + "']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto").val(' ').select();
      } else if ($('#cadastrar #txt_status').val() === '2') {
        $("#cadastrar #txt_tipopgto option[value='" + 4 + "']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value='" + 1 + "']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value='" + 2 + "']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value='" + 5 + "']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value=' ']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value='" + 6 + "']").removeAttr('disabled');
        $("#cadastrar #txt_tipopgto").val('6').select();
      } else if ($('#cadastrar #txt_status').val() === '') {
        //$("#cadastrar #txt_tipopgto option[value=' ']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value='" + 4 + "']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value='" + 1 + "']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value='" + 2 + "']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value='" + 5 + "']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value='" + 6 + "']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value=' ']").removeAttr('disabled');
        $("#cadastrar #txt_tipopgto").val(' ').select();
      }
    });

    $("#txt_tiposervico").on('change', function() {
      if ($('#cadastrar #txt_tiposervico').val() === ' ') {
        $("#cadastrar #txt_especificacao option[value='" + "Corte" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Escova" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Hidratação" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Coloração" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Cauterização" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Selagem" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Luzes" + "']").attr('disabled', true);

        $("#cadastrar #txt_especificacao option[value='" + "Unhas" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Polimento" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Esmaltagem" + "']").attr('disabled', true);

        $("#cadastrar #txt_especificacao option[value='" + "Braços" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Pernas" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Tronco" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Geral" + "']").attr('disabled', true);

        $("#cadastrar #txt_especificacao option[value='" + "Simples" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Eventos" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Geral" + "']").attr('disabled', true);

        $("#cadastrar #txt_especificacao").val(' ').select();
      }

      else if ($('#cadastrar #txt_tiposervico').val() === '2') {
        $("#cadastrar #txt_especificacao option[value='" + "Corte" + "']").removeAttr('disabled');
        $("#cadastrar #txt_especificacao option[value='" + "Escova" + "']").removeAttr('disabled');
        $("#cadastrar #txt_especificacao option[value='" + "Hidratação" + "']").removeAttr('disabled');
        $("#cadastrar #txt_especificacao option[value='" + "Coloração" + "']").removeAttr('disabled');
        $("#cadastrar #txt_especificacao option[value='" + "Cauterização" + "']").removeAttr('disabled');
        $("#cadastrar #txt_especificacao option[value='" + "Selagem" + "']").removeAttr('disabled');
        $("#cadastrar #txt_especificacao option[value='" + "Luzes" + "']").removeAttr('disabled');

        $("#cadastrar #txt_especificacao option[value='" + "Unhas" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Polimento" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Esmaltagem" + "']").attr('disabled', true);

        $("#cadastrar #txt_especificacao option[value='" + "Braços" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Pernas" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Tronco" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Costas" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Geral" + "']").attr('disabled', true);

        $("#cadastrar #txt_especificacao option[value='" + "Simples" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Eventos" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Geral" + "']").attr('disabled', true);

        $("#cadastrar #txt_especificacao").val('Corte').select();
      }

      else if ($('#cadastrar #txt_tiposervico').val() === '3' || $('#cadastrar #txt_tiposervico').val() === '4' ) {
        $("#cadastrar #txt_especificacao option[value='" + "Unhas" + "']").removeAttr('disabled');
        $("#cadastrar #txt_especificacao option[value='" + "Polimento" + "']").removeAttr('disabled');
        $("#cadastrar #txt_especificacao option[value='" + "Esmaltagem" + "']").removeAttr('disabled');

        $("#cadastrar #txt_especificacao option[value='" + "Corte" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Escova" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Hidratação" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Coloração" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Cauterização" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Selagem" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Luzes" + "']").attr('disabled', true);

        $("#cadastrar #txt_especificacao option[value='" + "Braços" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Pernas" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Tronco" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Costas" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Geral" + "']").attr('disabled', true);

        $("#cadastrar #txt_especificacao option[value='" + "Simples" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Eventos" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Geral" + "']").attr('disabled', true);

        $("#cadastrar #txt_especificacao").val('Unhas').select();
      }

      else if ($('#cadastrar #txt_tiposervico').val() === '5') {
        $("#cadastrar #txt_especificacao option[value='" + "Unhas" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Polimento" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Esmaltagem" + "']").attr('disabled', true);

        $("#cadastrar #txt_especificacao option[value='" + "Corte" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Escova" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Hidratação" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Coloração" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Cauterização" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Selagem" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Luzes" + "']").attr('disabled', true);

        $("#cadastrar #txt_especificacao option[value='" + "Braços" + "']").removeAttr('disabled');
        $("#cadastrar #txt_especificacao option[value='" + "Pernas" + "']").removeAttr('disabled');
        $("#cadastrar #txt_especificacao option[value='" + "Tronco" + "']").removeAttr('disabled');
        $("#cadastrar #txt_especificacao option[value='" + "Costas" + "']").removeAttr('disabled');
        $("#cadastrar #txt_especificacao option[value='" + "Geral" + "']").removeAttr('disabled');

        $("#cadastrar #txt_especificacao option[value='" + "Simples" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Eventos" + "']").attr('disabled', true);

        $("#cadastrar #txt_especificacao").val('Geral').select();

      }

      else if ($('#cadastrar #txt_tiposervico').val() === '15') {
        $("#cadastrar #txt_especificacao option[value='" + "Unhas" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Polimento" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Esmaltagem" + "']").attr('disabled', true);

        $("#cadastrar #txt_especificacao option[value='" + "Corte" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Escova" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Hidratação" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Coloração" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Cauterização" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Selagem" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Luzes" + "']").attr('disabled', true);

        $("#cadastrar #txt_especificacao option[value='" + "Braços" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Pernas" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Tronco" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Costas" + "']").attr('disabled', true);
        $("#cadastrar #txt_especificacao option[value='" + "Geral" + "']").attr('disabled', true);

        $("#cadastrar #txt_especificacao option[value='" + "Simples" + "']").removeAttr('disabled');
        $("#cadastrar #txt_especificacao option[value='" + "Eventos" + "']").removeAttr('disabled');

        $("#cadastrar #txt_especificacao").val('Simples').select();

      }
    });

    $("#atualizar").on('click', function() {
      if ($('#atualizar #txt_atualizar_tiposervico').val() === ' ') {
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Corte" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Escova" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Hidratação" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Coloração" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Cauterização" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Selagem" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Luzes" + "']").attr('disabled', true);

        $("#atualizar #txt_atualizar_especificacao option[value='" + "Unhas" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Polimento" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Esmaltagem" + "']").attr('disabled', true);

        $("#atualizar #txt_atualizar_especificacao option[value='" + "Braços" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Pernas" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Tronco" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Geral" + "']").attr('disabled', true);

        $("#atualizar #txt_atualizar_especificacao option[value='" + "Simples" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Eventos" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Geral" + "']").attr('disabled', true);

        $("#atualizar #txt_atualizar_especificacao").val(' ').select();
      }

      else if ($('#atualizar #txt_atualizar_tiposervico').val() === '2') {
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Corte" + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Escova" + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Hidratação" + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Coloração" + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Cauterização" + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Selagem" + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Luzes" + "']").removeAttr('disabled');

        $("#atualizar #txt_atualizar_especificacao option[value='" + "Unhas" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Polimento" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Esmaltagem" + "']").attr('disabled', true);

        $("#atualizar #txt_atualizar_especificacao option[value='" + "Braços" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Pernas" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Tronco" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Costas" + "']").attr('disabled', true);
        $("#atualizar #txt_txt_atualizar_especificacaoespecificacao option[value='" + "Geral" + "']").attr('disabled', true);

        $("#atualizar #txt_atualizar_especificacao option[value='" + "Simples" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Eventos" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Geral" + "']").attr('disabled', true);

        $("#atualizar #txt_atualizar_especificacao").val('Corte').select();
      }

      else if ($('#atualizar #txt_atualizar_tiposervico').val() === '3' || $('#atualizar #txt_atualizar_tiposervico').val() === '4' ) {
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Unhas" + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Polimento" + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Esmaltagem" + "']").removeAttr('disabled');

        $("#atualizar #txt_atualizar_especificacao option[value='" + "Corte" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Escova" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Hidratação" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Coloração" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Cauterização" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Selagem" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Luzes" + "']").attr('disabled', true);

        $("#atualizar #txt_atualizar_especificacao option[value='" + "Braços" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Pernas" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Tronco" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Costas" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Geral" + "']").attr('disabled', true);

        $("#atualizar #txt_atualizar_especificacao option[value='" + "Simples" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Eventos" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Geral" + "']").attr('disabled', true);

        $("#atualizar #txt_atualizar_especificacao").val('Unhas').select();
      }

      else if ($('#atualizar #txt_atualizar_tiposervico').val() === '5') {
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Unhas" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Polimento" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Esmaltagem" + "']").attr('disabled', true);

        $("#atualizar #txt_atualizar_especificacao option[value='" + "Corte" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Escova" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Hidratação" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Coloração" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Cauterização" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Selagem" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Luzes" + "']").attr('disabled', true);

        $("#atualizar #txt_atualizar_especificacao option[value='" + "Braços" + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Pernas" + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Tronco" + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Costas" + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Geral" + "']").removeAttr('disabled');

        $("#atualizar #txt_atualizar_especificacao option[value='" + "Simples" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Eventos" + "']").attr('disabled', true);

        $("#atualizar #txt_atualizar_especificacao").val('Geral').select();

      }

      else if ($('#atualizar #txt_atualizar_tiposervico').val() === '15') {
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Unhas" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Polimento" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Esmaltagem" + "']").attr('disabled', true);

        $("#atualizar #txt_atualizar_especificacao option[value='" + "Corte" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Escova" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Hidratação" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Coloração" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Cauterização" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Selagem" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Luzes" + "']").attr('disabled', true);

        $("#atualizar #txt_atualizar_especificacao option[value='" + "Braços" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Pernas" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Tronco" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Costas" + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Geral" + "']").attr('disabled', true);

        $("#atualizar #txt_atualizar_especificacao option[value='" + "Simples" + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_especificacao option[value='" + "Eventos" + "']").removeAttr('disabled');

        $("#atualizar #txt_atualizar_especificacao").val('Simples').select();

      }
    });

    $("#txt_status").on('change', function() {
      if ($('#cadastrar #txt_status').val() === '1') {
        $("#cadastrar #txt_tipopgto option[value=' ']").removeAttr('disabled');
        $("#cadastrar #txt_tipopgto option[value='" + 4 + "']").removeAttr('disabled');
        $("#cadastrar #txt_tipopgto option[value='" + 1 + "']").removeAttr('disabled');
        $("#cadastrar #txt_tipopgto option[value='" + 2 + "']").removeAttr('disabled');
        $("#cadastrar #txt_tipopgto option[value='" + 5 + "']").removeAttr('disabled');
        $("#cadastrar #txt_tipopgto option[value='" + 6 + "']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto").val(' ').select();
      } else if ($('#cadastrar #txt_status').val() === '2') {
        $("#cadastrar #txt_tipopgto option[value='" + 4 + "']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value='" + 1 + "']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value='" + 2 + "']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value='" + 5 + "']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value=' ']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value='" + 6 + "']").removeAttr('disabled');
        $("#cadastrar #txt_tipopgto").val('6').select();
      } else if ($('#cadastrar #txt_status').val() === '') {
        //$("#cadastrar #txt_tipopgto option[value=' ']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value='" + 4 + "']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value='" + 1 + "']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value='" + 2 + "']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value='" + 5 + "']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value='" + 6 + "']").attr('disabled', true);
        $("#cadastrar #txt_tipopgto option[value=' ']").removeAttr('disabled');
        $("#cadastrar #txt_tipopgto").val(' ').select();
      }
    });

    $("#atualizar").on('shown.bs.modal', function() {
      //var x = $('#txt_tipopgto').val();
      //habilita e desabilita os valores dos selects da forma de pagto e status
      if ($('#atualizar #txt_atualizar_status').val() === '1') {
        $("#atualizar #txt_atualizar_tipopgto option[value=' ']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 4 + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 1 + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 2 + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 5 + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 6 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto").val(' ').select();
      } else if ($('#atualizar #txt_atualizar_status').val() === '2') {
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 4 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 1 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 2 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 5 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value=' ']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 6 + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_tipopgto").val('6').select();
      } else if ($('#atualizar #txt_atualizar_status').val() === '') {
        //$("#cadastrar #txt_atualizar_tipopgto option[value=' ']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 4 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 1 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 2 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 5 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 6 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value=' ']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_tipopgto").val(' ').select();
      }
    });

    $("#txt_atualizar_status").on('change', function() {
      if ($('#atualizar #txt_atualizar_status').val() === '1') {
        $("#atualizar #txt_atualizar_tipopgto option[value=' ']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 4 + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 1 + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 2 + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 5 + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 6 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto").val(' ').select();
      } else if ($('#atualizar #txt_atualizar_status').val() === '2') {
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 4 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 1 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 2 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 5 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value=' ']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 6 + "']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_tipopgto").val('6').select();
      } else if ($('#atualizar #txt_atualizar_status').val() === '') {
        //$("#atualizar #txt_atualizar_tipopgto option[value=' ']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 4 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 1 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 2 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 5 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 6 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value=' ']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_tipopgto").val(' ').select();
      } else if ($('#atualizar #txt_atualizar_status').val() === '4') {
        //$("#cadastrar #txt_atualizar_tipopgto option[value=' ']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 4 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 1 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 2 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 5 + "']").attr('disabled', true);
        $("#atualizar #txt_atualizar_tipopgto option[value='" + 6 + " ']").removeAttr('disabled');
        $("#atualizar #txt_atualizar_tipopgto").val('6').select();
      }
    });
  </script>
</body>

</html>
