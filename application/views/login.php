<?php
/*
 * 2013-03-05
 * @author Humberto
 */
$attr = array(
    'class' => 'form-horizontal',
    'id' => 'frmLogin',
    'name' => 'frmLogin'
);
$label = array(
    'class' => 'control-label'
);
?>
<html>
    <head>
        <title>Login ao sistema da Federação</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">

    </head>
    <style>
        body{
            background-image: url('federados')
        }

        .logo{
            position: absolute;
            margin-left: 190px;
            margin-top: 70px;
        }


        .login{
            background-color: whitesmoke;
            border: 1px solid;
            border-radius: 30px;
            width: 300px;
            margin:50px auto 0px 60%;
            text-align: left;
            padding: 45px;
        }
        .topo{
            box-shadow: 0 1px 0 #333;
            background-color: #333;
            background-image: -webkit-gradient(linear, 0 0%, 0 100%, from(#3F3F3F), to(#222));
            background-image: -webkit-linear-gradient(top, #3F3F3F 0%, #222 100%);
            background-image: -moz-linear-gradient(top, #3F3F3F 0%, #222 100%);
            background-image: -ms-linear-gradient(top, #3F3F3F 0%, #222 100%);
            background-image: -o-linear-gradient(top, #3F3F3F 0%, #222 100%);
            background-image: linear-gradient(top, #3F3F3F 0%, #222 100%);
            border-bottom: 1px solid #555;
            height: 77px;
        }
        
        .rodape{
           box-shadow: 0 1px 0 #333;
            background-color: #333;
            background-image: -webkit-gradient(linear, 0 0%, 0 100%, from(#222), to(#3F3F3F));
            background-image: -webkit-linear-gradient(top, #222 0%, #3F3F3F 100%);
            background-image: -moz-linear-gradient(top, #222 0%, #3F3F3F 100%);
            background-image: -ms-linear-gradient(top, #222 0%, #3F3F3F 100%);
            background-image: -o-linear-gradient(top, #222 0%, #3F3F3F 100%);
            background-image: linear-gradient(top, #222 0%, #3F3F3F 100%);
            border-bottom: 1px solid #555;
            height: 77px; 
            position:absolute;
            bottom:0;
            width:100%;
        }
    </style>

    <body>
        <div class="topo">
            <img src="federados/logo.png" width="160" height="160" style="position: absolute;margin-left: 80%;margin-top: 10px; opacity:1.6;">

        </div>
        <div class="content" style="margin-top: 100px;">
        <div class="logo">
            <img src="federados/logo2.png">


        </div>

        <div class="login">
            
            <form action="<?php echo base_url() ?>login" method="post">
                
                <div class="">

                    <div class=""><input type="text" placeholder="Usuário "class="input-large" name="usuario" style="height: 44px;width: 100%;"></div>
                </div>

                <div class="">

                    <div class=""><input type="password" placeholder="Senha" class="input-large" name="senha"  style="height: 44px;width: 100%;" maxlength="10"></div>
                </div>




                <div class="">
                    <br>
                    <input type="submit" class="btn btn-success" value="Entrar" style="height: 44px;width: 100%"> 
                    <span style="float: right;text-decoration: underline">
                        <a href="<?php echo base_url(); ?>login/lembrar_senha">Lembrar senha</a>
                    </span>

                </div>       



            </form>
            <div class="alert-error">
                <?php echo validation_errors(); ?>
            </div>

        </div>
            </div>
        <div class="rodape">
            
        </div>
    </body>
</html>
