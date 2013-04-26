<div class="row-fluid">
    <div class="span2">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
            <li ><a href="#">Alunos</a></li>
            <li class="divider"></li>
            <li  class="dropdown-submenu"><a href="">Pré-avaliação</a>
                    <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="<?php echo base_url(); ?>coordenador/pre_avaliar">Agendar pré-avaliação</a></li>
                      <li><a tabindex="-1" href="<?php echo base_url(); ?>coordenador/agenda_de_compromissos">Consultar agendamentos</a></li>
                      
                    </ul>
            </li>
            <li><a href="<?php echo base_url(); ?>coordenador/lancar_nota">Lançar notas</a></li>
             <li><a href="">Emitir Certificado</a></li>
        </ul>
    </div>
    
    
    <div class="span2">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
            <li ><a href="#">Filiais</a></li>
            <li class="divider"></li>
            <li class="dropdown-submenu"><a href="">Manutenção de filiais</a>
                <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="<?php echo base_url(); ?>administrador/incluirFilial">Incluir nova filial</a></li>
                      <li><a tabindex="-1" href="<?php echo base_url(); ?>administrador/filiais">Consultar / Alterar Filial</a></li>
                      
                    </ul>
            </li>
            <li><a href="">Consulta de instrutores</a></li>
            
            <li class="dropdown-submenu"><a href="">Curriculo Modalidades</a>
                <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="#">Incluir</a></li>
                      <li><a tabindex="-1" href="#">Consultar / Alterar curriculo</a></li>
                      
                    </ul>
            </li>
            
        </ul>
    </div>
    
    
    <div class="span2">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
           <li ><a href="#">Eventos</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url(); ?>coordenador/listaEventos">Lista de participantes em evento</a></li>
            <li><a href="<?php echo base_url(); ?>coordenador/criarEvento">Criar novo Evento de graduação</a></li>
            <li><a href="">Solicitar faixas</a></li>
             
        </ul>
    </div>
    
</div>
<br>

Você tem <span class="label label-important"><?php echo $total['0']['total']; ?> alunos</span> aguardando agendamento para pré-avaliação - <a href="<?php echo base_url(); ?>coordenador/agenda_de_compromissos">Verificar agora</a>


<hr>

<h3>Compromissos agendados</h3>

<table class="table table-bordered">
    <tr>
    <td>Data</td>
    <td>Filial</td>
    </tr>
    <?php foreach ($agenda as $i=>$v){?>
    <tr>
        <td><?php echo $v['data'];?></td>
        <td><?php echo $v['nome'];?></td>
    </tr>
    <?php } ?>
</table>