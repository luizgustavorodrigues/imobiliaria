<div id="content" role="imovel">
	<div class="container" id="detalhe-imovel">
		<div class="row">			
			<div class="col-lg-12">
				<?php foreach ($imoveis as  $value): ?>
				<h1><?php echo $value->NMTIPOIMOVEL.' com '.$value->NMQUARTO.' no '.$value->NMSETOR.' - REF '.$value->REFERENCIA; ?> <span></span></h1>
				<?php endforeach ?>
			</div>
			<div class="col-lg-5 no-padding right">
				<?php foreach ($galeria as $foto): ?>
					<a href="<?php echo base_url('public/site/assets/img/galeria_thumb/'.$foto->IMGIMOVEL) ?>" data-lightbox="roadtrip" class="col-lg-4" data-title="My caption" >
						<img src="<?php echo base_url('public/site/assets/img/galeria_thumb/'.$foto->IMGIMOVEL) ?>" alt="" class="img-responsive">
					</a>
				<?php endforeach ?>
			</div>
			<div class="col-lg-7 no-padding">
				<?php foreach ($imoveis as  $value): ?>
					<div class="col-lg-12">
						<p><?php echo $value->DSIMOVEL ?> </p>
					</div>				
					
					<div class="col-lg-4">
						<h3>ENDEREÇO</h3>
						<p><?php echo $value->ENDERECOIMOVEL ?></p>
						<p><b>Cidade:</b> <?php echo $value->NMCIDADE ?></p>
						<p><b>Bairro/Setor:</b> <?php echo $value->NMSETOR ?></p>
					</div>

					<div class="col-lg-4">
						<h3>CARACTERISTICAS</h3>
						<p><b>Quarto(s):</b> <?php echo $value->NQUARTO ?></p>
						<p><b>Suite (s):</b> <?php echo $value->NSUITE ?></p>
						<p><b>Vaga(s) Garagem:</b> <?php echo $value->NVAGA ?></p>
						<p><b>Banheiro(s):</b> <?php echo $value->BANHEIROIMOVEL ?></p>
						<p><b>Área Total:</b> <?php echo $value->AREAIMOVEL ?> m²</p>

					</div>

					<div class="col-lg-4">
						<h3>CONDIÇÕES</h3>
						<p><b>Valor líquido:</b> <?php echo 'R$'.$value->VALORIMOVEL ?></p>
						<p><b>Outro Valores:</b> <?php echo $value->OUTROVALORES ?></p>					
					</div>
				<?php endforeach ?>
			</div>			
		</div>
		<div class="row">		

			<div class="col-lg-12">
				<hr>
				
				<div id="map" style="width:100%;height:400px;"></div>
			    <script>
			      function initMap() {
			        var myLatLng = {lat: -16.7124336, lng: -49.2866779};

			        var map = new google.maps.Map(document.getElementById('map'), {
			          zoom: 15,
			          center: myLatLng
			        });

			        var marker = new google.maps.Marker({
			          position: myLatLng,
			          map: map,
			          title: 'Hello World!'
			        });


			      }	 
			    </script>
			</div>			
			<div class="col-lg-12">
				<hr>
				<h3>Fale Conosco</h3>
			</div>
			<form method="post" enctype="multipart/form-data" action="<?php echo base_url('imovel/enviar') ?>">
				<!--DADOS DO IMOVEL PARA ENVIAR -->
				<?php foreach ($imoveis as  $value): ?>
					<input type="hidden" name="referencia" value="<?php echo $value->REFERENCIA ?>">
				<?php endforeach; ?>	

				<div class="form-group col-lg-6">
					<label for="email">Nome</label>
					<input type="text" class="form-control" name="" value="" placeholder="">			    
				</div>
				<div class="form-group col-lg-3">
					<label for="exampleInputPassword1">Telefone</label>
					<input type="text" class="form-control" id="telefone" name="telefone" placeholder="(62) 9888-0000">
				</div>
				<div class="form-group col-lg-3">
					<label for="exampleInputPassword1">Celular</label>
					<input type="text" class="form-control" id="telefone" name="telefone" placeholder="(62) 9888-0000">
				</div>
				<div class="form-group col-lg-6">
					<label for="exampleTextarea">Mensagem</label>
					<textarea class="form-control" id="exampleTextarea" rows="1"></textarea>
				</div>	

				<div class="form-group col-lg-6">
					<label for="exampleInputPassword1">E-mail</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
				</div>	

				
				<div class="form-group col-lg-12">						
					<button type="submit" class="btn btn-primary">Enviar</button>
				</div>
			</form>			
		</div>
	</div>	
</div>
