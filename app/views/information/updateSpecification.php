<?php require APPROOT . '/views/includes/Header.php'; ?>
<h3 class="d-flex justify-content-left"><?= $data['title'] ?></h3>

<form class="form-group" action="<?= URLROOT; ?>/informationcontroller/updateSpecification" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                Specification Name
            </td>
            <td>
                <input class="form-control" type="text" name="specificationname" required value="<?= $data['row']->specificationName; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Specification Value:
            </td>
            <td>
                <input class="form-control" type="text" name="specificationvalue" required value="<?= $data['row']->specificationValue; ?>">
            </td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="id" value="<?= $data['row']->specificationId; ?>">
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
