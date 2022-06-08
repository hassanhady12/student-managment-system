<?php include 'inc/header.php'; ?>
<?php include '../classes/Category.php'; ?>


<?php

  if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
      echo '<script>window.location="catlist.php";</script>';
  }else{
      $id = $_GET['catid'];
  }
 
?>

<?php 

 $cat = new Category();
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $catName = $_POST['catName'];
    

    $updateCat  = $cat->catUpdate($catName, $id);
}

?>

<div class="container">
    <div class="col-md-4 offset-md-4">
        <div class="singup-form">
            <?php
            $getcat = $cat->getCatById($id);
            if ($getcat) {
                while ($result = $getcat->fetch_assoc()) {
                    ?>
            <form action="" method="post" class="mt-5 border p-4 bg-light shadow">
                <?php
                if (isset($updateCat)) {
                    echo $updateCat;
                } ?>
                <h3 class="col-md-8">أجراء تعديل</h3>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="float-end" for="">أدخل تعديل</label>
                        <input type="text" class="form-control float-end" name="catName"
                            value="<?php echo $result['catName'] ?>">
                        <input class=" mt-3 float-end btn btn-primary" type="submit" value="تعديل">
                    </div>
                </div>
            </form>
            <?php
                }
            } ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
