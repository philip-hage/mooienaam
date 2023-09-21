<?php require APPROOT . '/views/includes/Header.php'; ?>
<h2>Companies Overview</h2>
<a class="btn btn-primary" href="<?= URLROOT; ?>/">Home page</a>
<a class="btn btn-primary" href="<?= URLROOT; ?>/CompaniesController/createCompany">Create Company</a>
<table class="table table-primary table-bordered">
    <thead>
    <th>Name</th>
    <th>Phone Number</th>
    <th>Email</th>
    <th>City</th>
    <th>Applications</th>
    <th>Developers</th>
    <th>Update</th>
    <th>Delete</th>
    </thead>
    <tbody>
    <?php foreach ($data['companies'] as $value) {
        echo "<tr> 
                            <td>" . $value->companyName . "</td> 
                            <td>" . $value->companyPhone . "</td> 
                            <td>" . $value->companyEmail . "</td>
                            <td>" . $value->companyCity . "</td>
                            <td><a href='" . URLROOT . "/CompaniesController/deleteCompany/" . $value->companyId . "'>Applications</a></td>  
                            <td><a href='" . URLROOT . "/developersController/developersOverview/" . $value->companyId . "'>Developers</a></td>  
                            <td><a href='" . URLROOT . "/CompaniesController/updateCompany/" . $value->companyId . "'>Update</a></td> 
                            <td><a href='" . URLROOT . "/CompaniesController/deleteCompany/" . $value->companyId . "'>Delete</a></td>  
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
            <a class="page-link" href="<?=URLROOT?>/CompaniesController/companiesOverview/<?= $data['previousPage'] ?>">Previous</a>
        </li>
        <!-- Dit is een lijstitem voor de eerste paginaknop. Als de huidige pagina de eerste pagina is, wordt 'active' toegevoegd
         aan de class van het element, anders wordt het vorige paginanummer of de volgende pagina minus 2 weergegeven. -->
        <li class="page-item <?= ($data['pageNumber'] == 1) ? 'active' : ''; ?>"><a class="page-link" href="<?= $data['firstPage'] ?>">
                <?=
                $data['firstPage']
                ?>
            </a></li>
        <!-- Dit is een lijstitem voor de middelste paginaknoppen. Als de huidige pagina niet de eerste of de laatste is, wordt 'active' toegevoegd
         aan de class van het element.Het paginanummer dat wordt weergegeven, is afhankelijk van de huidige pagina en of deze de laatste pagina is. -->
        <li class="page-item <?= ($data['pageNumber'] != 1 && $data['totalPages'] != $data['pageNumber']) ? 'active' : ''; ?>"><a class="page-link" href="<?= $data['secondPage'] ?>">
                <?=
                $data['secondPage']
                ?>
            </a></li>
        <!-- Dit is een lijstitem voor de laatste paginaknop. Hier wordt 3 weergegeven als de huidige pagina de eerste of tweede pagina is,
         anders wordt het huidige paginanummer plus 1 weergegeven. 'active' wordt toegevoegd als de huidige pagina de laatste is. -->
        <li class="page-item <?= ($data['pageNumber'] == $data['totalPages']) ? 'active' : ''; ?>"><a class="page-link" href="<?= $data['thirdPage'] ?>">
                <?=
                $data['thirdPage']
                ?>
            </a></li>
        <!-- Dit lijstitem wordt gebruikt voor de "Volgende" paginaknop. De 'disabled' class wordt toegevoegd als de waarde van $data['nextPage']
         groter is dan het totaleaantal pagina's ($data['totalPages']), wat aangeeft dat er geen volgende pagina is.
          De knop leidt naar de volgende pagina in de reeks. -->
        <li class="page-item <?= ($data['nextPage'] > $data['totalPages']) ? 'disabled' : ''; ?>">
            <a class="page-link" href="<?=URLROOT?>/CompaniesController/companiesOverview/<?= $data['nextPage'] ?>">Next</a>
        </li>
    </ul>
</nav>