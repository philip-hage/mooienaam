<?php
require APPROOT . '/views/includes/Header.php'; ?>
<h3 class="d-flex justify-content-left"><?= $data['title'] ?></h3>


<form class="form-group" action="<?= URLROOT; ?>ManufacturersController/deleteManufacturer/<?= $data['row']->manufacturerId ?>" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                <input type="submit" name="submit" value="Yes">
            </td>
        </tr>
        <td>
            <a class="btn btn-primary" href="<?= URLROOT; ?>PhonesController/phoneoverview/<?= $data['row']->manufacturerId ?>" >No</a>
        </td>
        </tbody>
    </table>


</form>