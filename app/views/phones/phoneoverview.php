<?php require APPROOT . '/views/includes/Header.php'; ?>

<h3>Name Manufacter: <?= $data['manufacter']->manufactureName; ?></h3>
<h4>Phones Overview</h4>
<a class="btn btn-primary" href="<?= URLROOT; ?>/phonescontroller/createPhone/<?= $data['phoneManufactureId'] ?>" >Create Phone</a>



<table class="table table-primary table-bordered">
    <thead>
        <th>Name</th>
        <th>Update</th>
        <th>Delete</th>
    </thead>
    <tbody>
        <?php if(!empty($data['phones']))
        {
        foreach ($data['phones'] as $value) {
             echo "<tr> 
                            <td><a href='" . URLROOT . "/InformationController/informationOverview/" . $value->phoneId . "'>$value->phoneName</a></td>
                            <td><a href='" . URLROOT . "/PhonesController/updatePhone/" . $value->phoneId . "'>Update</a></td> 
                            <td><a href='" . URLROOT . "/PhonesController/deletePhone/" . $value->phoneId . "'>Delete</a></td>  
            ";
        }
        } else {
            echo "<tr><td colspan='3'>No phones found</td></tr>";
        } ?>
    </tbody>
</table>
<a class="btn btn-primary" href="<?= URLROOT; ?>/manufacturerscontroller/manufacturersOverview/1" >Go back</a>