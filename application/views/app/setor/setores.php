<div class="form-group" >                
  <label class="control-label" for="inputReadOnly"><b>Setores/Bairro :</b></label>
  <select name="setor" id="setor" class="form-control" >
	  <?php foreach($bairros as $value){ ?>
	     <option value="<?php echo $value->CODSETOR ?>"><?php echo $value->NMSETOR ?></option>
	  <?php } ?>
	</select>
</div>