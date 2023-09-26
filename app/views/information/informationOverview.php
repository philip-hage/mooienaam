<?php require APPROOT . '/views/includes/Header.php'; ?>
<a class="btn btn-primary" href="<?= URLROOT; ?>PhonesController/updatePhone/<?= $data['phoneId'] . "+" . $data['manufacturer']->manufacturerId ?>">Update Phone</a>
<a class="btn btn-primary" href="<?= URLROOT; ?>PhonesController/deletePhone/<?= $data['phoneId'] . "+" . $data['manufacturer']->manufacturerId ?>">Delete Phone</a>
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
        <a class="btn btn-primary" href="<?= URLROOT; ?>InformationController/createContact/<?= $data['phoneId'] . "+" . $data['manufacturer']->manufacturerId ?>">Create Contact</a>
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
                          <td><a href='" . URLROOT . "InformationController/updateContact/" . $value->contactId . "+" . $data['phoneId'] . "+" . $data['manufacturer']->manufacturerId . "'>Update</a></td> 
                            <td><a href='" . URLROOT . "InformationController/deleteContact/" . $value->contactId . "+" . $data['phoneId'] . "+" . $data['manufacturer']->manufacturerId . "'>Delete</a></td>  
            ";
            }
                } else {
                    echo "<tr><td colspan='7'>No contacts found</td></tr>";
                } ?>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="specification-tab-pane" role="tabpanel" aria-labelledby="specification-tab" tabindex="0">
        <a class="btn btn-primary" href="<?= URLROOT; ?>InformationController/createSpecification/<?= $data['phoneId'] . "+" . $data['manufacturer']->manufacturerId ?>">Create Specification</a>
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
                          <td><a href='" . URLROOT . "InformationController/updateSpecification/" . $value->specificationId . "+" . $data['phoneId'] . "+" . $data['manufacturer']->manufacturerId . "'>Update</a></td> 
                            <td><a href='" . URLROOT . "InformationController/deleteSpecification/" . $value->specificationId . "+" . $data['phoneId'] . "+" . $data['manufacturer']->manufacturerId . "'>Delete</a></td>  
            ";
            }
            } else {
                echo "<tr><td colspan='7'>No specifications found</td></tr>";
            } ?>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="media-tab-pane" role="tabpanel" aria-labelledby="media-tab" tabindex="0">
        <a class="btn btn-primary" href="<?= URLROOT; ?>InformationController/createMedia/<?= $data['phoneId'] . "+" . $data['manufacturer']->manufacturerId ?>">Create Media</a>
        <table class="table table-primary table-bordered">
            <thead>
            <th>Media Type</th>
            <th>Media Path</th>
            <th>Update</th>
            <th>Delete</th>
            </thead>
            <tbody>
            <?php if (!empty($data['media']))
            {foreach ($data['media'] as $value) {
                echo "<tr> 
                            <td>" . $value->mediaType . "</td> 
                            <td>" . $value->mediaPath . "</td> 
                          <td><a href='" . URLROOT . "InformationController/updateMedia/" . $value->mediaId . "+" . $data['phoneId'] . "+" . $data['manufacturer']->manufacturerId . "'>Update</a></td> 
                            <td><a href='" . URLROOT . "InformationController/deleteMedia/" . $value->mediaId . "+" . $data['phoneId'] . "+" . $data['manufacturer']->manufacturerId . "'>Delete</a></td>  
            ";
            }
            } else {
                echo "<tr><td colspan='7'>No media found</td></tr>";
            } ?>
            </tbody>
        </table>
    </div>
</div>
<a class="btn btn-primary" href="<?= URLROOT; ?>PhonesController/phoneoverview/<?=$data['manufacturer']->manufacturerId ?>">Go back</a>


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