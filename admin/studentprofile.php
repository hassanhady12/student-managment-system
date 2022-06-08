<?php include 'inc/header.php';  ?>
<?php include '../classes/Student.php';  ?>
<?php include '../classes/Category.php';  ?>
<?php include '../classes/Specialties.php';  ?>

<?php

  if(!isset($_GET['stdid']) || $_GET['stdid'] == NULL){
      echo '<script>window.location="studentlist.php";</script>';
  }else{
      $id = $_GET['stdid'];
  }
 
?>
<?php
   $st = new Student();
    $getstud = $st->getstudById($id);
    if($getstud){
    while ($value = $getstud->fetch_assoc()) {
        ?>





<section class="section about-section gray-bg" id="about">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-6">
                <div class="about-text go-to">
                    <h3 class="dark-color">ألملف الخاص بالطالب</h3>
                    <h6 class="theme-color lead">معلومات الطالب</h6>
                    <div class="row about-list">
                        <div class="col-md-6">
                            <div class="media">
                                <label>ألاسم</label>
                                <p><?php echo $value['studentName'] ?></p>
                            </div>
                            <div class="media">
                                <label>محل الولاده</label>
                                <p><?php echo $value['studentCity'] ?></p>
                            </div>
                            <div class="media">
                                <label>عنوان</label>
                                <p><?php echo $value['studentAddres'] ?></p>
                            </div>
                            <div class="media">
                                <label>مدرسه المتخرج منها</label>
                                <p><?php echo $value['studentSchool'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="media">
                                <label>القسم المقبول به</label>
                                <p><?php
                                    $cat = new Category();
                                    $getCat = $cat->getAllCat();
                                    if($getCat){
                                    while($result = $getCat->fetch_assoc()){ ?>
                                    <?php
                                  if($value['catId'] == $result['catId']){ ?><?php
                                  echo $result['catName'];
                                    
                                  } ?>

                                    <?php
                                 }}
                                 ?>
                                </p>
                            </div>
                            <div class="media">
                                <label>تخصص</label>
                                <p>
                                    <?php
                                      $cat = new Specialties();
                                      $getSpecialties = $cat->getAllSpecialties();
                                       if($getSpecialties){
                                        while($result = $getSpecialties->fetch_assoc()){ ?>
                                    <?php
                                      if($value['specialtiesId'] == $result['specialtiesId']){           
                                        echo $result['specialtiesName'];
                                    } ?>

                                    <?php
                                      }}
                                      ?> </p>
                            </div>
                            <div class="media">
                                <label>ألأيميل</label>
                                <p><?php echo $value['studentEmail'] ?></p>
                            </div>
                            <div class="media">
                                <label>الباسورد</label>
                                <p><?php echo $value['studentPassword'] ?></p>
                            </div>

                            <div class="media">
                                <label>تاريخ التسجيل</label>
                                <p><?php echo $value['studentData'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-avatar">
                    <img src="<?php echo $value['image'] ; ?>" title="" alt="">
                </div>
            </div>
        </div>
        <div class="counter">
            <div class="row">
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="500" data-speed="500">500</h6>
                        <p class="m-0px font-w-600">Happy Clients</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="150" data-speed="150">150</h6>
                        <p class="m-0px font-w-600">Project Completed</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="850" data-speed="850">850</h6>
                        <p class="m-0px font-w-600">Photo Capture</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="190" data-speed="190">190</h6>
                        <p class="m-0px font-w-600">Telephonic Talk</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    }}
    ?>
<?php include 'inc/footer.php';  ?>
