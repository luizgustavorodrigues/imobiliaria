<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Vagas de Garagem</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cadastro de Vagas de Garagem
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php echo form_open(base_url('app/vaga/adiciona')) ?>
                              <div class="form-group">
                                <label for="nome">Nome da Vaga</label>
                                <input type="text" class="form-control" name="nome" required="required" id="nome" aria-describedby="nome" placeholder="Ex: 2 Vagas">                                
                              </div>  
                              <div class="form-group">
                                <label for="nome">Numero de Vagas</label>
                                <input type="number" class="form-control" name="numero" required="required" id="numero" aria-describedby="numero" placeholder="2">                                
                              </div>                            
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