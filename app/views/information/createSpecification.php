<?php require APPROOT . '/views/includes/Header.php'; ?>
<a class="btn btn-primary" href="<?= URLROOT; ?>/phonescontroller/phoneoverview/" >Go back</a>

<form class="form-group" action="<?= URLROOT; ?>/informationcontroller/createSpecification/<?= $data['id'] ?>" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                Specification Name:
            </td>
            <td>
                <input class="form-control" required type="text" name="specificationname">
            </td>
        </tr>
        <tr>
            <td>
                Specification Value:
            </td>
            <td>
                <input class="form-control" required type="text" name="specificationvalue">
            </td>
        </tr>
        <td>
            <input type="submit" name="submit" value="Create">
        </td>
        </tr>
        </tbody>
    </table>
</form>