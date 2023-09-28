<a class="btn btn-primary" href="<?= URLROOT; ?>CompaniesController/updateCompany/<?= $data['companyId'] ?>">Update Company</a>
<a class="btn btn-primary" href="<?= URLROOT; ?>CompaniesController/deleteCompany/<?= $data['companyId'] ?>">Delete Company</a>
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
    <a class="btn btn-primary" href="<?= URLROOT; ?>DevelopersApplicationController/createDeveloper/<?= $data['companyId'] ?>">Create Developer</a>
    <table id="paginated-list" data-current-page="1" aria-live="polite" class="table table-primary table-bordered">
      <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Update</th>
        <th>Delete</th>
      </thead>
      <tbody>

        <?php if (!empty($data['developer'])) {
          foreach ($data['developer'] as $value) {
            echo "<tr class='table-body-tr'> 
                            <td>" . $value->developerFirstName . "</td> 
                            <td>" . $value->developerLastName . "</td> 
                          <td><a href='" . URLROOT . "DevelopersApplicationController/updateDeveloper/" . $value->developerId . "+" . $data['companyId'] . "'>Update</a></td> 
                            <td><a href='" . URLROOT . "DevelopersApplicationController/deleteDeveloper/" . $value->developerId . "+" . $data['companyId'] .  "'>Delete</a></td>  
            ";
          }
        } else {
          echo "<tr><td colspan='7'>No Developers found</td></tr>";
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
  </div>
  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
    <a class="btn btn-primary" href="<?= URLROOT; ?>DevelopersApplicationController/createApplication/<?= $data['companyId'] ?>">Create Application</a>
    <table id="paginated-list-1" data-current-page="1" aria-live="polite" class="table table-primary table-bordered pagination-tab-2">
      <thead>
        <th>Name</th>
        <th>Usage</th>
        <th>Date Release</th>
        <th>Rating</th>
        <th>Price</th>
      </thead>
      <tbody>

        <?php if (!empty($data['application'])) {
          foreach ($data['application'] as $value) {
            echo "<tr class='table-body-tr-1'> 
                <td><a href='" . URLROOT . "DevelopersApplicationController/applicationHasDevelopers/" . $value->applicationId  . "+" . $data['companyId'] . "'>$value->applicationName</a></td>
                            <td>" . $value->applicationUsage . "</td> 
                            <td>" . $value->applicationDateRelease . "</td> 
                            <td>" . $value->applicationRating . "</td> 
                            <td>" . $value->applicationPrice . "</td> 
            ";
          }
        } else {
          echo "<tr><td colspan='7'>No Applications found</td></tr>";
        } ?>
      </tbody>
    </table>
    <nav class="pagination-container">
      <button class="pagination-button-1" id="prev-button-1" aria-label="Previous page" title="Previous page">
        &lt;
      </button>

      <div id="pagination-numbers-1">

      </div>

      <button class="pagination-button-1" id="next-button-1" aria-label="Next page" title="Next page">
        &gt;
      </button>
    </nav>
  </div>
</div>

<a class="btn btn-primary" href="<?= URLROOT; ?>CompaniesController/companiesOverview/1">Go back</a>