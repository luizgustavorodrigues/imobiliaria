<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Imoveis - Galeria de Fotos <a href="<?php echo base_url('app/imovel/novo') ?>" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i> Adicionar</a></h1>
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
           

            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de Imoveis Cadastrados
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Imovel</th>
                                <th>Referencia</th>                               
                                <th>Tipo de Imovel</th>
                                <th>Finalidade</th>                                                               
                                <th>Cidade</th>
                                <th>Setor/Bairro</th>
                                <th>Valor</th>                                
                                <th class="text-center">Ação</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lista as $value): ?>
                                <tr class="odd gradeX">
                                    <td><?php 
                                        $arrayImg = array('src' =>base_url('public/site/assets/img/thumb/'.$value->IMGIMOVEL),'class'=>'img-responsive');
                                        echo img($arrayImg); ?></td>
                                    <td><?php echo $value->REFERENCIA ?></td>                                    
                                    <td><?php echo $value->NMTIPOIMOVEL ?></td>
                                    <td><?php echo $value->NMFINALIDADE ?></td>                                                                       
                                    <td><?php echo $value->NMCIDADE ?></td>
                                    <td><?php echo $value->NMSETOR ?></td>
                                    <td><?php echo $value->VALORIMOVEL ?></td>                                    
                                    <td class="text-center"><a href="<?php echo base_url('app/galeria/novo/'.$value->CODIMOVEL); ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Adicionar Foto | </a> <a href="#">Ver Galeria</a></td>                                
                                </tr> 
                            <?php endforeach ?>
                                                      
                        </tbody>
                    </table>
                    <!-- /.table-responsive --> 
                    </div>                   
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