<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Configuração SEO </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">

          <?php $error = $this->session->flashdata("info"); ?>
            <?php if($error){?>
            <div class="alert alert-info alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $error; ?>
            </div>
          <?php } ?>

          <div class="row">
              <div class="col-lg-12">
                <form method="post" name="cadastro" action="<?php echo base_url('app/seo/alterar') ?>" enctype="multipart/form-data" />
                  
                  <input type="hidden" name="codigo" value="<?php echo $row->CODSEO; ?>"> 
                  
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class=" active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">SEO Básico</a></li>                    
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                      <div class="form-group">
                          <label for="nome">Title: </label>
                          <input type="text" class="form-control" name="title" required="required" id="title" aria-describedby="title" value="<?php echo $row->TITLE ?>">                                
                      </div>

                      <div class="form-group">
                            <label for="nome">Description :</label>
                            <textarea class="form-control" name="description" required="required" id="description" aria-describedby="nome" rows="5"><?php echo $row->DESCRIPTION ?></textarea>                             
                      </div>

                      <div class="form-group">
                          <label for="nome">Keywords :</label>
                          <div class="alert alert-danger" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error:</span>
                            Palavras-chaves separadas por virgula
                          </div>
                          <div class="bs-example">                            
                            <input type="text" class="form-control" name="keywords" required="required" id="keywords" aria-describedby="nome" data-role="tagsinput" value="<?php echo $row->KEYWORDS ?>">   
                          </div>                             
                      </div>


                      <div class="form-group">
                          <label for="nome">Verification :</label>
                          <textarea class="form-control" name="verification" required="required" id="verification" aria-describedby="nome" rows="5"><?php echo $row->GOOGLEVERIFICATION ?></textarea>                               
                      </div>

                      <div class="form-group">
                          <label for="nome">Tag Manager :</label>                          
                          <textarea class="form-control" name="tagmanager" required="required" id="tagmanager" aria-describedby="nome" rows="5"><?php echo $row->TAGMANAGER ?></textarea>                               
                      </div>

                      <div class="form-group">
                          <label for="nome">Tag Manager Body :</label>                          
                          <textarea class="form-control" name="tagbody" required="required" id="tagbody" aria-describedby="nome" rows="5"><?php echo $row->TAGMANAGERBODY ?></textarea>                               
                      </div>
                    </div>
                  </div>
                  <button type="submit"  class="btn btn-primary btn-tabs ">SALVAR</button>
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