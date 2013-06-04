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
            
            margin: 100px auto 0px auto;
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
            height: 78px;
           
        }
    </style>
    
    <body>
        
        <div class="topo">

        </div>
        
        <div class="login" style="">
            <form action="<?php echo base_url();?>login/lembrar_senha" method="post">
                <div class="logo">
                    <a href="<?php echo base_url(); ?>">   
            <img src="/federados/logo2.png">
                    </a>
        </div>
                <input name="email" type="text" class="input-xxlarge" placeholder="Informe seu email" style="height: 50px;margin-top: 20px;">
                
                <?php if (@$this->session->flashdata('alerta') != '') { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>  
                    <?php echo $this->session->flashdata('alerta'); ?>
                </div>
            <?php } ?>
                <br>
            
                <input type="submit" value="Enviar" class="btn btn-success" style="height: 50px; width: 100px;" >
           
            </form>
        </div>
    </body>
</html>