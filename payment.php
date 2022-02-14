<?php
include_once "header.php";
include("session.php");
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
        <div style="height:90vh;" class="bgstudent container-fluid px-4 bodyh">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0 fw-bold">Payments List</h4>
                <div class="d-flex justify-content-center align-items-center">
                    <img class="py-3  m-0 px-4" src="icon/doublearrows.svg" alt="">
                    <a href="formpayment.php"><button class="my-2 w-100 btn btn-lg rounded-4 standard text-white ps" type="submit">ADD NEW PAYMENT</button></a>
                </div>
            </div>
            <hr class="m-0" />
            <div class="row bg-transparent" id="titles">
                <div class="col-sm-3 col-lg-2 m-auto">
                    <p class="m-0">Name</p>
                </div>
                <div class="col-sm-3 col-lg-2 m-auto">
                    <p class="text-nowrap m-0">Payment Schedule</p>
                </div>
                <div class="col-sm-3 col-lg-2 m-auto" id="date">
                    <p class="text-nowrap m-0">Bill Number</p>
                </div>
                <div class="col-sm-3 col-lg-2 m-auto" id="num">
                    <p class="text-nowrap m-0 text-nowrap">Amount Paid</p>
                </div>
                <div class="col-sm-3 col-lg-2 m-auto">
                    <p class="text-nowrap m-0 text-nowrap">Balance amount</p>
                </div>
                <div class="col-sm-3 col-lg-1 m-auto" id="date">
                    <p class="m-0 text-nowrap">Date</p>
                </div>
                <div class="col-sm-2 col-lg-1 m-auto">
                </div>
            </div>
            <div style="overflow-y: scroll;">
                <div style="height:70vh; padding:0 25px;">
                    <?php
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT payment_id, name, payment_schedule, bill_number, amount_paid, balance_amount, date from payment order by payment_id DESC;";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="row bg-white py-2 my-1" id="info">
                                        <div class="col-2">
                                            <p style="font-size:12px;" class="m-0">' . $row['name'] . '</p>
                                        </div>
                                        <div class="col-2">
                                            <p style="font-size:12px;" class="m-0">' . $row['payment_schedule'] . '</p>
                                        </div>
                                        <div class="col-2" id="num">
                                            <p style="font-size:12px;" class="m-0">' . $row['bill_number'] . '</p>
                                        </div>
                                        <div class="col-2" id="num">
                                            <p style="font-size:12px;" class="text-nowrap m-0">' . $row['amount_paid'] . '</p>
                                        </div>
                                        <div class="col-2" >
                                            <p style="font-size:12px;" class="text-nowrap m-0">' . $row['balance_amount'] . '</p>
                                        </div>
                                        <div class="col-1" id="date">
                                            <p style="font-size:12px;" class="text-nowrap m-0">' . $row['date'] . '</p>
                                        </div>
                                        <div class="col-1" id="editer2">
                                            <img class="m-auto px-2" src="icon/eye.svg" alt="">
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