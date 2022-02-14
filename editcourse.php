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
        <div style="height:90vh;" class="bgstudent container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0 fw-bold">Course Form</h4>
                <div class="d-flex justify-content-center align-items-center">
                    <img class="m-0 px-4" src="icon/doublearrows.svg" alt="">
                    <a href="formcourse.php"><button class="my-2 w-100 btn btn-lg rounded-4 standard text-white ps" type="submit">ADD NEW COURSE</button></a>
                </div>
            </div>
            <hr class="m-0" />
            <?php
            $id = $_GET['edit'];
            $sql = "SELECT * FROM course WHERE course_id = $id";
            $res = mysqli_query($conn, $sql);
            $updat = mysqli_fetch_assoc($res);
            ?>
            <div class="row bg-white bar py-2 my-1 d-flex justify-content-center align-items-center">
                <div class="col-lg-6 bg-white bar py-2 my-1" id="form">
                    <form class="text-muted" method="POST">
                        <label class="py-1" for="title">Title</label>
                        <input type="text" name="title" class="form-control rounded-4 py-2 ps" value="<?php echo $updat['title']; ?>">

                        <label class="py-1" for="instructor">Instructor</label>
                        <input type="text" name="instructor" class="form-control rounded-4 py-2 ps" value="<?php echo $updat['instructor']; ?>">

                        <label class="py-1" for="syllabus">Syllabus</label>
                        <input type="number_format" name="syllabus" class="form-control rounded-4 py-2 ps" value="<?php echo $updat['syllabus']; ?>">

                        <div class="d-flex justify-content-center">
                            <button class="col-md-6 mb-1 mt-3 btn btn-lg rounded-4 standard text-white ps" name="submit" type="submit">Add Course</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            if (isset($_POST['submit'])) {
                $title = $_POST['title'];
                $instructor = $_POST['instructor'];
                $syllabus = $_POST['syllabus'];
                $query = "UPDATE course set course_id = $id , title='$title',instructor='$instructor',syllabus='$syllabus'";
                $res = mysqli_query($conn, $query);
                header ("location:course.php");
                mysqli_close($conn, $query);
            }
            ?>
        </div>
    </div>
</div>
<?php
include_once "footer.php"
?>