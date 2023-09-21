<?php require APPROOT . '/views/includes/Header.php'; ?>
<a class="btn btn-primary" href="<?= URLROOT; ?>/phonescontroller/phoneoverview">Go back</a>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="true">Contacts</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="specification-tab" data-bs-toggle="tab" data-bs-target="#specification-tab-pane" type="button" role="tab" aria-controls="specification-tab-pane" aria-selected="false">Specifications</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="media-tab" data-bs-toggle="tab" data-bs-target="#media-tab-pane" type="button" role="tab" aria-controls="media-tab-pane" aria-selected="false">Media</button>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
        <a class="btn btn-primary" href="<?= URLROOT; ?>/informationcontroller/createContact/<?= $data['phoneId'] ?>">Create Contact</a>
        <table class="table table-primary table-bordered">
            <thead>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>BirthDay</th>
            <th>Update</th>
            <th>Delete</th>
            </thead>
            <tbody>

            <?php if (!empty($data['contact']))
            {foreach ($data['contact'] as $value) {
                echo "<tr> 
                            <td>" . $value->contactFirstName . "</td> 
                            <td>" . $value->contactLastName . "</td> 
                            <td>" . $value->contactEmail . "</td>
                            <td>" . $value->contactNumber . "</td>
                            <td>" . $value->contactBirthdayDate . "</td>
                          <td><a href='" . URLROOT . "/InformationController/updateContact/" . $value->contactId . "'>Update</a></td> 
                            <td><a href='" . URLROOT . "/InformationController/deleteContact/" . $value->contactId . "'>Delete</a></td>  
            ";
            }
                } else {
                    echo "<tr><td colspan='7'>No contacts found</td></tr>";
                } ?>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="specification-tab-pane" role="tabpanel" aria-labelledby="specification-tab" tabindex="0">
        <a class="btn btn-primary" href="<?= URLROOT; ?>/informationcontroller/createSpecification/<?= $data['phoneId'] ?>">Create Specification</a>
        <table class="table table-primary table-bordered">
            <thead>
            <th>Specification Name</th>
            <th>Specification Value</th>
            <th>Update</th>
            <th>Delete</th>
            </thead>
            <tbody>

            <?php if (!empty($data['specification']))
            {foreach ($data['specification'] as $value) {
                echo "<tr> 
                            <td>" . $value->specificationName . "</td> 
                            <td>" . $value->specificationValue . "</td> 
                          <td><a href='" . URLROOT . "/InformationController/updateSpecification/" . $value->specificationId . "'>Update</a></td> 
                            <td><a href='" . URLROOT . "/InformationController/deleteSpecification/" . $value->specificationId . "'>Delete</a></td>  
            ";
            }
            } else {
                echo "<tr><td colspan='7'>No specifications found</td></tr>";
            } ?>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="media-tab-pane" role="tabpanel" aria-labelledby="media-tab" tabindex="0">
        <a class="btn btn-primary" href="<?= URLROOT; ?>/informationcontroller/createMedia/<?= $data['phoneId'] ?>">Create Media</a>
        <table class="table table-primary table-bordered">
            <thead>
            <th>Media Type</th>
            <th>Media Name</th>
            <th>Update</th>
            <th>Delete</th>
            </thead>
            <tbody>
            <?php if (!empty($data['media']))
            {foreach ($data['media'] as $value) {
                echo "<tr> 
                            <td>" . $value->mediaType . "</td> 
                            <td>" . $value->mediaPath . "</td> 
                          <td><a href='" . URLROOT . "/ManufacturersController/updateManufacturer/" . $value->mediaId . "'>Update</a></td> 
                            <td><a href='" . URLROOT . "/ManufacturersController/deleteManufacturer/" . $value->mediaId . "'>Delete</a></td>  
            ";
            }
            } else {
                echo "<tr><td colspan='7'>No media found</td></tr>";
            } ?>
            </tbody>
        </table>
    </div>
</div>