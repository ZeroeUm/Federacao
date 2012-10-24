<!doctype html>
<html lang="en">

    <head>


        <title>Sistema Gerenciador de Atividades Internas &mdash; Federação Paulista de Artes Marciais Interestilos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/style.css' ?>" />
        
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap-responsive.css' ?>" />
        <!--[if lt IE 9]>
        <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-1.8.2.min.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/hideshow.js' ?>">         </script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.tablesorter.min.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.equalHeight.js' ?>"></script>
<!--        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/funcoes.js' ?>"></script>-->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
        
        



    </head>


    <body>

        <header id="header">
            <hgroup>
                <h1 class="site_title"><a href="#">FEPAMI</a></h1>
                <h2 class="section_title">SISGAI</h2><div class="btn_view_site"><a href="#">Logout</a></div>
            </hgroup>
        </header> <!-- end of header bar -->

        <section id="secondary_bar">
            <div class="user">
                <p style="index-z:+10;">Nome do usuário</p>
                <!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
            </div>
            <div class="breadcrumbs_container">
                <article class="breadcrumbs"><a href="<?php echo site_url(); ?>">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
            </div>
        </section><!-- end of secondary bar -->

        <aside id="sidebar" class="column">
            <div style="padding:20px"><img src="http://placehold.it/140x140" class="img-polaroid"></div>
            <h3>Alunos</h3>
            <ul class="toggle">
                <li class="icn_profile"><a href="<?php echo site_url('alunos/notas'); ?>">Histórico pessoal de notas</a></li>
                <li class="icn_folder"><a href="<?php echo site_url('alunos/eventos'); ?>">Cronograma de eventos da Federação</a></li>
                <li class="icn_view_users"><a href="<?php echo site_url('alunos/historico'); ?>">Histórico de atividades</a></li>
                <li class="icn_folder"><a href="<?php echo site_url('alunos/modalidade'); ?>">Currículo da modalidade</a></li>
            </ul>

            <h3>Instrutores</h3>
            <ul class="toggle">
                <li class="icn_edit_article"><a href="<?php echo site_url('instrutores/cadastro'); ?>">Manutenção de dados de alunos</a></li>
                <li class="icn_add_user"><a href="<?php echo site_url('instrutores/novoaluno'); ?>">Cadastrar novo aluno na Federação</a></li>
                <li class="icn_tags"><a href="<?php echo site_url('instrutores/inscricao'); ?>">Inscrever alunos em Graduação de Faixa</a></li>
                <li class="icn_categories"><a href="<?php echo site_url('instrutores/manutencao'); ?>">Manuteção de participantes em Graduação de Faixa</a></li>
            </ul>
            
            <h3>Coordenadores</h3>
            <ul class="toggle">
                <li class="icn_new_article"><a href="<?php echo site_url('coordenador/professores'); ?>">Verificar professores da modalidade</a></li>
                <li class="icn_categories"><a href="<?php echo site_url('coordenador/filiais'); ?>">Manutenção de dados de filiais</a></li>
                <li class="icn_new_article"><a href="<?php echo site_url('coordenador/certificados'); ?>">Emitir certificados</a></li>
                <li class="icn_folder"><a href="<?php echo site_url('coordenador/comprafaixas'); ?>">Enviar pedido de compra de faixa</a></li>
                <li class="icn_new_article"><a href="<?php echo site_url('coordenador/prontuario'); ?>">Emitir prontuário de notas para pré-avaliação</a></li>
                <li class="icn_categories"><a href="<?php echo site_url('coordenador/modalidade'); ?>">Manutenção do currículo da modalidade</a></li>
                <li class="icn_edit_article"><a href="<?php echo site_url('coordenador/graduados'); ?>">Verificar relação de participantes em Graduação</a></li>
            </ul>
            <h3>Administrador</h3>
            <ul class="toggle">
                <li class="icn_folder"><a href="<?php echo site_url('administrador/notificacoes'); ?>">Enviar notificações via e-mail</a></li>
                <li class="icn_categories"><a href="<?php echo site_url('administrador/federados'); ?>">Manutenção de dados de Federados</a></li>
                <li class="icn_money"><a href="<?php echo site_url('administrador/pedidos'); ?>">Manutenção de pedidos de compra de faixa</a></li>
                <li class="icn_tags"><a href="<?php echo site_url('administrador/historico'); ?>">Verificar histórico de atividades de Federado</a></li>
                <li class="icn_categories"><a href="<?php echo site_url('administrador/filiais'); ?>">Manutenção de dados de Filiais</a></li>
                <li class="icn_edit_article"><a href="<?php echo site_url('administrador/maladireta'); ?>">Manuntenção de mala-direta à aniversariantes</a></li>
            </ul>

            <footer>
                <hr />
                <p><strong>Copyright &copy; 2012 Zero &amp; Um Projetos para TI</strong></p>
                <p>Theme feito por <a href="http://www.medialoot.com">MediaLoot</a></p>
            </footer>
        </aside><!-- end of sidebar -->
        
     <section id="main" class="column">   
         <div id="content">
             
         