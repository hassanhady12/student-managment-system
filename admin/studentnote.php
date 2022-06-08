<?php include 'inc/header.php'; ?>
<?php include_once '../classes/Category.php'; ?>
<?php include_once '../classes/Student.php'; ?>
<?php include_once '../classes/filter.php'; ?>

<?php
   
    $st = new Student();
    $fl = new Filter();
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
   
    $insertNote  = $fl->studentInsertNote($_POST);
}
   
?>


<div class="container">
    <input type="text" class="form-control mt-5" placeholder="أبحث" id="search" name="search">
</div>
<table class="table table-dark table-striped mt-5" id='table'>
    <?php 
      
      if(isset($insertNote)){
          echo $insertNote;
      }

    ?>
    <thead>
        <tr>
            <th scope="col">رقم ألطلاب</th>
            <th scope="col">أسماء ألطلاب </th>
            <th scope="col"> تاريخ </th>
            <th scope="col"> سجل الحضور </th>
            <th scope="col"> صور</th>
            <th scope="col"> حفظ </th>
        </tr>
    </thead>
    <tbody>
        <?php
        $getst = $st->getAllStudent();
        $i=0;
        if($getst){
        while ($result = $getst->fetch_assoc()) {
               $i++;
        ?>
        <form action="" method="post">
            <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td>
                    <input type="text" name="studentName" class="form-control float-end"
                        value="<?php echo $result['studentName'] ?>">
                </td>

                <td>
                    <input type="date" name="studentDate" class="form-control float-end"
                        value="<?php echo date('Y-m-d'); ?>">
                </td>

                <td>
                    <select class="form-control float-end" name="studentNote">
                        <option value="0">حاضر</option>
                        <option value="1">غائب</option>
                    </select>
                </td>
                <td><img class="img-thumbnail" src="<?php echo $result['image']; ?>" height="40px" width="60"></td>
                <td>
                    <input class="btn btn-primary" type="submit" name="submit" value="حفظ">
                </td>
            </tr>
        </form>
        <?php 
}} ?>
    </tbody>
</table>

<?php include 'inc/footer.php'; ?>
<script>
<?php include 'js/ٍsearch.js'; ?>
</script>
