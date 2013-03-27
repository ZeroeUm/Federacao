<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script type="text/javascript">
    $(function () {
        $("#dtNasc").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy",
            showAnim: "fadeIn",
            showOtherMonths: true,
            selectOtherMonths: true
        });
    });
</script>
<?php
$federado = $federado[0];
$endereco = $endereco[0];
$hidden = array("federado" => $federado['id_federado'], "endereco" => $endereco['id_endereco'],"antigaFilial" => $federado['filial']);
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
    echo validation_errors();
    echo form_fieldset("Alteração de registro de federado");
    echo form_open_multipart("administrador/alterarFederado/" . $this->uri->segment(3), $attr, $hidden);
    $imagem = array(
        "src" => (($federado['caminho_imagem'] == "sem foto") ? "http://placehold.it/140x140/000000/ffffff&text=%3F" : "federados/fotos/".$federado['caminho_imagem']),
        "alt" => "Foto do federado " . $federado['nome'],
        "title" => "Foto do federado " . $federado['nome'],
        "class" => "img-polaroid"
    );
    echo img($imagem);
    ?>
    <div class="control-group">
        <?php
        echo form_label("Nome Completo", "nome", $label);
        ?>
        <div class="controls">
            <?php
            $inNome = 'id="nome" class="span3" maxlength="60" required';
            echo form_input('nome', set_value('nome', $federado['nome']), $inNome);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Filiação Materna", "fMaterna", $label);
        ?>
        <div class="controls">
            <?php
            $inFMaterna = 'id="fMaterna" class="span3" maxlength="60"';
            echo form_input('fMaterna', set_value('fMaterna', $federado['filiacao_materna']), $inFMaterna);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Filiação Paterna", "fPaterna", $label);
        ?>
        <div class="controls">
            <?php
            $inFPaterna = 'id="fPaterna" class="span3" maxlength="60"';
            echo form_input("fPaterna", set_value('fPaterna', $federado['filiacao_paterna']), $inFPaterna);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Sexo", "sexo", $label);
        ?>
        <div class="controls">
            <?php
            $opSexo = array("F" => "Feminino", "M" => "Masculino");
            $selSexo = $federado['sexo'];
            echo form_dropdown("sexo", $opSexo, set_value('sexo', $selSexo), 'id="sexo" class="span2" required');
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Data de nascimento", "dtNasc", $label);
        ?>
        <div class="controls">
            <?php
            $inData = 'id="dtNasc" class="span2" maxlength="10" required';
            echo form_input("dtNasc", set_value('dtNasc', date("d-m-Y", strtotime($federado['data_nasc']))), $inData);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("RG", "rg", $label);
        ?>
        <div class="controls">
            <?php
            $inRg = 'id="rg" class="span2" maxlength="12" required';
            echo form_input("rg", set_value('rg', $federado['rg']), $inRg);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Telefone", "telefone", $label);
        ?>
        <div class="controls">
            <?php
            $inTelefone = 'id="telefone" class="span2" maxlength="13" required';
            echo form_input("telefone", set_value('telefone', $federado['telefone']), $inTelefone);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Celular", "celular", $label);
        ?>
        <div class="controls">
            <?php
            $inCelular = 'id="celular" class="span2" maxlength="14" required';
            echo form_input("celular", set_value('celular', $federado['celular']), $inCelular);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("E-mail", "email", $label);
        ?>
        <div class="controls">
            <?php
            $inEmail = 'id="email" class="span3" maxlength="50" required';
            echo form_input("email", set_value('email', $federado['email']), $inEmail);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Foto de identificação", "foto", $label);
        ?>
        <div class="controls">
            <?php
            $inFoto = 'id="foto" class="span3"';
            echo form_upload("foto", (($federado['caminho_imagem'] == "sem foto") ? "" : $federado['caminho_imagem']), $inFoto);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Escolaridade", "escolaridade", $label);
        ?>
        <div class="controls">
            <?php
            $opEscolaridade = array();
            foreach ($escolaridade as $esc)
                $opEscolaridade[$esc['id']] = $esc['descricao'];
            $selEscolaridade = $federado['id_escolaridade'];
            echo form_dropdown("escolaridade", $opEscolaridade, set_value('escolaridade', $selEscolaridade), 'id="sexo" class="span3" required');
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Situação", "situacao", $label);
        ?>
        <div class="controls">
            <?php
            $opSituacao = array();
            foreach ($statusFederado as $sFederado)
                $opSituacao[$sFederado['id']] = $sFederado['status'];
            $selSituacao = $federado['id_status'];
            echo form_dropdown("situacao", $opSituacao, set_value('situacao', $selSituacao), 'id="status" class="span2" required');
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Nacionalidade", "nacionalidade", $label);
        ?>
        <div class="controls">
            <?php
            $opNacionalidade = array();
            foreach ($nacionalidade as $nac)
                $opNacionalidade[$nac['id']] = $nac['nacionalidade'];
            $selNacionalidade = $federado['id_nacionalidade'];
            echo form_dropdown('nacionalidade', $opNacionalidade, set_value('nacionalidade', $selNacionalidade), 'id="nacionalidade" class="span2" required');
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Tipo de federado", "tipo", $label);
        ?>
        <div class="controls">
            <?php
            $opTipo = array();
            foreach ($tipo as $t)
                $opTipo[$t['id']] = $t['tipo'];
            $selTipo = $federado['id_tipo_federado'];
            echo form_dropdown('tipo', $opTipo, set_value('tipo', $selTipo), 'id="tipo" class="span2" required');
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label('Modalidade','modalidade',$label);
        ?>
        <div class="controls">
            <?php
            foreach ($modalidade as $mod)
                $opModalidade[$mod['id']] = $mod['nome'];
            echo form_dropdown('modalidade',$opModalidade,set_value('modalidade',1),'id="modalidade" class="span3" required disabled');
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label('Filial','filial',$label);
        ?>
        <div class="controls">
            <?php
            foreach ($filiais as $f)
                $opFilial[$f['id']] = $f['nome'];
            echo form_dropdown('filial',$opFilial,set_value('filial',$federado['filial']),'id="filial" class="span4" required')
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Logradouro", "logradouro", $label);
        ?>
        <div class="controls">
            <?php
            $inLogradouro = 'id="logradouro" class="span3" maxlength="80" required';
            echo form_input('logradouro', set_value('logradouro', $endereco['logradouro']), $inLogradouro);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Número", "numero", $label);
        ?>
        <div class="controls">
            <?php
            $inNumero = 'id="numero" class="span2" maxlength="5" required';
            echo form_input('numero', set_value('numero', $endereco['numero']), $inNumero);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Complemento", "compl", $label);
        ?>
        <div class="controls">
            <?php
            $inComplemento = 'id="compl" class="span3" maxlength="20" required';
            echo form_input('compl', $endereco['complemento'], $inComplemento);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Bairro", "bairro", $label);
        ?>
        <div class="controls">
            <?php
            $inBairro = 'id="bairro" class="span3" maxlength="30" required';
            echo form_input("bairro", set_value('bairro', $endereco['bairro']), $inBairro);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Cidade", "cidade", $label);
        ?>
        <div class="controls">
            <?php
            $inCidade = 'id="cidade" class="span3" maxlength="30" required';
            echo form_input("cidade", set_value('cidade', $endereco['cidade']), $inCidade);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("UF", "uf", $label);
        ?>
        <div class="controls">
            <?php
            $opUF = array();
            foreach ($uf as $estado)
                $opUF[$estado['id']] = $estado['sigla'];
            echo form_dropdown('uf', $opUF, set_value('uf', $endereco['uf']), 'id="uf" class="span1" required');
            ?>
        </div>
    </div>
    <?php
    $inBotao = 'id="btnAlterar" class="btn btn-primary"';
    echo form_submit("btnAlterar", "Alterar informações", $inBotao);
    echo form_close();
    echo form_fieldset_close();
    ?>
</div>