<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/manterFederados.js"></script>
<?php 
$options = array('#' => "Escolha uma opção.");
foreach($instrutores as $instrutor)
    $options[$instrutor->id] = $instrutor->nome;
echo form_label("Instrutores","instrutores");
echo form_dropdown('instrutores', $options, '#', 'id="instrutores"');

echo form_label("Filiais","filiais");
echo form_dropdown("filiais",array("#" => "Escolha um instrutor"),"#",'id="filiais"');

echo form_label("Situação","situacao");
echo form_dropdown("situcao",array("#" => "Escolha uma filial",0 => "Inativo", 1 => "Ativo"),"#",'id="situacao"');

echo form_label("Federados","federados");
echo form_dropdown("federados",array("" => "Escolha uma situação"),"#",'id="federados"');

?>
