<?php 
if($this->session->flashdata('erro')){ ?>
<div class="alert alert-error">
    <a href="#" class="close" data-dismiss="alert">x</a>

    <?php echo $this->session->flashdata('erro');?>
</div>
<?php };?>

<?php if($this->session->flashdata('msg')){?>
<h3 class="alert-error">
    <a href="" class="close">x</a>
    <?php echo $this->session->flashdata('msg');?>
    
    
</h3>
<?php } ?>
Lista de eventos

<table class="table table-bordered">
    <thead>
        <tr>
            <td>Numero do evento</td>
            <td>Data</td>
            <td>Tipo de evento</td>
            <td>Local</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($eventos as $i=>$v){?>
        <tr>
            <td><?php echo $v['id_evento']?></td>
            <td><?php echo $v['data_evento']?></td>
             <td><?php echo $v['numero_evento']?></td>
             <td><?php echo $v['logradouro']?> - <?php echo $v['numero']?> - <?php echo $v['cidade']?>- <?php echo $v['sigla']?></td>
             <td><a href="<?php echo base_url(); ?>coordenador/removerEvento/<?php echo $v['id_evento']?>" class="btn btn-success">Remover</a> 
                 <a href="<?php echo base_url(); ?>coordenador/editarEvento/<?php echo $v['id_evento']?>" class="btn btn-warning">Editar</a>
                 <a href="<?php echo base_url(); ?>coordenador/participantes/<?php echo $v['id_evento']?>" class="btn btn-inverse">Participantes</a>
             </td>
        </tr>
        <?php } ?>
    </tbody>
</table>