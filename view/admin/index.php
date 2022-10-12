<?php
include "view/header.php";
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container mt-4">
        <h1 class="text-center ">
            <a href="http://localhost/Test/index.php?action=admin&sort=0">
                <img src="view/images/up-arrow.png" height="30px" width="30px" alt="sort icon"></a>
            Admin Page
            <a href="http://localhost/Test/index.php?action=admin&sort=1">
                <img src="view/images/down-arrow.png" height="30px" width="30px" alt="sort icon"></a> -
            <a href="http://localhost/Test/index.php?action=registerEmployee" class="btn btn-sm btn-info">Add New User</a>
        </h1>
        <div class="list-data mt-5">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#<a href="#" class="text-decoration-none"></a></th>
                    <th scope="col"><a href="http://localhost/Test/index.php?action=admin&sort=fname" class="text-decoration-none">Full Name</a></th>
                    <th scope="col"><a href="http://localhost/Test/index.php?action=admin&sort=dob" class="text-decoration-none">Dob</a></th>
                    <th scope="col"><a href="http://localhost/Test/index.php?action=admin&sort=gender" class="text-decoration-none">Gender</a></th>
                    <th scope="col"><a href="http://localhost/Test/index.php?action=admin&sort=email" class="text-decoration-none">Email</a></th>
                    <th scope="col"><a href="http://localhost/Test/index.php?action=admin&sort=skills" class="text-decoration-none">Skills</a></th>
                    <th scope="col"><a href="http://localhost/Test/index.php?action=admin&sort=photo" class="text-decoration-none">Image</a></th>
                    <th scope="col"><a href="#" class="text-decoration-none">Edit</a></th>
                    <th scope="col"><a href="#" class="text-decoration-none">Delete</a></th>
                </tr>
                </thead>
                <tbody>
                <?php
//                print_r($data); die;
                $count = 1;
                foreach ($data as $row){
                    ?>
                    <tr>
                        <th scope="row"><?php echo $count; ?></th>
                        <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                        <td><?php echo $row['dob'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['skills'] ?></td>
                        <td><img src="view/images/<?php echo $row['photo'] ?>" height="40px" width="50px" alt="sort icon"></td>
                        <td><a href="http://localhost/Test/index.php?action=edituser&id=<?php echo $row['id'] ?>" class="btn btn-sm btn-primary">Edit</a></td>
                        <td><a href="http://localhost/Test/index.php?action=deleteuser&id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">Delete</a></td>
                    </tr>
                    <?php
                    $count++;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

<?php

?>
<!--    <script src="view/js/adminSearch.js"></script>-->
<?php
include "view/footer.php";
