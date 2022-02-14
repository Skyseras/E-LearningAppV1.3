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
                <h4 class="m-0 fw-bold">Students List</h4>
                <div class="d-flex justify-content-center align-items-center">
                    <img class="m-0 px-4" src="icon/doublearrows.svg" alt="">
                    <a href="formstudents.php"><button class="my-2 w-100 btn btn-lg rounded-4 standard text-white ps" type="submit">ADD NEW STUDENT</button></a>
                </div>
            </div>
            <hr class="m-0" />
            <div class="row bg-transparent px-4" id="titles">
                <div class="col-sm-2 col-lg-1 m-auto">
                </div>
                <div class="col-sm-3 col-lg-2 m-auto">
                    <p class=" m-0">Name</p>
                </div>
                <div class="col-sm-3 col-lg-2 m-auto">
                    <p class=" m-0">Email</p>
                </div>
                <div class="col-sm-3 col-lg-2 m-auto">
                    <p class=" m-0">Phone</p>
                </div>
                <div class="col-sm-3 col-lg-2 m-auto" id="num">
                    <p class=" m-0 text-nowrap">Enroll Number</p>
                </div>
                <div class="col-sm-3 col-lg-2 m-auto" id="date">
                    <p class=" m-0 text-nowrap">Date of admission</p>
                </div>
                <div class="col-sm-1 col-lg-1 m-auto">
                </div>
            </div>
            <div style="overflow-y: scroll;">
                <div style="height:70vh; padding:0 25px;">
                    <?php
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT student_id, name, email, phone, enroll_number, date_of_admission from student order by student_id DESC;";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo    '<div class="row bg-white bar py-2 my-1" id="info">
                                            <div class="col-1" id="imger">
                                                <img style="border: 2px solid #00C1FE;border-radius: 100px; height:50px; width:50px;" src="visuals/userpic.svg" alt="">
                                            </div>
                                            <div class="col-2">
                                                <p style="font-size:12px;" class="text-nowrap m-0">' . $row["name"] . '</p>
                                            </div>
                                            <div class="col-2">
                                                <p style="font-size:12px;" class="text-nowrap m-0 ">' . $row["email"] . '</p>
                                            </div>
                                            <div class="col-2">
                                                <p style="font-size:12px;" class="text-nowrap m-0">' . $row["phone"] . '</p>
                                            </div>
                                            <div class="col-2" id="num">
                                                <p style="font-size:12px;" class="text-nowrap m-0">' . $row["enroll_number"] . '</p>
                                            </div>
                                            <div class="col-2" id="date">
                                                <p style="font-size:12px;" class="text-nowrap m-0">' . $row["date_of_admission"] . '</p>
                                            </div>
                                            <div class="col-1 d-flex justify-content-center align-items-center" id="editer">
                                                <a href="edit.php?edit=' . $row["student_id"] . '"><img class="px-2" src="icon/pen.svg" alt=""></a>
                                                <a href="delete.php?delete=' . $row["student_id"] . '"><img class="px-2" src="icon/can.svg" alt=""></a>
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
</div>
<?php
include_once "footer.php"
?>