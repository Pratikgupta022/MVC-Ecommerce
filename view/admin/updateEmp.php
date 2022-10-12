<?php
include "view/header.php";
//print_r($data); die;
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container mt-5">
        <h1 class="text-center">Update Employee</h1>
        <div class="alert" id="alertmsg" role="alert" style="display: none"> </div>
        <form action="http://localhost/Test/index.php?action=edituser" id="edit" method="post">
            <div class="mb-3 ">
                <label class="form-label">First Name</label>
                <input type="text" value="<?php echo $data['fname'] ?>" name="fname" placeholder="Name" id="fname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" value="<?php echo $data['lname'] ?>" name="lname" placeholder="Last Name" id="lname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date of Birth  - <span><strong><?php echo $data['dob'] ?></strong></span></label>
                <br>
                <input type="date" name="dob" id="dob" required> <br>
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" value="<?php echo $data['email'] ?>" name="email" class="email form-control" id="email" placeholder="Email" required>
            </div>
            <div class="checkbox mt-4">
                <label class="form-label">Languages Known - <span><strong><?php echo $data['skills'] ?></strong></span> </label> <br>
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
                <label class="form-check-label" >JQUERY</label>
                <input class="form-check-input" type="checkbox" name="skills[]"  value="ajax" >
                <label class="form-check-label" >AJAX</label>
            </div>
            <div class="mb-3 mt-4">
                <label class="form-label">Gender  - <span><strong><?php echo $data['gender'] ?> </strong></span></label><br>
                <input type="radio" class="gender" name="gender" id="gender" value="Male">Male
                <input type="radio" class="gender" name="gender" id="gender" value="Female" >Female
                <input type="radio" class="gender" name="gender" id="gender" value="other">other <br>
            </div>
            <div class="text-center mb-3">
                <button type="submit" id="registerForm" name="registerForm"  class=" btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

        <script src="view/js/updateEmp.js"></script>
<?php
include "view/footer.php";
