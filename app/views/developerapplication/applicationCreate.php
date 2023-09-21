<?php require APPROOT . '/views/includes/Header.php'; ?>
<a class="btn btn-primary" href="<?= URLROOT; ?>/companiescontroller/companiesoverview/" >Go back</a>

<form class="form-group" action="<?= URLROOT; ?>/DevelopersApplicationController/createApplication/<?= $data['id'] ?>" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                Name:
            </td>
            <td>
                <input class="form-control" required type="text" name="applicationname">
            </td>
        </tr>
        <tr>
            <td>
                Application Usage:
            </td>
            <td>
                <input class="form-control" required type="text" name="applicationusage">
            </td>
        </tr>
        <tr>
            <td>
                Date Released:
            </td>
            <td>
                <input class="form-control" required type="date" name="applicationdaterelease">
            </td>
        </tr>
        <tr>
            <td>
                Rating:
            </td>
            <td>
                <input class="form-control" required type="text" name="applicationrating">
            </td>
        </tr>
        <tr>
            <td>
                Price:
            </td>
            <td>
                <input class="form-control" required type="text" name="applicationprice">
            </td>
        </tr>
        <td>
            <input type="submit" name="submit" value="Create">
        </td>
        </tr>
        </tbody>
    </table>
</form>