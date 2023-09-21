<?php
require APPROOT . '/views/includes/Header.php'; ?>
<h3 class="d-flex justify-content-left"><?= $data['title'] ?></h3>

<form class="form-group" action="<?= URLROOT; ?>/InformationController/updateContact" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                First Name:
            </td>
            <td>
                <input class="form-control" type="text" name="contactfirstname" required
                       value="<?= $data['row']->contactFirstName; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Last Name:
            </td>
            <td>
                <input class="form-control" type="text" name="contactlastname" required
                       value="<?= $data['row']->contactLastName; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <input class="form-control" type="email" name="contactemail" required
                       value="<?= $data['row']->contactEmail; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Phone Number:
            </td>
            <td>
                <input class="form-control" type="text" name="contactnumber" required
                       value="<?= $data['row']->contactNumber; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Birthday Date:
            </td>
            <td>
                <input class="form-control" type="text" name="contactbirthdaydate" required
                       value="<?= $data['row']->contactBirthdayDate; ?>">
            </td>
        </tr>
        <td>
            <input type="hidden" name="id" value="<?= $data['row']->contactId; ?>">
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
<a class="btn btn-primary" href="<?= URLROOT; ?>/phonesController/phoneoverview/1">Go back</a>
