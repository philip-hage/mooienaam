<?php require APPROOT . '/views/includes/Header.php'; ?>
<a class="btn btn-primary" href="<?= URLROOT; ?>/companiescontroller/companiesoverview/" >Go back</a>

<form class="form-group" action="<?= URLROOT; ?>/DevelopersApplicationController/createDeveloper/<?= $data['id'] ?>" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                First Name:
            </td>
            <td>
                <input class="form-control" required type="text" name="developerfirstname">
            </td>
        </tr>
        <tr>
            <td>
                Last Name:
            </td>
            <td>
                <input class="form-control" required type="text" name="developerlastname">
            </td>
        </tr>
        <td>
            <input type="submit" name="submit" value="Create">
        </td>
        </tr>
        </tbody>
    </table>
</form>