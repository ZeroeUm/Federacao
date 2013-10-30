<?php
/*2013-03-26
 * @author Humberto
 */
$label = array(
    "class" => "control-label"
);
$attributes = array(
    "class" => "form-horizontal",
    "id" => "frmAlterar",
    "name" => "frmAlterar"
);
$action = "login/trocarSenha/".$this->uri->segment(3);
$hidden = array("federado" => $usuario);
echo form_fieldset("Trocar senha de acesso ao sistema");
echo form_open($action, $attributes, $hidden);
?>
<div class="row-fluid">
    <?php echo validation_errors('<div class="alert-error">','</div>');?>
</div>
<div class="control-group">
    <?php 
        echo form_label("Nova senha","novaSenha",$label);
    ?>
    <div class="controls">
        <?php 
            echo form_password("novaSenha", set_value('novaSenha'), 'required id="novaSenha" placeholder="Nova Senha" maxlength="10" class="span3"');
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Confirmar nova senha", "confirmar", $label);
    ?>
    <div class="controls">
        <?php
            echo form_password('confirmar', set_value("confirmar"), 'required id="confirmar" placeholder="Nova Senha" maxlength="10" class="span3"');
        ?>
    </div>
</div>
<?php
echo form_submit('btnAlterar','Alterar Senha','id="btnAlterar" class="btn btn-success"');
echo form_close();
echo form_fieldset_close();
?>
