<?php
/*
 * 2013-04-27
 * @author Humberto
 */
?>
<ul class="nav nav-pills">
    <?php
    foreach ($faixas as $f):
    ?>
    <li><a href='<?php echo base_url(). 'alunos/curriculoFaixa/' . $f['id'] ?>'><?=$f['faixa'] ?></a></li>
    <?php
    endforeach;
    ?>
</ul>
<fieldset>
    <legend>Curriculo Nacional de Taekwondo</legend>
</fieldset>
<div class="row-fluid">
    <div class="row-fluid">
        <p>Clique acima em sua graduação representada pela cor da faixa e veja todo o conteúdo que voce deverá saber do programa de graduação do currículo nacional.</p>
    </div>
    <div class="row-fluid">
        <p>O currículo nacional de graduação foi desenvolvido no encontro nacional de taekwondo realizado no dia 12 de fevereiro de 1997, na cidade de Belo Horizonte - MG e revisto em assembléia geral em 2008. O conteúdo na integra pode ser encontrado na apostila da CBTI – Confederação Brasileira de Taekwondo Interestilos e no livro “Arte Marcial Coreana Taekwondo – Volume 2 avançado”.</p>
    </div>
    <div class="row-fluid">
        <p>
            Os dirigentes e mestres com conceituada experiência e qualificados se dedicaram para elaboração deste material, onde todas as instituições de ensino do taekwondo poderão se basear para que o taekwondo brasileiro se entenda em uma única linguagem no que diz respeito às graduações.
        </p>
    </div>

</div>