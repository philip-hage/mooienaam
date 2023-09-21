<?php require APPROOT . '/views/includes/Header.php'; ?>
<h3 class="d-flex justify-content-left"><?= $data['title'] ?></h3>
<form class="form-group" action="<?= URLROOT; ?>/persoonsgegevens/update" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    Email:
                </td>
                <td>
                    <input class="form-control" type="email" name="Email" value="<?= $data['row']->Email; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Voornaam:
                </td>
                <td>
                    <input class="form-control" type="text" name="Voornaam" value="<?= $data['row']->Voornaam; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Tussenvoegsel:
                </td>
                <td>
                    <input class="form-control" type="text" name="Voornaam" value="<?= $data['row']->Tussenvoegsel; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Achternaam:
                </td>
                <td>
                    <input class="form-control" type="text" name="Voornaam" value="<?= $data['row']->Achternaam; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Mobiel:
                </td>
                <td>
                    <input class="form-control" type="text" name="Voornaam" value="<?= $data['row']->Mobiel; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    IsVolwassen:
                </td>
                <td>
                    <input class="form-control" type="text" name="Voornaam" value="<?= $data['row']->IsVolwassen; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id" value="<?= $data['row']->Id; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Verstuur">
                </td>
            </tr>
        </tbody>
    </table>
</form>