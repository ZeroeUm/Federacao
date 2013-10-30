<!--
To change this template, choose Tools | Templates
and open the template in the editor.

-->
<!DOCTYPE html>
<html>
    <head>
        <title>Olá Mundo</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/style.css' ?>" />

    </head>
    <body>
        <h1>Login</h1>

        <?php
        echo form_open('Index/login');
        echo form_fieldset('Login');
        echo ('email');
        echo form_input('email');
        echo form_error('email');
        echo ('<br />');
        echo ('Senha');
        echo form_password('senha');
        echo form_error('senha');
        echo form_fieldset_close();
        echo form_submit('submit', 'Enviar');
        echo form_close();
        ?>

    </body>
</html>
