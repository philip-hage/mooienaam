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