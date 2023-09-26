<?php require APPROOT . '/views/includes/Header.php'; ?>
<a class="btn btn-primary" href="<?= URLROOT; ?>/InformationController/informationOverview/<?=$data['phoneid'] . "+" . $data['manufacturer'] ?>" >Go back</a>

<form class="form-group" action="<?= URLROOT; ?>/informationcontroller/createContact/<?= $data['phoneid'] . "+" . $data['manufacturer'] ?>" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                First Name:
            </td>
            <td>
                <input class="form-control" required type="text" name="contactfirstname">
            </td>
        </tr>
        <tr>
            <td>
                Last Name:
            </td>
            <td>
                <input class="form-control" required type="text" name="contactlastname">
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <input class="form-control"  required type="email" name="contactemail">
            </td>
        </tr>
        <tr>
            <td>
                Phone Number:
            </td>
            <td>
                <input class="form-control" required type="number" name="contactnumber">
            </td>
        </tr>
        <tr>
            <td>
                Birthday Date:
            </td>
            <td>
                <input class="form-control" required type="date" name="contactbirthdaydate">
            </td>
        </tr>
        <td>
            <input type="submit" name="submit" value="Create">
        </td>
        </tr>
        </tbody>
    </table>
</form>