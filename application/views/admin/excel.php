<?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=print.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>

<h2>List Order</h2>
    <div>
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No Meja</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
            <?php if($values->num_rows() > 0) {
                    foreach ($values->result() as $value) { ?>
                <tr>
                    <td><?php echo $value->id?></td>
                    <td><?php echo $value->name?></td>
                    <td>
                        <?php if($value->no_table==0) {
                            echo 'Take away';
                        } else {
                            echo $value->no_table;
                        } ?>
                    </td>
                    <td><?php echo $value->total?></td>
                </tr>
                <?php } 
                } else { ?>
                    <tr>
                        <td colspan="7">Data Masih Kosong</td>
                    </tr>
                <?php } ?>
                </tbody>
        </table>
    </div>