<?php
require APPROOT . '/views/includes/Header.php'; ?>
<h3 class="d-flex justify-content-left"><?= $data['title'] ?></h3>

<form class="form-group" action="<?= URLROOT; ?>/DevelopersApplicationController/updateApplication/<?=$data['row']->applicationId?>" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                Name:
            </td>
            <td>
                <input class="form-control" type="text" name="applicationname" required
                       value="<?= $data['row']->applicationName; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Application Usage:
            </td>
            <td>
                <input class="form-control" type="text" name="applicationusage" required
                       value="<?= $data['row']->applicationUsage; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Date Released:
            </td>
            <td>
                <input class="form-control" type="text" name="applicationdaterelease" required
                       value="<?= $data['row']->applicationDateRelease; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Rating:
            </td>
            <td>
                <input class="form-control" type="text" name="applicationrating" required
                       value="<?= $data['row']->applicationRating; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Price:
            </td>
            <td>
                <input class="form-control" type="text" name="applicationprice" required
                       value="<?= $data['row']->applicationPrice; ?>">
            </td>
        </tr>
        <td>
            <input type="hidden" name="id" value="<?= $data['row']->applicationId; ?>">
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
