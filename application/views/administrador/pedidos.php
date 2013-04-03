<?php
/* 2013-02-11
 * @author Humberto
 */
echo($links);
?>
<table class="table table-condensed table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Responsável</th>
            <th>Fornecedor</th>
            <th>Situação</th>
            <th>Alterar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($resultado as $row):
                switch ($row->status):
                    case 1:
                        $classe = "warning";
                        break;
                    case 2:
                        $classe = "info";
                        break;
                    case 3:
                        $classe = "success";
                        break;
                    case 4:
                        $classe = "error";
                        break;
                endswitch;
        ?>
        <tr class="<?= $classe?>">
            <td style="text-align: center;"><?= $row->id?></td>
            <td style="text-align: center;"><?= date('d-m-Y',strtotime($row->data))?></td>
            <td style="text-align: center;"><?= $row->responsavel?></td>
            <td style="text-align: center;"><?= $row->fornecedor?></td>
            <td style="text-align: center;"><?= $row->situacao?></td>
            <td style="text-align: center;">
                <a href="<?php echo base_url()?>administrador/alterarPedido/<?=$row->id?>" class="btn btn-link">Informações</a>
                <a href="#modal" class="btn btn-link" role="button" data-toggle="modal">Status</a>
            </td>            
        </tr>
        <?php
            endforeach;
        ?>
    </tbody>
</table>
<div id="modal">
</div>
<?php
echo($links);
?>
