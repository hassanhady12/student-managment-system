<?php include 'inc/header.php'; ?>
<?php include '../classes/Category.php'; ?>
<?php include '../classes/Specialties.php'; ?>
<?php include '../classes/Student.php'; ?>
<?php include '../classes/Filter.php'; ?>





<div class="container">
    <form action="" method="GET" class="mt-3 border p-4 bg-light shadow">
        <div class="container">

            <div class="row">
                <div class="col-6">
                    <?php
                $cat = new Category();
                $getAllCat = $cat->getAllCat();
                if($getAllCat){
                while ($result = $getAllCat->fetch_assoc()) {
                    ?>
                    <input class="form-check-input" name="cat" type="checkbox" value="<?php echo $result['catId'] ; ?>"
                        id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <?php echo $result['catName']; ?>
                    </label>
                    <?php
                }} ?>
                </div>


                <div class="col-6">
                    <?php
                $sp = new Specialties();
                $getAllSp = $sp->getAllSpecialties();
                if($getAllCat){
                while ($result = $getAllSp->fetch_assoc()) {
                    ?>
                    <input class="form-check-input" name="spe" type="checkbox"
                        value="<?php echo $result['specialtiesId'] ; ?>" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <?php echo $result['specialtiesName']; ?>
                    </label>
                    <?php
                }} ?>
                </div>
            </div>
            <input class="btn btn-primary col-12 mt-3" type="submit" value="فلتره">

        </div>
    </form>
    <?php if(isset($_GET['cat']) && isset($_GET['spe'])){ 
           
           $cat = $_GET['cat'];
           $spe = $_GET['spe'];
           $fl = new Filter();
              

    if (isset($_GET['delstud'])) {
        $id = $_GET['delstud'];
        $delst = $st->delstuByID($id);
    } ?>

    <?php
   
   if (isset($delst)) {
       echo $delst;
   } ?>

    <table class="table table-dark table-striped mt-5">
        <thead>
            <tr>
                <th scope="col">رقم ألطلاب</th>
                <th scope="col">أسماء ألطلاب </th>
                <th scope="col">أسم ألمدينه</th>
                <th scope="col">عنوان</th>
                <th scope="col">أسم المدرسه</th>
                <th scope="col">قسم </th>
                <th scope="col">تخصص</th>
                <th scope="col">نوع دراسه</th>
                <th scope="col"> صور</th>
                <th scope="col">تعديل او مسح</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $getfl = $fl->getAllStudent($cat,$spe);
    $i=0;
    if ($getfl) {
        while ($result = $getfl->fetch_assoc()) {
            $i++; ?>
            <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td>
                    <a href="studentprofile.php?stdid=<?php echo $result['studentId'] ?>">
                        <?php echo $result['studentName'] ?></a>
                </td>
                <td><?php echo $result['studentCity'] ?></td>
                <td><?php echo $result['studentAddres'] ?></td>
                <td><?php echo $result['studentSchool'] ?></td>
                <td><?php echo $result['catName'] ?></td>
                <td><?php echo $result['specialtiesName'] ?></td>
                <td>
                    <?php
              if ($result["studentType"] == 0) {
                  echo 'صباحي';
              } else {
                  echo 'مسائي';
              } ?>
                </td>
                <td><img class="img-thumbnail" src="<?php echo $result['image']; ?>" height="40px" width="60"></td>
                <td>
                    <a class="btn btn-primary" href="studentedit.php?stdid=<?php echo $result['studentId'] ?>">تعديل</a>
                    <a class="btn btn-danger" onclick="return confirm('Delete This Student')"
                        href="?delstud=<?php echo $result['studentId']; ?>">حذف</a>
                </td>
            </tr>
            <?php
        }
    }else{
        echo '<div class="alert alert-danger mt-3" role="alert">يبدوا بحثت خطا قسم وتخص مطابق</div>';
    } ?>
        </tbody>
    </table>




    <?php
}else{
    $st = new Student(); ?>

    <?php
   

    if (isset($_GET['delstud'])) {
        $id = $_GET['delstud'];
        $delst = $st->delstuByID($id);
    } ?>

    <?php
   
   if (isset($delst)) {
       echo $delst;
   } ?>

    <table class="table table-dark table-striped mt-5">
        <thead>
            <tr>
                <th scope="col">رقم ألطلاب</th>
                <th scope="col">أسماء ألطلاب </th>
                <th scope="col">أسم ألمدينه</th>
                <th scope="col">عنوان</th>
                <th scope="col">أسم المدرسه</th>
                <th scope="col">قسم </th>
                <th scope="col">تخصص</th>
                <th scope="col">نوع دراسه</th>
                <th scope="col"> صور</th>
                <th scope="col">تعديل او مسح</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $getst = $st->getAllStudent();
    $i=0;
    if ($getst) {
        while ($result = $getst->fetch_assoc()) {
            $i++; ?>
            <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td>
                    <a href="studentprofile.php?stdid=<?php echo $result['studentId'] ?>">
                        <?php echo $result['studentName'] ?></a>
                </td>
                <td><?php echo $result['studentCity'] ?></td>
                <td><?php echo $result['studentAddres'] ?></td>
                <td><?php echo $result['studentSchool'] ?></td>
                <td><?php echo $result['catName'] ?></td>
                <td><?php echo $result['specialtiesName'] ?></td>
                <td>
                    <?php
              if ($result["studentType"] == 0) {
                  echo 'صباحي';
              } else {
                  echo 'مسائي';
              } ?>
                </td>
                <td><img class="img-thumbnail" src="<?php echo $result['image']; ?>" height="40px" width="60"></td>
                <td>
                    <a class="btn btn-primary" href="studentedit.php?stdid=<?php echo $result['studentId'] ?>">تعديل</a>
                    <a class="btn btn-danger" onclick="return confirm('Delete This Student')"
                        href="?delstud=<?php echo $result['studentId']; ?>">حذف</a>
                </td>
            </tr>
            <?php
        }
    } ?>
        </tbody>
    </table>




</div>

<?php
} ?>



<?php include 'inc/footer.php'; ?>
