<div id="content" role="home">
	<div class="container" id="venda-home">
		<div class="row">
			<div class="col-lg-12">
				<h1>Imóveis <span></span></h1>
			</div>
			<?php foreach ($imoveis as $value): ?>
				<div class="col-lg-3 ">
					<div class="item-home">
						<a href="<?php echo base_url('imovel/detalhe/'.$value->CODIMOVEL) ?>">
							<figure>
								<?php 
									$arrayimg = array('src' =>base_url('public/site/assets/img/imoveis/'.$value->IMGIMOVEL) ,'class'=>'img-responsive' );
									echo img($arrayimg);
								 ?>
							</figure>
						</a>
						<p><?php echo $value->NMSETOR; ?></p>
						<p class="preco"><?php 

							echo 'R$ ' . number_format($value->VALORIMOVEL, 3, ',', '.');

						?></p>
						<p><?php echo $value->REFERENCIA; ?></p>
						<p><?php echo $value->NMTIPOIMOVEL; ?></p>
						<p><?php echo $value->NQUARTO.' quarto(s),  '.$value->NVAGA.' vaga(s), '.$value->AREAIMOVEL.'M²'; ?></p>
					</div>
				</div>
			<?php endforeach; ?>					
		</div>
	</div>
</div>
