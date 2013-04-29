<?php $tabelas = count($movimentos); ?>
<h3>Candidatos a <?php echo $movimentos['0']['faixa'];  ?></h3>
<table class="table table-bordered">
    <tr>
        <td>Legenda de notas</td>
        <td>Legenda de Resultado</td>
    </tr>

    <tr>
        <td>

            <?php foreach ($movimentos as $i => $v) { ?>


                <span class="label label-important"><?php echo $v['sigla']; ?></span>
                <?php echo $v['nome_movimento']; ?><br>

            <?php } ?>
        </td>
        
        <td >
            Até média 5,00 Reprovado <br>
            Média 6,00 Exame - Faz novamente em 1 semana <br>
           Média 7,00 Regular - Aprovado<br>
            Média 8,00 Bom - Aprovado<br>
            Média 9,00 Ótimo - Aprovado<br>
            Acima de 9,51 Execelente - Aprovado e ganha uma faixa extra<br>
            
        </td>
    </tr>
</table>


<table class="table table-condensed table-bordered">
    <tr>
        <td>Nome</td>
        <?php foreach ($movimentos as $i => $v) { ?>
            <td><?php echo $v['sigla']; ?></td>
        <?php } ?>
    </tr>

    <?php foreach ($participantes as $r => $t) { ?>
        <tr>
            <td><?php echo $t['nome']; ?></td>
            <?php
            $i = 0;
            while ($i < $tabelas) {
                ?>

                <td>
                    
                </td>

            <?php $i++;
        } ?>
        </tr>
<?php } ?>
</table>