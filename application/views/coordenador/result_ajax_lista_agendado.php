<?php if(count($agenda)=='0'){ ?>
<h3 class="alert-error">Nenhum aluno dessa filial possui agendamento</h3>
    <?php }?>

<form action="/coordenador/cancelar_agendamento" method="post">
<table class="table table-hover">
    <tr>
    <td> Nome </td>
    <td> Filial </td>
    <td> Data do agendamento </td>
    <td> Cancelar </td>
    </tr>
    
    <?php foreach ($agenda as $i=>$v){?>
    <tr>
        <td><?php echo $v['nome']; ?></td>
        <td><?php echo $v['nome_filial']; ?></td>
        <td><?php echo $v['data']; ?></td>
        <td><input type="checkbox" name="id_pre_avaliacao[]" value="<?php echo $v['id_pre_avaliacao']; ?>"/></td>
    </tr>
    <?php }?>
</table>

<input type="submit" value="Cancelar" class="btn btn-warning"/>
</form>