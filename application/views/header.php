<html>
    <head>
        <title>FEPAMI</title>
        <meta http-equiv="content-type" content="text/html" charset="ISO-8859-1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.2.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.ui.custom.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/unicorn.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.chosen.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/chosen.jquery.js"></script>


<!--<script src="<?php // echo base_url();  ?>assets/js/unicorn.dashboard.js"></script>-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/unicorn.main.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/unicorn.grey.css" class="skin-color">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.css">

    </head>

    <body>
        <div id="header">

        </div>
        <div id="search">

        </div>
        <div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group">
                <li class="btn btn-inverse"><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
            </ul>
        </div>
        <div id="sidebar">
            <img src="http://placehold.it/140x190/000000/FFFFFF&text=%3F" class="img-polaroid" style="margin: 20px;">

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
                        <li class="icn_categories"><a href="<?php echo site_url('instrutores/manutencao'); ?>">Manuten��o de participantes em Gradua��o de Faixa</a></li>
                        <li class="icn_folder"><a href="<?php echo site_url('instrutores/evento') ?>">Verificar notas de Gradua��o de faixa</a></li>

                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="icon icon-th-large"></i> <span>Coordenadores</span> </a>
                    <ul>
                        <li class="icn_new_article"><a href="<?php echo site_url('coordenador/modalidade'); ?>">Verificar professores da modalidade</a></li>
                        <li class="icn_categories"><a href="<?php echo site_url('coordenador/index'); ?>">Manuten��o de dados de filiais</a></li>
                        <li class="icn_new_article"><a href="<?php echo site_url('coordenador/index'); ?>">Emitir certificados</a></li>
                        <li class="icn_folder"><a href="<?php echo site_url('coordenador/index'); ?>">Enviar pedido de compra de faixa</a></li>
                        <li class="icn_new_article"><a href="<?php echo site_url('coordenador/index'); ?>">Emitir prontu�rio de notas para pr�-avalia��o</a></li>
                        <li class="icn_categories"><a href="<?php echo site_url('coordenador/index'); ?>">Manuten��o do Curr�culo da modalidade</a></li>
                        <li class="icn_edit_article"><a href="<?php echo site_url('coordenador/index'); ?>">Verificar rela��o de participantes em Gradua��o</a></li>
                        <li class="icn_new_article"><a href="<?php echo site_url('coordenador/index') ?>">Criar evento de Gradua��o</a></li>
                        <li class="icn_edit_article"><a href="<?php echo site_url('coordenador/index') ?>">Lan�ar Notas</a></li>

                    </ul>
                </li>


                <li class="submenu">
                    <a href="#"><i class="icon icon-th"></i> <span>Administrador</span> </a>
                    <ul>
                        <li class="icn_folder"><a href="<?php echo site_url('administrador/notificacoes'); ?>">Enviar notifica��es via e-mail</a></li>
                        <li class="icn_categories"><a href="<?php echo site_url('administrador/federados'); ?>">Manuten��o de dados de Federados</a></li>
                        <li class="icn_money"><a href="<?php echo site_url('administrador/pedidos'); ?>">Manuten��o de pedidos de compra de faixa</a></li>
                        <li class="icn_tags"><a href="<?php echo site_url('administrador/historico'); ?>">Verificar Hist�rico de atividades de Federado</a></li>
                        <li class="icn_categories"><a href="<?php echo site_url('administrador/filiais'); ?>">Manuten��o de dados de Filiais</a></li>
                        <li class="icn_edit_article"><a href="<?php echo site_url('administrador/maladireta'); ?>">Manuten��o de mala-direta � aniversariantes</a></li>

                    </ul>
                </li>

            </ul>

        </div>


        <div id="content">


