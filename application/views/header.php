<html>
    <head>
        <title>FEPAMI</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fullcalendar.css">	
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/unicorn.main.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/unicorn.grey.css" class="skin-color">
        <link rel="stylesheet" type="text/css" href="chrome-extension://pbcgnkmbeodkmiijjfnliicelkjfcldg/content/css/gmail.css">
        <script src="<?php echo base_url(); ?>assets/js/excanvas.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.ui.custom.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.flot.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.flot.resize.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.peity.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/fullcalendar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/unicorn.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/unicorn.dashboard.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    </head>

    <body>
        <div id="header">

        </div>
        <div id="search">

        </div>
        <div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group">
                <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-user"></i> <span class="text">Profile</span></a></li>
                <li class="btn btn-inverse dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a class="sAdd" title="" href="#">new message</a></li>
                        <li><a class="sInbox" title="" href="#">inbox</a></li>
                        <li><a class="sOutbox" title="" href="#">outbox</a></li>
                        <li><a class="sTrash" title="" href="#">trash</a></li>
                    </ul>
                </li>

                <li class="btn btn-inverse"><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
            </ul>
        </div>
        <div id="sidebar">
            <img src="http://placehold.it/140x140" class="img-polaroid" style="margin: 20px;">

            <a href="#" class="visible-phone"><i class="icon icon-home"></i> Menu oculto</a>
            <ul style="display: block; ">
                <li >
                    <a href="#"><span>Nome:Nome completo do Aluno</span></a> 
                    <a href="#"><span>Categoria: Jud�</span></a> 

                </li>


                <li><a href="<?php echo site_url(); ?>"><i class="icon icon-home"></i> <span>Home</span> </a></li>
                <li class="submenu">
                    <a href="#"><i class="icon icon-pause"></i> <span>Alunos</span> </a>
                    <ul>
                        <li><a href="<?php echo site_url('alunos/notas'); ?>">Hist�rico pessoal de notas</a></li>
                        <li><a href="<?php echo site_url('alunos/eventos'); ?>">Cronograma de eventos da Federa��o</a></li>
                        <li><a href="<?php echo site_url('alunos/historico'); ?>">Hist�rico de atividades</a></li>
                        <li><a href="<?php echo site_url('alunos/modalidade'); ?>">Curr�culo da modalidade</a></li>

                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="icon icon-th-list"></i> <span>Instrutores</span> </a>
                    <ul>
                        <li class="icn_edit_article"><a href="<?php echo site_url('instrutores/cadastro'); ?>">Manuten��o de dados de alunos</a></li>
                        <li class="icn_add_user"><a href="<?php echo site_url('instrutores/novoaluno'); ?>">Cadastrar novo aluno na Federa��o</a></li>
                        <li class="icn_tags"><a href="<?php echo site_url('instrutores/inscricao'); ?>">Inscrever alunos em Gradua��o de Faixa</a></li>
                        <li class="icn_categories"><a href="<?php echo site_url('instrutores/manutencao'); ?>">Manute��o de participantes em Gradua��o de Faixa</a></li>
                        <li class="icn_folder"><a href="<?php echo site_url('instrutores/evento') ?>">Verificar notas de gradua��o de faixa</a></li>

                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="icon icon-th-large"></i> <span>Coordenadores</span> </a>
                    <ul>
                        <li class="icn_new_article"><a href="<?php echo site_url('coordenador/professores'); ?>">Verificar professores da modalidade</a></li>
                        <li class="icn_categories"><a href="<?php echo site_url('coordenador/filiais'); ?>">Manuten��o de dados de filiais</a></li>
                        <li class="icn_new_article"><a href="<?php echo site_url('coordenador/certificados'); ?>">Emitir certificados</a></li>
                        <li class="icn_folder"><a href="<?php echo site_url('coordenador/comprafaixas'); ?>">Enviar pedido de compra de faixa</a></li>
                        <li class="icn_new_article"><a href="<?php echo site_url('coordenador/prontuario'); ?>">Emitir prontu�rio de notas para pr�-avalia��o</a></li>
                        <li class="icn_categories"><a href="<?php echo site_url('coordenador/modalidade'); ?>">Manuten��o do curr�culo da modalidade</a></li>
                        <li class="icn_edit_article"><a href="<?php echo site_url('coordenador/graduados'); ?>">Verificar rela��o de participantes em Gradua��o</a></li>
                        <li class="icn_new_article"><a href="<?php echo site_url('coordenador/eventos') ?>">Criar evento de gradua��o</a></li>
                        <li class="icn_edit_article"><a href="<?php echo site_url('coordenador/notas') ?>">Lan�ar Notas</a></li>

                    </ul>
                </li>


                <li class="submenu">
                    <a href="#"><i class="icon icon-th"></i> <span>Administrador</span> </a>
                    <ul>
                        <li class="icn_folder"><a href="<?php echo site_url('administrador/notificacoes'); ?>">Enviar notifica��es via e-mail</a></li>
                        <li class="icn_categories"><a href="<?php echo site_url('administrador/federados'); ?>">Manuten��o de dados de Federados</a></li>
                        <li class="icn_money"><a href="<?php echo site_url('administrador/pedidos'); ?>">Manuten��o de pedidos de compra de faixa</a></li>
                        <li class="icn_tags"><a href="<?php echo site_url('administrador/historico'); ?>">Verificar hist�rico de atividades de Federado</a></li>
                        <li class="icn_categories"><a href="<?php echo site_url('administrador/filiais'); ?>">Manuten��o de dados de Filiais</a></li>
                        <li class="icn_edit_article"><a href="<?php echo site_url('administrador/maladireta'); ?>">Manunten��o de mala-direta � aniversariantes</a></li>

                    </ul>
                </li>

            </ul>

        </div>


        <div id="content">


            <div id="conteiner">