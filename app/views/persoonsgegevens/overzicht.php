<?php require APPROOT . '/views/includes/Header.php'; ?>
<h3 class="d-flex justify-content-left"><?= $data['title'] ?></h3>
<table class="table table-warning table-bordered">
    <thead>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>Mobiel</th>
        <th>Email</th>
        <th>IsVolwassen</th>
        <th>Wijzigen</th>
    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>