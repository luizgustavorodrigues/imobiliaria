<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Setor / Bairro</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Alterar Setor / Bairro
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php echo form_open(base_url('app/setor/alterar')) ?>
                              <div class="form-group">
                                <label for="nome">Nome do Setor / Bairro</label>
                                <input type="hidden" name="codigo" value="<?php echo $row->CODSETOR ?>">
                                <input type="text" class="form-control" name="nome" required="required" id="nome" aria-describedby="nome" value="<?php echo $row->NMSETOR?>">                                
                              </div>
                             
                              <div class="form-group">                
                                  <label class="control-label" for="inputReadOnly"><b>UF :</b></label>
                                  <select name="estado" id="estado" class="form-control" onchange="edit_buscar_cidades()">
                                    <option value="">Selecione...</option>
                                    <?php foreach ($estados as $value) { ?>
                                      <option value="<?php echo $value->CODUF ?>"><?php echo $value->NMUF ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <div class="form-group" id="load_cidades">
                                    <label class="control-label" for="inputReadOnly"><b>Cidade :</b></label>
                                    <select name="cidade" id="cidade" class="form-control">                                      
                                         <option class="form-control" id="cidade" value="">Selecione o estado...</option>                                      
                                    </select>
                              </div>
                              
                              <?php 
                                if($row->STATUSSETOR == 1)
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