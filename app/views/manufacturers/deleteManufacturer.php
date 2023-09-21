<?php
require APPROOT . '/views/includes/Header.php'; ?>
<h3 class="d-flex justify-content-left"><?= $data['title'] ?></h3>


<form class="form-group" action="<?= URLROOT; ?>/manufacturerscontroller/deleteManufacturer/<?= $data['row']->manufacturerId ?>" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                <input type="submit" name="submit" value="Yes">
            </td>
        </tr>
        <td>
            <a class="btn btn-primary" href="<?= URLROOT; ?>/manufacturerscontroller/manufacturersOverview/1" >No</a>
        </td>
        </tbody>
    </table>


</form>