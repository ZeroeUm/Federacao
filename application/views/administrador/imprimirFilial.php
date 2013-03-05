<?php
/*
 * 2013-01-26
 * @author Humberto
 */
?>
<script type="text/javascript">
    function imprimirInformacao(div)
    {
        document.getElementById("btnImprimir").style.display = "none";
        var conteudo = document.getElementById(div);
        var html = "<html><head>"+
            "<link src='<?php echo base_url(); ?>assets/bootstrap.css'/>"+
            "<body>"+
            conteudo.innerHTML+
            "</body></html>";
        var janelaImprimir = window.open("", "Tela de impressão", 'width=750,height=650,top=50,left=50,toolbars=no,scroolbar=yes,status=no,resizable=yes');
        janelaImprimir.document.writeln(html);
        janelaImprimir.document.close();
        janelaImprimir.focus();
        janelaImprimir.print();
        janelaImprimir.close();
        document.getElementById("btnImprimir").style.display = "block";
               
    }
</script>
<?php
$fil = $filial[0];
$attr = array(
    "class" => "form-horizontal",
    "id" => "frmAlterar",
    "nome" => "frmAlterar"
);
$label = array(
    "class" => "control-label"
);
?>
<div id="row-fluid">
<?php
echo form_fieldset('Impressão de dados da filial');
echo form_open();
?>
<div class="control-group">
    <?php echo form_label("Nome Filial", "nome", $label) ?>
    <div class="controls">
        <?php
        $inNome = "disabled id='nome' class='span3' maxlength='60'  ";
        echo form_input('nome', $fil['nome'], $inNome);
        ?>
    </div>
</div>
<div class="control-group">
    <?php echo form_label("CNPJ", "cnpj", $label) ?>
    <div class="controls">
        <?php
        $inCNPJ = "disabled id='cnpj' class='span2' maxlength='19'  ";
        echo form_input('cnpj', $fil['cnpj'], $inCNPJ);
        ?>
    </div>
</div>
<div class="control-group">
    <?php echo form_label("Telefone", "telefone", $label) ?>
    <div class="controls">
        <?php
        $inTelefone = "disabled id='telefone' class='span2' maxlegth='13'";
        echo form_input('telefone', $fil['telefone'], $inTelefone);
        ?>
    </div>
</div>
<div class="control-group">
    <?php echo form_label("Fax", "fax", $label) ?>
    <div class="controls">
        <?php
        $inCelular = "disabled id='fax' class='span2' maxlength='13'";
        echo form_input('fax', $fil['fax'], $inCelular);
        ?>
    </div>
</div>
<div class="control-group">
    <?php echo form_label("E-mail", 'email', $label) ?>
    <div class="controls">
        <?php
        $inEmail = "disabled id='email' class='span3' maxlength='50'  ";
        echo form_input('email', $fil['email'], $inEmail);
        ?>
    </div>
</div>
<div class="control-group">
    <?php echo form_label("Representante", "representante", $label) ?>
    <div class="controls">
        <?php
        $inRepresentante = "disabled id='representante' class='span3' maxlength='60'";
        echo form_input('representante', $fil['representante'], $inRepresentante);
        ?>
    </div>
</div>
<div class="control-group">
    <?php echo form_label("Modalidade", "modalidade", $label) ?>
    <div class="controls">
        <?php
        $inModalidade = "disabled id='modalidade class='span2'  ";
        foreach ($modalidade as $mod)
            $opModalidade[$mod['id']] = $mod['nome'];
        echo form_dropdown('modalidade', $opModalidade, $fil['modalidade'], $inModalidade);
        ?>
    </div>
</div>
<div class="control-group">
    <?php echo form_label("Instrutor", "instrutor", $label) ?>
    <div class="controls">
        <?php
        $inInstrutor = "disabled id='instrutor' class='span3'  ";
        foreach($instrutor as $ins)
            $opInstrutor[$ins['nome']] = $ins['nome'];
        echo form_dropdown('instrutor', $opInstrutor, $fil['nome'], $inInstrutor);
        ?>
    </div>
</div>
<div class="control-group">
    <?php echo form_label("Endereço", "endereco", $label) ?>
    <div class="controls">
        <?php
        $inEndereco = "disabled id='Endereco' class='span5' maxlength='100'  ";
        echo form_input('endereco', $fil['logradouro'] . ", " . $fil['numero'] . ((isset($fil['complemento']))?" - " . $fil['complemento']:"") . ", " . $fil['bairro'] . " - " . $fil['cidade'] . " - " . $fil['uf'], $inEndereco);
        ?>
    </div>
</div>
<?php
echo form_button('btnImprimir','Imprimir Informações','id="btnImprimir" onClick="imprimirInformacao(\'conteiner\')" class="btn btn-primary"');
echo form_close();
echo form_fieldset_close();
?>
</div>