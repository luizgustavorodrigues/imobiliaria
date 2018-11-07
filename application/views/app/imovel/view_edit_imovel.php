<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Imovel</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cadastro de Imovel
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <form method="post" action="<?php echo base_url('app/imovel/alterar') ?>" enctype="multipart/form-data" />
                                <input type="hidden" name="codigo" value="<?php echo $row->CODIMOVEL; ?>">
                                <input type="hidden" name="imagem" value="<?php echo $row->IMGIMOVEL;?>">
                                <div class="form-group">                
                                  <label class="control-label" for="inputReadOnly"><b>Qtde. Quartos :</b></label>
                                  <?php
                                    $options = array ('' => 'Selecione uma o tipo');
                                    foreach ($quartos as $value) 
                                      $options[$value->CODQUARTO] = $value->NMQUARTO;
                                      echo form_dropdown('quarto', $options,$row->CODQUARTO,'class="form-control" id="my_id"');                                        
                                  ?>
                                </div>

                                <div class="form-group">                
                                  <label class="control-label" for="inputReadOnly"><b>Tipo de Imovel :</b></label>                                
                                  <?php
                                    $options = array ('' => 'Selecione uma o tipo');
                                    foreach ($tipos as $value) 
                                      $options[$value->CODTIPOIMOVEL] = $value->NMTIPOIMOVEL;
                                      echo form_dropdown('tipo', $options,$row->CODTIPOIMOVEL,'class="form-control" id="my_id"');                                        
                                  ?>
                                </div>

                                <div class="form-group">                
                                  <label class="control-label" for="inputReadOnly"><b>Opção :</b></label>                                  
                                  <?php
                                    $options = array ('' => 'Selecione uma a Opção');
                                    foreach ($opcoes as $value) 
                                      $options[$value->CODOPCAO] = $value->NMOPCAO;
                                      echo form_dropdown('opcao', $options,$row->CODOPCAO,'class="form-control" id="my_id"');                                        
                                  ?>
                                </div>

                                <div class="form-group">                
                                  <label class="control-label" for="inputReadOnly"><b>Finalidade :</b></label>                                  
                                  <?php
                                    $options = array ('' => 'Selecione uma a Finalidade');
                                    foreach ($finalidades as $value) 
                                      $options[$value->CODFINALIDADE] = $value->NMFINALIDADE;
                                      echo form_dropdown('finalidade', $options,$row->CODFINALIDADE,'class="form-control" id="my_id"');                                        
                                  ?>
                                </div>
                                <div class="form-group">                
                                  <label class="control-label" for="inputReadOnly"><b>Suite :</b></label>                                  
                                  <?php
                                    $options = array ('' => 'Selecione');
                                    foreach ($suites as $value) 
                                      $options[$value->CODSUITE] = $value->NMSUITE;
                                      echo form_dropdown('suite', $options,$row->CODSUITE,'class="form-control" id="my_id"');                                        
                                  ?>
                                </div>

                                 <div class="form-group">                
                                  <label class="control-label" for="inputReadOnly"><b>Vaga Garagem :</b></label>                                  
                                  <?php
                                    $options = array ('' => 'Selecione uma a Vaga');
                                    foreach ($vagas as $value) 
                                      $options[$value->CODVAGA] = $value->NMVAGA;
                                      echo form_dropdown('vaga', $options,$row->CODVAGA,'class="form-control" id="my_id"');                                        
                                  ?>
                                </div>

                                <!--<div class="form-group">                
                                  <label class="control-label" for="inputReadOnly"><b>UF :</b></label>
                                  <select name="uf" id="estado" class="form-control" onchange="edit_buscar_cidades()">
                                    <option value="">Selecione...</option>
                                    <?php foreach ($estados as $value) { ?>
                                      <option value="<?php echo $value->CODUF ?>"><?php echo $value->NMUF ?></option>
                                    <?php } ?>
                                  </select>
                                </div>-->

                                <div class="form-group">                
                                  <label class="control-label" for="inputReadOnly"><b>UF :</b></label>                                
                                  <?php                                  
                                    $options = array ('' => 'Selecione uma o tipo');
                                    foreach ($estados as $value) 
                                      $options[$value->CODUF] = $value->NMUF;
                                      echo form_dropdown('uf', $options,$row->CODUF,'class="form-control" id="estado" onchange="edit_buscar_cidades()"');                                        
                                  ?>
                                </div>

                                <div class="form-group" id="load_cidades">
                                    <label class="control-label" for="inputReadOnly"><b>Cidade :</b></label>
                                    <select name="cidade" id="cidade" class="form-control" onchange="edit_buscar_setores()">                                      
                                         <?php foreach ($cidade as $value){  ?>
                                         <option class="form-control" id="cidade" value="<?php echo $value->CODCIDADE; ?>"><?php echo $value->NMCIDADE; ?></option>
                                         <?php } ?>
                                    </select>
                                </div>
                                                        
                                <div class="form-group" id="load_setores">                
                                  <label class="control-label" for="inputReadOnly"><b>Setor :</b></label>                                  
                                  <?php
                                    $options = array ('' => 'Selecione uma Cidade');
                                    foreach ($setores as $value) 
                                      $options[$value->CODSETOR] = $value->NMSETOR;
                                      echo form_dropdown('setor', $options,$row->CODSETOR,'class="form-control" id="my_id"');                                        
                                  ?>
                                </div>       

                                <div class="form-group">
                                    <label for="nome"></label>
                                    <div class="">
                                      <?php 
                                        $arrayImg = array('src' =>base_url('public/site/assets/img/imoveis/'.$row->IMGIMOVEL),'class'=>'img-responsive'); 
                                        echo img($arrayImg);                                        
                                      ?>
                                    </div>
                                </div>                       
                              
                                <div class="form-group">
                                    <div class="alert alert-danger text-center" role="alert">
                                      <strong>Atenção ! </strong> Imagem deve ter as seguintes dimensões 400px x 400px
                                    </div>
                                    <label class="control-label" for="inputReadOnly"><b>Imagem :</b></label>
                                    <input id="userfile" name="userfile" class="input-file" type="file">                                  
                                </div>

                                <div class="form-group">
                                    <label for="nome">Referencia</label>
                                    <input type="text" class="form-control" name="referencia" required="required" id="referencia" aria-describedby="nome" value="<?php echo $row->REFERENCIA ?>">                                
                                </div> 

                                <div class="form-group">
                                    <label for="nome">Descrição :</label>
                                    <textarea name="descricao" rows="5" class="form-control"><?php echo $row->DSIMOVEL; ?></textarea>                                
                                </div> 
                                <div class="form-group">
                                    <label for="nome">Valor do Imovel :</label>
                                    <input type="decimal" class="form-control" name="valor" required="required" id="valor" aria-describedby="nome" value="<?php echo $row->VALORIMOVEL ?>">                                
                                </div> 
                                <div class="form-group">
                                    <label for="nome">Banheiros :</label>
                                    <input type="decimal" class="form-control" name="banheiro" required="required" id="banheiro" aria-describedby="nome" value="<?php echo $row->BANHEIROIMOVEL ?>">                                
                                </div>  
                                <div class="form-group">
                                    <label for="nome">Area m²:</label>
                                    <input type="decimal" class="form-control" name="area" required="required" id="area" aria-describedby="nome" value="<?php echo $row->AREAIMOVEL ?>">                                
                                </div>
                                 <div class="form-group">
                                    <label for="nome">Endereço :</label>
                                    <input type="text" class="form-control" name="endereco" required="required" id="endereco" aria-describedby="nome" value="<?php echo $row->ENDERECOIMOVEL ?>">                                
                                </div>  
                                 <div class="form-group">
                                    <label for="nome">Localização:</label>
                                    <input type="text" class="form-control" name="localizacao" required="required" id="localizacao" aria-describedby="nome" value="<?php echo $row->LOCALIZACAOIMOVEL ?>">                                
                                </div> 
                                <div class="form-group">
                                    <label for="nome">Outros Valores:</label>
                                    <input type="text" class="form-control" name="outrosvalores" required="required" id="outrosvalores" aria-describedby="nome" value="<?php echo $row->OUTROVALORES ?>">                                
                                </div> 
                                <input type="hidden" name="status" value="0">
                                                         
                              <button type="submit" class="btn btn-primary">Cadastrar Vaga</button>
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