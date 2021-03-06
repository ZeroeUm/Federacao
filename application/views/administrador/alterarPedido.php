<script src="<?= base_url() ?>assets/js/alterarPedido.js" type='text/javascript'></script>
<?php
/* 2013-02-13
 * @author Humberto
 */

foreach ($modalidade as $mod)
    $opModalidade[$mod['id']] = $mod['nome'];

foreach ($taekwondo as $tkd)
    $opTaekwondo[$tkd['id']] = $tkd['descricao'];

foreach ($status as $s)
    $opStatus[$s['id']] = $s['descricao'];
echo form_open('administrador/atualizarPedido/' . $this->uri->segment(3), 'class = "form-horizontal"', array('pedido' => $this->uri->segment(3)));
?>
<div class="row-fluid" style="height: 35px;">
    <div class="span3">
        <div class="control-group">
            <a href="#" class="text-right" id="adicionar">Adicionar novo item</a>
        </div>
    </div>
    <div class="span5 offset4" style="height: 35px;">
        <div class="control-group" style="height: 35px;">
            <?php
            echo form_label("Situação do pedido: ", 'situacao', array('class' => 'control-label', 'style' => 'padding: 5px 0 0 0'));
            ?>
            <div class="controls" style="padding: 0">
                <?php
                echo form_dropdown('situacao', $opStatus, $itens[0]['status'], "class='input-medium'")
                ?>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>Número</th>
                <th>Modalidade</th>
                <th>Item</th>
                <th>Tamanho</th>
                <th>Quantidade</th>
                <th>Excluir ?</th>
            </tr>
        </thead>
        <tbody id="corpo">
            <?php
            foreach ($itens as $item):
                ?>
                <tr>
                    <td style="text-align: center;"><?= $item['numero'] ?><input type="hidden" name="numero[<?= $item['numero'] ?>]" id="numero" value="<?= $item['numero'] ?>"/></td>
                    <td style="text-align: center;"><?php echo form_dropdown('modalidades[]', $opModalidade, $item['id_modalidade'], 'disabled id="modalidades[]" class="span2"') ?></td>
                    <td style="text-align: center;"><?php echo form_dropdown('item[' . $item['numero'] . ']', $opTaekwondo, $item['id_item'], 'id="item[]" class="span3"') ?></td>
                    <td style="text-align: center;"><?php echo form_input('tamanho[' . $item['numero'] . ']', $item['tamanho'], 'id="tamanho[]" class="span1"') ?></td>
                    <td style="text-align: center;"><?php echo form_input('quantidade[' . $item['numero'] . ']', $item['quantidade'], 'id="quantidade[]" class="span1"') ?></td>
                    <td style="text-align: center;"><?php echo form_checkbox('excluir[' . $item['numero'] . ']', 'excluir') ?></td>
                </tr>
                <?php
            endforeach;
            ?>
        <input type="hidden" id="ultimo" value="<?= $item['numero'] + 1 ?>"/>
        </tbody>
    </table>
</div>
<div class="row-fluid">
    <div class="span3 offset8">
        <?php
        echo anchor('administrador/pedidos', 'Voltar', 'class="btn btn-success"'); 
        echo nbs(4);
        echo form_submit("btnAlterar", "Alterar informações", 'class="btn btn-success"');
        ?>
    </div>
</div>
<?php
echo form_close();
?>