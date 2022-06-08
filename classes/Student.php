<?php

include_once '../lib/Database.php';
include_once '../helpers/format.php';
?>

<?php

class Student
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function studentInsert($data, $file)
    {
        $studentName     = mysqli_real_escape_string($this->db->link, $data['studentName']);
        $studentCity     = mysqli_real_escape_string($this->db->link, $data['studentCity']);
        $studentAddres   = mysqli_real_escape_string($this->db->link, $data['studentAddres']);
        $studentSchool   = mysqli_real_escape_string($this->db->link, $data['studentSchool']);
        $studentEmail    = mysqli_real_escape_string($this->db->link, $data['studentEmail']);
        $studentPassword = mysqli_real_escape_string($this->db->link, $data['studentPassword']);
        $studentData     = mysqli_real_escape_string($this->db->link, $data['studentData']);
        $catid           = mysqli_real_escape_string($this->db->link, $data['catId']);
        $specialtiesId   = mysqli_real_escape_string($this->db->link, $data['specialtiesId']);
        $studentType     = mysqli_real_escape_string($this->db->link, $data['studentType']);

        $permited   = array('jpg', 'png', 'jpeg', 'gif');
        $file_name  = $file['image']['name'];
        $file_size  = $file['image']['size'];
        $file_temp  = $file['image']['tmp_name'];

        $div            = explode('.', $file_name);
        $file_ext       = strtolower(end($div));
        $uniqe_image    = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$uniqe_image;

        if ($studentName == "" || $studentCity == "" || $studentAddres == "" || $studentSchool == "" || $catid == "" || $specialtiesId == "" || $studentType == "" || $studentEmail == "" || $studentPassword == "" ) {
            $msg = "<span class='error'>Student not empte</span>";
            return $msg;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query  = "INSERT INTO tbl_student(studentName, studentCity, studentAddres, studentSchool, catId, specialtiesId,
               studentType, image,studentEmail,studentPassword,studentData) VALUES ('$studentName','$studentCity','$studentAddres','$studentSchool','$catid','$specialtiesId','$studentType','$uploaded_image','$studentEmail','$studentPassword','$studentData')";
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

    public function getAllStudent()
    {
        $query  = 'SELECT tbl_student.*, tbl_category.catName, tbl_specialties.specialtiesName
                   FROM tbl_student
                   INNER JOIN tbl_category
                   ON tbl_student.catId = tbl_category.catId
                   INNER JOIN tbl_specialties
                   ON tbl_student.specialtiesId = tbl_specialties.specialtiesId
                   ORDER BY tbl_student.studentId DESC';
        $result = $this->db->select($query);
        return $result;
    }  
    
    public function countStudent()
    {
        $query  = "SELECT * FROM tbl_student ";
        $result = $this->db->count($query);
        return $result;
    }

    public function getstudById($id)
    {
        $query  = "SELECT * FROM tbl_student WHERE studentId = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function studentUpdate($data, $file, $id)
    {
        $studentName     = mysqli_real_escape_string($this->db->link, $data['studentName']);
        $studentCity     = mysqli_real_escape_string($this->db->link, $data['studentCity']);
        $studentAddres   = mysqli_real_escape_string($this->db->link, $data['studentAddres']);
        $studentSchool   = mysqli_real_escape_string($this->db->link, $data['studentSchool']);
        $studentEmail    = mysqli_real_escape_string($this->db->link, $data['studentEmail']);
        $studentPassword = mysqli_real_escape_string($this->db->link, $data['studentPassword']);
        $studentData     = mysqli_real_escape_string($this->db->link, $data['studentData']);
        $catid           = mysqli_real_escape_string($this->db->link, $data['catId']);
        $specialtiesId   = mysqli_real_escape_string($this->db->link, $data['specialtiesId']);
        $studentType     = mysqli_real_escape_string($this->db->link, $data['studentType']);

        $permited   = array('jpg', 'png', 'jpeg', 'gif');
        $file_name  = $file['image']['name'];
        $file_size  = $file['image']['size'];
        $file_temp  = $file['image']['tmp_name'];

        $div            = explode('.', $file_name);
        $file_ext       = strtolower(end($div));
        $uniqe_image    = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$uniqe_image;

        if ($studentName == "" || $studentCity == "" || $studentAddres == "" || $studentSchool == "" || $catid == "" || $specialtiesId == "" || $studentType == "") {
            $msg = "<span class='error'>Student not empte</span>";
            return $msg;
        } else {
            if (!empty($file_name)) {
            if ($file_size > 1054589) {
                    echo "<span class='error'>size img not valied</span>";
                } elseif (in_array($file_ext, $permited) == false) {
                    echo "<span>type img not valied". implode(',', $permited)."</span>";
                } else {
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE tbl_student 
                              SET    
                              studentName    = '$studentName',
                              studentCity    = '$studentCity',
                              studentAddres  = '$studentAddres',
                              studentSchool  = '$studentSchool',
                              studentEmail   = '$studentEmail',
                             studentPassword = '$studentPassword',
                             studentData     = '$studentData',
                              catid          = '$catid',
                              specialtiesId  = '$specialtiesId',
                              studentType    = '$studentType',
                              image          = '$uploaded_image',
                              WHERE studentId = '$id'
                              ";
                    
                    $update_row =  $this->db->update($query);
                    if ($update_row) {
                        $msg = "<span class='seccess'> update Student</span>";
                        return $msg;
                    } else {
                        $msg = "<span class='error'>Student not update</span>";
                        return $msg;
                    }
                }
            }else{
                 $query = "UPDATE tbl_student 
                              SET    
                              studentName    = '$studentName',
                              studentCity    = '$studentCity',
                              studentAddres  = '$studentAddres',
                              studentSchool  = '$studentSchool',
                              studentEmail   = '$studentEmail',
                           studentPassword   = '$studentPassword',
                           studentData       = '$studentData',
                              catid          = '$catid',
                              specialtiesId  = '$specialtiesId',
                              studentType    = '$studentType'
                              WHERE studentId = '$id'
                              ";
                    
                    $update_row =  $this->db->update($query);
                    if ($update_row) {
                        $msg = "<span class='seccess'> update Student</span>";
                        return $msg;
                    } else {
                        $msg = "<span class='error'>Student not update</span>";
                        return $msg;
                    }
            }
        }
    }

    public function delstuByID($id){
        $query = "SELECT * FROM tbl_student WHERE studentId = '$id' ";
        $getData = $this->db->select($query);
        if($getData){
            while($delImg = $getData->fetch_assoc() ){
             
                $delLink = $delImg['image'];
                unlink($delLink);
             }
        }

        $delquery = "DELETE FROM tbl_student WHERE studentId = '$id' ";
        $deldata = $this->db->delete($delquery);
        if($deldata){
              $msg = "<span class='seccess'>delete Student</span>";
              return $msg;
        }else{
            $msg = "<span class='error'>Category not Student</span>";
            return $msg;
        }
    }
}
