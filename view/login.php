<?php
include "header.php";

if (isset($_SESSION['loggedInUser'])){
    print_r($_SESSION['loggedInUser']);
}

?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <div class="container mt-5">
        <h1 class="text-center">Login</h1>
        <div class="alert" id="alertmsg" role="alert" style="display: none"> </div>
        <form action="index.php?action=login" id="loginForm" method="post">
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="text-center">
                <button type="submit" name="loginForm"  class=" btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <script src="view/js/login.js"></script>
<?php
include "footer.php";
