
            echo form_dropdown('nacionalidade', $opNacionalidade, set_value('nacionalidade', '#'), 'id="nacionalidade" class="span3" required');
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Tipo de federado", "tipo", $label);
        ?>
        <div class="controls">
            <?php
            $opTipo["#"] = "Escolha uma op��o.";
            foreach ($tipo as $t)
                $opTipo[$t['id']] = $t['tipo'];
            echo form_dropdown('tipo', $opTipo, set_value('tipo', "#"), 'id="tipo" class="span3" required');
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
            echo form_label('Modalidade', 'modalidade',$label);
        ?>
        <div class="controls">
            <?php
            foreach ($modalidade as $mod)
                $opModalidade[$mod['id']] = $mod['nome'];
            echo form_dropdown('modalidade',$opModalidade,1,'id="modalidade" class="span3" required disabled');
            ?>
        </div>
    </div>
        <div class="control-group">
        <?php
            echo form_label('Filial','filial',$label);
        ?>
        <div class="controls">
            <?php
            echo form_dropdown('filial',array("#" => "Escolha uma filial"),set_value('filial',"#"),'id="filial" class="span3" required');
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Logradouro", "logradouro", $label);
        ?>
        <div class="controls">
            <?php
            $inLogradouro = 'id="logradouro" class="span3" maxlength="80" required placeholder="Logradouro"';
            echo form_input('logradouro', set_value('logradouro'), $inLogradouro);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("N�mero", "numero", $label);
        ?>
        <div class="controls">
            <?php
            $inNumero = 'id="numero" class="span2" maxlength="5" required placeholder="N�mero"';
            echo form_input('numero', set_value('numero'), $inNumero);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Complemento", "compl", $label);
        ?>
        <div class="controls">
            <?php
            $inComplemento = 'id="compl" class="span3" maxlength="20" placeholder="Complemento"';
            echo form_input('compl', set_value('compl'), $inComplemento);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Bairro", "bairro", $label);
        ?>
        <div class="controls">
            <?php
            $inBairro = 'id="bairro" class="span3" maxlength="30" required placeholder="Bairro"';
            echo form_input("bairro", set_value('bairro'), $inBairro);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Cidade", "cidade", $label);
        ?>
        <div class="controls">
            <?php
            $inCidade = 'id="cidade" class="span3" maxlength="30" required placeholder="Cidade"';
            echo form_input("cidade", set_value('cidade'), $inCidade);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("UF", "uf", $label);
        ?>
        <div class="controls">
            <?php
            $opUF["#"] = "Escolha uma op��o.";
            foreach ($uf as $estado)
                $opUF[$estado['id']] = $estado['sigla'];
            echo form_dropdown('uf', $opUF, set_value('uf', "#"), 'id="uf" class="span2" required');
            ?>
        </div>
    </div>
    <?php
    $inBotao = 'id="btnIncluir" class="btn"';
    echo form_submit("btnIncluir", "Incluir informa��es", $inBotao);
    echo form_close();
    echo form_fieldset_close();
    ?>
</div>