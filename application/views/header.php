<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard I Admin Panel</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide();; //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

   <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Ano', 'Colibri', 'Winalite','Salario Fixo'],
          ['Mar',  1000,      1400     ,  1000        ],
          ['Abr',  1170,      1460     ,  1000        ],
          ['Mai',  1660,      1120     ,  1700        ],
          ['Jun',  1030,      540      ,  1000        ]

        ]);

        var options = {
          title: 'Empresas que trabalho'
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

</head>


<body>


	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.html">FEPAMI</a></h1>
			<h2 class="section_title">SISGAI</h2><div class="btn_view_site"><a href="http://www.medialoot.com">Logout</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p style="index-z:+10;">Nome do Usuario</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.html">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
  
            <img src="#" width="150" height="180" style="margin-left: 15px; margin-top: 15px;"/>
            
            <h3>Usuario</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="#">adicionar novo Contato</a></li>
			<li class="icn_view_users"><a href="#">Planejamento de ação</a></li>
			<li class="icn_money"><a href="#">Controle Financeiro</a></li>
                        <li class="icn_tags"><a href="#">Meus Afiliados</a></li>
                        <li class="icn_tags"><a href="#">Criar alerta</a></li>
		</ul>

                <h3>Filiais</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="#">adicionar Indicações</a></li>
			<li class="icn_view_users"><a href="#">Visualizar Indicação</a></li>
			<li class="icn_profile"><a href="#">Editar Indicação</a></li>
                        <li class="icn_tags"><a href="#">Excluir Indicação</a></li>
		</ul>
                <h3>Instrutores</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="#">Cartão de Visitas</a></li>
			<li class="icn_edit_article"><a href="#">Alterar Senha</a></li>
			<li class="icn_categories"><a href="#">Alterar dados Pessoais</a></li>
			
		</ul>
		<h3>Coordenação</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="#">Anunciar Evento</a></li>
			<li class="icn_photo"><a href="#">Postar Fotos</a></li>
			<li class="icn_audio"><a href="#">Palestras</a></li>
			<li class="icn_video"><a href="#"> Vídeo Conferencia</a></li>
		</ul>
		<h3>Administração</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="#">Envios de alertas</a></li>
			<li class="icn_security"><a href="#">Termo de Segurança</a></li>
			<li class="icn_jump_back"><a href="#">Logout</a></li>
		</ul>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2012 Zero & Um</strong></p>
			<p>Theme feito por <a href="http://www.medialoot.com">MediaLoot</a></p>
		</footer>
	</aside><!-- end of sidebar -->