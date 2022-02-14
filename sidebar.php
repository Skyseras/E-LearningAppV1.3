<!-- Sidebar -->
<div class="bg-yellow bodyh" id="sidebar-wrapper">
    <div class="sidebar-heading text-left py-1 primary-text fs-4 fw-bold">
        <h1 style="line-height: 20px;" class="b-left2 px-2 fs-5 fw-bold my-3">E-classe</h1>
    </div>
    <div class="text-center">
        <img class="mt-4 w-50 rounded-full" src="visuals/profil.png" alt="profil image">
        <h6 class="mt-3 fw-bold"><?php echo $_SESSION['name'] ?></h6>
        <p class="ps mt-1 text-info">Admin</p>
    </div>
    <div class="text-left list-group list-group-flush my-3">
        <a href="index.php" class="px-4 py-1 list-group-item-action bg-transparent second-text"><button class="w-100  btn1 text-black fs-6 fw-bold <?php if (basename($_SERVER['REQUEST_URI']) == 'index.php') echo 'standard'; ?>" type="submit"><img class="mleft pb-1" src="icon/Home.svg" alt="">&nbsp;&nbsp;Home</button></a>
        <a href="course.php" class="px-4 py-1 list-group-item-action bg-transparent second-text fw-bold"><button class="w-100 btn1 text-black fs-6 fw-bold <?php if (basename($_SERVER['REQUEST_URI']) == 'course.php') echo 'standard'; ?>" type="submit"><img class="mleft px-1 pb-1" src="icon/Course.svg" alt="">&nbsp;&nbsp;Course</button></a>
        <a href="students.php" class="px-4 py-1 list-group-item-action bg-transparent second-text fw-bold"><button class="w-100 btn1 text-black fs-6 fw-bold <?php if (basename($_SERVER['REQUEST_URI']) == 'students.php') echo 'standard'; ?>" type="submit"><img class="mleft pb-1" src="icon/students.svg" alt="">&nbsp;&nbsp;Students</button></a>
        <a href="payment.php" class="px-4 py-1 list-group-item-action bg-transparent second-text fw-bold"><button class="w-100 btn1 text-black fs-6 fw-bold <?php if (basename($_SERVER['REQUEST_URI']) == 'payment.php') echo 'standard'; ?>" type="submit"><img class="mleft px-1 pb-1" src="icon/Payment.svg" alt="">&nbsp;Payment</button></a>
        <a href="#" class="px-4 py-1 list-group-item-action bg-transparent second-text fw-bold"><button class="w-100 btn1 text-black fs-6 fw-bold " type="submit"><img class="mleft px-1 pb-1" src="icon/Report.svg" alt="">&nbsp;&nbsp;Report</button></a>
        <a href="#" class="px-4 py-1 list-group-item-action bg-transparent second-text fw-bold"><button class="w-100 btn1 text-black fs-6 fw-bold " type="submit"><img class="mleft px-1 pb-1" src="icon/Settings.svg" alt="">&nbsp;&nbsp;Settings</button></a>
    </div>
    <div class="text-left list-group list-group-flush my-3">
        <a href="logout.php" class="px-4 py-1 list-group-item-action bg-transparent second-text fw-bold"><button class="w-100 btn1 text-black fs-6 fw-bold pleft" type="submit">Logout&nbsp;&nbsp;&nbsp;&nbsp;<img class="pb-1" src="icon/logout.svg" alt=""></button></a>
    </div>
</div>
<!-- /#sidebar-wrapper -->