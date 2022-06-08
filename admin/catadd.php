<?php include 'inc/header.php';  ?>

<?php include '../classes/Category.php'; ?>

<?php

 $cat = new Category();
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $catName = $_POST['catName'];
    

    $insertCat  = $cat->catInsert($catName);
}
?>

<div class="container">
    <div class="col-md-4 offset-md-4">
        <div class="singup-form">
            <form action="" method="post" class="mt-5 border p-4 bg-light shadow">
                <h3 class="col-md-8">أضف قسم جديد</h3>
                <?php
                if(isset($insertCat)){
                    echo $insertCat;
                }
                ?>
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="float-end" for="">أدخل هنا</label>
                        <input type="text" class="form-control float-end" name="catName">
                        <input class=" mt-3 float-end btn btn-primary" type="submit" value="أضف جديد">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>





<?php include 'inc/footer.php';  ?>
