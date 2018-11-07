<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Configuração</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
          <div class="row">
              <div class="col-lg-12">
                <form method="post" action="<?php echo base_url('app/config/alterar') ?>" enctype="multipart/form-data" />
                  
                  <input type="hidden" name="codigo" value="<?php echo $row->CODCONFIG; ?>"> 
                  
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class=" active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Dados Empresa</a></li>
                    <li role="presentation" class=""><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Formulário</a></li>
                    <li role="presentation" class=""><a href="#messages" aria-controls="messages" role="" data-toggle="tab">Mapas</a></li>
                    <li role="presentation" class=""><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Redes Social</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                      <div class="form-group">
                          <label for="nome">Nome Empresa</label>
                          <input type="text" class="form-control" name="nome" required="required" id="nome" aria-describedby="nome" value="<?php echo $row->NMEMPRESA ?>">                                
                      </div>

                      <div class="form-group">
                            <label for="nome">Nome Fantasia :</label>
                            <input type="text" class="form-control" name="fantasia" required="required" id="fantasia" aria-describedby="nome" value="<?php echo $row->NMFANTASIA ?>">                                
                        </div>

                        <div class="form-group">
                            <label for="nome">E-mail empresa :</label>
                            <input type="text" class="form-control" name="email" required="required" id="email" aria-describedby="nome" value="<?php echo $row->EMAIL ?>">                                
                        </div>

                        <div class="form-group">
                            <label for="nome">Telefone:</label>
                            <input type="text" class="form-control" name="telefone" required="required" id="telefone" aria-describedby="nome" value="<?php echo $row->TELFIXO ?>">                                
                        </div>

                        <div class="form-group">
                            <label for="nome">Whats app :</label>
                            <input type="text" class="form-control" name="whatsapp" required="required" id="whatsapp" aria-describedby="nome" value="<?php echo $row->WHATSAPP ?>">                                
                        </div>
                    </div>                            
                    <div role="tabpanel" class="tab-pane fade" id="profile">
                       <div class="form-group">
                            <label for="nome">SMTP:</label>
                            <input type="text" class="form-control" name="smtp" required="required" id="smtp" aria-describedby="nome" value="<?php echo $row->SMTP ?>">                                
                        </div>

                        <div class="form-group">
                            <label for="nome">E-mail envio:</label>
                            <input type="text" class="form-control" name="emailenvio" required="required" id="emailenvio" aria-describedby="nome" value="<?php echo $row->EMAILENVIO ?>">                                
                        </div>                

                        <div class="form-group">
                            <label for="nome">Senha Email:</label>
                            <input type="text" class="form-control" name="senhaemail" required="required" id="senhaemail" aria-describedby="nome" value="<?php echo $row->SENHAEMAIL ?>">                                
                        </div> 

                        <div class="form-group">
                            <label for="nome">Porta:</label>
                            <input type="text" class="form-control" name="porta" required="required" id="porta" aria-describedby="nome" value="<?php echo $row->PORTA ?>">                                
                        </div>                 

                        <div class="form-group">
                            <label for="nome">BCC:</label>
                            <input type="text" class="form-control" name="bcc" required="required" id="bcc" aria-describedby="nome" value="<?php echo $row->BCC ?>">                                
                        </div> 
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="messages">
                     <div class="form-group">
                          <label for="nome">Titulo Mapa:</label>
                          <input type="text" class="form-control" name="titulomapa" required="required" id="titulomapa" aria-describedby="nome" value="<?php echo $row->TITULOMAPS ?>">                                
                      </div> 
                      <div class="form-group">
                          <label for="nome">Mapa Google:</label>
                          <input type="text" class="form-control" name="mapa" required="required" id="mapa" aria-describedby="nome" value="<?php echo $row->MAPA ?>">                                
                      </div> 
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="settings">
                      <div class="form-group">
                            <label for="nome">Facebook:</label>
                            <input type="text" class="form-control" name="facebook" required="required" id="facebook" aria-describedby="nome" value="<?php echo $row->FACEBOOK ?>">                                
                      </div> 

                      <div class="form-group">
                          <label for="nome">Instagram:</label>
                          <input type="text" class="form-control" name="instagram" required="required" id="instagram" aria-describedby="nome" value="<?php echo $row->INSTAGRAM ?>">                                
                      </div> 
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary btn-tabs ">SALVAR</button>
                </form>
              </div>
              <!-- /.col-lg-12 (nested) -->                        
          </div>
          <!-- /.row (nested) -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->