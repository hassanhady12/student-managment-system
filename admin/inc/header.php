<?php
include '../lib/Session.php';
Session::checkSeeion();
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="./css/style.css">
        <title>Admin Dashboard</title>
    </head>

    <body>


        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#"> <?php echo Session::get('adminName'); ?> مرحبا بك </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <?php
                        if(isset($_GET['action']) && $_GET['action'] == 'logout'){
                          Session::destroy();
                        }
                        ?>
                            <a class="nav-link active btn btn-danger" aria-current="page" href="?action=logout">تسجيل
                                خروج</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="adminpanel.php">لوحه
                                تحكم</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                ألاقسام
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="catadd.php">أضافه قسم</a></li>
                                <li><a class="dropdown-item" href="catlist.php">عرض الاقسام</a></li>
                            </ul>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                ألتخصصات
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="specialtiesadd.php">أضافه تخصص</a></li>
                                <li><a class="dropdown-item" href="specialtieslist.php">عرض ألتخصصات</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                ألطلاب
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="studentadd.php">أضافه طالب</a></li>
                                <li><a class="dropdown-item" href="studentlist.php">عرض ألطلاب</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                فلتره
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="filter.php">فلتره حسب القسم والتخصص</a></li>
                                <li><a class="dropdown-item" href="studentnote.php">سجل الحضور </a></li>
                                <li><a class="dropdown-item" href="studentnotelist.php"> عرض سجل الحضور </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
