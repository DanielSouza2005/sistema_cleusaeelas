<div class="modal fade" id="form_cliente">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cadastrar Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--<span id="msg_alerta"></span> -->
      <form method="post" action="cad_cliente.php" name="frm_cad_cliente" id="frm_cad_cliente">
        <div class="card-body p-0">
          <div class="bs-stepper">
            <div class="bs-stepper-content">
              <div class="row" style="padding-bottom: 0vh">
                <div class="card-body " style="padding-bottom: 0vh;">
                  <div class="form-group" style="margin-bottom: 0vh">
                    <label for="exampleInputPassword1">Nome</label>
                    <input type="text" name="txt_nome" maxlength="80" class="form-control" id="txt_nome" placeholder="Digite o Nome">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="card-body " style="padding-bottom: 0vh;">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="txt_email" maxlength="80" class="form-control" id="txt_email" placeholder="Digite o Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gênero</label>
                    <select class="form-control" name="txt_sexo" id="txt_sexo" style="width: 100%;">
                      <option value="">Selecione o Gênero...</option>
                      <option value="F">Feminino</option>
                      <option value="M">Masculino</option>
                      <option value="N">Não Binário</option>
                      <option value="O">Outro</option>
                      <option value="I">Prefiro não Informar</option>

                    </select>
                  </div>
                </div>
                <div class="card-body " style="padding-bottom: 0vh;">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Celular</label>
                    <input type="text" name="txt_celular" class="form-control" id="txt_celular" placeholder="Digite o Celular" data-inputmask='"mask": "(99) 99999-9999"' data-mask>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Data da Nascimento</label>
                    <input type="date" name="txt_data_nascimento" class="form-control" id="txt_data_nascimento">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer" style="background-color: white; padding-left:4vh; padding-top:0vh; padding-bottom:2.5vh;">
          <button type="button" class="btn btn-default" id="btn_fechar" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary" onclick="return validar_dados_cliente()">Cadastrar</button>
        </div>
      </form>
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>
