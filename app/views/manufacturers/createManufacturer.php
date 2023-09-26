<?php require APPROOT . '/views/includes/Header.php'; ?>

<form class="form-group" action="<?= URLROOT; ?>ManufacturersController/createManufacturer" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                Name:
            </td>
            <td>
                <input class="form-control" required type="text" name="manufacturename">
            </td>
        </tr>
        <tr>
            <td>
                Phone Number:
            </td>
            <td>
                <input class="form-control" required type="text" name="manufacturephonenumber">
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <input class="form-control"  required type="email" name="manufactureemail">
            </td>
        </tr>
        <tr>
            <td>
                ZipCode:
            </td>
            <td>
                <input class="form-control" required type="text" name="manufacturezipcode">
            </td>
        </tr>
        <tr>
            <td>
                City:
            </td>
            <td>
                <input class="form-control" required type="text" name="manufacturecity">
            </td>
        </tr>
            <td>
                <input type="submit" name="submit" value="Create">
            </td>
        </tr>
        </tbody>
    </table>
</form>

<a class="btn btn-primary" href="<?= URLROOT; ?>ManufacturersController/manufacturersOverview/1" >Go back</a>
