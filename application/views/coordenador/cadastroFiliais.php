<form action="<?php echo base_url(); ?>/coordenador/filiais" method="post" accept-charset="iso-8859-1">



    <input type="text" name="nome" value="" class="span4" placeholder="Nome da Filial">



    <input type="text" name="cnpj" value="" class="span4" placeholder="CNPJ">            <br>

    <input type="text" name="telefone" value="" class="span4" placeholder="Telefone">
    <input type="text" name="email" value="" class="span4" placeholder="Email principal">
    <br>
    <p>Modalidades:</p>
    <select name="shirts" multiple="multiple">
        <optgroup>
            <?php foreach ($alunos as $a) { ?>
                <option value=""><?php echo $a['nome']; ?></option>
            <?php } ?>
        </optgroup>
    </select>
    <br>
    <input type="text" name="instrutor" value="" class="span4" placeholder="instrutores">
    <br>

    <input type="submit" name="salvar" value="Salvar">


</form>