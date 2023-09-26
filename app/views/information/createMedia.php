<?php require APPROOT . '/views/includes/Header.php'; ?>
<a class="btn btn-primary" href="<?= URLROOT; ?>/InformationController/informationOverview/<?=$data['phoneid'] . "+" . $data['manufacturer'] ?>" >Go back</a>

<form class="form-group" action="<?= URLROOT; ?>/informationcontroller/createMedia/<?= $data['phoneid'] . "+" . $data['manufacturer'] ?>" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                Media Type:
            </td>
            <td>
                <input class="form-control" required type="text" name="mediatype">
            </td>
        </tr>
        <tr>
            <td>
                Media Path:
            </td>
            <td>
                <input class="form-control" required type="text" name="mediapath">
            </td>
        </tr>
        <td>
            <input type="submit" name="submit" value="Create">
        </td>
        </tr>
        </tbody>
    </table>
</form>