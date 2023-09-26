<?php require APPROOT . '/views/includes/Header.php'; ?>
<link rel="stylesheet" href="style.css">
<h3>Name Manufacter: <?= $data['manufacter']->manufactureName; ?></h3>
<h4>Phones Overview</h4>
<a class="btn btn-primary" href="<?= URLROOT; ?>PhonesController/createPhone/<?= $data['phoneManufactureId'] ?>">Create Phone</a>
<a class="btn btn-primary" href="<?= URLROOT; ?>ManufacturersController/updateManufacturer/<?= $data['manufacter']->manufacturerId ?>">update Manufacter</a>
<a class="btn btn-primary" href="<?= URLROOT; ?>ManufacturersController/deleteManufacturer/<?= $data['manufacter']->manufacturerId ?>">Delete Manufacter</a>



<table class="table table-primary table-bordered">
  <thead>
    <th>Name</th>
  </thead>
  <tbody id="paginated-list" data-current-page="1" aria-live="polite">
    <?php if (!empty($data['phones'])) {
      foreach ($data['phones'] as $value) {
        echo "<tr> 
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



<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');


  main {
    position: relative;
    padding: 1rem 1rem 3rem;
    min-height: calc(100vh - 4rem);
  }

  h1 {
    margin-top: 0;
  }

  .hidden {
    display: none;
  }

  .pagination-container {
    width: calc(100% - 2rem);
    display: flex;
    align-items: center;
    position: absolute;
    bottom: 0;
    padding: 1rem 0;
    justify-content: center;
  }

  .pagination-number,
  .pagination-button {
    font-size: 1.1rem;
    background-color: transparent;
    border: none;
    margin: 0.25rem 0.25rem;
    cursor: pointer;
    height: 2.5rem;
    width: 2.5rem;
    border-radius: .2rem;
  }

  .pagination-number:hover,
  .pagination-button:not(.disabled):hover {
    background: #fff;
  }

  .pagination-number.active {
    color: #fff;
    background: #0085b6;
  }
</style>

<script src="<?= URLROOT ?>public/js/pagination.js"></script>