<style>
    .controls{
        max-width: 400px;
    }
    
</style>
<script type="text/javascript">
    $(function () {
      
        $('#alterar_foto').click(function(){
            tipo = $('.foto').attr("mostrar");
            if(tipo=='sim'){
                $('.foto').show('fade',500);
                $('.foto').attr('mostrar','nao')
            }else{
                $('.foto').hide('fade',500);
                $('.foto').attr('mostrar','sim')
            }
            
        })
        
        $("#dtNasc").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy",
            showAnim: "fadeIn",
            showOtherMonths: true,
            selectOtherMonths: true
        })
    })
</script>
<?php
$federado = $federado[0];

$endereco = $endereco[0];
$hidden = array("federado" => $federado['id_federado'],"endereco" => $endereco['id_endereco'],"antigaFilial"=>''/* */);
$attr = array(
    "class" => "form-horizontal",
    "id" => "frmAlterar",
    "nome" => "frmAlterar"
);
$label = array(
  "class" => "control-label"
);
?>
<div class="alert-error">
    <?php echo validation_errors();?>    
</div>
<?php
echo form_fieldset("Alteração de registro de federado");
?>


<div style="float: right; margin-right: 150px;">
<?php echo form_open_multipart("instrutores/alterarFederado/".$this->uri->segment(3), $attr, $hidden);
$imagem = array(
    "src" => (($federado['caminho_imagem'] == "sem foto")?"http://placehold.it/140x140/000000/ffffff&text=sem%20foto":'federados/fotos/'.$federado['caminho_imagem']),
    "alt" => "Foto do federado ".$federado['nome'],
    "title" => "Foto do federado ".$federado['nome'],
    "class" => "img-polaroid",
    "width"=>'200',
    "height"=>'300'
);
echo img($imagem); 
?>
</div>

<div class="control-group">
    <?php
        echo form_label("Nome Completo", "nome", $label);
    ?>
    <div class="controls">
        <?php
            $inNome = 'id="nome" class="input-block-level" maxlength="60" required';
            echo form_input('nome', set_value('nome', ($federado['nome'])), $inNome);
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Filiação Materna", "fMaterna", $label);
    ?>
    <div class="controls">
        <?php
            $inFMaterna = 'id="fMaterna" class="input-block-level" maxlength="60"';
            echo form_input('fMaterna',set_value('fMaterna',$federado['filiacao_materna']),$inFMaterna);
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Filiação Paterna", "fPaterna", $label);
    ?>
    <div class="controls">
        <?php
            $inFPaterna = 'id="fPaterna" class="input-block-level" maxlength="60"';
            echo form_input("fPaterna",set_value('fPaterna',$federado['filiacao_paterna']),$inFPaterna);
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
            echo form_dropdown("sexo", $opSexo, set_value('sexo',$selSexo), 'id="sexo" class="input-block-level" required');
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Data de nascimento", "dtNasc", $label);
    ?>
    <div class="controls">
        <?php
            $inData = 'id="dtNasc" class="input-block-level" maxlength="10" required';
            echo form_input("dtNasc",set_value('dtNasc',date("d-m-Y",strtotime($federado['data_nasc']))),$inData);
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("RG", "rg", $label);
    ?>
    <div class="controls">
        <?php
            $inRg = 'id="rg" class="input-block-level" maxlength="12" required';
            echo form_input("rg",set_value('rg',$federado['rg']),$inRg);
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Telefone", "telefone", $label);
    ?>
    <div class="controls">
        <?php
            $inTelefone = 'id="telefone" class="input-block-level" maxlength="13" required';
            echo form_input("telefone",set_value('telefone',$federado['telefone']),$inTelefone);
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Celular", "celular", $label);
    ?>
    <div class="controls">
        <?php
            $inCelular = 'id="celular" class="input-block-level" maxlength="14" required';
            echo form_input("celular",set_value('celular',$federado['celular']),$inCelular);
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("E-mail", "email", $label);
    ?>
    <div class="controls">
        <?php
            $inEmail = 'id="email" class="input-block-level" maxlength="50" required';
            echo form_input("email",set_value('email',$federado['email']),$inEmail);
        ?>
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <e class="btn btn-inverse" id="alterar_foto">alterar foto</a>
    </div>
    
