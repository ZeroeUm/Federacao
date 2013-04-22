<script>
$(document).ready(function(){
    $('#selecionar_filial').click(function(){
        $('#form').submit();
    }) 
});
</script>


<h3>Pré-avaliação de alunos</h3>


<div class="row-fluid">
    <form id="form" action="/coordenador/pre_avaliar" method="post">
        <label>
            Informe a filial
        </label>
        <select id="selecionar_filial" name="id_filial">
            <option selected="false"> Selecione uma filial</option>
             <?php foreach ($filiais as $i=>$v){?>
            <option value="<?php echo $v['id_filial'] ?>"><?php echo $v['nome']; ?></option>
            <?php }?>
        </select>
    </form>
</div>
<hr>

