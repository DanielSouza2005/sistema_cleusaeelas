<div class="modal fade" id="cli_analitico">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Relatório | Clientes Analítico</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <section class="content">
          <div class="container-fluid">
            <div class="card-body p-0">
              <div class="row">
                <section class="col-lg-6">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Gêneros
                      </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content p-0" id="genero">
                        <!-- Morris chart - Sales -->
                        <canvas id="donut_genero" height="200" style="height: 200px;"></canvas>
                      </div>
                    </div><!-- /.card-body -->
                  </div>
                </section>
                <section class="col-lg-6">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-chart-line mr-1"></i>
                        Inclusões
                      </h3>
                    </div>
                    <div class="card-body">
                      <div class="tab-content p-0"  id="inclusao">
                        <canvas id="donut_inclusao" height="200" style="height: 200px;"></canvas>
                      </div>
                    </div>
                </section>
              </div>
            </div>
          </div>
      </div>
      </section>
    </div>
  </div>
</div>
</div>
