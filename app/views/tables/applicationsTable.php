    <a class="btn btn-primary" href="<?= URLROOT; ?>DevelopersApplicationController/createApplication/<?= $data['companyId'] ?>">Create Application</a>
    <table id="paginated-list" data-current-page="1" aria-live="polite" class="table table-primary table-bordered">
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
                    echo "<tr class='table-body-tr'> 
                <td><a href='" . URLROOT . "DevelopersApplicationController/applicationHasDevelopers/" . $value->applicationId  . "'>$value->applicationName</a></td>
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
        <button class="pagination-button" id="prev-button" aria-label="Previous page" title="Previous page">
            &lt;
        </button>

        <div id="pagination-numbers">

        </div>

        <button class="pagination-button" id="next-button" aria-label="Next page" title="Next page">
            &gt;
        </button>
    </nav>