
<div class="row-fluid">

    <div class="span2">
        Nome da filial
    </div>

    <div class="span5">
        <?php echo $resultado['0']['nome'];?>
    </div>

</div>

<div class="row-fluid">

    <div class="span2">
        Telefone
    </div>

    <div class="span5">
        <?php echo $resultado['0']['telefone'];?>
    </div>

</div>

<div class="row-fluid">

    <div class="span2">
        Fax
    </div>

    <div class="span5">
        <?php echo $resultado['0']['fax'];?>
    </div>

</div>

<div class="row-fluid">

    <div class="span2">
        Email
    </div>

    <div class="span5">
        <?php echo $resultado['0']['email'];?>
    </div>

</div>

<div class="row-fluid">

    <div class="span2">
        CNPJ
    </div>

    <div class="span5">
        <?php echo $resultado['0']['cnpj'];?>
    </div>

</div>


<div class="row-fluid">

    <div class="span2">
        Instrutor
    </div>

    <div class="span5">
        <?php echo $resultado['0']['instrutor'];?>
    </div>

</div>


<div class="row-fluid">

    <div class="span2">
        Endereço
    </div>

    <div class="span5">
        <?php echo $resultado['0']['logradouro']." ".$resultado['0']['numero']." ".$resultado['0']['complemento']." ".$resultado['0']['bairro']." ".$resultado['0']['cidade']." ".$resultado['0']['uf'];?>
    </div>

</div>