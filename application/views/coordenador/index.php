<?php if($this->session->flashdata('key')){ ?>
<div class="alert alert-success" style="position: absolute;float: left;">
Salvo com sucesso  
</div>

<?php } ?>



<div class="row-fluid">
    
    <div class="span3">
    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width:">
        <li><a tabindex="-1" href="#">Gerenciamento de filiais</a></li>
        <li class="divider"></li>
        <li><a tabindex="-1" href="/coordenador/filiais">Cadastrar nova filial</a></li>
        <li><a tabindex="-1" href="#">Editar dados de filial</a></li>
        <li class="dropdown-submenu"><a tabindex="-1" href="#">Relatorios</a>
            <ul class="dropdown-menu">
                <li><a tabindex="-1" href="#">Lista de Alunos por filial</a></li>
                    <li class="dropdown-submenu"><a tabindex="-1" href="#">Modalidades</a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#">Cadastrar nova modalidade</a></li>
                            <li><a tabindex="-1" href="#">Modalidades atendidas</a></li>
                            <li><a tabindex="-1" href="#">Curriculo de modalidade</a></li>
                        </ul>
                    </li>
                <li><a tabindex="-1" href="#">Lista de Professores</a></li>

             </ul>
       </li>
                  
     </ul>
    
    
    </div>
    
    
    
    <div class="span3">
    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width:">
        <li><a tabindex="-1" href="#">Gerenciamento de Alunos</a></li>
        <li class="divider"></li>
        <li><a tabindex="-1" href="#">Hist�rico do federado</a></li>
        <li><a tabindex="-1" href="#">Prontuario de notas</a></li>
        
        <li class="dropdown-submenu"><a tabindex="-1" href="#">Avalia��es</a>
            <ul class="dropdown-menu">
                <li><a tabindex="-1" href="#">Cadastrar alunos em evento</a></li>
                   <li><a tabindex="-1" href="#">Lan�ar notas de evento</a></li> 
                <li><a tabindex="-1" href="#">Solicita��o de faixas</a></li>

             </ul>
       </li>
                  
     </ul>
    
    
    </div>
    
    
    
     <div class="span3">
    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width:">
        <li><a tabindex="-1" href="#">Eventos</a></li>
        <li class="divider"></li>
        <li><a tabindex="-1" href="#">Cadastrar novo evento</a></li>
            <li class="dropdown-submenu"><a tabindex="-1" href="#">Lista de participante</a>
           
            <ul class="dropdown-menu">
                <li><a tabindex="-1" href="#">Cadastrar alunos em evento</a></li>
                <li><a tabindex="-1" href="#">Imprimir lista de participantes</a></li>
               
             </ul>
            </li>
        
        <li class="dropdown-submenu"><a tabindex="-1" href="#">Materiais</a>
            <ul class="dropdown-menu">
                <li><a tabindex="-1" href="#">Solicitar faixas</a></li>
               
             </ul>
       </li>
       
       <li class="dropdown-submenu"><a tabindex="-1" href="#">Certificado</a>
            <ul class="dropdown-menu">
                <li><a tabindex="-1" href="#">Imprimir certificado</a></li>
               
             </ul>
       </li>
                  
     </ul>
    
    
    </div>
    
    
    
    
    
    
    
</div>
