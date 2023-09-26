<?php require APPROOT . '/views/includes/Header.php'; ?>
<h3><?= $data['title']; ?></h3>
<form action="<?= URLROOT; ?>/DevelopersApplicationController/createDeveloperApplication/<?= $data['id']?>" method="post">
    <select class="form-select" name="id" aria-label="Default select example">
    <option selected>Select the developer you want to add</option>
   <?php foreach ($data['developers'] as $row) {
       echo '<option value="' . $row->developerId . '">' . $row->developerFirstName .  $row->developerLastName . '</option>';
    }?>
    </select>
    <input type="submit" value="Submit">
</form>

<a class="btn btn-primary" href="<?= URLROOT; ?>/DevelopersApplicationController/applicationHasDevelopers/<?=$data['id']?>">Go back</a>