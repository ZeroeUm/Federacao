<script type="text/javascript" src="<?php echo base_url() ?>assets/js/manterFilial.js"></script>
<?php
/* 2013-01-24
 * @author HUmberto
 */
$prop = array('class' => 'btn btn-link btn-large', 'name' => 'incluirFilial','id' => 'incluirFilial');

echo anchor("administrador/incluirFilial","Incluir Filial",$prop);

echo form_fieldset("Pesquisa por Filial");
$options = array("#" => "Escolha uma filial.");
foreach($filiais as $filial)
    $options[$filial['id']] = $filial['nome'];

echo form_label("Filiais","filiais");
echo form_dropdown('filiais',$options,'#','id="filiais" class="span3"');

echo form_fieldset_close();

echo form_fieldset("Resultado da pesquisa",array('id' => 'resultado','style' => 'display:none'));

$nome = array(
    'class' => "span3",
    'id' => "nome",
    'name' => "nome",
    'readonly' => 'readonly'
);
echo form_label("Nome","nome");
echo form_input($nome);

$telefone = array(
    'class' => "span2",
    'id' => "telefone",
    'name' => "telefone",
    'readonly' => 'readonly'
);
echo form_label("Telefone","telefone");
echo form_input($telefone);

$fax = array(
    'class' => "span2",
    'id' => "fax",
    'name' => "fax",
    'readonly' => 'readonly'
);
echo form_label("Fax",'fax');
echo form_input($fax);

$email = array(
    'class' => "span3",
    'id' => "email",
    'name' => "email",
    'readonly' => 'readonly'
);
echo form_label("E-mail","email");
echo form_input($email);

$representante = array(
    'class' => "span3",
    'id' => "representante",
    'name' => "representante",
    'readonly' => 'readonly'
);
echo form_label("Representante",'representante');
echo form_input($representante);

$instrutor = array(
    'class' => "span3",
    'id' => "instrutor",
    'name' => "instrutor",
    'readonly' => 'readonly'
);
echo form_label("Instrutor","instrutor");
echo form_input($instrutor);

$logradouro = array(
    'class' => "span3",
    'id' => "logradouro",
    'name' => "logradouro",
    'readonly' => 'readonly'
);
echo form_label("Logradouro",'logradouro');
echo form_input($logradouro);

$numero = array(
    'class' => "span1",
    'id' => "numero",
    'name' => "numero",
    'readonly' => 'readonly'
);
echo form_label("Número",'numero');
echo form_input($numero);

$complemento = array(
    'class' => 'span2',
    'id' => 'complemento',
    'name' => 'complemento',
    'readonly' => 'readonly'
);
echo form_label("Complemento",'complemento');
echo form_input($complemento);

$bairro = array(
    'class' => "span3",
    'id' => "bairro",
    'name' => "bairro",
    'readonly' => 'readonly'
);
echo form_label("Bairro","bairro");
echo form_input($bairro);

$cidade = array(
    'class' => "span3",
    'id' => "cidade",
    'name' => "cidade",
    'readonly' => 'readonly'
);
echo form_label("Cidade",'cidade');
echo form_input($cidade);

$uf = array(
    'class' => "span1",
    'id' => "uf",
    'name' => "uf",
    'readonly' => 'readonly'
);
echo form_label("UF",'uf');
echo form_input($uf);

echo br();
echo anchor("","Imprimir Filial",array('class' => 'btn btn-link btn-large','id' => 'imprimir'));
echo nbs(4);
echo anchor("","Alterar Filial",array('class' => 'btn btn-link btn-large','id' => 'alterar'));
echo form_fieldset_close();
?>
