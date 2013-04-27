
<script>
$(document).ready(function(){
    $('#selecionar_filial').click(function(){
       
       filial = $(this).val();
      
       $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>coordenador/ajax_exibir_agenda/"+filial,
                data: "id_filial"+filial,
                datatype: "html",
                success: function (html){
                    $('.lista_de_alunos').html(html);
                }
            });
       
    }) 
    
    
    
});
</script>


<h3>Compromissos agendados</h3>


<div class="row-fluid">
    
    <div class="span5">
    <form id="form" action="#" method="get">
        <label>
            Informe a filial
        </label>
        <select id="selecionar_filial" name="id_filial">
            
             <?php foreach ($filiais as $i=>$v){?>
            <option class="" value="<?php echo $v['id_filial'] ?>"><?php echo $v['nome']; ?></option>
            <?php }?>
        </select>
    </form>
    </div>
</div>

<div class="lista_de_alunos">
    
</div>