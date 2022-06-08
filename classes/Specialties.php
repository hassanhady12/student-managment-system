<?php

include_once '../lib/Database.php';
include_once '../helpers/format.php';
?>

<?php

class Specialties
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function specialtiesInsert($SpecialtiesName)
    {
        $SpecialtiesName = $this->fm->validation($SpecialtiesName);
        $SpecialtiesName = mysqli_real_escape_string($this->db->link, $SpecialtiesName);
        if (empty($SpecialtiesName)) {
            $msg = "must Not be empty";
            return $msg;
        } else {
            $query  = "INSERT INTO tbl_specialties(specialtiesName) VALUES ('$SpecialtiesName')";
            $SpecialtiesName =  $this->db->insert($query);
            if ($SpecialtiesName) {
                $msg = "<span class='seccess'>add SpecialtiesName</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>SpecialtiesName not insert</span>";
                return $msg;
            }
        }
    }

        public function getAllSpecialties(){
        $query   = 'SELECT * FROM tbl_Specialties ORDER BY specialtiesId DESC';
        $specialtieslist = $this->db->select($query);
        return $specialtieslist;
    }
    public function countspec(){
        $query  = "SELECT * FROM tbl_specialties ";
        $result = $this->db->count($query);
        return $result;
    }

        public function getSpecialtiesById($id){
        $query   = "SELECT * FROM tbl_Specialties WHERE specialtiesId='$id'";
        $specialtieslist = $this->db->select($query);
        return $specialtieslist;

    }

      public function specialtiesUpdate($specialtiesName, $id){
          $specialtiesName = $this->fm->validation($specialtiesName);
          $specialtiesName = mysqli_real_escape_string($this->db->link, $specialtiesName);
          $id      = mysqli_real_escape_string($this->db->link, $id);
          if (empty($specialtiesName)) {
              $msg = "must Not be empty";
              return $msg;
          }else{
               $query   = "UPDATE tbl_Specialties 
                           SET    specialtiesName = '$specialtiesName'
                           WhERE  specialtiesId   = '$id'";
               $update_row = $this->db->update($query);
               if($update_row){
                   $msg = "<span class='seccess'>update specialtiesName</span>";
                   return $msg;
               }else{
                  $msg = "<span class='error'>Category not specialtiesName</span>";
                  return $msg;
               }
          }
      }

     public function delCatByID($id){
        $query = "DELETE FROM tbl_Specialties WHERE specialtiesId='$id'";
        $deldata = $this->db->delete($query);
        if($deldata){
              $msg = "<span class='seccess'>delete specialties</span>";
              return $msg;
        }else{
            $msg = "<span class='error'>specialties not delete</span>";
            return $msg;
        }
    }


}
