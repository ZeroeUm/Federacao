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
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.2.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">

    </head>
    <body>
        <div class="linha" style="border: 1px solid; width: 200px;margin:50px auto 0px auto; text-align: left;padding: 60px;">
           
              <form action="http://federacao.local/login" method="post">
          
            <div class="">
                <div class="">Usuario:</div>
                <div class=""><input type="text" class="input-large" name="usuario"></div>
            </div>
          
            <div class="">
                <div class="">Senha:</div>
                <div class=""><input type="text" class="input-large" name="senha"></div>
            </div>
                  
                
                  
                
            <div class="">
                
                <input type="submit" class="btn btn-primary" value="Entrar"> <span style="float: right">Lembrar senha</span>
            
            </div>       
               
                  
                    
            </form>
            <div class="alert-error">
                <?php echo validation_errors(); ?>
            </div>
           
        </div>
    </body>
</html>
