<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Orçamentos</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de orçamentos
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                               
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Data</th>
                                <th>Tipo</th>
                                <th>Status</th>
                                <th class="text-center">Ação</th>                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orcamentos as $value): ?>
                                <tr class="odd gradeX">
                                   
                                    <td><?php echo $value->NOMEMSG ?></td>
                                    <td><?php echo $value->EMAILMSG ?></td>
                                    <td><?php echo $value->TELMSG ?></td>
                                    <td><?php echo $value->DATA ?></td>
                                    <td><?php echo $value->DATA ?></td>
                                    <td class="text-center"><?php 
                                        if ($value->STATUS == 0) {
                                            echo "<span class='label label-danger'>Não Lida</span>";
                                        }else{
                                            echo "<span class='label label-success'>Lida</span>";
                                        }
                                        //echo $value->STATUS 
                                        ?>                                        
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url('app/finalidade/editar/'.$value->CODMSG); ?>">
                                            <i class="fa fa-eye fa-1x" aria-hidden="true"></i>
                                        </a>
                                    </td>                                
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