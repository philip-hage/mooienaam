<?php require APPROOT . '/views/includes/Header.php'; ?>
<a class="btn btn-primary" href="<?= URLROOT; ?>/companiescontroller/companiesOverview/1" >Go back</a>

<form class="form-group" action="<?= URLROOT; ?>/companiescontroller/createCompany" method="post">
    <table>
        <tbody>
        <tr>
            <td>
                Name:
            </td>
            <td>
                <input class="form-control" required type="text" name="companyname">
            </td>
        </tr>
        <tr>
            <td>
                Phone Number:
            </td>
            <td>
                <input class="form-control" required type="text" name="companyphone">
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <input class="form-control"  required type="email" name="companyemail">
            </td>
        </tr>
        <tr>
            <td>
                City:
            </td>
            <td>
                <input class="form-control" required type="text" name="companycity">
            </td>
        </tr>
        <td>
            <input type="submit" name="submit" value="Create">
        </td>
        </tr>
        </tbody>
    </table>
</form>