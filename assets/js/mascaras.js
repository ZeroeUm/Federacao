$('document').ready(function(){
 
    mostrar = $('.mensagem_alert').attr('mostrar');
    
    if(mostrar=='sim'){
        $('.principal').addClass('pagina');
    }
    
    
    $('.fechar_alerta').click(function(){
        $('.pagina').removeClass();
    })
 
    
    $('ul#menu li.parent').mouseleave(function() {
        $('.exibida').hide();
    });
    
    
    
    $('#calendario').datepicker({dateFormat:'dd-mm-yy'});
 
 
 
 
    $('#rg').setMask('99.999.999-99');
    $('#cnpj').setMask('999.999.999/9999-99');
    $('#cpf').setMask('999.999.999-99');
    $('#cep').setMask('99999-999');
    $('#telefone').setMask("(99)9999-9999"); 
    $('#fax').setMask("(99)9999-9999"); 
    
    
    
    
    $('#celular').setMask("(99)99999-9999").ready(function(event) {
        var target, phone, element;
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;
        phone = target.value.replace(/\D/g, '');
        element = $(target);
        element.unsetMask();
        if(phone.length > 10) {
            element.setMask("(99)99999-9999");
        } else {
            element.setMask("(99)99999-9999");
        }
    });
    
    
    
    $("#email").focusout(function(){
        //at$(".msg").hide();ribuindo o valor do campo
        var sEmail	= $("#email").val();
        // filtros
        var emailFilter=/^.+@.+\..{2,}$/;
        var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/
        // condição
        if(!(emailFilter.test(sEmail))||sEmail.match(illegalChars)){
            if($(this).val()==''){
                $(this).css({
                    "border-color" : "#F00", 
                    "padding": "2px"
                });
            }else{
                alert('Formato do e-mail fornecido é invalido');
            }
        }else{
            $(this).css({
                    "border-color" : "", 
                    "padding": "2px"
                });
        }
    });
    
    
    
    
})

