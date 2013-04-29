
<html>
    <head>
        <title>FEPAMI</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/unicorn.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.chosen.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/chosen.jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>



        <script src="<?php echo base_url(); ?>assets/js/meio.mask.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/mascaras.js"></script>

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/unicorn.main.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/unicorn.grey.css" class="skin-color">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">


    </head>
    <script>
        $(document).ready(function(){
            $('.menu_<?php echo $this->uri->segment(1); ?>').addClass('open');
        
       


	// Evento de clique do elemento: ul#menu li.parent > a
	$('ul#menu li.parent > a').click(function() {
		
                // Expande ou retrai o elemento ul.sub-menu dentro do elemento pai (ul#menu li.parent)
		$('ul.sub-menu',$(this).parent()).slideToggle('fast');
		return false;
                
                
	});
    

        
        });
    </script>


    <body>
        <div id="header">

        </div>
        <div id="search">

        </div>
        <div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group">
                <li class="btn btn-inverse"><a title="Trocar senha de acesso" href="<?php echo base_url() ?>login/trocarSenha/<?php echo $this->session->userdata('id') ?>"><i class="icon icon-user"></i><span class="text">Trocar senha de acesso</span></a></li>
                <li class="btn btn-inverse"><a title="Logoff do sistema" href="<?php echo base_url() ?>login/logoff"><i class="icon icon-off"></i> <span class="text">Logout</span></a></li>
            </ul>
        </div>

        <!--sideBar-->
        <div id="sidebar" style="position: absolute">
            <div style="width: 150px;height: 180px;">
                <img width="140px" heigth="190px" src="<?php echo base_url() . (($this->session->userdata('foto') != "sem foto") ? "federados/fotos/" . $this->session->userdata('foto') : "federados/default.gif") ?>" class="img-polaroid" style="margin: 20px;z-index: 1000;float: left">
            </div>    
            <a href="#" class="visible-phone"><i class="icon icon-home"></i> Menu oculto</a>
            <ul style="display: block; ">
                <li >
                    <a href="#"><span>Nome: <?php echo $this->session->userdata('nome'); ?></span></a> 
                    <a href="#"><span>Categoria: <?php echo $this->session->userdata('modalidade') ?></span></a> 

                </li>


                <li><a href="<?php echo site_url(); ?>"><i class="icon icon-home"></i> <span>Home</span> </a></li>
                <li class="submenu menu_aluno">
                    <a href="#"><i class="icon icon-pause"></i> <span>Alunos</span> </a>
                    <ul>
                        <li><a href="<?php echo site_url('alunos/notas'); ?>">Histórico pessoal de notas</a></li>
                        <li><a href="<?php echo site_url('alunos/eventos'); ?>">Cronograma de eventos da Federação</a></li>
                        <li><a href="<?php echo site_url('alunos/historico'); ?>">Histórico de atividades</a></li>
                        <li><a href="<?php echo site_url('alunos/modalidade'); ?>">Currículo da modalidade</a></li>

                    </ul>
                </li>

                <li class="submenu menu_instrutores">
                    <a href="#"><i class="icon icon-th-list"></i> <span>Instrutores</span> </a>
                    <ul>
                        <li class="icn_edit_article"><a href="<?php echo site_url('instrutores/cadastro'); ?>">Manutençao de dados de alunos</a></li>
                        <li class="icn_add_user"><a href="<?php echo site_url('instrutores/novoaluno'); ?>">Cadastrar novo aluno na Federação</a></li>
                        <li class="icn_tags"><a href="<?php echo site_url('instrutores/inscricao'); ?>">Inscrever alunos em Graduação de Faixa</a></li>
                        <li class="icn_categories"><a href="<?php echo site_url('instrutores/manutencao'); ?>">Manutenção de participantes em Graduação de Faixa</a></li>
                        <li class="icn_folder"><a href="<?php echo site_url('instrutores/evento') ?>">Verificar notas de Graduação de faixa</a></li>

                    </ul>
                </li>

                <li class="submenu menu_coordenador">
                    <a href="#"><i class="icon icon-th-large"></i> <span>Coordenadores</span> </a>
                   
                    <ul id="menu">
                        <li class="parent">
                            <a href="#" title="">Pré-Avaliação</a>
                            <ul class="sub-menu">
                                <li><a href="#" title="">Agendar pré-Avaliação</a></li>
                                <li><a href="#" title="">Cancelar agendamento</a></li>
                                <li><a href="#" title="">Listagem de Avaliados</a></li>
                                <li><a href="#" title="">Lançar Notas</a></li>
                            </ul>
                        </li>
                        
                         <li class="parent">
                            <a href="#" title="">Eventos</a>
                            <ul class="sub-menu">
                                <li><a href="#" title="">Cadastrar novo evento</a></li>
                                <li><a href="#" title="">Lista de eventos</a></li>
                                <li><a href="#" title="">Solicitar Faixas</a></li>
                            </ul>
                        </li>
                        
                        
                        <li class="parent">
                            <a href="#" title="">Filiais</a>
                            <ul class="sub-menu">
                                <li><a href="#" title="">Cadastrar nova filial</a></li>
                                <li><a href="#" title="">Lista de instrutores</a></li>
                            </ul>
                        </li>
                        
                        
                        <li class="parent">
                            <a href="#" title="">Modalidade</a>
                            <ul class="sub-menu">
                                <li><a href="#" title="">Ver curriculo</a></li>
                                
                            </ul>
                        </li>
                    </ul>    

                    <!--                    <ul>
                                            <li class="icn_new_article"><a href="<?php echo site_url('coordenador/modalidade'); ?>">Verificar professores da modalidade</a></li>
                                            <li class="icn_categories"><a href="<?php echo site_url('administrador/filiais'); ?>">Manutenção de dados de filiais</a></li>
                                            <li class="icn_new_article"><a href="<?php echo site_url('coordenador/certificado'); ?>">Emitir certificados</a></li>
                                            <li class="icn_folder"><a href="<?php echo site_url('coordenador/index'); ?>">Enviar pedido de compra de faixa</a></li>
                                            <li class="icn_new_article"><a href="<?php echo site_url('coordenador/pre_avaliar'); ?>">Lista de inscritos para pré-avaliação</a></li>
                                            <li class="icn_categories"><a href="<?php echo site_url('coordenador/curriculo'); ?>">Manutenção do Curriculo da modalidade</a></li>
                                            <li class="icn_edit_article"><a href="<?php echo site_url('coordenador/listaEventos'); ?>">Verificar relação de participantes em Graduação</a></li>
                                            <li class="icn_new_article"><a href="<?php echo site_url('coordenador/criarEvento') ?>">Criar evento de Graduação</a></li>
                                            <li class="icn_edit_article"><a href="<?php echo site_url('coordenador/notas') ?>">Lançar Notas</a></li>
                                        </ul>-->
                </li>

                <li class="submenu menu_administrador " >
                    <a href="#"><i class="icon icon-th"></i> <span>Administrador</span> </a>
                    <ul>
                        <li class="icn_folder"><a href="<?php echo site_url('administrador/notificacoes'); ?>">Enviar notificações via e-mail</a></li>
                        <li class="icn_categories"><a href="<?php echo site_url('administrador/federados'); ?>">Manutenção de dados de Federados</a></li>
                        <li class="icn_money"><a href="<?php echo site_url('administrador/pedidos'); ?>">Manutenção de pedidos de compra de faixa</a></li>
                        <li class="icn_tags"><a href="<?php echo site_url('administrador/historico'); ?>">Verificar Histórico de atividades de Federado</a></li>
                        <li class="icn_categories"><a href="<?php echo site_url('administrador/filiais'); ?>">Manutenção de dados de Filiais</a></li>
                        <li class="icn_edit_article"><a href="<?php echo site_url('administrador/maladireta'); ?>">Manutenção de mala-direta à aniversariantes</a></li>

                    </ul>
                </li>

            </ul>

        </div>

        <div id="content" style="min-height:800px;padding-bottom: 50px;">
            <?php if (@$this->session->flashdata('alerta') != '') { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>  
                    <?php echo $this->session->flashdata('alerta'); ?>
                </div>
            <?php } ?>
            <ul class="breadcrumb">
                <li><a href="/">Home</a> <span class="divider">/</span></li>
                <li><a href="/<?php echo $this->uri->segment(1); ?>/"><?php echo ucfirst($this->uri->segment(1)); ?></a> <span class="divider">/</span></li>
                <li class="active"><?php echo str_replace("_", " ", ucfirst($this->uri->segment(2))); ?></li>
            </ul>



