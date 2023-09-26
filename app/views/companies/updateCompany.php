<?php
require APPROOT . '/views/includes/Header.php'; ?>
<h3 class="d-flex justify-content-left"><?= $data['title'] ?></h3>

<form class="form-group" action="<?= URLROOT; ?>/companiescontroller/updatecompany" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                Name:
            </td>
            <td>
                <input class="form-control" type="text" name="companyname" required
                       value="<?= $data['row']->companyName; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Phone Number:
            </td>
            <td>
                <input class="form-control" type="text" name="companyphone" required
                       value="<?= $data['row']->companyPhone; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <input class="form-control" type="email" name="companyemail" required
                       value="<?= $data['row']->companyEmail; ?>">
            </td>
        </tr>
        <tr>
            <td>
                City:
            </td>
            <td>
                <input class="form-control" type="text" name="companycity" required
                       value="<?= $data['row']->companyCity; ?>">
            </td>
        </tr>
            <td>
                <input type="hidden" name="id" value="<?= $data['row']->companyId; ?>">
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
<a class="btn btn-primary" href="<?= URLROOT; ?>/DevelopersApplicationController/developerApplicationOverview/<?=$data['row']->companyId ?>">Go back</a>
