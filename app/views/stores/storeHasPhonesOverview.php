<?php require APPROOT . '/views/includes/Header.php'; ?>

<h3>Name Store: <?= $data['store']->storeName; ?></h3>
<h4>Phones Overview</h4>
<!--<a class="btn btn-primary" href="--><?php //= URLROOT; ?><!--/developersController/createDeveloper/--><?php //= $data['companyId'] ?><!--" >Create Developer</a>-->
<a class="btn btn-primary" href="<?= URLROOT; ?>StoresController/createStorePhone/<?= $data['storeId'] ?>">Create Phone</a>
<a class="btn btn-primary" href="<?= URLROOT; ?>StoresController/updatestore/<?= $data['storeId'] ?>">Update Store</a>
<a class="btn btn-primary" href="<?= URLROOT; ?>StoresController/deletestore/<?= $data['storeId'] ?>">Delete Store</a>



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
                            <td><a href='" . URLROOT . "StoresController/updateStoreHasPhones/" . $value->phoneId . "+" . $value->storeId . "'>Update</a></td> 
                            <td><a href='" . URLROOT . "StoresController/deletePhoneFromStore/" . $value->phoneId . "+" . $value->storeId . "'>Delete</a></td>  
            ";
        }
    } else {
        echo "<tr><td colspan='4'>No Phones found</td></tr>";
    } ?>
    </tbody>
</table>

<a class="btn btn-primary" href="<?= URLROOT; ?>StoresController/storesOverview/1">Go back</a>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>