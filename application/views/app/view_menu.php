
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">APP</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                            <span class="pull-right text-muted">
                                <em>Yesterday</em>
                            </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                            <span class="pull-right text-muted">
                                <em>Yesterday</em>
                            </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                            <span class="pull-right text-muted">
                                <em>Yesterday</em>
                            </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>Read All Messages</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-messages -->
        </li>        
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="<?php echo site_url("app/auth/logout") ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                
                <li>
                    <a href="<?php echo base_url('app/dashboard')?>"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                </li>
                <li>
                    <a href="<?php echo base_url('app/orcamento')?>"><i class="fa fa-dashboard fa-fw"></i>Orçamentos</a>
                </li>
                <li>
                    <a href="<?php echo base_url('app/tipo')?>"><i class="fa fa-dashboard fa-fw"></i> Tipo Imóvel</a>
                </li>
                <li>
                    <a href="<?php echo base_url('app/finalidade')?>"><i class="fa fa-dashboard fa-fw"></i> Finalidade</a>
                </li>
                <li>
                    <a href="<?php echo base_url('app/opcao')?>"><i class="fa fa-dashboard fa-fw"></i> Opção</a>
                </li>
                <li>
                    <a href="<?php echo base_url('app/vaga')?>"><i class="fa fa-dashboard fa-fw"></i> Vagas de Garagem</a>
                </li>
                <li>
                    <a href="<?php echo base_url('app/suite')?>"><i class="fa fa-dashboard fa-fw"></i> Suites</a>
                </li>
                <li>
                    <a href="<?php echo base_url('app/setor')?>"><i class="fa fa-dashboard fa-fw"></i> Setor/Bairro</a>
                </li>
                <li>
                    <a href="<?php echo base_url('app/imovel')?>"><i class="fa fa-dashboard fa-fw"></i> Imoveis</a>
                </li>

                <li>
                    <a href="<?php echo base_url('app/galeria')?>"><i class="fa fa-dashboard fa-fw"></i> Galeria</a>
                </li>
               
                <li>
                    <a href="#">
                        <i class="fa fa-dashboard fa-fw">                        
                        </i> Configurações<span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo base_url('app/config/index/1')?>">Configuração</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('app/seo')?>">SEO</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Relatórios<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="flot.html">Flot Charts</a>
                        </li>
                        <li>
                            <a href="morris.html">Morris.js Charts</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>