<?php
echo form_open('');
?>




<?php
$nome = array('name' => 'nome', 'class' => 'span4', 'placeholder' => "Nome da Filial");
echo form_input($nome);
?>




            <?php
            $nome = array('name' => 'cnpj', 'class' => 'span4', 'placeholder' => "CNPJ");
            echo form_input($nome);
            ?>
            <br>

            <?php
            $nome = array('name' => 'telefone', 'class' => 'span4', 'placeholder' => "Telefone");
            echo form_input($nome);
            ?>

            <?php
            $nome = array('name' => 'email', 'class' => 'span4', 'placeholder' => "Email principal");
            echo form_input($nome);
            ?>

            <br>
            <p>Modalidades:</p>
            <?php
             
            
            
            $options = $alunos;

            $shirts_on_sale = array('small', 'selecione a modalidade');

            echo form_dropdown('shirts', $options,$shirts_on_sale);
            ?>
            <br>
            <?php
            $nome = array('name' => 'instrutor', 'class' => 'span4', 'placeholder' => "instrutores");
            echo form_input($nome);
            ?>

            <br>

            <?php
            echo form_submit('salvar', 'Salvar');
            ?>



            </form>