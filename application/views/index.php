<!doctype html>
<html lang="en">

    <head>


        <title>Sistema Gerenciador de Atividades Internas &mdash; Federação Paulista de Artes Marciais Interestilos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/style.css' ?>" />
        <!--[if lt IE 9]>
        <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-1.8.2.min.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/hideshow.js' ?>">         </script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.tablesorter.min.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.equalHeight.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/funcoes.js' ?>"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>





    </head>


    <body>

        <header id="header">
            <hgroup>
                <h1 class="site_title"><a href="index.html">FEPAMI</a></h1>
                <h2 class="section_title">SISGAI</h2><div class="btn_view_site"><a href="#">Logout</a></div>
            </hgroup>
        </header> <!-- end of header bar -->

        <section id="secondary_bar">
            <div class="user">
                <p style="index-z:+10;">Nome do usuário</p>
                <!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
            </div>
            <div class="breadcrumbs_container">
                <article class="breadcrumbs"><a href="index.html">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
            </div>
        </section><!-- end of secondary bar -->

        <aside id="sidebar" class="column">
            <img src="#" alt="imagem usuário" title="imagem usuario" width="150" height="200" style="padding:5px 20px" />
            <h3>Alunos</h3>
            <ul class="toggle">
                <li class="icn_profile"><a href="#">Histórico pessoal de notas</a></li>
                <li class="icn_folder"><a href="#">Cronograma de eventos da Federação</a></li>
                <li class="icn_view_users"><a href="#">Histórico de atividades</a></li>
                <li class="icn_folder"><a href="#">Currículo da modalidade</a></li>
            </ul>

            <h3>Instrutores</h3>
            <ul class="toggle">
                <li class="icn_edit_article"><a href="#">Manutenção de dados de alunos</a></li>
                <li class="icn_add_user"><a href="#">Cadastrar novo aluno na Federação</a></li>
                <li class="icn_tags"><a href="#">Inscrever alunos em Graduação de Faixa</a></li>
                <li class="icn_categories"><a href="#">Manuteção de participantes em Graduação de Faixa</a></li>
            </ul>
            
            <h3>Coordenadores</h3>
            <ul class="toggle">
                <li class="icn_new_article"><a href="#">Verificar professores da modalidade</a></li>
                <li class="icn_categories"><a href="#">Manutenção de dados de filiais</a></li>
                <li class="icn_new_article"><a href="#">Emitir certificados</a></li>
                <li class="icn_folder"><a href="#">Enviar pedido de compra de faixa</a></li>
                <li class="icn_new_article"><a href="#">Emitir prontuário de notas para pré-avaliação</a></li>
                <li class="icn_categories"><a href="#">Manutenção do currículo da modalidade</a></li>
                <li class="icn_edit_article"><a href="#">Verificar relação de participantes em Graduação</a></li>
            </ul>
            <h3>Administrador</h3>
            <ul class="toggle">
                <li class="icn_folder"><a href="#">Enviar notificações via e-mail</a></li>
                <li class="icn_categories"><a href="#">Manutenção de dados de Federados</a></li>
                <li class="icn_money"><a href="#">Manutenção de pedidos de compra de faixa</a></li>
                <li class="icn_tags"><a href="#">Verificar histórico de atividades de Federado</a></li>
                <li class="icn_categories"><a href="#">Manutenção de dados de Filiais</a></li>
                <li class="icn_edit_article"><a href="#">Manuntenção de mala-direta à aniversariantes</a></li>
            </ul>

            <footer>
                <hr />
                <p><strong>Copyright &copy; 2012 Zero &amp; Um Projetos para TI</strong></p>
                <p>Theme feito por <a href="http://www.medialoot.com">MediaLoot</a></p>
            </footer>
        </aside><!-- end of sidebar -->

        <section id="main" class="column">

            <h4 class="alert_info">Bem vindo ao Dworker administração MMN.</h4>

            <article class="module width_full">
                <header><h3>Meus Ganhos</h3></header>
                <div class="module_content">
                    <article class="stats_graph style="width:90%; height:200px;">

                             <div id="chart_div" style="width: 90%; height: 200px;"></div>




                    </article>

                    <article class="stats_overview">
                        <div class="overview_today">
                            <p class="overview_day">Hoje</p>
                            <p class="overview_count">R$1,876</p>
                            <p class="overview_type">Saldo</p>
                            <p class="overview_count">8</p>
                            <p class="overview_type">Eventos</p>
                        </div>
                        <div class="overview_previous">
                            <p class="overview_day"> Meta</p>
                            <p class="overview_count">R$8,646</p>
                            <p class="overview_type">Saldo</p>
                            <p class="overview_count">45</p>
                            <p class="overview_type">Filiados</p>
                        </div>
                    </article>
                    <div class="clear"></div>
                </div>
            </article><!-- end of stats article -->

            <article class="module width_3_quarter">
                <header><h3 class="tabs_involved">Alcance seu Sucesso</h3>
                    <ul class="tabs">
                        <li><a href="#tab1">Indicações Recebidas</a></li>
                        <li><a href="#tab2">Artigos</a></li>
                    </ul>
                </header>

                <div class="tab_container">
                    <div id="tab1" class="tab_content">
                        <table class="tablesorter" cellspacing="0"> 
                            <thead> 
                                <tr> 
                                    <th></th> 
                                    <th>Nome</th> 
                                    <th>Telefone</th> 
                                    <th>Email</th> 
                                    <th>Actions</th> 
                                </tr> 
                            </thead> 
                            <tbody> 
                                <tr> 
                                    <td><input type="checkbox"></td> 
                                    <td>Lorem Ipsum Dolor Sit Amet</td> 
                                    <td>11-0000-3333</td> 
                                    <td>mail@mail.com.br</td>

                                    <td><input type="image" src="assets/images/icn_edit.png" title="Edit"><input type="image" src="assets/images/icn_trash.png" title="Trash"></td> 
                                </tr> 
                                <tr> 
                                    <td><input type="checkbox"></td> 
                                    <td>Lorem Ipsum Dolor Sit Amet</td> 
                                    <td>11-2222-3333</td> 
                                    <td>mail@mail.com.br</td> 
                                    <td><input type="image" src="assets/images/icn_edit.png" title="Edit"><input type="image" src="assets/images/icn_trash.png" title="Trash"></td> 
                                </tr> 
                                <tr> 
                                    <td><input type="checkbox"></td> 
                                    <td>Lorem Ipsum Dolor Sit Amet</td> 
                                    <td>11-1111-3333</td> 
                                    <td>mail@mail.com.br</td> 
                                    <td><input type="image" src="assets/images/icn_edit.png" title="Edit"><input type="image" src="assets/images/icn_trash.png" title="Trash"></td> 
                                </tr> 


                                <tr> 
                                    <td><input type="checkbox"></td> 
                                    <td>Lorem Ipsum Dolor Sit Amet</td> 
                                    <td>11-2222-3333</td> 
                                    <td>mail@mail.com.br</td> 
                                    <td><input type="image" src="assets/images/icn_edit.png" title="Edit"><input type="image" src="assets/images/icn_trash.png" title="Trash"></td> 
                                </tr> 
                                <tr> 
                                    <td><input type="checkbox"></td> 
                                    <td>Lorem Ipsum Dolor Sit Amet</td> 
                                    <td>11-2222-3333</td> 
                                    <td>mail@mail.com.br</td> 
                                    <td><input type="image" src="assets/images/icn_edit.png" title="Edit"><input type="image" src="assets/images/icn_trash.png" title="Trash"></td> 
                                </tr> 
                            </tbody> 
                        </table>
                    </div><!-- end of #tab1 -->

                    <div id="tab2" class="tab_content">
                        <table class="tablesorter" cellspacing="0"> 
                            <thead> 
                                <tr> 
                                    <th></th> 
                                    <th>Titulo</th> 
                                    <th>Autor by</th> 
                                    <th>Publicações</th> 
                                    <th>Actions</th> 
                                </tr> 
                            </thead> 
                            <tbody> 
                                <tr> 
                                    <td><input type="checkbox"></td> 
                                    <td>O melhor Vendedor do mundo</td> 
                                    <td>Mark Corrigan</td> 
                                    <td>5th April 2011</td> 
                                    <td><input type="image" src="assets/images/icn_edit.png" title="Edit"><input type="image" src="assets/images/icn_trash.png" title="Trash"></td> 
                                </tr> 
                                <tr> 
                                    <td><input type="checkbox"></td> 
                                    <td>Como alcançar o sucesso de forma eficaz</td> 
                                    <td>Jeremy Usbourne</td> 
                                    <td>6th April 2011</td> 
                                    <td><input type="image" src="assets/images/icn_edit.png" title="Edit"><input type="image" src="assets/images/icn_trash.png" title="Trash"></td> 
                                </tr>
                                <tr> 
                                    <td><input type="checkbox"></td> 
                                    <td>10 passos para o sucesso</td> 
                                    <td>Super Hans</td> 
                                    <td>10th April 2011</td> 
                                    <td><input type="image" src="assets/images/icn_edit.png" title="Edit"><input type="image" src="assets/images/icn_trash.png" title="Trash"></td> 
                                </tr> 
                                <tr> 
                                    <td><input type="checkbox"></td> 
                                    <td>Casais de sucesso</td> 
                                    <td>Alan Johnson</td> 
                                    <td>16th April 2011</td> 
                                    <td><input type="image" src="assets/images/icn_edit.png" title="Edit"><input type="image" src="assets/images/icn_trash.png" title="Trash"></td> 
                                </tr> 
                                <tr> 
                                    <td><input type="checkbox"></td> 
                                    <td>O poder da venda</td> 
                                    <td>Dobby</td> 
                                    <td>16th April 2011</td> 
                                    <td><input type="image" src="assets/images/icn_edit.png" title="Edit"><input type="image" src="assets/images/icn_trash.png" title="Trash"></td> 
                                </tr> 
                            </tbody> 
                        </table>

                    </div><!-- end of #tab2 -->

                </div><!-- end of .tab_container -->

            </article><!-- end of content manager article -->

            <article class="module width_quarter">
                <header><h3>Eventos</h3></header>
                <div class="message_list">
                    <div class="module_content">
                        <div class="message"><p>Reconhecimento de liderança 2012.</p>
                            <p><strong>balsamo Perfumes</strong></p></div>
                        <div class="message"><p>Aniversario de 5 anos da empresa Bult Comesmeticos.</p>
                            <p><strong>John Doe</strong></p></div>
                        <div class="message"><p>Conheça mais sobre MMN no Brasil.</p>
                            <p><strong>Carlos Godoy</strong></p></div>
                        <div class="message"><p>Reunião Anual de vendedores MMN.</p>
                            <p><strong>SindPH</strong></p></div>
                        <div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
                            <p><strong>John Doe</strong></p></div>
                    </div>
                </div>
                <footer>
                    <form class="post_message">
                        <input type="text" value="Message" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
                        <input type="submit" class="btn_post_message" value=""/>
                    </form>
                </footer>
            </article><!-- end of messages article -->

            <div class="clear"></div>

            <article class="module width_full">
                <header><h3>Post New Article</h3></header>
                <div class="module_content">
                    <fieldset>
                        <label>Post Title</label>
                        <input type="text">
                    </fieldset>
                    <fieldset>
                        <label>Content</label>
                        <textarea rows="12"></textarea>
                    </fieldset>
                    <fieldset style="width:48%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
                        <label>Category</label>
                        <select style="width:92%;">
                            <option>Articles</option>
                            <option>Tutorials</option>
                            <option>Freebies</option>
                        </select>
                    </fieldset>
                    <fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
                        <label>Tags</label>
                        <input type="text" style="width:92%;">
                    </fieldset><div class="clear"></div>
                </div>
                <footer>
                    <div class="submit_link">
                        <select>
                            <option>Draft</option>
                            <option>Published</option>
                        </select>
                        <input type="submit" value="Publish" class="alt_btn">
                        <input type="submit" value="Reset">
                    </div>
                </footer>
            </article><!-- end of post new article -->

            <h4 class="alert_warning">A Warning Alert</h4>

            <h4 class="alert_error">An Error Message</h4>

            <h4 class="alert_success">A Success Message</h4>

            <article class="module width_full">
                <header><h3>Basic Styles</h3></header>
                <div class="module_content">
                    <h1>Header 1</h1>
                    <h2>Header 2</h2>
                    <h3>Header 3</h3>
                    <h4>Header 4</h4>
                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum. Maecenas faucibus mollis interdum. Maecenas faucibus mollis interdum. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>

                    <p>Donec id elit non mi porta <a href="#">link text</a> gravida at eget metus. Donec ullamcorper nulla non metus auctor fringilla. Cras mattis consectetur purus sit amet fermentum. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>

                    <ul>
                        <li>Donec ullamcorper nulla non metus auctor fringilla. </li>
                        <li>Cras mattis consectetur purus sit amet fermentum.</li>
                        <li>Donec ullamcorper nulla non metus auctor fringilla. </li>
                        <li>Cras mattis consectetur purus sit amet fermentum.</li>
                    </ul>
                </div>
            </article><!-- end of styles article -->
            <div class="spacer"></div>
        </section>


    </body>

</html>