
<script>
    $(document).ready(function(){
       $(".chzn-select").chosen({no_results_text: "No results matched"}); 
    });
</script>
<form action="<?php echo base_url(); ?>/coordenador/filiais" method="post" accept-charset="iso-8859-1">



    <input type="text" name="nome" value="" class="span4" placeholder="Nome da Filial">



    <input type="text" name="cnpj" value="" class="span4" placeholder="CNPJ">            <br>

    <input type="text" name="telefone" value="" class="span4" placeholder="Telefone">
    <input type="text" name="email" value="" class="span4" placeholder="Email principal">
    <br>
    
    
   Informe as modalidades que essa filial atende: <select name="id_modalidade"  class="chzn-select">
        
            <?php foreach ($alunos as $a) { ?>
                <option value="<?php echo $a['id_modalidade']; ?>"><?php echo $a['nome']; ?></option>
            <?php } ?>
       
    </select>
   <br>
  
   
   
     
   Informe instrutor responsavel: <select name="id_instrutor"  class="chzn-select">
        
            <?php foreach ($instrutor as $a) { ?>
                <option value="<?php echo $a['nome']; ?>"><?php echo $a['nome']; ?></option>
            <?php } ?>
       
    </select>

    <input type="submit" value="Salvar">


</form>
<br>
<table class="table-bordered span10">
    <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Modalidade</th>
    </tr>
    
    
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>