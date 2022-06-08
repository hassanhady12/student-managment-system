<?php include 'inc/header.php';  ?>
<?php include '../classes/Category.php'; ?>
<?php include '../classes/Specialties.php'; ?>
<?php include '../classes/Student.php'; ?>

<?php
   
 $st = new Student();
 if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    
    $insertStudent  = $st->studentInsert($_POST, $_FILES);
}
  

?>

<div class="container">
    <div class="col-md-4 offset-md-4">
        <div class="singup-form">
            <form action="" method="post" enctype="multipart/form-data" class="mt-5 border p-4 bg-light shadow">
                <h3 class="col-md-8">أضف قسم جديد</h3>
                <?php
                   if (isset($insertStudent)) {
                       echo $insertStudent;
                   }?>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="float-end" for="">أدخل هنا ألاسم</label>
                        <input type="text" class="form-control float-end" name="studentName">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="float-end" for="">أدخل هنا ألمدينه</label>
                        <input type="text" class="form-control float-end" name="studentCity">
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="float-end" for="">أدخل هنا ألعنوان</label>
                        <input type="text" class="form-control float-end" name="studentAddres">
                    </div>


                    <div class="mb-3 col-md-12">
                        <label class="float-end" for="">أدخل هنا ألمدرسه</label>
                        <input type="text" class="form-control float-end" name="studentSchool">
                    </div>


                    <div class="mb-3 col-md-12">
                        <label class="float-end" for="">أدخل هنا ألاميل</label>
                        <input type="email" class="form-control float-end" name="studentEmail">
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="float-end" for="">أدخل هنا الباسورد</label>
                        <input type="password" class="form-control float-end" name="studentPassword">
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="float-end" for="">أدخل هنا تاريخ تسجيل</label>
                        <input type="date" class="form-control float-end" name="studentData">
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
                            <option value="<?php echo $result['catId']; ?>"><?php echo $result['catName'] ; ?></option>
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
                            <option value="<?php echo $result['specialtiesId']; ?>">
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
                            <option value="0">صباحي</option>
                            <option value="1">مسائي</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="float-end" for="">أختر نوع دراسه</label>
                        <input class="form-control float-end" type="file" name="image">
                    </div>
                    <input class=" mt-3 float-end btn btn-primary" type="submit" name="submit" value="حفظ">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'inc/footer.php';  ?>
