<?php
require APPROOT . '/views/includes/Header.php'; ?>
<h3 class="d-flex justify-content-left"><?= $data['title'] ?></h3>


<form class="form-group" action="<?= URLROOT; ?>/storescontroller/updateStoreHasPhones" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                Price:
            </td>
            <td>
                <input class="form-control" type="text" name="phoneprice" required
                       value="<?= $data['row']->phonePrice; ?>">
            </td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="storeid" value="<?= $data['row']->storeId; ?>">
                <input type="hidden" name="id" value="<?= $data['row']->phoneId; ?>">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="Update">

            </td>
        </tr>
        </tbody>
    </table>
</form>
<a class="btn btn-primary" href="<?= URLROOT; ?>/storesController/storesoverview" >Go back</a>