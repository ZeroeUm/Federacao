


<table class="table table-bordered">
    <tr>
        <td class="span1"><input type="checkbox" id="selecionarTodos"></td>
        <td>Nome</td>
        <td>Faixa atual</td>
        <td></td>
        
    </tr>
    
    <?php if(empty($alunos)){?>
    <tr><td colspan="4" style="color: red;text-align: center;">Sem alunos avaliados</td></tr>
    <?php }else{?>
    
    <?php foreach ($alunos as $i=>$v){ ?>
    <tr>
        <td><input type="checkbox" name="pre_avaliacao[id_pre_avaliacao][]" value="<?php echo $v['id_pre_avaliacao'];?>"/></td>
        <td><?php echo $v['nome'];?></td>
        <td><?php echo $v['faixa_atual'];?></td>
        <td><a href="<?php echo base_url(); ?>coordenador/lancar_notas_aluno/<?php echo $v['id_federado'];?>">Lançar notas</a></td>
    </tr>
    <?php } } ?>
</table>
