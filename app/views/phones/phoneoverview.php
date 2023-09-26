<?php require APPROOT . '/views/includes/Header.php'; ?>

<h3>Name Manufacter: <?= $data['manufacter']->manufactureName; ?></h3>
<h4>Phones Overview</h4>
<a class="btn btn-primary" href="<?= URLROOT; ?>/phonescontroller/createPhone/<?= $data['phoneManufactureId'] ?>" >Create Phone</a>
<a class="btn btn-primary" href="<?= URLROOT; ?>/ManufacturersController/updateManufacturer/<?= $data['manufacter']->manufacturerId ?>" >update Manufacter</a>
<a class="btn btn-primary" href="<?= URLROOT; ?>/ManufacturersController/deleteManufacturer/<?= $data['manufacter']->manufacturerId ?>" >Delete Manufacter</a>



<table class="table table-primary table-bordered">
    <thead>
        <th>Name</th>
    </thead>
    <tbody>
        <?php if(!empty($data['phones']))
        {
        foreach ($data['phones'] as $value) {
             echo "<tr> 
                            <td><a href='" . URLROOT . "/InformationController/informationOverview/" . $value->phoneId . "+" . $data['manufacter']->manufacturerId . "'>$value->phoneName</a></td>
            ";
        }
        } else {
            echo "<tr><td colspan='3'>No phones found</td></tr>";
        } ?>
    </tbody>
</table>
<a class="btn btn-primary" href="<?= URLROOT; ?>/manufacturerscontroller/manufacturersOverview/1">Go back</a>


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