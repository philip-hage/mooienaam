<?php

require APPROOT . '/views/includes/Header.php'; ?>
<h3 class="d-flex justify-content-left"><?= $data['title'] ?></h3>


<form class="form-group" action="<?= URLROOT; ?>/developerscontroller/updateDeveloper" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                Name:
            </td>
            <td>
                <input class="form-control" type="text" name="developername" required
                       value="<?= $data['row']->developerName; ?>">
            </td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="id" value="<?= $data['row']->developerId; ?>">
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
<a class="btn btn-primary" href="<?= URLROOT; ?>/companiescontroller/companiesOverview/1">Go back</a>