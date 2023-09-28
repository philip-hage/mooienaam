<h3>Name Store: <?= $data['store']->storeName; ?></h3>
<h4>Phones Overview</h4>
<!--<a class="btn btn-primary" href="--><?php //= URLROOT; ?><!--/developersController/createDeveloper/--><?php //= $data['companyId'] ?><!--" >Create Developer</a>-->
<a class="btn btn-primary" href="<?= URLROOT; ?>StoresController/createStorePhone/<?= $data['storeId'] ?>">Create Phone</a>
<a class="btn btn-primary" href="<?= URLROOT; ?>StoresController/updatestore/<?= $data['storeId'] ?>">Update Store</a>
<a class="btn btn-primary" href="<?= URLROOT; ?>StoresController/deletestore/<?= $data['storeId'] ?>">Delete Store</a>



<table id="paginated-list" data-current-page="1" aria-live="polite" class="table table-primary table-bordered">
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
            echo "<tr class='table-body-tr'> 
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

<nav class="pagination-container">
  <button class="pagination-button" id="prev-button" aria-label="Previous page" title="Previous page">
    &lt;
  </button>

  <div id="pagination-numbers">

  </div>

  <button class="pagination-button" id="next-button" aria-label="Next page" title="Next page">
    &gt;
  </button>
</nav>