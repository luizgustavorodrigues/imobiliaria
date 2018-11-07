<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quarto com suite <a href="<?php echo base_url('app/suite/novo') ?>" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i> Adicionar</a></h1>
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
                    Lista de tipo de imóveis 
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Numero de suites</th>
                                <th>Status</th>
                                <th class="text-center">Ação</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($suites as $value): ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $value->CODSUITE ?></td>
                                    <td><?php echo $value->NMSUITE ?></td>
                                    <td><?php echo $value->NSUITE ?></td>
                                    <td><?php  
                                    if($value->STATUS == 1){
                                        echo 'Inativo';
                                    }else{
                                        echo 'Ativo';
                                    } ?></td>
                                    <td class="text-center"><a href="<?php echo base_url('app/suite/editar/'.$value->CODSUITE); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>                                
                                </tr> 
                            <?php endforeach ?>
                                                      
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->                    
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