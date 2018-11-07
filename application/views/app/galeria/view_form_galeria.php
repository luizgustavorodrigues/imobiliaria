<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Galeria de Fotos</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cadastro fotos de imoveis
                </div>
                <div class="panel-body">
                    <div class="row">

                      <div class="col-lg-12">
                        <table width="100%" class="table table-striped table-bordered table-hover">
                          <thead>
                              <tr>
                                <th>Imovel</th>
                                <th>Referencia</th>                               
                                <th>Tipo de Imovel</th>
                                <th>Finalidade</th>                                                               
                                <th>Cidade</th>
                                <th>Setor/Bairro</th>
                                <th>Valor</th>                 
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($lista_imovel as $value): ?>
                                  <tr class="odd gradeX">
                                      <td class="col-lg-3"><?php 
                                          $arrayImg = array('src' =>base_url('public/site/assets/img/thumb/'.$value->IMGIMOVEL),'class'=>'img-responsive ');
                                          echo img($arrayImg); ?></td>
                                      <td><?php echo $value->REFERENCIA ?></td>                                    
                                      <td><?php echo $value->NMTIPOIMOVEL ?></td>
                                      <td><?php echo $value->NMFINALIDADE ?></td>                                                                       
                                      <td><?php echo $value->NMCIDADE ?></td>
                                      <td><?php echo $value->NMSETOR ?></td>
                                      <td><?php echo $value->VALORIMOVEL ?></td>
                                  </tr> 
                              <?php endforeach ?>
                                                        
                          </tbody>
                        </table>
                      </div>

                      <div class="col-lg-12">
                          <?php
                              $hidden = array('imovel'=>$row->CODIMOVEL);
                              $data = array('class'=>'dropzone','id'=>'dropzone');
                              echo form_open_multipart(base_url('app/galeria/upload_img'), $data,$hidden);
                            ?>
                            <div class="fallback">
                              <input name="file" type="file" multiple />                              
                            </div> 
                          </form>
                      </div>

                      <div class="col-lg-12">
                        <hr>
                        <h3>Galeria de Fotos</h3>
                      </div>
                      <?php foreach ($lista_galeria as $key): ?>

                        <div class="col-lg-2">
                            <?php 
                            $arrayImg = array('src' =>base_url('public/site/assets/img/galeria_thumb/'.$key->IMGIMOVEL),'class'=>'img-responsive ');
                            echo img($arrayImg); ?>
                        </div>
                      <?php endforeach ?>
                      


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