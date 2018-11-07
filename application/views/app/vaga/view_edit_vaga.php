<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Vagas de garagem</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Alterar Vaga de Garagem
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php echo form_open(base_url('app/vaga/alterar')) ?>
                              <div class="form-group">
                                <label for="nome">Nome Vaga</label>
                                <input type="hidden" name="codigo" value="<?php echo $row->CODVAGA ?>">
                                <input type="text" class="form-control" name="nome" required="required" id="nome" aria-describedby="nome" value="<?php echo $row->NMVAGA?>">                                
                              </div>

                              <div class="form-group">
                                <label for="nome">Numero de  Vaga(s)</label>                                
                                <input type="number" class="form-control" name="numero" required="required" id="numero" aria-describedby="numero" value="<?php echo $row->NVAGA?>">                                
                              </div>

                              <?php 
                                if($row->STATUSVAGA == 1)
                                 {  $mchecked='checked';
                                    $fchecked='vazio';
                                 }else{$mchecked='vazio';
                                    $fchecked='checked';
                                 } 
                               ?>
                              <div class="form-group">
                                   <label for="nome">Status  </label>
                                   <div class="radio">
                                      <label><input type="radio" name="status" value="0" <?php echo $fchecked ?>>Ativo</label>
                                      <label><input type="radio" name="status" value="1" <?php echo $mchecked ?>>Inativo</label>
                                    </div>                                    
                                </div>                                                           
                              <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->                        
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->