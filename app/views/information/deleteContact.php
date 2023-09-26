<?php
require APPROOT . '/views/includes/Header.php'; ?>
<h3 class="d-flex justify-content-left"><?= $data['title'] ?></h3>


<form class="form-group" action="<?= URLROOT; ?>/informationController/deleteContact/<?= $data['contactId'] . "+" . $data['phoneId'] . "+" . $data['manufacturer'] ?>" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                <input type="submit" name="submit" value="Yes">
            </td>
        </tr>
        <td>
            <a class="btn btn-primary" href="<?= URLROOT; ?>/informationController/informationOverview/<?=$data['phoneId'] . "+" . $data['manufacturer'] ?>" >No</a>
        </td>
        </tbody>
    </table>


</form>