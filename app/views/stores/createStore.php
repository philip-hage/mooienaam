<?php require APPROOT . '/views/includes/Header.php'; ?>
<a class="btn btn-primary" href="<?= URLROOT; ?>StoresController/storesOverview/1" >Go back</a>

<form class="form-group" action="<?= URLROOT; ?>StoresController/createStore" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                Name:
            </td>
            <td>
                <input class="form-control" required type="text" name="storename">
            </td>
        </tr>
        <tr>
            <td>
                Phone Number:
            </td>
            <td>
                <input class="form-control" required type="text" name="storephone">
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <input class="form-control"  required type="email" name="storeemail">
            </td>
        </tr>
        <tr>
            <td>
                ZipCode:
            </td>
            <td>
                <input class="form-control" required type="text" name="storezipcode">
            </td>
        </tr>
        <tr>
            <td>
                City:
            </td>
            <td>
                <input class="form-control" required type="text" name="storecity">
            </td>
        </tr>
        <td>
            <input type="submit" name="submit" value="Create">
        </td>
        </tr>
        </tbody>
    </table>
</form>