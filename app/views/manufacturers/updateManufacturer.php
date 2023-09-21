<?php require APPROOT . '/views/includes/Header.php'; ?>
<h3 class="d-flex justify-content-left"><?= $data['title'] ?></h3>

<form class="form-group" action="<?= URLROOT; ?>/manufacturerscontroller/updatemanufacturer" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                Name:
            </td>
            <td>
                <input class="form-control" type="text" name="manufacturename" required value="<?= $data['row']->manufactureName; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Phone Number:
            </td>
            <td>
                <input class="form-control" type="text" name="manufacturephonenumber" required value="<?= $data['row']->manufacturePhoneNumber; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <input class="form-control" type="email" name="manufactureemail" required value="<?= $data['row']->manufactureEmail; ?>">
            </td>
        </tr>
        <tr>
            <td>
                ZipCode:
            </td>
            <td>
                <input class="form-control" type="text" name="manufacturezipcode" required value="<?= $data['row']->manufactureZipCode; ?>">
            </td>
        </tr>
        <tr>
            <td>
                City:
            </td>
            <td>
                <input class="form-control" type="text" name="manufacturecity" required value="<?= $data['row']->manufactureCity; ?>">
            </td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="id" value="<?= $data['row']->manufacturerId; ?>">
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
