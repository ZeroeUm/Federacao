<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Programa��o</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    </head>
    <body>
        <h1>Nossa programa��o Diaria</h1>
        <a href="<?php echo base_url();?>/index/estacoes/primavera">Primavera</a>
        <a href="<?php echo base_url(); ?>/index/estacoes/verao">Ver�o</a>
        
       
        <h2><?php echo $estacao; ?></h2>
        <p>
            <?php echo $programacao; ?>
        </p>
             
        
    </body>
</html>
