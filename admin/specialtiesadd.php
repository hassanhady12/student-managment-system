<?php include 'inc/header.php';  ?>

<?php include '../classes/Specialties.php'; ?>

<?php

 $cat = new Specialties();
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $SpecialtiesName = $_POST['specialtiesName'];
    

    $insertSpecialties  = $cat->specialtiesInsert($SpecialtiesName);
}
?>

<div class="container">
    <div class="col-md-4 offset-md-4">
        <div class="singup-form">
            <form action="" method="post" class="mt-5 border p-4 bg-light shadow">
                <h3 class="col-md-8">أضف أختصاص جديد</h3>
                <?php
                if(isset($insertSpecialties)){
                    echo $insertSpecialties;
                }
                ?>
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="float-end" for="">أدخل هنا</label>
                        <input type="text" class="form-control float-end" name="specialtiesName">
                        <input class=" mt-3 float-end btn btn-primary" type="submit" value="أضف جديد">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include 'inc/footer.php';  ?>
