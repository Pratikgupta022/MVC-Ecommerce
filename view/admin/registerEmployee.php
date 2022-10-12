<?php
include "view/header.php";
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container pt-2">
        <h1 class="text-center" >Add New Employee</h1>
        <div class="alert" id="alertmsg" role="alert" style="display: none"></div>
        <form action="index.php?action=registerEmployee" method="post" id="contactForm" enctype="multipart/form-data">
            <div class="mb-3 ">
                <label class="form-label">First Name</label>
                <input type="text" name="fname" placeholder="Name" id="name" class="form-control" >
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" name="lname" placeholder="Last Name" id="name" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Date of Birth</label>
                <input type="date" name="dob" id="dob"> <br>
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="email form-control" id="email" placeholder="Email">
            </div>

            <div class="mb-3">
                <label class="form-label">Mobile</label>
                <input type="text " maxlength="10" pattern="^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$" name="phone" class="email form-control" id="phone" placeholder="Mobile Number" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea class="form-control" name="address" id="query" rows="3" placeholder="Address"></textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Photo</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*" value="">
            </div>
            <div class="checkbox mt-4">
                <label class="form-label">Languages Known </label> <br>
                <input class="form-check-input" name="skills[]" type="checkbox" value="php" >
                <label class="form-check-label" >PHP</label>
                <input class="form-check-input" name="skills[]"  type="checkbox" value="mysql" >
                <label class="form-check-label" >MySQL</label>
                <input class="form-check-input" type="checkbox" name="skills[]"  value="javascript" >
                <label class="form-check-label" >JAVASCRIPT</label>
                <input class="form-check-input" type="checkbox" name="skills[]"  value="html" >
                <label class="form-check-label" >HTML</label>
                <input class="form-check-input" type="checkbox" name="skills[]"  value="css" >
                <label class="form-check-label" >CSS</label>
                <input class="form-check-input" type="checkbox" name="skills[]"  value="jquery" >
                <label class="form-check-label " >JQUERY</label>
                <input class="form-check-input" type="checkbox" name="skills[]"  value="ajax" >
                <label class="form-check-label" >AJAX</label>
            </div>
            <div class="mb-3 mt-4">
                <label class="form-label">Gender</label>
                <input type="radio" class="gender" name="gender" id="gender" value="Male" >Male
                <input type="radio" class="gender" name="gender" id="gender" value="Female" >Female
                <input type="radio" class="gender" name="gender" id="gender" value="other">other <br>
            </div>
            <div class="mb-3">
                <label class="form-label">PAN Number</label>
                <input type="text" maxlength="10" pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" name="pan" placeholder="PAN Number" id="pan" class="form-control" required>
            </div>
            <div class="text-center mb-3">
                <button type="submit" name="employeeForm"  class=" btn btn-primary" value="submit">Submit</button>
            </div>
        </form>
    </div>

    <script src="view/js/registerEmployee.js"></script>
<?php
include "view/footer.php";