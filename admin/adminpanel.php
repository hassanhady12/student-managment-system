<?php include 'inc/header.php';  ?>
<?php include '../classes/Category.php';  ?>
<?php include '../classes/Specialties.php';  ?>
<?php include '../classes/Student.php';  ?>


<div class="container overflow-hidden mt-5">
    <div class="row gy-5">

        <div class="col-4">
            <div class="Box4 border text-center ">
                <i class="fa fa-user fa-5x icon float-end"></i>
                <span class="adminText">عدد ألطلاب</span>
                <?php
                $st = new Student();
                $countSt = $st->countStudent(); ?>
                <span class="adminText">(<?php echo $countSt; ?>)</span>
            </div>
        </div>

        <div class="col-4">
            <div class="Box5 border text-center ">
                <i class="fa fa-calendar fa-5x icon float-end"></i>
                <span class="adminText">عدد ألاقسام</span>
                <?php
                $cat = new Category();
                $countcat = $cat->countCategory(); ?>
                <span class="adminText">(<?php echo $countcat; ?>)</span>
            </div>
        </div>


        <div class="col-4">
            <div class="Box6 border text-center ">
                <i class="fa fa-graduation-cap fa-5x icon float-end"></i>
                <span class="adminText">عدد تخصص</span>
                <?php
                $sp = new Specialties();
                $countsp = $sp->countspec(); ?>
                <span class="adminText">(<?php echo $countsp; ?>)</span>
            </div>
        </div>
    </div>
</div>



<?php include 'inc/footer.php';  ?>
