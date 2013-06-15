<h3>Eventos</h3>

<?php if($ultimo_evento['data_evento']!='0000-00-00'){?>
<div class="row-fluid" style="margin-bottom: 30px;">
    <h5>Data do próximo evento: <?php echo $this->funcoes->data($ultimo_evento['data_evento']);?></h5>
        
</div>
<?php }else{ ?>
<span class="">Nenhum evento cadastrado</span>
<?php } ?>
<div class="row-fluid">
    <a class="btn btn-success pull-right" href="/coordenador/criarEvento" style="margin-left: 10px;">Criar Novo evento</a>
    <a class="btn btn-inverse pull-right" href="/administrador/participantes_aprovados" target="new">Lista de participantes aprovados</a>
</div>


<hr>

<h3>Informações gerais sobre a federação</h3>
<div class="row-fluid">
    <div class="span2">Total de alunos: <span class="label label-important"><?php echo $numeros['alunos']['0']['total'];?></span></div>
<div class="span2">Total de instrutores: <span class="label label-success"><?php echo $numeros['instrutores']['0']['total'];?></span></div>
<?php if($numeros['filiais']['0']['total']>1){?>
<div class="span2">Total de Filiais: <span class="label label-warning"><?php echo $numeros['filiais']['0']['total']-1;?></span></div>
<?php } ?>
</div>