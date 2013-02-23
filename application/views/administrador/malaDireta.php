<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(nicEditors.allTextAreas);
</script>
<?php
/* 2013-02-06
 * @author Humberto
 */
if (!empty($mensagem)):
    echo form_fieldset("Alterar mensagem atual de mala-direta aos aniversariantes");
    echo form_open('administrador/alterarMensagem', array('name' => 'frmAlterar','id' => 'frmAlterar'),array('id' => $mensagem[0]['id']));
    echo form_textarea('mensagem', html_entity_decode(nl2br($mensagem[0]['mensagem']),ENT_QUOTES,"ISO-8859-1"),"rows='30' id='mensagem' style='width:100%'");
    echo form_submit('btnAlterarar', 'Alterar Mensagem', 'id="btnAlterar" class="btn"');
    echo form_close();
    echo form_fieldset_close();
else:
    echo form_fieldset("Incluir uma mensagem para a mala-direta aos aniversariantes");
    echo form_open('administrador/inserirMensagem',array('name' => 'frmIncluir', 'id' => 'frmIncluir'));
    echo form_textarea('mensagem','',"rows='30' id='mensagem' style='width:100%'");
    echo form_submit('btnIncluir','Incluir nova mensagem','id="btnIncluir" class="btn"');
    echo form_close();
    echo form_fieldset_close();
endif;
?>
