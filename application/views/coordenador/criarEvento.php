

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

<h3>Criar evento</h3>
<a href="/coordenador/listaEventos" class="pull-right btn btn-primary">Lista de eventos</a>
<div class="span9">
    <form action="<?php echo base_url(); ?>coordenador/criarEvento" method="post" id="form">

        <label>Data do evento</label> 
        <input type="text" name="data[evento_graduacao][data_evento]" class=" obrigatorio input-block-level" id="datepicker" placeholder="Data do Evento">


        <!--<label>Numero do evento</label> 
        <input type="text" name="data[evento_graduacao][numero_evento]" class="obrigatorio input-block-level" placeholder="Numero do evento">-->

        <label>Endereço</label>

        <input type="text" name="data[endereco][logradouro]" class="input-block-level" placeholder="Endereço">
        <input type="text" name="data[endereco][numero]" class="input-block-level" placeholder="Numero">

        <input type="text" name="data[endereco][cidade]" class="input-block-level" placeholder="Cidade">
        
        <select name="data[endereco][uf]" class="input-block-level">
            <option value="1">SP</option>
        </select>

        <input type="text" name="data[endereco][bairro]" class="input-block-level" placeholder="Bairro">

        <input type="text" name="data[endereco][complemento]" class="input-block-level" placeholder="Complemento">
       

<!--        <select name="data[evento_graduacao][id_modalidade]">


            <?php //foreach ($modalidades as $i => $v) {
; ?>
                <option value="<?php //echo $v['id_modalidade']; ?>"> <?php //echo $v['nome']; ?> </option>
<?php //} ?>    
        </select>-->

        <label>Descrição</label>
        <textarea name="data[evento_graduacao][descricao]" style="width: 730px;height: 200px;resize: none;">
    
        </textarea>

        <input type="submit" value="Salvar" class="btn btn-primary">
    </form>
</div>