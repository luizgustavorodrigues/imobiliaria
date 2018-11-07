<script>
  function buscar_cidades(){
    var estado = $('#estado').val();
    if(estado){
      var url = 'retornoCidades/'+estado;
      $.get(url, function(dataReturn) {
        $('#load_cidades').html(dataReturn);
      });
    }
  }

  <?php $uri = $this->uri->segment(4);  ?>
  function edit_buscar_cidades(){
    var estado = $('#estado').val();
    if(estado){     
      var url = '/imovel/app/setor/retornoCidades/'+estado;
      $.get(url, function(dataReturn) {
        $('#load_cidades').html(dataReturn);
      });
    }
  }

  function buscar_setores(){
    var cidade = $('#cidade').val();
    if(cidade){     
      var url = '/imovel/app/setor/retornoSetores/'+cidade;
      $.get(url, function(dataReturn) {
        $('#load_setores').html(dataReturn);
      });
    }
  }

  <?php $uri = $this->uri->segment(4);  ?>
  function edit_buscar_setores(){
    var cidade = $('#cidade').val();
    if(cidade){     
      var url = '/imovel/app/setor/retornoSetores/'+cidade;
      $.get(url, function(dataReturn) {
        $('#load_setores').html(dataReturn);
      });
    }
  }

</script> 
<!-- jQuery -->

<script src="<?php echo base_url(); ?>public/app/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->

<script src="<?php echo base_url(); ?>public/app/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->

<script src="<?php echo base_url(); ?>public/app/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->

<script src="<?php echo base_url(); ?>public/app/vendor/raphael/raphael.min.js"></script>

<!--<script src="<?php echo base_url(); ?>public/app/vendor/morrisjs/morris.min.js"></script>-->

<!--<script src="<?php echo base_url(); ?>public/app/data/morris-data.js"></script>-->

<!--<script src="<?php echo base_url(); ?>public/app/vendor/datatables/js/dataTables.bootstrap.min.js"></script>-->
<script src="<?php echo base_url(); ?>public/app/vendor/datatables/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="<?php echo base_url() .'public/app/vendor/dropzone/dropzone.js';?>"></script>

<script type="text/javascript" src="<?php echo base_url() .'public/app/js/app.js';?>"></script>
<script type="text/javascript" src="<?php echo base_url() .'public/app/js/bootstrap-tagsinput.min.js';?>"></script>


<!-- Custom Theme JavaScript -->

<script src="<?php echo base_url(); ?>public/app/dist/js/sb-admin-2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#dataTables-example').DataTable();
} );
</script>



        </div>
        <!-- /#wrapper -->
    </body>
</html>