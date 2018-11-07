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
                            
                            <form method="post" action="<?php echo base_url('app/imovel/adiciona') ?>" enctype="multipart/form-data" />
                                <div class="form-group">                
                                  <label class="control-label" for="inputReadOnly"><b>Qtde. Quartos :</b></label>
                                  <select name="quarto" id="quarto" class="form-control">
                                    <option value="">Selecione...</option>
                                    <?php foreach ($quartos as $value) { ?>
                                      <option value="<?php echo $value->CODQUARTO ?>"><?php echo $value->NMQUARTO ?></option>
                                    <?php } ?>
                                  </select>
                                </div>

                                <div class="form-group">                
                                  <label class="control-label" for="inputReadOnly"><b>Tipo de Imovel :</b></label>
                                  <select name="tipo" id="tipo" class="form-control">                                    
                                    <?php foreach ($tipos as $value) { ?>
                                      <option value="<?php echo $value->CODTIPOIMOVEL ?>"><?php echo $value->NMTIPOIMOVEL ?></option>
                                    <?php } ?>
                                  </select>
                                </div>


                                <div class="form-group">                
                                  <label class="control-label" for="inputReadOnly"><b>Opção :</b></label>
                                  <select name="opcao" id="opcao" class="form-control">                                    
                                    <?php foreach ($opcoes as $value) { ?>
                                      <option value="<?php echo $value->CODOPCAO ?>"><?php echo $value->NMOPCAO ?></option>
                                    <?php } ?>
                                  </select>
                                </div>

                                <div class="form-group">                
                                  <label class="control-label" for="inputReadOnly"><b>Finalidade :</b></label>
                                  <select name="finalidade" id="finalidade" class="form-control">                                    
                                    <?php foreach ($finalidades as $value) { ?>
                                      <option value="<?php echo $value->CODFINALIDADE ?>"><?php echo $value->NMFINALIDADE ?></option>
                                    <?php } ?>
                                  </select>
                                </div>

                                 <div class="form-group">                
                                  <label class="control-label" for="inputReadOnly"><b>Vaga Garagem :</b></label>
                                  <select name="vaga" id="vaga" class="form-control">                                    
                                    <?php foreach ($vagas as $value) { ?>
                                      <option value="<?php echo $value->CODVAGA ?>"><?php echo $value->NMVAGA ?></option>
                                    <?php } ?>
                                  </select>
                                </div>

                                <div class="form-group">                
                                  <label class="control-label" for="inputReadOnly"><b>UF :</b></label>
                                  <select name="uf" id="estado" class="form-control" onchange="buscar_cidades()">
                                    <option value="">Selecione...</option>
                                    <?php foreach ($estados as $value) { ?>
                                      <option value="<?php echo $value->CODUF ?>"><?php echo $value->NMUF ?></option>
                                    <?php } ?>
                                  </select>
                                </div>

                                <div class="form-group" id="load_cidades">
                                    <label class="control-label" for="inputReadOnly"><b>Cidade :</b></label>
                                    <select name="cidade" id="cidade" class="form-control" onchange="edit_buscar_setores()">                                      
                                         <option class="form-control" id="cidade" value="">Selecione o estado...</option>                                      
                                    </select>
                                </div>
  
                                                        
                                <div class="form-group" id="load_setores">                
                                  <label class="control-label" for="inputReadOnly"><b>Setor :</b></label>
                                  <select name="setor" id="setor" class="form-control">
                                    <option class="form-control" id="cidade" value="">Selecione a cidade</option>                                      
                                  </select>
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
                                    <input type="text" class="form-control" name="referencia" required="required" id="referencia" aria-describedby="nome" placeholder="00897">                                
                                </div> 

                                <div class="form-group">
                                    <label for="nome">Descrição :</label>
                                    <textarea name="descricao" rows="5" class="form-control"></textarea>                                
                                </div> 
                                <div class="form-group">
                                    <label for="nome">Valor do Imovel :</label>
                                    <input type="decimal" class="form-control" name="valor" required="required" id="valor" aria-describedby="nome" placeholder="00897">                                
                                </div> 
                                <div class="form-group">
                                    <label for="nome">Banheiros :</label>
                                    <input type="decimal" class="form-control" name="banheiro" required="required" id="banheiro" aria-describedby="nome" placeholder="00897">                                
                                </div>  
                                <div class="form-group">
                                    <label for="nome">Area m²:</label>
                                    <input type="decimal" class="form-control" name="area" required="required" id="area" aria-describedby="nome" placeholder="120">                                
                                </div>
                                 <div class="form-group">
                                    <label for="nome">Endereço :</label>
                                    <input type="text" class="form-control" name="endereco" required="required" id="endereco" aria-describedby="nome" placeholder="Rua C 124 qd. 13 lt 19">                                
                                </div>  
                                 <div class="form-group">
                                    <label for="nome">Localização:</label>
                                    <input type="text" class="form-control" name="localizacao" required="required" id="localizacao" aria-describedby="nome" placeholder="Google Maps">                                
                                </div> 
                                <div class="form-group">
                                    <label for="nome">Outros Valores:</label>
                                    <input type="text" class="form-control" name="outrosvalores" required="required" id="outrosvalores" aria-describedby="nome" placeholder="Codominio R$ 150,00">                                
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