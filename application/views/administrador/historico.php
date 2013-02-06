<script src="<?php echo base_url(); ?>assets/js/historico.js" type="text/javascript"></script>
<?php
/*2013-02-02
 * @author HUmberto
 */
echo form_fieldset("Pesquisa por federado");
$options = array('#' => "Escolha uma opção.");
foreach($instrutores as $instrutor)
    $options[$instrutor['id']] = $instrutor['nome'];

echo form_label("Instrutores",'instrutores');
echo form_dropdown('instrutores', $options, '#', 'id="instrutores" class="span3"');

echo form_label("Filiais","filiais");
echo form_dropdown("filiais",array("#" => "Escolha um instrutor"),"#","id='filiais' class='span3' disabled");

echo form_label("Situação",'situacao');
echo form_dropdown('situacao',array("#" => "Escolha uma filial"),"#","id='situacao' class='span2' disabled");

echo form_label('Federados','federados');
echo form_dropdown('federados',array("#" => "Escolha uma situação"),"#","id='federados' class='span3' disabled");

echo form_fieldset_close();

echo form_fieldset("Resultado da pesquisa", array('id' => 'resultado','style' => 'display: none'));

echo form_fieldset_close();
?>
