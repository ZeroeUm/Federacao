<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">
bkLib.onDomLoaded(nicEditors.allTextAreas);
</script>
<?php
/*
 * 2013-01-30
 * @author Humberto
 */
echo form_fieldset("<small>�rea de notifica��es</small> Federa��o Paulista de Artes Marciais Interestilos");
echo form_open('administrador/notificacoes',array('id' => 'frmNotificacoes'));
echo form_label('Assunto da notifica��o','assunto');
echo form_input('assunto','','class = span3 required');
echo form_label('Notifica��o a ser enviada','txtNotificacao');
$textarea = array(
    'id'    => 'txtNotificacao',
    'rows'  => 15,
    'name'  => 'txtNotificacao',
    'style' => 'width: 100%',
    'required' => 'required'
);
echo form_textarea($textarea);
echo br();
echo form_label('Escolha o alvo da notifica��o');
echo form_label("Alunos".form_checkbox('aluno','1'),'alvoNotificacao',array('class' => 'checkbox inline'));
echo form_label("Instrutores".form_checkbox('instrutor','1'),'alvoNotificacao',array('class' => 'checkbox inline'));
echo form_label("Coordenador".form_checkbox('coordenador','1'),'alvoNotificacao',array('class' => 'checkbox inline'));
echo form_label("� Todos".form_checkbox('todos','1','true'),'alvoNotificacao',array('class' => 'checkbox inline'));
echo br();
echo form_submit('enviarNotificacao','Enviar Notifica��o','class = "btn btn-primary"');
echo form_close();
echo form_fieldset_close();
?>

