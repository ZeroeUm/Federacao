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
        <meta http-equiv="content-type" content="text/html" charset="ISO-8859-1" />
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.2.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">

    </head>
    <body>
        <div class="row-fluid">
            <?php
            echo validation_errors();
            echo form_fieldset('Área de login ao SGAI');
            echo form_open('login', $attr);
            ?>
            <div class="control-group">
                <?php echo form_label('Usuário', 'usuario', $label); ?>
                <div class="controls">
                    <?php echo form_input('usuario', set_value('usuario'), 'id="usuario" class="span3" maxlength="20" required placeholder="Usuário"'); ?>
                </div>
            </div>
            <div class="control-group">
                <?php echo form_label('Senha', 'senha', $label); ?>
                <div class="controls">
                    <?php echo form_password('senha', set_value('senha'), 'id="senha" class="span3" maxlength="10" required placeholder="Senha"'); ?>
                </div>
            </div>
            <div class="controls">
                <?php
                echo form_submit('btnEntrar', 'Entrar', 'id="btnEntrar" class="btn btn-primary"');
                ?>    
            </div>
            <?php
            echo form_close();
            echo form_fieldset_close();
            ?>
        </div>
    </body>
</html>
