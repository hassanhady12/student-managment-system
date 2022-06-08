<?php

include_once '../lib/Database.php';
include_once '../helpers/format.php';
?>

<?php

class Category{

    private $db;
    private $fm;

    public function __construct()
    {
     $this->db = new Database();
     $this->fm = new Format();
    }

    public function catInsert($catName){
    
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link,$catName);
        if(empty($catName)){
            $catName = "must Not be empty";
            return $catName;
        }else{
            
            $query  = "INSERT INTO tbl_category(catName) VALUES ('$catName')";
            $catinsert =  $this->db->insert($query);
            if($catinsert){
                $msg = "<span class='seccess'>add Category</span>";
                return $msg;
            }else{
                $msg = "<span class='error'>Category not insert</span>";
                return $msg;
            }
        }

    }

    public function getAllCat(){
        $query   = 'SELECT * FROM tbl_category ORDER BY catId DESC';
        $catlist = $this->db->select($query);
        return $catlist;
    }
    
    public function countCategory(){
        $query  = "SELECT * FROM tbl_category ";
        $result = $this->db->count($query);
        return $result;
    }

    public function getCatById($id){
        $query   = "SELECT * FROM tbl_category WHERE catId='$id'";
        $catlist = $this->db->select($query);
        return $catlist;

    }

      public function catUpdate($catName, $id){
          $catName = $this->fm->validation($catName);
          $catName = mysqli_real_escape_string($this->db->link, $catName);
          $id      = mysqli_real_escape_string($this->db->link, $id);
          if (empty($catName)) {
              $catName = "must Not be empty";
              return $catName;
          }else{
               $query   = "UPDATE tbl_category 
                           SET    catName = '$catName'
                           WhERE  catId   = '$id'";
               $update_row = $this->db->update($query);
               if($update_row){
                   $msg = "<span class='seccess'>update Category</span>";
                   return $msg;
               }else{
                  $msg = "<span class='error'>Category not update</span>";
                  return $msg;
               }
          }
      }

    public function delCatByID($id){
        $query = "DELETE FROM tbl_category WHERE catId='$id'";
        $deldata = $this->db->delete($query);
        if($deldata){
              $msg = "<span class='seccess'>delete Category</span>";
              return $msg;
        }else{
            $msg = "<span class='error'>Category not delete</span>";
            return $msg;
        }
    }
}

?>
