<?php require APPROOT . '/views/includes/Header.php'; ?>
<h3 class="d-flex justify-content-left"><?= $data['title'] ?></h3>

<form class="form-group" action="<?= URLROOT; ?>/storescontroller/updateStore" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                Name:
            </td>
            <td>
                <input class="form-control" type="text" name="storename" required value="<?= $data['row']->storeName; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Phone Number:
            </td>
            <td>
                <input class="form-control" type="text" name="storephone" required value="<?= $data['row']->storePhone; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <input class="form-control" type="email" name="storeemail" required value="<?= $data['row']->storeEmail; ?>">
            </td>
        </tr>
        <tr>
            <td>
                ZipCode:
            </td>
            <td>
                <input class="form-control" type="text" name="storezipcode" required value="<?= $data['row']->storeZipCode; ?>">
            </td>
        </tr>
        <tr>
            <td>
                City:
            </td>
            <td>
                <input class="form-control" type="text" name="storecity" required value="<?= $data['row']->storeCity; ?>">
            </td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="id" value="<?= $data['row']->storeId; ?>">
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
<a class="btn btn-primary" href="<?= URLROOT; ?>/storescontroller/storesOverview/" >Go back</a>
