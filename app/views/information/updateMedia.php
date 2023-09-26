<?php require APPROOT . '/views/includes/Header.php'; ?>
<h3 class="d-flex justify-content-left"><?= $data['title'] ?></h3>

<form class="form-group" action="<?= URLROOT; ?>/informationcontroller/updateMedia/<?= $data['mediaId'] . "+" . $data['phoneId'] . "+" . $data['manufacturer']?>" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                Media Type
            </td>
            <td>
                <input class="form-control" type="text" name="mediatype" required value="<?= $data['row']->mediaType; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Media Path:
            </td>
            <td>
                <input class="form-control" type="text" name="mediapath" required value="<?= $data['row']->mediaPath; ?>">
            </td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="id" value="<?= $data['row']->mediaId; ?>">
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
<a class="btn btn-primary" href="<?= URLROOT; ?>/InformationController/informationOverview/<?=$data['phoneId'] . "+" . $data['manufacturer']?>">Go back</a>
