<script src="<?= base_url()?>assets/js/alterarPedido.js" type='text/javascript'></script>
<?php
/* 2013-02-13
 * @author Humberto
 */

foreach($modalidade as $mod)
    $opModalidade[$mod['id']] = $mod['nome'];

foreach($taekwondo as $tkd)
    $opTaekwondo[$tkd['id']] = $tkd['descricao'];

echo form_open('administrador/atualizarPedido/'.$this->uri->segment(3),'',array('pedido' => $this->uri->segment(3)));
?>
<a href="#" class="text-right" id="adicionar">Adicionar novo item</a>
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
            foreach($itens as $item):
        ?>
        <tr>
            <td style="text-align: center;"><?= $item['numero']?><input type="hidden" name="numero[]" id="numero" value="<?=$item['numero']?>"/></td>
            <td style="text-align: center;"><?php echo form_dropdown('modalidades[]', $opModalidade, $item['id_modalidade'], 'disabled id="modalidades[]" class="span2"') ?></td>
            <td style="text-align: center;"><?php echo form_dropdown('item[]', $opTaekwondo, $item['id_item'], 'id="item[]" class="span3"')?></td>
            <td style="text-align: center;"><?php echo form_input('tamanho[]', $item['tamanho'], 'id="tamanho[]" class="span1"')?></td>
            <td style="text-align: center;"><?php echo form_input('quantidade[]',$item['quantidade'],'id="quantidade[]" class="span1"') ?></td>
            <td style="text-align: center;"><?php echo form_checkbox('excluir[]') ?></td>
        </tr>
        <?php
            endforeach;
        ?>
    <input type="hidden" id="ultimo" value="<?=$item['numero']+1?>"/>
    </tbody>
</table>
<?php 
echo form_submit("btnAlterar", "Alterar informações",'class="btn"');
echo form_close();
?>