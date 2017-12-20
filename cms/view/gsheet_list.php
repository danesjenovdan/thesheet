<table class="table-striped table-hover">
    <tr>
        <td><a class="btn btn-primary" href="<?php echo __LOCALURL; ?>/cms/?m=addgsheet">Add new Gsheet</a></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <?php
    foreach ($this->gsheet[0] as $gsheet) {
        ?>
        <tr>
            <td align="left" width="100">
                <a class="btn btn-sm btn-info"
                   href="<?php echo __LOCALURL; ?>/cms/?m=editgsheet&id=<?php echo $gsheet->id; ?>">edit</a></td>
            <td width="475"><?php echo $gsheet->name; ?></td>
            <td></td>
            <td align="center" width="40"><a class="del"
                                             href="<?php echo __LOCALURL; ?>/cms/?m=deletegsheet&id=<?php echo $gsheet->id; ?>">x</a>
            </td>
            <td align="center" width="100"><?php echo $gsheet->datum; ?></td>
        </tr>

        <?php
    }
    ?>

</table>