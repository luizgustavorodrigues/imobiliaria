<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Setor / Bairro<a href="<?php echo base_url('app/setor/novo') ?>" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i> Adicionar</a></h1>
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
                    Lista de Setores Cadastrados
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome do Setor</th>
                                <th>Cidade</th>
                                <th>Status</th>
                                <th class="text-center">Ação</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lista as $value): ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $value->CODSETOR ?></td>
                                    <td><?php echo $value->NMSETOR ?></td>
                                    <td><?php echo $value->NMCIDADE ?></td>
                                    <td><?php echo ($value->STATUSSETOR == 0) ? "Ativo" : "Inativo";?></td>
                                    <td class="text-center"><a href="<?php echo base_url('app/setor/editar/'.$value->CODSETOR); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>                                
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