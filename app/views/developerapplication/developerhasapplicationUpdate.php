<?php
require APPROOT . '/views/includes/Header.php'; ?>
<h3 class="d-flex justify-content-left"><?= $data['title'] ?></h3>

<form class="form-group" action="<?= URLROOT; ?>DevelopersApplicationController/updateDeveloperHasApplication/<?=$data['developerId'] . "+" .  $data['applicationId']?>" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                First Name:
            </td>
            <td>
                <input class="form-control" type="text" name="developerfirstname" required
                       value="<?= $data['row']->developerFirstName; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Last Name:
            </td>
            <td>
                <input class="form-control" type="text" name="developerlastname" required
                       value="<?= $data['row']->developerLastName; ?>">
            </td>
        </tr>
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
<a class="btn btn-primary" href="<?= URLROOT; ?>DevelopersApplicationController/applicationHasDevelopers/<?=$data['applicationId']?>">Go back</a>
