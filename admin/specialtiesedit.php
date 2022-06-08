<?php include 'inc/header.php'; ?>
<?php include '../classes/Specialties.php'; ?>


<?php

  if(!isset($_GET['specialtiesid']) || $_GET['specialtiesid'] == NULL){
      echo '<script>window.location="catlist.php";</script>';
  }else{
      $id = $_GET['specialtiesid'];
  }
 
?>

<?php 

 $cat = new Specialties();
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $specialtiesName = $_POST['specialtiesName'];
    

    $Specialtiesupdate  = $cat->specialtiesUpdate($specialtiesName, $id);
}

?>

<div class="container">
    <div class="col-md-4 offset-md-4">
        <div class="singup-form">
            <?php

        $getspecialties = $cat->getSpecialtiesById($id);
        if($getspecialties){
            while($result = $getspecialties->fetch_assoc()){

        ?>
            <form action="" method="post" class="mt-5 border p-4 bg-light shadow">
                <?php
                if (isset($Specialtiesupdate)) {
                    echo $Specialtiesupdate;
                } ?>
                <h3 class="col-md-8">أجراء تعديل</h3>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="float-end" for="">أدخل تعديل</label>
                        <input type="text" class="form-control float-end" name="specialtiesName"
                            value="<?php echo $result['specialtiesName'] ?>">
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
