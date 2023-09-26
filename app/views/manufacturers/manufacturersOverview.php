<?php require APPROOT . '/views/includes/Header.php'; ?>
<h2>Manufacturers Overview</h2>
<a class="btn btn-primary" href="<?= URLROOT; ?>/">Home page</a>
<a class="btn btn-primary" href="<?= URLROOT; ?>ManufacturersController/createManufacturer">Create Manufacturer</a>
<table class="table table-primary table-bordered">
    <thead>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Zipcode</th>
        <th>City</th>
    </thead>
    <tbody>
        <?php foreach ($data['manufacturers'] as $value) {
             echo "<tr> 
                            <td><a href='" . URLROOT . "PhonesController/phoneoverview/" . $value->manufacturerId . "'>$value->manufactureName</a></td>
                            <td>" . $value->manufacturePhoneNumber . "</td> 
                            <td>" . $value->manufactureEmail . "</td>
                            <td>" . $value->manufactureZipCode . "</td>
                            <td>" . $value->manufactureCity . "</td>
            ";
        } ?>
    </tbody>
</table>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <!-- Dit lijstitem wordt gebruikt voor de "Vorige" paginaknop. De 'disabled' class wordt toegevoegd als de waarde van $data['previousPage']
         kleiner is dan of gelijk is aan 0, wat aangeeft dat er geen vorige pagina is om naar terug te keren.
         De knop leidt naar de vorige pagina in de reeks. -->
        <li class="page-item <?= ($data['previousPage'] <= 0) ? 'disabled' : ''; ?>">
            <a class="page-link" href="<?=URLROOT?>ManufacturersController/manufacturersOverview/<?= $data['previousPage'] ?>">Previous</a>
        </li>
        <!-- Dit is een lijstitem voor de eerste paginaknop. Als de huidige pagina de eerste pagina is, wordt 'active' toegevoegd
         aan de class van het element, anders wordt het vorige paginanummer of de volgende pagina minus 2 weergegeven. -->
        <li class="page-item <?= ($data['pageNumber'] == 1) ? 'active' : ''; ?>"><a class="page-link" href="<?= $data['firstPage'] ?>">
                <?= $data['firstPage'] ?>
            </a></li>
        <?php if ($data['totalPages'] >= 2 ) {?>
            <li class="page-item <?= ($data['pageNumber'] != 1 && $data['totalPages'] != $data['pageNumber'] || ($data['totalPages'] == 2 && $data['pageNumber'] == 2)) ? 'active' : ''; ?>"><a class="page-link" href="<?= $data['secondPage'] ?>">
                    <?= $data['secondPage'] ?>
                </a></li>
        <?php   } ?>

        <?php if ($data['totalPages'] >= 3 ) {?>
            <li class="page-item <?= ($data['pageNumber'] == $data['totalPages']) ? 'active' : ''; ?>"><a class="page-link" href="<?= $data['thirdPage'] ?>">
                    <?= $data['thirdPage'] ?>
                </a></li>
        <?php } ?>
        <li class="page-item <?= ($data['nextPage'] > $data['totalPages']) ? 'disabled' : ''; ?>">
            <a class="page-link" href="<?=URLROOT?>ManufacturersController/manufacturersOverview/<?= $data['nextPage'] ?>">Next</a>
        </li>
    </ul>
</nav>

