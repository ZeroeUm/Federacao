Informe uma modalidade: 
<select>
 <?php foreach ($categorias as $r=>$d){?>
    <option value="<?php echo $d['id_modalidade'] ?>"><?php echo $d['nome'] ;?></option>
<?php } ?> 
</select>