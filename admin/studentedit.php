<?php include 'inc/header.php';  ?>
<?php include '../classes/Category.php'; ?>
<?php include '../classes/Specialties.php'; ?>
<?php include '../classes/Student.php'; ?>


<?php

  if(!isset($_GET['stdid']) || $_GET['stdid'] == NULL){
      echo '<script>window.location="studentlist.php";</script>';
  }else{
      $id = $_GET['stdid'];
  }
 
?>

<?php
   
 $st = new Student();
 if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    
    $updateStudent  = $st->studentUpdate($_POST, $_FILES, $id);
}
  

?>


<div class="container">
    <div class="col-md-4 offset-md-4">
        <div class="singup-form">

            <?php
        $getstud = $st->getstudById($id);
        if($getstud){
            while ($value = $getstud->fetch_assoc()) {
                ?>
            <form action="" method="post" enctype="multipart/form-data" class="mt-5 border p-4 bg-light shadow">
                <h3 class="col-md-8">أضف قسم جديد</h3>
                <?php
                 if (isset($updateStudent)) {
                     echo $updateStudent;
                 } ?>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="float-end" for="">أدخل هنا ألاسم</label>
                        <input type="text" class="form-control float-end" name="studentName"
                            value="<?php echo $value['studentName'];?>">
                    </div>

                    <div class=" mb-3 col-md-6">
                        <label class="float-end" for="">أدخل هنا ألمدينه</label>
                        <input type="text" class="form-control float-end" name="studentCity"
                            value="<?php echo $value['studentCity'];?>">
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="float-end" for="">أدخل هنا ألعنوان</label>
                        <input type="text" class="form-control float-end" name="studentAddres"
                            value="<?php echo $value['studentAddres'];?>">
                    </div>


                    <div class="mb-3 col-md-12">
                        <label class="float-end" for="">أدخل هنا ألمدرسه</label>
                        <input type="text" class="form-control float-end" name="studentSchool"
                            value="<?php echo $value['studentSchool'];?>">
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="float-end" for="">أدخل هناالايميل</label>
                        <input type="text" class="form-control float-end" name="studentEmail"
                            value="<?php echo $value['studentEmail'];?>">
                    </div>


                    <div class="mb-3 col-md-12">
                        <label class="float-end" for="">أدخل هنا الباسورد</label>
                        <input type="text" class="form-control float-end" name="studentPassword"
                            value="<?php echo $value['studentPassword'];?>">
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="float-end" for="">أدخل هنا تاريخ التاسجيل</label>
                        <input type="date" class="form-control float-end" name="studentData"
                            value="<?php echo $value['studentData'];?>">
                    </div>


                    <div class="mb-3 col-md-12">
                        <label class="float-end" for="">أختر قسم</label>
                        <select class="form-control float-end" name="catId">
                            <option>ألأقسام</option>
                            <?php
                $cat = new Category();
                $getCat = $cat->getAllCat();
                if($getCat){
                    while($result = $getCat->fetch_assoc()){ ?>
                            <option <?php
                   if($value['catId'] == $result['catId']){ ?> selected="selected" <?php } ?>
                                value="<?php echo $result['catId']; ?>"><?php echo $result['catName'] ; ?></option>
                            <?php
                }}
                ?>
                        </select>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="float-end" for="">أختر تخصص</label>
                        <select class="form-control float-end" name="specialtiesId">
                            <option>تخصص</option>
                            <?php
                $cat = new Specialties();
                $getSpecialties = $cat->getAllSpecialties();
                if($getSpecialties){
                    while($result = $getSpecialties->fetch_assoc()){ ?>
                            <option <?php
                  if($value['specialtiesId'] == $result['specialtiesId']){ ?> selected="selected" <?php } ?>
                                value="<?php echo $result['specialtiesId']; ?>">
                                <?php echo $result['specialtiesName'] ; ?>
                            </option>
                            <?php
                }}
                ?>
                        </select>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="float-end" for="">أختر نوع دراسه</label>
                        <select class="form-control float-end" name="studentType">
                            <option>أختر نوع دراسه</option>
                            <?php
                 if($value['studentType'] == 0){ ?>
                            <option selected="selected" value="0">صباحي</option>
                            <option value="1">مسائي</option>
                            <?php }else{ ?>
                            <option value="0">صباحي</option>
                            <option value="1">مسائي</option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="float-end" for="">أختر نوع دراسه</label>
                        <img class="img-thumbnail" src="<?php echo $value['image']; ?>">
                        <input class="form-control float-end" type="file" name="image">
                    </div>
                    <input class=" mt-3 float-end btn btn-primary" type="submit" name="submit" value="حفظ">
                </div>
            </form>
            <?php
            }}
            ?>
        </div>
    </div>
</div>






<?php include 'inc/footer.php';  ?>
