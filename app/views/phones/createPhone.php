<?php require APPROOT . '/views/includes/Header.php'; ?>
<a class="btn btn-primary" href="<?= URLROOT; ?>/manufacturerscontroller/manufacturersOverview/" >Go back</a>
<form class="form-group" action="<?= URLROOT; ?>/phonescontroller/createPhone/<?= $data['id']?>" method="post">
    <input class="form-control" type="hidden" name="phonename">
    <table>
        <tbody>
        <tr>
            <td>
                Name:
            </td>
            <td>
                <input class="form-control" required type="text" name="phonename">
            </td>
        </tr>
        <td>
            <input type="submit" name="submit" value="Create">
        </td>
        </tr>
        </tbody>
    </table>
</form>