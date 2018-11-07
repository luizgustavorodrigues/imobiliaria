<div class="topo"></div>
<header>
  <nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          <?php $arrayName = array('src' => base_url('public/site/assets/img/logo.png'),'class'=>'img-responsive');
                echo img($arrayName);
           ?>
        </a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">        
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo base_url('home') ?>">Home</a></li>
          <li><a href="#">Sobre Nos</a></li>
          <li><a href="#">Vendas</a></li>        
          <li><a href="#">Locação</a></li> 
          <li><a href="#">Lançamentos</a></li> 
          <li><a href="#">Contatos</a></li> 
        </ul>
       <ul class="contatos ">
          <li class="whatsapp">
            <span>Whatsapp</span>
            <a href="#">
              <small>62</small>
                99678 9911
            </a>
          </li>
          <li class="telefone">
            <span>Telefone</span>
            <a href="#">
              <small>62</small>
                99678 9911
            </a>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav> 
</header>






