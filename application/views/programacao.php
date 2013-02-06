<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Programação</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    </head>
    <body>
        <h1>Nossa programação Diaria</h1>
        <a href="<?php echo base_url();?>/index/estacoes/primavera">Primavera</a>
        <a href="<?php echo base_url(); ?>/index/estacoes/verao">Verão</a>
        
       
        <h2><?php echo $estacao; ?></h2>
        <p>
            <?php echo $programacao; ?>
        </p>
             
        
    </body>
</html>
