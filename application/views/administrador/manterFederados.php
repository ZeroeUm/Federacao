<?php

?>
<label>Instrutores</label>
<?php 
$options = array("" => "Escolha uma op��o.");
foreach($instrutores as $instrutor)
    $options[$instrutor->id] = $instrutor->nome;
echo form_dropdown("instrutores",$options);
?>
