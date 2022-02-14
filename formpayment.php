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
                <h4 class="m-0 fw-bold">Payments List</h4>
                <div class="d-flex justify-content-center align-items-center">
                    <img class="m-0 px-4" src="icon/doublearrows.svg" alt="">
                    <a href="formpayment.php"><button class="my-2 w-100 btn btn-lg rounded-4 standard text-white ps" type="submit">ADD NEW PAYMENT</button></a>
                </div>
            </div>
            <hr class="m-0" />
            <div class="row bg-white bar py-2 my-1 d-flex justify-content-center align-items-center">
                <div class="col-lg-6 bg-white bar py-2 my-1" id="form">
                    <form class="text-muted" method="POST">
                        <label class="py-1" for="name">Name</label>
                        <input type="text" name="name" class="form-control rounded-4 py-2 ps" placeholder="Enter student name">

                        <label class="py-1" for="payment_schedule">Payment Schedule</label>
                        <input type="text" name="payment_schedule" class="form-control rounded-4 py-2 ps" placeholder="Enter student payment schedule">

                        <label class="py-1" for="bill_number">Bill Number</label>
                        <input type="number_format" name="bill_number" class="form-control rounded-4 py-2 ps" placeholder="Enter student bill number">

                        <label class="py-1" for="amount_paid">Amount Paid</label>
                        <input type="number_format" name="amount_paid" class="form-control rounded-4 py-2 ps" placeholder="Enter student amount paid">

                        <label class="py-1" for="balance_amount">Balance amount</label>
                        <input type="number_format" name="balance_amount" class="form-control rounded-4 py-2 ps" placeholder="Enter student balance amount">

                        <label class="py-1" for="date">Date</label>
                        <input type="date" name="date" class="form-control rounded-4 py-2 ps">

                        <div class="d-flex justify-content-center">
                            <button class="col-md-6 mb-1 mt-2 btn btn-lg rounded-4 standard text-white ps" name="submit" type="submit">Add Student</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $payment_schedule = $_POST['payment_schedule'];
                $bill_number = $_POST['bill_number'];
                $amount_paid = $_POST['amount_paid'];
                $balance_amount = $_POST['balance_amount'];
                $date = $_POST['date'];
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } else {
                    $stmt = $conn->prepare("INSERT INTO payment(name, payment_schedule, bill_number, amount_paid, balance_amount, date) VALUES(?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssisss", $name, $payment_schedule, $bill_number, $amount_paid, $balance_amount, $date);
                    $stmt->execute();
                    header ("location:payment.php");
                    $stmt->close();
                    $conn->close();
                }
            }
            ?>
        </div>
    </div>
</div>
<?php
include_once "footer.php"
?>