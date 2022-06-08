<?php

include_once '../lib/Database.php';
include_once '../helpers/format.php';
?>

<?php

class Filter
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }



    public function getAllStudent($cat,$spe)
    {
        $query  = "SELECT tbl_student.*, tbl_category.catName, tbl_specialties.specialtiesName
                   FROM tbl_student
                   INNER JOIN tbl_category
                   ON tbl_student.catId = tbl_category.catId
                   INNER JOIN tbl_specialties
                   ON tbl_student.specialtiesId = tbl_specialties.specialtiesId 
                   WHERE tbl_student.catId = '$cat' AND tbl_student.specialtiesId ='$spe'
                   ORDER BY tbl_student.studentId DESC";
        $result = $this->db->select($query);
        return $result;
    } 
    
    
        public function getAllStudentNote()
    {
        $query  = 'SELECT tbl_student.*, tbl_category.catName, tbl_specialties.specialtiesName,tbl_note.studentNote,tbl_note.studentnoteDate
                   FROM tbl_student
                   INNER JOIN tbl_category
                   ON tbl_student.catId = tbl_category.catId
                   INNER JOIN tbl_specialties
                   ON tbl_student.specialtiesId = tbl_specialties.specialtiesId
                   INNER JOIN tbl_note
                   ON tbl_student.studentName = tbl_note.studentnoteName
                   ORDER BY tbl_note.studentnoteId  DESC';
        $result = $this->db->select($query);
        return $result;
    }  



    

    public function studentInsertNote($data)
    {
        $studentName     = mysqli_real_escape_string($this->db->link, $data['studentName']);
        $studentDate     = mysqli_real_escape_string($this->db->link, $data['studentDate']);
        $studentNote     = mysqli_real_escape_string($this->db->link, $data['studentNote']);

        if($studentName == "" || $studentDate == "" || $studentNote == ""){
            $msg = "<span class='error'>Student not empte</span>";
            return $msg;
        } else {
   
            $query  = "INSERT INTO tbl_note (studentnoteName,studentnoteDate,studentNote) VALUES('$studentName','$studentDate','$studentNote') ";
            $studentInsert =  $this->db->insert($query);
            if ($studentInsert) {
                $msg = "<span class='seccess'>add Student</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Student not insert</span>";
                return $msg;
            }
        
    }

    }  




}
