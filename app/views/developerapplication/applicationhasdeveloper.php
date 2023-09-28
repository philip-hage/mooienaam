<?php require APPROOT . '/views/includes/Header.php'; ?>
<h4>Developers Overview</h4>
<a class="btn btn-primary" href="<?= URLROOT; ?>DevelopersApplicationController/createDeveloperApplication/<?= $data['applicationId'] ?>">Create Developer</a>
<a class="btn btn-primary" href="<?= URLROOT; ?>DevelopersApplicationController/updateApplication/<?= $data['applicationId'] ?>">Update Application</a>
<a class="btn btn-primary" href="<?= URLROOT; ?>DevelopersApplicationController/deleteApplication/<?= $data['applicationId'] ?>">Delete Application</a>



<table id="paginated-list" data-current-page="1" aria-live="polite" class="table table-primary table-bordered">
  <thead>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Update</th>
    <th>Delete</th>
  </thead>
  <tbody>
    <?php if (!empty($data['applicationHasDevelopers'])) {
      foreach ($data['applicationHasDevelopers'] as $value) {
        echo "<tr class='table-body-tr'> 
                            <td>" . $value->developerFirstName . "</td> 
                            <td>" . $value->developerLastName . "</td> 
                            <td><a href='" . URLROOT . "DevelopersApplicationController/updateDeveloperHasApplication/" . $value->developerId . "+" . $value->applicationId . "'>Update</a></td> 
                            <td><a href='" . URLROOT . "DevelopersApplicationController/deleteDeveloperHasApplication/" . $value->developerId . "+" . $value->applicationId . "'>Delete</a></td>  
            ";
      }
    } else {
      echo "<tr><td colspan='4'>No Developers found</td></tr>";
    } ?>
  </tbody>
</table>

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

<a class="btn btn-primary" href="<?= URLROOT; ?>DevelopersApplicationController/developerApplicationOverview/<?= $data['company']->companyId ?>">Go back</a>