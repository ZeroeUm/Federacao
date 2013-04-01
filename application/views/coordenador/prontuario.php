<div class="page-header">
    <h1>Emitir notas  <small>para alunos</small></h1>
</div>
<div class="row-fluid">
    <form action="/coordenador/prontuario" method="post">

        <div class="row-fluid">
            <div class="span2">Nome do Federado</div>
            <div class="span3"><input type="text" name="data[federado][nome]" /></div>
        </div>

        <div class="row-fluid">
            <div class="span2">RG</div>
            <div class="span3"><input type="text" name="data[federado][rg]" /></div>
        </div>
        
        
        <div class="row-fluid">
            <div class="span2">Evento</div>
            <div class="span3">
            
            
            <select name="data[evento][id_evento]">
                <option></option>
            </select>
                
                </div>
        </div>   

        <input type="submit" value="Buscar participantes" class="btn btn-primary"/>
    </form>

</div>

<?php if (!empty($dados)) { ?>

    <div class="row-fluid" style="margin-top: 50px;">


        <div class="row-fluid">
            <div class="span3">Nome do federado:</div>
            <div class="span3"></div>
        </div>

        <div class="row-fluid">
            <div class="span3">Endereço:</div>
            <div class="span3"></div>
        </div>



        <table class="tablesorter table">
            <thead>
                <tr>
                    <td>Golpe</td>
                    <td>Nota</td>
                    <td>Evento</td>
                    <td>Status</td>
                </tr>
            </thead>
        </table>

    </div>
<?php } ?>
