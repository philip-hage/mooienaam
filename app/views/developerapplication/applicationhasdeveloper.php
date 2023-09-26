<?php require APPROOT . '/views/includes/Header.php'; ?>
<h4>Developers Overview</h4>
<a class="btn btn-primary" href="<?= URLROOT; ?>/DevelopersApplicationController/createDeveloperApplication/<?= $data['applicationId'] ?>">Create Developer</a>
<a class="btn btn-primary" href="<?= URLROOT; ?>/DevelopersApplicationController/updateApplication/<?= $data['applicationId']?>">Update Application</a>
<a class="btn btn-primary" href="<?= URLROOT; ?>/DevelopersApplicationController/deleteApplication/<?= $data['applicationId']?>">Delete Application</a>



<table class="table table-primary table-bordered">
    <thead>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Update</th>
    <th>Delete</th>
    </thead>
    <tbody>
    <?php if(!empty($data['applicationHasDevelopers']))
    {
        foreach ($data['applicationHasDevelopers'] as $value) {
            echo "<tr> 
                            <td>" . $value->developerFirstName . "</td> 
                            <td>" . $value->developerLastName . "</td> 
                            <td><a href='" . URLROOT . "/DevelopersApplicationController/updateDeveloperHasApplication/" . $value->developerId . "+" . $value->applicationId . "'>Update</a></td> 
                            <td><a href='" . URLROOT . "/DevelopersApplicationController/deleteDeveloperHasApplication/" . $value->developerId . "+" . $value->applicationId . "'>Delete</a></td>  
            ";
        }
    } else {
        echo "<tr><td colspan='4'>No Developers found</td></tr>";
    } ?>
    </tbody>
</table>

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