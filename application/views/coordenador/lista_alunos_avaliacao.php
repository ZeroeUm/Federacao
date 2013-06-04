
<style>
    .error{
        font-size: 12px;
        color: red;
    }
</style>
<script>
  $(document).ready(function(){
        $( "#datepicker" ).datepicker({
            minDate: new Date(),
            dateFormat:'dd-mm-yy'
        }).attr("readonly",1);
        
        
        
        
         $("#form").validate({
            rules:{
                'pre_avaliacao[data_agendamento]':{required: true},
                'pre_avaliacao[horario]':{required: true}
                
                
            },
            messages:{
                'pre_avaliacao[data_agendamento]':{required: "Campo data é obrigatório"},
                'pre_avaliacao[horario]':{required: "informe um horário para a pré-avaliação"}
               
            }
        })
        
        
        
        
        
        $('#selecionarTodos').click(function() {
            if(this.checked == true){
                $("input[type=checkbox]").each(function() {
                    this.checked = true;
                });
            } else {
                $("input[type=checkbox]").each(function() {
                    this.checked = false;
                });
            }
        });
        
    })
</script>

<h3>Alunos para pré-avaliação</h3>


<form action="<?php echo base_url(); ?>coordenador/agendar_pre_avaliacao/<?php echo $id_filial;?>" method="post" id="form" >
<label>Informe a data para pré-avaliação</label>
<input type="text" id="datepicker" class="input-large" name="pre_avaliacao[data_agendamento]" value="">
<label>Horário para a pré-avaliação</label>
<select type="text" id="horario" name="pre_avaliacao[horario]">
    <option value="1">Manhã</option>
    <option value="2">Tarde</option>
    <option value="3">Noite</option>
</select>

<hr>

<table class="table table-bordered">
    <tr>
        <td class="span1"><input type="checkbox" id="selecionarTodos"></td>
        <td>Nome</td>
        <td>Faixa atual</td>
        
    </tr>
    
    <?php foreach ($alunos as $i=>$v){ ?>
    <tr>
        <td><input type="checkbox" name="pre_avaliacao[id_pre_avaliacao][]" value="<?php echo $v['id_pre_avaliacao'];?>"/></td>
        <td><?php echo $v['nome'];?></td>
        <td><?php echo $v['faixa_atual'];?></td>
    </tr>
    <?php } ?>
</table>

<input type="submit" class="btn btn-success" value="Agendar pré-avaliação">

</form>