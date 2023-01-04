<div class="modal fade" id="filtros" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Filtragem Agendamentos</h4>
      </div>
      <div class="modal-body" style="padding-bottom: 0px; padding-top: 4vh;">
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="bs-stepper">
                  <div class="bs-stepper-content" style="padding-bottom: 0vh;">
                    <div class="card-body" style="padding-bottom: 0vh; padding-left: 0vh; padding-top: 0vh;">
                      <div class="row">
                        <div class="form-group">
                          <label>Filtrar por...</label>
                        </div>
                      </div>
                    </div>

                    <form method="post" id="pagamento_pesquisa" action="">
                      <div class="row">
                        <div class="card-body" style="padding-top: 0vh; padding-right: 0vh; padding-left: 0vh; padding-bottom: 0vh;">
                          <div class="form-group" style="padding-right: 10px; padding-top: 0vh;">
                            <label>Serviço</label>
                            <select class="form-control" style="padding-top: 0vh;" name="txt_filtro_servico" id="txt_filtro_servico">

                              <option value=" "> Ambos </option>
                              <option value="1"> Cabelo </option>
                              <option value="E"> Estética </option>

                            </select>
                          </div>
                        </div>
                        <div class="card-body" style="padding-top: 0vh; padding-right: 0vh; padding-left: 0vh; padding-bottom: 0vh;">
                          <div class="form-group" style="padding-right: 8px;  padding-top: 0vh;">
                            <label>Status</label>

                            <select class="form-control" style="padding-top: 0vh;" name="txt_filtro_status" id="txt_filtro_status">

                              <option value=""> Todos </option>
                              <option value="1"> Realizado </option>
                              <option value="2"> Confirmado </option>
                              <option value="3"> Desmarcado </option>

                            </select>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <div class="modal-body" style="padding-bottom: 0px; padding-top: 0vh;">
        <div class="formedit">
          <div class="card-body" style="padding-top: 0vh;">

            <div class="resultado_pesquisa" style="padding-bottom: 4vh;">
            </div>
            <div class=" modal-footer justify-content-between">
              <button type="button" class="btn btn-default" id="btn_fechar" data-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-primary" id="btn_filtrar" data-dismiss="modal">Filtrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
