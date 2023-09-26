<?php require APPROOT . '/views/includes/Header.php'; ?>
<h3><?= $data['title']; ?></h3>
<form action="<?= URLROOT; ?>/storescontroller/createStorePhone/<?= $data['id']?>" method="post">
    <select class="form-select" name="id" aria-label="Default select example">
    <option selected>Select the phone you want to add</option>
   <?php foreach ($data['phones'] as $row) {
       echo '<option value="' . $row->phoneId . '">' . $row->phoneName . '</option>';
    }?>
    </select>
    <label for="phoneprice">Price:</label>
    <input type="text" id="phoneprice" name="phoneprice">
    <input type="submit" value="Submit">
</form>

<a class="btn btn-primary" href="<?= URLROOT; ?>/storescontroller/storeHasPhones/<?=$data['id']?>" >Go back</a>