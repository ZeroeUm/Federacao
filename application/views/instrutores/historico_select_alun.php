<script>
    $(document).ready(function(){
       
        $('.filial').click(function(){
       
        
        filial = $(this).val();
               $.ajax({
                type: "POST",
                data: "filial="+filial,
                url: "ajax_listar_alunos/"+filial,
                datatype: 'html',
                success: function(alunos)
                {
                 
                 $('.lista_alunos').html(alunos);
                 
                }
            })
            
            
        })
         
        
        
    })
</script>

<form id="form1" action="" method="post">
    <div class="span2 row-fluid">Informe a Filial:</div>
   
    <div class="span2">

        <select name="filial" class="filial">

<?php foreach ($filial as $i){?>
        
            <option value="<?php echo $i->id ?>"><?php echo $i->nome ?></option>

                <?php } ?>

        </select>
    </div>
</form>

<div class="lista_alunos">
    
</div>
