<h3>Name Manufacter: <?= $data['manufacter']->manufactureName; ?></h3>
<h4>Phones Overview</h4>
<a class="btn btn-primary" href="<?= URLROOT; ?>PhonesController/createPhone/<?= $data['phoneManufactureId'] ?>">Create Phone</a>
<a class="btn btn-primary" href="<?= URLROOT; ?>ManufacturersController/updateManufacturer/<?= $data['manufacter']->manufacturerId ?>">update Manufacter</a>
<a class="btn btn-primary" href="<?= URLROOT; ?>ManufacturersController/deleteManufacturer/<?= $data['manufacter']->manufacturerId ?>">Delete Manufacter</a>



<table id="paginated-list" data-current-page="1" aria-live="polite" class="table table-primary table-bordered">
  <thead>
    <th>Name</th>
  </thead>
  <tbody >
    <?php if (!empty($data['phones'])) {
      foreach ($data['phones'] as $value) {
        echo "<tr class='table-body-tr'> 
                            <td><a href='" . URLROOT . "InformationController/informationOverview/" . $value->phoneId . "+" . $data['manufacter']->manufacturerId . "'>$value->phoneName</a></td>
            ";
      }
    } else {
      echo "<tr><td colspan='3'>No phones found</td></tr>";
    } ?>
  </tbody>
</table>

<a class="btn btn-primary" href="<?= URLROOT; ?>ManufacturersController/manufacturersOverview/1">Go back</a>


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
