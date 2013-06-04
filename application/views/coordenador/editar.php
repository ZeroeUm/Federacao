



<script>
    $(document).ready(function(){
        $( "#datepicker" ).datepicker({
            minDate: new Date(),
            dateFormat:'dd-mm-yy'
        }).attr("readonly",1);
      
      
               
        $("#form").validate({
            rules:{
                'data[evento_graduacao][data_evento]':{required: true},
                'data[evento_graduacao][numero_evento]':{required: true},
                'data[endereco][logradouro]':{required: true},
                'data[endereco][cidade]':{required: true},
                'data[evento_graduacao][id_modalidade]':{required: true}
                
            },
            messages:{
                'data[evento_graduacao][data_evento]':{required: "Campo data é obrigatório"},
                'data[evento_graduacao][numero_evento]':{required: "O número do evento é obrigatório"},
                'data[endereco][logradouro]':{required: "O endereço é obrigatório."},
                'data[endereco][cidade]':{required: "O preenchimento da cidade é obrigatório."},
                'data[evento_graduacao][id_modalidade]':{required:"Informe a modalidade"}
            }
        })
      
    })
</script>


<style>

label { display: block; margin-top: 10px; }
label.error { float: none; color: red; margin: 0 .5em 0 0; vertical-align: top; font-size: 10px }
    
</style>
<?php

$data = explode('-',$Eventos['0']['data_evento']);

?>
<h3>Editar evento</h3>
<div class="span9">
    <form action="<?php echo base_url(); ?>coordenador/editarEvento/<?php echo $id;?>" method="post" id="form">
    
     <label>Data do evento</label> 
     <input type="text" name="data[evento_graduacao][data_evento]" class="input-block-level" id="datepicker" placeholder="Data do Evento" value="<?php echo $data['2']."-".$data['1']."-".$data['0'] ?>">
    
     <input type="hidden" name="data[evento_graduacao][id_evento]"  value="<?php echo $Eventos['0']['id_evento']; ?>">
      <input type="hidden" name="data[endereco][id_endereco]"  value="<?php echo $Eventos['0']['id_endereco']; ?>">
    
     
<!--    <label>Numero do evento</label> 
    <input type="text" name="data[evento_graduacao][numero_evento]" class="input-block-level" placeholder="Numero do evento" value="<?php echo $Eventos['0']['numero_evento'] ?>">
    -->
    <label>Endereço</label>
    
    <input type="text" name="data[endereco][logradouro]" class="input-block-level" placeholder="Endereço" value="<?php echo $Eventos['0']['logradouro'] ?>">
    <input type="text" name="data[endereco][cidade]" class="span6" placeholder="Cidade" value="<?php echo $Eventos['0']['cidade'] ?>">

    <input type="text" name="data[endereco][numero]" class="input-small" placeholder="Numero" value="<?php echo $Eventos['0']['numero'] ?>">

    <select name="data[endereco][uf]" class="input-small">
        
         <option value="<?php echo $Eventos['0']['id_estados'];?>"><?php echo $Eventos['0']['sigla'];?></option>
        
        <?php foreach ($estados as $i=>$v){?>
                <option value="<?php echo $v['id_estados']?>"><?php echo $v['sigla']?></option>
        <?php } ?>
        
    </select>
    
    <input type="text" name="data[endereco][bairro]" class="input-block-level" placeholder="Bairro" value="<?php echo $Eventos['0']['bairro'] ?>">
   
    <input type="text" name="data[endereco][complemento]" class="input-block-level" placeholder="Complemento" value="<?php echo $Eventos['0']['complemento'] ?>">
    
        
<!--    <select name="data[evento_graduacao][id_modalidade]">
        
        <option value="<?php echo $Eventos['0']['id_modalidade'] ?>"> <?php echo $Eventos['0']['id_modalidade'] ?> </option>
        
    <?php foreach ($modalidades as $i=>$v){;?>
        <option value="<?php echo $v['id_modalidade']; ?>"> <?php echo $v['nome']; ?> </option>
    <?php } ?>    
    </select>-->
    
    <label>Descrição</label>
    <textarea name="data[evento_graduacao][descricao]" style="width: 730px;height: 200px;resize: none;">
    <?php echo $Eventos['0']['descricao'] ?>
    </textarea>
    
    <input type="submit" value="Salvar" class="btn btn-success"> 
</form>
    </div>
