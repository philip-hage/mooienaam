<?php require APPROOT . '/views/includes/Header.php'; ?>
<h2>Companies Overview</h2>
<a class="btn btn-primary" href="<?= URLROOT; ?>/">Home page</a>
<a class="btn btn-primary" href="<?= URLROOT; ?>CompaniesController/createCompany">Create Company</a>
<table class="table table-primary table-bordered">
    <thead>
    <th>Name</th>
    <th>Phone Number</th>
    <th>Email</th>
    <th>City</th>
    </thead>
    <tbody>
    <?php foreach ($data['companies'] as $value) {
        echo "<tr> 
                            <td><a href='" . URLROOT . "DevelopersApplicationController/developerApplicationOverview/" . $value->companyId . "'>$value->companyName</a></td>
                            <td>" . $value->companyPhone . "</td> 
                            <td>" . $value->companyEmail . "</td>
                            <td>" . $value->companyCity . "</td>
            ";
    } ?>
    </tbody>
</table>


<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item <?= ($data['previousPage'] <= 0) ? 'disabled' : ''; ?>">
            <a class="page-link" href="<?=URLROOT?>CompaniesController/companiesOverview/<?= $data['previousPage'] ?>">Previous</a>
        </li>
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
            <a class="page-link" href="<?=URLROOT?>CompaniesController/companiesOverview/<?= $data['nextPage'] ?>">Next</a>
        </li>
    </ul>
</nav>