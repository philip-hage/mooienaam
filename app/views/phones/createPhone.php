<?php require APPROOT . '/views/includes/Header.php'; ?>
<form class="form-group" action="<?= URLROOT; ?>PhonesController/createPhone/<?= $data['id']?>" method="post">
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

<a class="btn btn-primary" href="<?= URLROOT; ?>PhonesController/phoneoverview/<?= $data['id']?>" >Go back</a>
