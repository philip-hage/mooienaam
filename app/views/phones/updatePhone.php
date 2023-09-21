<?php
require APPROOT . '/views/includes/Header.php'; ?>
<h3 class="d-flex justify-content-left"><?= $data['title'] ?></h3>


<form class="form-group" action="<?= URLROOT; ?>/phonescontroller/updatePhone" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                Name:
            </td>
            <td>
                <input class="form-control" type="text" name="phonename" required
                       value="<?= $data['row']->phoneName; ?>">
            </td>
        </tr>
        <tr>
            <td>
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
<a class="btn btn-primary" href="<?= URLROOT; ?>/manufacturerscontroller/manufacturersOverview/1" >Go back</a>