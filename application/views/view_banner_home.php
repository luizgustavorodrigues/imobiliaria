<section class="fundo-busca-imoveis menu-index" id="busca-desktop">          
  <div class="container">
    <form id="form-busca-desktop" method="post" action="<?php echo base_url('imovel/busca') ?>" enctype="multipart/form-data" />
      <div class="col-sm-10 col-xs-12 ">

        <div class="col-sm-3 col-xs-12 form-group">
          <div class="dropdown">
             <select name="opcao" class="form-control" required="required">              
               <option value="" disabled>O Que deseja</option>
              <?php foreach ($opcoes as $value): ?>
                <option value="<?php echo $value->CODOPCAO ?>" ><?php echo $value->NMOPCAO ?></option>
              <?php endforeach ?>                           
            </select>            
          </div>      
        </div>

        <div class="col-sm-3 col-xs-12 form-group">
          <div class="dropdown">
             <select name="finalidade" class="form-control" required="required">
              <option value="">Finalidade</option> 
              <?php foreach ($finalidade as $value): ?>
                <option value="<?php echo $value->CODFINALIDADE ?>" required="required"><?php echo $value->NMFINALIDADE ?></option>
              <?php endforeach ?>                 
            </select>
          </div>      
        </div>

        <div class="col-sm-2 col-xs-12 form-group">
          <div class="dropdown">
            <select name="tipo" class="form-control" required="required">
              <option value="">Tipo</option> 
              <?php foreach ($tipos as $value): ?>
                <option value="<?php echo $value->CODTIPOIMOVEL ?>"><?php echo $value->NMTIPOIMOVEL ?></option>
              <?php endforeach ?>               
            </select>
          </div>      
        </div>      

        <div class="col-sm-2 col-xs-12 form-group">
          <div class="dropdown">
            <select name="cidade" class="form-control" required="required">
              <option value="">Cidade</option> 
               <?php foreach ($cidades as $value): ?>
                <option value="<?php echo $value->CODCIDADE ?>"><?php echo $value->NMCIDADE ?></option>
              <?php endforeach ?>              
            </select>
          </div>      
        </div>  

        <div class="col-sm-2 col-xs-12 form-group" id="quartos-desk" style="">
          <div class="dropdown">
            <select name="quarto" class="form-control" required="required">
              <option value="">Quartos</option> 
              <?php foreach ($quartos as $value): ?>
                <option value="<?php echo $value->CODQUARTO ?>"><?php echo $value->NQUARTO ?></option>
              <?php endforeach ?>             
            </select>
          </div>      
        </div> 
                                             
      </div>    
      <div class="col-sm-2 col-xs-12 padding_right">
        <input type="submit" value="BUSCAR" class="btn btn-default">
      </div>  

    </form>
  </div>
</section>

<div id="myCarousel" class="carousel slide ">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>            
    </ol>
    
    <div class="carousel-inner">        
        <figure class="item active">                            
            <?php 
                $att = array(
                'src'=>base_url("public/site/assets/img/slide02-1600x667.jpg"),'class'=>"fill");
                echo anchor(base_url("#"),img($att));
            ?>
            <div class="carousel-caption">
                
            </div>
        </figure>
        
        <figure class="item">                            
            <?php 
                $att = array(
                'src'=>base_url("public/site/assets/img/slide02-1600x667.jpg"),'class'=>"fill");
                echo anchor(base_url("#"),img($att));
            ?>
            <div class="carousel-caption">
                
            </div>
        </figure>         
    </div>    
    
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</div><!--FIM BANNER-->



