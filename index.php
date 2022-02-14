<?php
include("session.php");
if (isset($_SESSION['email'])) {
?>
    <script>
        history.replaceState({
            stage: "selectDate"
        });
        window.onpopstate = function(event) {
            that.toStage(event.state.stage);
        };
    </script>
<?php
}
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
        <div class="container-fluid px-4">
            <div class="row g-3 my-2">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="p-3 bg1card shadow-sm rounded">
                        <div>
                            <img style="height: 30px;" src="icon/St.svg" alt="">
                            <p class="mb-0 py-2 ps">Students</p>
                        </div>
                        <div>
                            <h2 class="fw-bold mb-0 text-end">
                                <?php
                                $sql = "SELECT * FROM student";
                                $res = mysqli_query($conn, $sql);
                                $num_rows = mysqli_num_rows($res);
                                echo $num_rows;
                                ?>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="p-3 bg2card shadow-sm rounded">
                        <div>
                            <img style="height: 30px;" src="icon/Co.svg" alt="">
                            <p class="mb-0 py-2 ps">Course</p>
                        </div>
                        <div>
                            <h2 class="fw-bold mb-0 text-end">
                                <?php
                                $sql = "SELECT * FROM course";
                                $res = mysqli_query($conn, $sql);
                                $num_rows = mysqli_num_rows($res);
                                echo $num_rows;
                                ?>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="p-3 bg3card shadow-sm rounded">
                        <div>
                            <img style="height: 30px;" src="icon/Pay.svg" alt="">
                            <p class="mb-0 py-2 ps">Payments</p>
                        </div>
                        <div class="fw-bold d-flex align-text-bottom justify-content-end align-items-center ">
                            <h6 class="mb-1 mt-3 px-1 fw-bold">DHS</h6>
                            <h2 class="fw-bold mb-0">
                                <?php
                                $getsum = "SELECT SUM(amount_paid) AS allpay FROM payment";
                                $res = mysqli_query($conn, $getsum);
                                $total = mysqli_fetch_assoc($res);
                                $sumtotal = $total['allpay'];
                                echo $sumtotal;
                                ?>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="p-3 bg4card shadow-sm rounded">
                        <div>
                            <img style="height: 30px;" src="icon/Pro.svg" alt="">
                            <p class="text-white mb-0 py-2 ps">Users</p>
                        </div>
                        <div>
                            <h2 class="fw-bold mb-0 text-end">1</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "footer.php"
?>