<?php
include_once "header.php";
?>
<div class="d-flex" id="wrapper">
    <?php
    include_once "sidebar.php"
    ?>
    <div id="page-content-wrapper">
        <?php
        include_once "wrapperheader.php"
        ?>
        <div style="height:90vh;" class="bgstudent container-fluid px-4 pb-5">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0 fw-bold">Students List</h4>
                <div class="d-flex justify-content-center align-items-center">
                    <img class="m-0 px-4" src="icon/doublearrows.svg" alt="">
                    <a href="formstudents.php"><button class="my-2 w-100 btn btn-lg rounded-4 standard text-white ps" type="submit">ADD NEW STUDENT</button></a>
                </div>
            </div>
            <hr class="m-0" />
            <div class="row bg-white bar py-2 my-1 d-flex justify-content-center align-items-center">
                <div class="col-lg-6 bg-white bar py-2 my-1" id="form">
                    <form class="text-muted" action="add.php" method="POST">
                        <label class="py-1" for="name">Name</label>
                        <input type="text" name="name" class="form-control rounded-4 py-2 ps" placeholder="Enter student name">

                        <label class="py-1" for="email">Email</label>
                        <input type="email" name="email" class="form-control rounded-4 py-2 ps" placeholder="Enter student email">

                        <label class="py-1" for="phone">Phone</label>
                        <input type="number_format" name="phone" class="form-control rounded-4 py-2 ps" placeholder="Enter student phone">

                        <label class="py-1" for="enroll_number">Enroll Number</label>
                        <input type="number_format" name="enroll_number" class="form-control rounded-4 py-2 ps" placeholder="Enter student enroll number">

                        <label class="py-1" for="date_of_admission">Date of admission</label>
                        <input type="date" name="date_of_admission" class="form-control rounded-4 py-2 ps">

                        <div class="d-flex justify-content-center">
                            <button class="col-md-6 mb-3 mt-4 btn btn-lg rounded-4 standard text-white ps" type="submit">Add Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "footer.php"
?>