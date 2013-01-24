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
        <h1>Editar Login</h1>
        <div id="visivel">

            <div id="msg">
                <li>
                    <?php if ($this->session->flashdata('msg'))  ?>
                    <?php echo $this->session->flashdata('msg'); ?>
                </li>
            </div>
        </div>


        <?php
        echo form_open('Index/editar_usuario/' . $usuario->id);
        echo form_fieldset('Novo Usuário');
        echo ('Nome');
        echo form_input('nome', set_value('nome', $usuario->nome));
        echo ('<br />');
        echo ('Email');
        echo form_input('email', set_value('email', $usuario->email));
        echo ('<br />');
        echo ('Senha');
        echo form_password('senha');
        echo form_fieldset_close();
        echo form_submit('submit', 'Enviar');
        echo form_close();
        ?>
    </div>


</body>
</html>
