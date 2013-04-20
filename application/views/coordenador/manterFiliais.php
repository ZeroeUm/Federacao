<script>
    $(document).ready(function () {
    $("#filiais").change(function (){
        var fil = $("#filiais").val();
        if(fil != "#")
        {
            $.ajax({
                type: "POST",
                url: "/coordenador/mostrarFiliais/"+fil,
                data: "filial"+fil,
                datatype: "html",
                success: function (filial){
                    $('.filial').html(filial);
                }
            })
        }
    })
})
</script>


<?php
/* 2013-01-24
 * @author HUmberto
 */
$prop = array('class' => 'btn btn-primary btn-large', 'name' => 'incluirFilial','id' => 'incluirFilial');

echo anchor("administrador/incluirFilial","Incluir Filial",$prop);

echo form_fieldset("Pesquisa por Filial");
$options = array("#" => "Escolha uma filial.");
foreach($filiais as $filial)
    $options[$filial['id']] = $filial['nome'];

echo form_label("Filiais","filiais");
echo form_dropdown('filiais',$options,'#','id="filiais" class="span3"');

echo form_fieldset_close();

?>
<div class="filial">
    
</div>