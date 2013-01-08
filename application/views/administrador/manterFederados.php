<script type="text/javascript">
    var path = '<?php echo site_url(); ?>'
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/manterFederados.js"></script>
<div class="page_header">
<?php 
echo heading("Manutenção dos dados cadastrais dos federados", 4);
$options = array("" => "Escolha uma opção.");
foreach($instrutores as $instrutor)
    $options[$instrutor->id] = $instrutor->nome;

echo form_label("Instrutores","instrutores");
echo form_dropdown("instrutores",$options,"",'id="instrutores"');
echo form_label("Filiais","filiais");
echo form_dropdown("filiais",array("" => "Escolha um instrutor primeiro"),"",'id="filiais"');
echo form_label("Situação","situacao");
echo form_dropdown("situacao",array("" => "Escolha uma filial primeiro"),"",'id="situacao"');
echo form_label("Federados","federados");
echo form_dropdown("federados",array("" => "Escolha uma situação primeiro"),"",'id="federados"');
?>
</div>