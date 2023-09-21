<?php require APPROOT . '/views/includes/Header.php'; ?>

<h3>Name Company: <?= $data['company']->companyName; ?></h3>
<h4>Developers Overview</h4>
<a class="btn btn-primary" href="<?= URLROOT; ?>/developersController/createDeveloper/<?= $data['companyId'] ?>" >Create Developer</a>



<table class="table table-primary table-bordered">
    <thead>
    <th>Name</th>
    <th>Update</th>
    <th>Delete</th>
    </thead>
    <tbody>
    <?php if(!empty($data['developers']))
    {
        foreach ($data['developers'] as $value) {
            echo "<tr> 
                            <td>" . $value->developerName . "</td> 
                            <td><a href='" . URLROOT . "/DevelopersController/updateDeveloper/" . $value->developerId . "'>Update</a></td> 
                            <td><a href='" . URLROOT . "/DevelopersController/deleteDeveloper/" . $value->developerId . "'>Delete</a></td>  
            ";
        }
    } else {
        echo "<tr><td colspan='3'>No Developers found</td></tr>";
    } ?>
    </tbody>
</table>
<a class="btn btn-primary" href="<?= URLROOT; ?>/manufacturerscontroller/manufacturersOverview/1" >Go back</a>