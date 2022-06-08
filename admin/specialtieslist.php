<?php include 'inc/header.php'; ?>
<?php include '../classes/Specialties.php'; ?>


<?php
   
    $cat = new Specialties();
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $delCat = $cat->delCatByID($id);
      
    }
 
?>
<div class="container">
    <input type="text" class="form-control mt-5" placeholder="أبحث" id="search" name="search">
</div>

<table class="table table-dark table-striped mt-5" id="table">
    <thead>
        <tr>
            <th scope="col">رقم ألتخصصات</th>
            <th scope="col">أسم التخصص</th>
            <th scope="col">تعديل او مسح</th>
        </tr>
    </thead>
    <?php

    if(isset($delCat)){
        echo $delCat;
    }

  ?>

    <tbody>
        <?php
    $getSpecialtieslist = $cat->getAllSpecialties();
    	if($getSpecialtieslist){

		$i = 0;

        while ($result = $getSpecialtieslist->fetch_assoc()) {
               $i++; 
    ?>
        <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $result['specialtiesName'] ?></td>
            <td>
                <a class="btn btn-primary"
                    href="specialtiesedit.php?specialtiesid=<?php echo $result['specialtiesId']; ?>">تعديل</a>

                <a class="btn btn-danger" onclick="return confirm('Delete This Specialties')"
                    href="?delete=<?php echo $result['specialtiesId']; ?>">Delete</a>
            </td>
        </tr>
        <?php 
}} ?>
    </tbody>
</table>

<?php include 'inc/footer.php'; ?>
<script>
<?php include 'js/ٍsearch.js'; ?>
</script>