</div>

<div class="control-group foto" mostrar="sim" style="display: none">
    <?php
        echo form_label("Foto de identificaçao", "foto", $label);
    ?>
    <div class="controls" >
        <?php
            $inFoto = 'id="foto" class="input-block-level"';
            echo form_upload("foto", (($federado['caminho_imagem'] == "sem foto")?"":$federado['caminho_imagem']), $inFoto);
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
            foreach($escolaridade as $esc)
                $opEscolaridade[$esc['id']] = $esc['descricao'];
            $selEscolaridade = $federado['id_escolaridade'];
            echo form_dropdown("escolaridade", $opEscolaridade, set_value('escolaridade',$selEscolaridade), 'id="sexo" class="input-block-level" required');
        ?>
    </div>
</div>

<div class="control-group">
<?php
echo form_label("Tamanho da Faixa", "faixa", $label);
?>
    <div class="controls">
    <?php
    
    $opTamanho["P"] = "Pequeno";
    $opTamanho["M"] = "Médio";
    $opTamanho["G"] = "Grande";
    $opTamanho["GG"] = "Extra-grande";
    $selTamanho = $federado['tamanho_faixa'];

    echo form_dropdown('faixa', $opTamanho, set_value('faixa', $selTamanho), 'id="faixa" class="input-block-level" required');
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
            foreach($statusFederado as $sFederado)
                $opSituacao[$sFederado['id']] = $sFederado['status'];
            $selSituacao = $federado['id_status'];
            echo form_dropdown("situacao", $opSituacao, set_value('situacao',$selSituacao), 'id="status" class="input-block-level" required');
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
            foreach($nacionalidade as $nac)
                $opNacionalidade[$nac['id']] = $nac['nacionalidade'];
            $selNacionalidade = $federado['id_nacionalidade'];
            echo form_dropdown('nacionalidade', $opNacionalidade, set_value('nacionalidade',$selNacionalidade), 'id="nacionalidade" class="input-block-level" required');
        ?>
    </div>
</div>


<div class="control-group">
    <?php
    echo form_label("Filial", "filial", $label);
    ?>
    <div class="controls">
        <?php
        
        foreach ($filial as $f)
            $opFilial[$f->id] = $f->nome;
        echo form_dropdown("filial", $opFilial, set_value('filial','' /*$federado['filial']*/), 'id="filial" class="input-block-level" required')
        ?>
    </div>
</div>

<div class="control-group">
    <?php
        echo form_label("Logradouro", "logradouro", $label);
    ?>
    <div class="controls">
        <?php
            $inLogradouro = 'id="logradouro" class="input-block-level" maxlength="80" required';
            echo form_input('logradouro',set_value('logradouro',$endereco['logradouro']),$inLogradouro);
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Número", "numero", $label);
    ?>
    <div class="controls">
        <?php
            $inNumero = 'id="numero" class="input-block-level" maxlength="5" required';
            echo form_input('numero',set_value('numero',$endereco['numero']),$inNumero);
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Complemento", "compl", $label);
    ?>
    <div class="controls">
        <?php
            $inComplemento = 'id="compl" class="input-block-level" maxlength="20"';
            echo form_input('compl',$endereco['complemento'],$inComplemento);
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Bairro", "bairro", $label);
    ?>
    <div class="controls">
        <?php
            $inBairro = 'id="bairro" class="input-block-level" maxlength="30" required';
            echo form_input("bairro",set_value('bairro',$endereco['bairro']),$inBairro);
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Cidade", "cidade", $label);
    ?>
    <div class="controls">
        <?php
            $inCidade = 'id="cidade" class="input-block-level" maxlength="30" required';
            echo form_input("cidade",  set_value('cidade',$endereco['cidade']),$inCidade);
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
            foreach($uf as $estado)
                $opUF[$estado['id']] = $estado['sigla'];
            echo form_dropdown('uf',$opUF,set_value('uf',$endereco['uf']), 'id="uf" class="input-block-level" required');
        ?>
    </div>
</div>
<input class="btn btn-success" name="btnAlterar" id="btnAlterar" type="submit" value="Alterar informaçaes">
<?php

echo form_close();
echo form_fieldset_close();
?>