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
    var janelaImprimir = window.open("", "Tela de impressço", 'width=750,height=650,top=50,left=50,toolbars=no,scroolbar=yes,status=no,resizable=yes');
    janelaImprimir.document.writeln(html);
    janelaImprimir.document.close();
    janelaImprimir.focus();
    janelaImprimir.print();
    janelaImprimir.close();
    document.getElementById("btnImprimir").style.display = "block";
               
}
</script>
<?php
    $fed = $instrutor[0];
    $attr = array(
        "class" => "form-horizontal",
        "id" => "frmAlterar",
        "nome" => "frmAlterar"
    );
    $label = array(
      "class" => "control-label"
    );
    $imagem = array(
        "src" => (($fed['caminho_imagem'] == 'sem foto')?"http://placehold.it/140x140/000000/ffffff&text=sem%20foto":'federados/fotos/'.$fed['caminho_imagem']),
        "alt" => "Foto do federado " . $fed['nome'],
        "title" => "Foto do federado " . $fed['nome'],
        "class" => "img-polaroid"
    );

    echo form_fieldset("Impressão de dados do federado");
    echo form_open('', $attr);
    echo img($imagem);
?>
<div class="control-group">
    <?php
        echo form_label("Nome Completo","nome",$label);
    ?>
    <div class="controls">
        <?php
            $inNome = 'id="nome" class="span3" disabled size="60"';
            echo form_input('nome',$fed['nome'],$inNome);
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Filiação Materna","fMaterna",$label);
    ?>
    <div class="controls">
        <?php
            $inFMaterna = 'id="fMaterna" class="span3" disabled size="60"';
            echo form_input('fMaterna',(($fed['fMaterna'] == "")?"Não fornecido":$fed['fMaterna']),$inFMaterna);
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Filiação Paterna","fPaterna",$label);
    ?>
    <div class="controls">
        <?php
            $inFPaterna = 'id="fPaterna" class="span3" disabled size="60"';
            echo form_input('fPaterna',(($fed['fPaterna'] == "")?"Não fornecido":$fed['fPaterna']),$inFPaterna)
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Sexo","sexo",$label);
    ?>
    <div class="controls">
        <?php
            $inSexo = 'id="sexo" class="span2" disabled size="10"';
            echo form_input('sexo',(($fed['sexo'] == "M")?"Masculino":"Feminino"),$inSexo);
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Data de nascimento","dtNasc",$label);
    ?>
    <div class="controls">
        <?php
            $inDtNasc = 'id="dtNasc" class="span2" disabled size="10"';
            echo form_input('dtNasc',date('d-m-Y',strtotime($fed['dtNasc'])),$inDtNasc)
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("RG","rg",$label);
    ?>
    <div class="controls">
        <?php
            $inRG = 'id="rg" class="span2" disabled size="15"';
            echo form_input('rg',$fed['rg'],$inRG)
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Telefone","telefone",$label);
    ?>
    <div class="controls">
        <?php
            $inTelefone = 'id="telefone" class="span2" disabled size="15"';
            echo form_input('telefone',$fed['telefone'],$inTelefone)
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Celular","celular",$label);
    ?>
    <div class="controls">
        <?php
            $inCelular = 'id="celular" class="span2" disabled size="15"';
            echo form_input('celular',$fed['celular'],$inCelular)
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("E-mail","email",$label);
    ?>
    <div class="controls">
        <?php
            $inEmail = 'id="email" class="span3" disabled size="60"';
            echo form_input('email',$fed['email'],$inEmail)
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Escolaridade","escolaridade",$label);
    ?>
    <div class="controls">
        <?php
            $inEscolaridade = 'id="escolaridade" class="span3" disabled size="30"';
            echo form_input('escolaridade',$fed['escolaridade'],$inEscolaridade)
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Nacionalidade","nacionalidade",$label);
    ?>
    <div class="controls">
        <?php
            $inNacionalidade = 'id="nacionalidade" class="span2" disabled size="30"';
            echo form_input('nacionalidade',$fed['nacionalidade'],$inNacionalidade)
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Situaçao","situacao",$label);
    ?>
    <div class="controls">
        <?php
            $inSituacao = 'id="situacao" class="span2" disabled size="10"';
            echo form_input('situacao',$fed['situacao'],$inSituacao)
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Tipo de Federado","tipo",$label);
    ?>
    <div class="controls">
        <?php
            $inTipo = 'id="tipo" class="span2" disabled size="15"';
            echo form_input('tipo',$fed['tipo'],$inTipo)
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Graduaçao atual","graduacao",$label);
    ?>
    <div class="controls">
        <?php
            $inGraduacao = 'id="graduacao" class="span3" disabled size="30"';
            echo form_input('graduacao',$fed['faixa'],$inGraduacao)
        ?>
    </div>
</div>
<div class="control-group">
    <?php
        echo form_label("Endereço Residencial","endereco",$label);
    ?>
    <div class="controls">
        <?php
            $inEndereco = 'id="endereco" class="span6" disabled size="100"';
            echo form_input('endereco',$fed['logradouro'] . ", " . $fed['numero'] . ((isset($fed['complemento']))?" - " . $fed['compl']:"") . ", " . $fed['bairro'] . ", " . $fed['cidade'] . " - " . $fed['uf'],$inEndereco)
        ?>
    </div>
</div>
<?php
echo form_button('btnImprimir','Imprimir Informaçaes','id="btnImprimir" onClick="imprimirInformacao(\'content\')" class="btn btn-success"');
echo form_close();
echo form_fieldset_close();
?>
