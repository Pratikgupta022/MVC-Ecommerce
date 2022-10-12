<?php

include "header.php";
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container mt-5">
        <h1 class="text-center">Register</h1>
        <div class="alert" id="alertmsg" role="alert" style="display: none"> </div>
        <form action="http://localhost/Test/index.php?action=register" id="register" method="post">
            <div class="mt-3 mb-3">
                <label class="form-label">Name</label>
                <input type="text" id="name" class="form-control" name="name" placeholder="Name">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="cpassword"  placeholder="Confirm Password">
            </div>
            <div class="text-center">
                <button type="submit" id="registerForm" name="registerForm"  class=" btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <script src="view/js/register.js"></script>
<?php
include "footer.php";
