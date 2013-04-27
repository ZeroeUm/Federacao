
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	
    
    tinyMCE.init({
        // General options
        mode : "exact",
        elements : "long_text",
        theme : "advanced",
        plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

        // Theme options
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,iespell,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : false,
        theme_advanced_resizing : false,

        // Example content CSS (should be your site CSS)
        content_css : "<?php echo base_url(); ?>assets/css/tienymce/css/content.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "<?php echo base_url(); ?>assets/css/tienymce/lists/template_list.js",
        external_link_list_url : "<?php echo base_url(); ?>assets/css/tienymce/lists/link_list.js",
        external_image_list_url : "<?php echo base_url(); ?>assets/css/tienymce/lists/image_list.js",
        media_external_list_url : "<?php echo base_url(); ?>assets/css/tienymce/lists/media_list.js",

        // Style formats
        style_formats : [
            {title : 'Bold text', inline : 'b'},
            {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
            {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
            {title : 'Example 1', inline : 'span', classes : 'example1'},
            {title : 'Example 2', inline : 'span', classes : 'example2'},
            {title : 'Table styles'},
            {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
        ],

        // Replace values for the template plugin
        template_replace_values : {
            username : "Some User",
            staffid : "991234"
        }
    });
</script>


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


        <label>Numero do evento</label> 
        <input type="text" name="data[evento_graduacao][numero_evento]" class="obrigatorio input-block-level" placeholder="Numero do evento">

        <label>Endereço</label>

        <input type="text" name="data[endereco][logradouro]" class="input-block-level" placeholder="Endereço">
        <input type="text" name="data[endereco][cidade]" class="span6" placeholder="Cidade">
        <input type="text" name="data[endereco][numero]" class="input-small" placeholder="Numero">

        <select name="data[endereco][uf]" class="input-small">
            <option value="1">SP</option>
        </select>

        <input type="text" name="data[endereco][bairro]" class="input-block-level" placeholder="Bairro">

        <input type="text" name="data[endereco][complemento]" class="input-block-level" placeholder="Complemento">
        <label>Categoria do Evento</label>

        <select name="data[evento_graduacao][id_modalidade]">


            <?php foreach ($modalidades as $i => $v) {
; ?>
                <option value="<?php echo $v['id_modalidade']; ?>"> <?php echo $v['nome']; ?> </option>
<?php } ?>    
        </select>

        <label>Descrição</label>
        <textarea id="long_text" name="data[evento_graduacao][descricao]" rows="15" cols="80" style="width: 80%">
    
        </textarea>

        <input type="submit" value="Salvar" class="btn btn-primary">
    </form>
</div>