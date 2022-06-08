<?php include 'inc/header.php'; ?>
<?php include_once '../classes/Category.php'; ?>
<?php include_once '../classes/Student.php'; ?>
<?php include_once '../classes/filter.php'; ?>

<?php
   
  $fl = new Filter();
   
?>

<div class="container">
    <input type="text" class="form-control mt-5" placeholder="أبحث" id="search" name="search">
</div>
<table class="table table-dark table-striped mt-5" id='table'>
    <thead>
        <tr>
            <th scope="col">رقم ألطلاب</th>
            <th scope="col">أسماء ألطلاب </th>
            <th scope="col">أسم ألمدينه</th>
            <th scope="col">عنوان</th>
            <th scope="col">أسم المدرسه</th>
            <th scope="col">تاريخ الحضور</th>
            <th scope="col">سجل الحضور</th>
            <th scope="col">قسم </th>
            <th scope="col">تخصص</th>
            <th scope="col">نوع دراسه</th>
            <th scope="col"> صور</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $getst = $fl->getAllStudentNote();
        $i=0;
        if($getst){
        while ($result = $getst->fetch_assoc()) {
               $i++;
        ?>
        <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td>
                <a href="studentprofile.php?stdid=<?php echo $result['studentId'] ?>">
                    <?php echo $result['studentName'] ?></a>
            </td>
            <td><?php echo $result['studentCity'] ?></td>
            <td><?php echo $result['studentAddres'] ?></td>
            <td><?php echo $result['studentSchool'] ?></td>
            <td><?php echo $result['studentnoteDate'] ?></td>
            <td>
                <?php 
                  if($result['studentNote'] == 0){
                      echo 'حاضر';
                  }else{
                      echo 'غائب';
                  }
                ?>
            </td>
            <td><?php echo $result['catName'] ?></td>
            <td><?php echo $result['specialtiesName'] ?></td>
            <td>
                <?php
              if($result["studentType"] == 0){
                echo 'صباحي';
             }else{
                echo 'مسائي';
        }  
        ?>
            </td>
            <td><img class="img-thumbnail" src="<?php echo $result['image']; ?>" height="40px" width="60"></td>

        </tr>
        <?php 
}} ?>
    </tbody>
</table>

<?php include 'inc/footer.php'; ?>
<script>
<?php include 'js/ٍsearch.js'; ?>
</script>
