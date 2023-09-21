<?php require APPROOT . '/views/includes/Header.php'; ?>

<h3>Name Company: <?= $data['store']->storeName; ?></h3>
<h4>Phones Overview</h4>
<!--<a class="btn btn-primary" href="--><?php //= URLROOT; ?><!--/developersController/createDeveloper/--><?php //= $data['companyId'] ?><!--" >Create Developer</a>-->



<table class="table table-primary table-bordered">
    <thead>
    <th>Name</th>
    <th>Price</th>
    <th>Update</th>
    <th>Delete</th>
    </thead>
    <tbody>
    <?php if(!empty($data['storeHasPhones']))
    {
        foreach ($data['storeHasPhones'] as $value) {
            echo "<tr> 
                            <td>" . $value->phoneName . "</td> 
                            <td>" . $value->phonePrice . "</td> 
                            <td><a href='" . URLROOT . "/storesController/updateStoreHasPhones/" . $value->storeId . "'>Update</a></td> 
                            <td><a href='" . URLROOT . "/storesController/deletePhoneFromStore/" . $value->phoneId . "'>Delete</a></td>  
            ";
        }
    } else {
        echo "<tr><td colspan='4'>No Phones found</td></tr>";
    } ?>
    </tbody>
</table>
<a class="btn btn-primary" href="<?= URLROOT; ?>/storescontroller/storesoverview/1" >Go back</a>