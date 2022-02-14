<?php
include("session.php");
include_once "header.php"
?>
<div class="d-flex" id="wrapper">
    <?php
    include_once "sidebar.php"
    ?>
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <?php
        include_once "wrapperheader.php";
        include("connect.php");
        ?>
        <div style="height:90vh;" class="bgstudent container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0 fw-bold">Browse Courses</h4>
                <div class="d-flex justify-content-center align-items-center">
                    <img class="m-0 px-4" src="icon/doublearrows.svg" alt="">
                    <a href="formcourse.php"><button class="my-2 w-100 btn btn-lg rounded-4 standard text-white ps" type="submit">ADD NEW COURSE</button></a>
                </div>
            </div>
            <hr class="m-0" />
            <div class="row bg-transparent px-4" id="titles">
                <div class="col-sm-4 col-lg-4 m-auto">
                    <p class=" m-0">Title</p>
                </div>
                <div class="col-sm-2 col-lg-2 m-auto">
                    <p class=" m-0">Instructor</p>
                </div>
                <div class="col-sm-4 col-lg-4 m-auto">
                    <p class=" m-0">Syllabus</p>
                </div>
                <div class="col-sm-2 col-lg-2 m-auto">
                </div>
            </div>
            <div style="overflow-y: scroll;">
                <div style="height:70vh; padding:0 25px;">

                    <?php
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT course_id, title, instructor, syllabus from course order by course_id DESC;";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo    '<div class="row bg-white bar py-2 my-1" id="info">
                                            <div class="col-4">
                                                <p style="font-size:12px;" class="text-nowrap m-0">' . $row["title"] . '</p>
                                            </div>
                                            <div class="col-2">
                                                <p style="font-size:12px;" class="text-nowrap m-0 ">' . $row["instructor"] . '</p>
                                            </div>
                                            <div class="col-4">
                                                <p style="font-size:12px;" class="text-nowrap m-0">' . $row["syllabus"] . '</p>
                                            </div>
                                            <div class="col-2 my-2 d-flex justify-content-center align-items-center" id="editer">
                                                <a href="editcourse.php?edit=' . $row["course_id"] . '"><img class="px-2" src="icon/pen.svg" alt=""></a>
                                                <a href="deletecourse.php?delete=' . $row["course_id"] . '"><img class="px-2" src="icon/can.svg" alt=""></a>
                                            </div>
                                        </div>';
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once "footer.php"
    ?>