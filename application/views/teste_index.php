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
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-1.8.2.min.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/funcoes.js' ?>"></script>



    </head>
    <body>
        <h1>Login</h1>
        <div id="visivel">

            <div id="msg">
                <li>
                    <?php if ($this->session->flashdata('msg'))  ?>
                    <?php echo $this->session->flashdata('msg'); ?>
                </li>
            </div>
        </div>

        <div id="link">
            <ul>
                <?php
                foreach ($usuario as $a) {
                    echo '<li>' . anchor("index/apagar_usuario/$a->id", 'Apagar',"onclick=\"return confirm('Confirma a exclusão deste registro?')\"") . '  -  ' . anchor("index/editar_usuario/$a->id", 'Editar') . ' - ' . $a->nome . '  -  ' . $a->email . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <?php
            echo form_open('Index/create_usuario');
            echo form_fieldset('Novo Usuário');
            echo ('Nome');
            echo form_input('nome');
            echo ('<br />');
            echo ('Email');
            echo form_input('email');
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
