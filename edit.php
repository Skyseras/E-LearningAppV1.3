<?php
include("session.php");
include_once "header.php";
?>
<div class="d-flex" id="wrapper">
    <?php
    include_once "sidebar.php"
    ?>
    <div id="page-content-wrapper">
        <?php
        include_once "wrapperheader.php";
        include("connect.php");
        ?>
        <div style="height:90vh;" class="bgstudent container-fluid px-4 pb-5">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0 fw-bold">Students List</h4>
                <div class="d-flex justify-content-center align-items-center">
                    <img class="m-0 px-4" src="icon/doublearrows.svg" alt="">
                    <a href="form.php"><button class="my-2 w-100 btn btn-lg rounded-4 standard text-white ps" type="submit">ADD NEW STUDENT</button></a>
                </div>
            </div>
            <hr class="m-0" />
            <?php
            $id = $_GET['edit'];
            $sql = "SELECT * FROM student WHERE student_id = $id";
            $res = mysqli_query($conn, $sql);
            $updat = mysqli_fetch_assoc($res);
            ?>
            <div class="row bg-white bar py-2 my-1 d-flex justify-content-center align-items-center">
                <div class="col-lg-6 bg-white bar py-2 my-1" id="form">
                    <form class="text-muted" method="POST">
                        <label class="py-1" for="name"></label>
                        <input type="text" name="name" class="form-control rounded-4 py-2 ps" value="<?php echo $updat['name']; ?>">

                        <label class="py-1" for="email"></label>
                        <input type="email" name="email" class="form-control rounded-4 py-2 ps" value="<?php echo $updat['email']; ?>">

                        <label class="py-1" for="phone"></label>
                        <input type="number_format" name="phone" class="form-control rounded-4 py-2 ps" value="<?php echo $updat['phone']; ?>">

                        <label class="py-1" for="enroll_number"></label>
                        <input type="number_format" name="enroll_number" class="form-control rounded-4 py-2 ps" value="<?php echo $updat['enroll_number']; ?>">

                        <label class="py-1" for="date_of_admission"></label>
                        <input type="date" name="date_of_admission" class="form-control rounded-4 py-2 ps" value="<?php echo $updat['date_of_admission']; ?>">

                        <div class="d-flex justify-content-center">
                            <button class="col-md-6 mb-3 mt-4 btn btn-lg rounded-4 standard text-white ps" name="submit" type="submit">Add Student</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $enroll_number = $_POST['enroll_number'];
                $date_of_admission = $_POST['date_of_admission'];
                $query = "UPDATE student set student_id = $id , name='$name',email='$email',phone='$phone',enroll_number='$enroll_number',date_of_admission='$date_of_admission' where student_id='$id'";
                $res = mysqli_query($conn, $query);
                header ("location:students.php");
                mysqli_close($conn, $query);
            }
            ?>
        </div>
    </div>
</div>
<?php
include_once "footer.php"
?>