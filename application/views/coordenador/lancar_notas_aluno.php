<form action="<?php echo base_url(); ?>coordenador/avaliacao" method="post" id="form">

<div class="row-fluid">
    <div class="span2">
        Nome do aluno:
    </div>

    <div class="span3">
        <?php echo $aluno['0']['nome']; ?>
    </div>
</div>

<div class="row-fluid">
    <div class="span2">
        Filial:
    </div>

    <div class="span3">
        <?php echo $aluno['0']['nome_filial']; ?>
    </div>
</div>

<div class="row-fluid">
    <div class="span2">
        Faixa atual:
    </div>

    <div class="span3">
        <?php echo $aluno['0']['faixa']; ?>
    </div>
    
    <div class="span2">
        <strong>Candidato a faixa:</strong>
    </div>

    <div class="span3">
       <strong> <?php echo $movimentos['0']['faixa']; ?></strong>
    </div>
</div>

    <hr> 
    
<div class="row-fluid">
    <div class="span2">
        Data do Evento:
    </div>

    <div class="span3">
        <span class="label label-important"><?php echo $ultimo_evento['0']['data']; ?></span>
    </div>
</div>

    
<div class="row-fluid">
    <div class="span2">
        Numero do Evento:
    </div>

    <div class="span3">
        <input type="hidden" value="<?php echo $ultimo_evento['0']['id_pre_avaliacao']; ?>" name="id_pre_avaliacao">
        <input type="hidden" value="<?php echo $aluno['0']['id_filial']; ?>" name="id_filial">
        <input type="hidden" value="" id="media" name="media">
        <input type="hidden" value="<?php echo $ultimo_evento['0']['id_evento']; ?>" name="id_evento">
        <?php echo $ultimo_evento['0']['numero_evento']; ?>
    </div>
</div>
   
    
<div class="row-fluid">
    <div class="span2">
        Data da avaliação:
    </div>

    <div class="span3">
        <input type="text" id="calendario" value="<?php echo $ultimo_evento['0']['data_agendamento']; ?>" >
    </div>
</div>
    
    
    
    <div class="row-fluid">

    <h3>Notas</h3>
    <div class="span6" >
        <table class="table table-bordered"  style="font-size: 12px;">
            <tr>
                <td>Movimento</td>
                <td>Nota</td>
            </tr>

            <?php $quant = count($movimentos); ?>        
            <?php foreach ($movimentos as $i => $v) { ?>
                <tr>
                    <td><?php echo $v['nome_movimento'] ?></td>
                    <td><input type="text" class="nota faixa_<?php echo $v['id_movimento_faixa']; ?>" name="id_movimento_faixa[<?php echo $v['id_movimento_faixa']; ?>]" onfocus="javascript:mascara()" min="2" value="0"></td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <div class="span4" id="check">
        Confirma inscrição no evento de graduação?


        <img src="<?php echo base_url() ?>/assets/images/icons/16/check.png" id="imagem_ok" style="">
        <img src="<?php echo base_url() ?>/assets/images/icons/16/remove.png" style="display: none" id="imagem_remove">
        <input type="checkbox" name="participacao" checked="true" style="opacity:0;display: none" id="check_box">
        <input type="hidden" name="id_federado" value="<?php echo $aluno['0']['id_federado']; ?>">
        <br>Média final da avaliação = <span class="result label label-important"></span>
    </div>
    
    <div class="span6">
    
    
    </div>
    
    

</div>
    
    <input type="submit" class="btn btn-inverse" value="Salvar avaliação">
</form>
    <script>
    
        $(document).ready(function(){
            $('#check').click(function(){
            
                dem = $('#check_box').is(":checked");
                if(dem==true){
                    $('#check_box').attr('checked', false)
                    $('#imagem_remove').show();
                    $('#imagem_ok').hide();
                }else{
                    $('#check_box').attr('checked', true)
                    $('#imagem_remove').hide();
                    $('#imagem_ok').show();
                }
            });
    
    
    
    text = $('.result').text();
    if(text==''){
        $('.result').text('Informar notas')
    }

             $('input').change(function(){
                total = (
                            <?php foreach ($movimentos as $i=>$v){ ?>
                    parseFloat($('.faixa_<?php echo $v['id_movimento_faixa']?>').val())+
                            <?php } ?>0)/<?php echo $quant ?>;
                                $('.result').text(total.toFixed(2));
                                $('#media').val(total.toFixed(2));
                                
                
            })
        
        })
        
    
    
    
    
        function mascara(){
        
            $('.nota').setMask("9.99")
    
        }
    </script>