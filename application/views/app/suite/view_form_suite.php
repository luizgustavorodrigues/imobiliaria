<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tipo de Imóveis</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cadastro de Tipo de Imóveis
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php echo form_open(base_url('app/suite/adiciona')) ?>
                            <input type="hidden" name="status" value="0">
                              <div class="form-group">
                                <label for="nome">Suite</label>
                                <input type="text" class="form-control" name="nome" required="required" id="nome" aria-describedby="nome" placeholder="1 Suite">                                
                              </div> 
                               <div class="form-group">
                                <label for="nome">Numero de suites</label>
                                <input type="text" class="form-control" name="numero" required="required" id="numero" aria-describedby="numero" placeholder="1">                                
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