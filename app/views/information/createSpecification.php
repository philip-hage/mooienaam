<?php require APPROOT . '/views/includes/Header.php'; ?>
<a class="btn btn-primary" href="<?= URLROOT; ?>InformationController/informationOverview/<?=$data['phoneid'] . "+" . $data['manufacturer'] ?>" >Go back</a>

<form class="form-group" action="<?= URLROOT; ?>InformationController/createSpecification/<?=$data['phoneid'] . "+" . $data['manufacturer'] ?>" method="post">
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