<?php include 'inc/header.php'; ?>
<?php include '../classes/Category.php'; ?>


<?php
   
    $cat = new Category();
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $delCat = $cat->delCatByID($id);
      
    }
 
?>
<?php

    if(isset($delCat)){
        echo $delCat;
    }

  ?>
<div class="container">
    <input type="text" class="form-control mt-5" placeholder="أبحث" id="search" name="search">
</div>

<table class="table table-dark table-striped mt-5" id='table'>
    <thead>
        <tr>
            <th scope="col">رقم القسم</th>
            <th scope="col">أسم القسم</th>
            <th scope="col">تعديل او مسح</th>
        </tr>
    </thead>
    <tbody>
        <?php
    $getCat = $cat->getAllCat();
    	if($getCat){

		$i = 0;

        while ($result = $getCat->fetch_assoc()) {
               $i++; 
    ?>
        <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $result['catName'] ?></td>
            <td>
                <a class="btn btn-primary" href="catedit.php?catid=<?php echo $result['catId']; ?>">تعديل</a>

                <a class="btn btn-danger" onclick="return confirm('Delete This Category')"
                    href="?delete=<?php echo $result['catId']; ?>">حذف</a>
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
