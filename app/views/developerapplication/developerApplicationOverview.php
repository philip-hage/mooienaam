<?php require APPROOT . '/views/includes/Header.php'; ?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Developers</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Applications</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
  <a class="btn btn-primary" href="<?= URLROOT; ?>/DevelopersApplicationController/createDeveloper/<?= $data['companyId'] ?>">Create Developer</a>
        <table class="table table-primary table-bordered">
            <thead>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Update</th>
            <th>Delete</th>
            </thead>
            <tbody>

            <?php if (!empty($data['developer']))
            {foreach ($data['developer'] as $value) {
                echo "<tr> 
                            <td>" . $value->developerFirstName . "</td> 
                            <td>" . $value->developerLastName . "</td> 
                          <td><a href='" . URLROOT . "/DevelopersApplicationController/updateDeveloper/" . $value->developerId . "'>Update</a></td> 
                            <td><a href='" . URLROOT . "/DevelopersApplicationController/deleteDeveloper/" . $value->developerId . "'>Delete</a></td>  
            ";
            }
                } else {
                    echo "<tr><td colspan='7'>No Developers found</td></tr>";
                } ?>
            </tbody>
        </table>
  </div>
  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
  <a class="btn btn-primary" href="<?= URLROOT; ?>/DevelopersApplicationController/createApplication/<?= $data['companyId'] ?>">Create Application</a>
        <table class="table table-primary table-bordered">
            <thead>
            <th>Name</th>
            <th>Usage</th>
            <th>Date Release</th>
            <th>Rating</th>
            <th>Price</th>
            <th>Update</th>
            <th>Delete</th>
            </thead>
            <tbody>

            <?php if (!empty($data['application']))
            {foreach ($data['application'] as $value) {
                echo "<tr> 
                            <td>" . $value->applicationName . "</td> 
                            <td>" . $value->applicationUsage . "</td> 
                            <td>" . $value->applicationDateRelease . "</td> 
                            <td>" . $value->applicationRating . "</td> 
                            <td>" . $value->applicationPrice . "</td> 
                          <td><a href='" . URLROOT . "/DevelopersApplicationController/updateApplication/" . $value->applicationId . "'>Update</a></td> 
                            <td><a href='" . URLROOT . "/DevelopersApplicationController/deleteApplication/" . $value->applicationId . "'>Delete</a></td>  
            ";
            }
                } else {
                    echo "<tr><td colspan='7'>No Applications found</td></tr>";
                } ?>
            </tbody>
        </table>
  </div>
</div>