<div class="form-group" >                
  <label class="control-label" for="inputReadOnly"><b>Cidade :</b></label>
  <select name="cidade" id="cidade" class="form-control" onchange="edit_buscar_setores()">
	  <?php foreach($cidades as $value){ ?>
	     <option value="<?php echo $value->CODCIDADE ?>"><?php echo $value->NMCIDADE ?></option>
	  <?php } ?>
	</select>
</div>