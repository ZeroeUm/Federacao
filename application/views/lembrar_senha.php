<html>
    <head>
        <title>Login ao sistema da Federação</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.2.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">

    </head>
    <style>
        .login{
            
            margin: 200px auto 0px auto;
            width: 500px;
            background-color: whitesmoke;
            border: 1px solid;
            padding: 50px;
            border-radius: 10px;
        }
        .texto{
            font-size: 15px;
            font-weight: bold;
        }
    </style>
    
    <body>
        <div class="login" style="">
            <form action="<?php echo base_url();?>login/lembrar_senha" method="post">
                <div class="logo">
            <img src="/federados/logo2.png">
            
        </div>
                <input name="email" type="text" class="input-xxlarge" placeholder="Informe seu email" style="height: 50px;margin-top: 20px;"><br>
                <input type="submit" value="Enviar" class="btn btn-primary" style="height: 50px; width: 100px;" >
            </form>
        </div>
    </body>
</html>