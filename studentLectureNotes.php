<?php
session_start();
require "connection.php";
if (isset($_SESSION["us"])) {
    if ($_SESSION["us"]["payment_status_id"] == "3") {
?>
        <script>
            window.location = "studentsPaymentArea.php";
        </script>
    <?php
    }
    ?>




    <!DOCTYPE html>

    <html>

    <head>
        <title>CJ Academy | Student Area</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="row r1">
                        <div class="col-12">
                            <h1 class="text-black-50 fw-bold f1 text-center mt-5">CJ Accademy</h1>
                            <h3 class="text-black-50 fst-itali text-center mb-5">Student Area | Lecture Notes </h3>
                        </div>
                    </div>

                    <div class="row div4">

                        <div class="col-12 col-lg-2 px-5  mb-3 mb-md-0 resize1">
                            <div class="row d-grid rbutton">
                                <button class="btn btn-success my-2" onclick="gotoStudentArea();">My Profle</button>
                            </div>

                            <div class="row d-grid rbutton">
                                <button class="btn btn-danger my-2" onclick="signout();">Sign Out</button>
                            </div>


                        </div>



                        <div class="col-lg-8 col-12 rpanalbody border border-5 ">


                            <div class="row pe-lg-5 ">

                                <!--  nav bar -->
                                <div class="col-12 col-lg-4">
                                    <div class="row">

                                        <div class="nav flex-column nav-pills me-3 mt-3 " role="tablist" aria-orientation="vertical">
                                            <nav class="nav flex-column ">

                                                <nav class="nav nav-pills nav-fill px-2">
                                                    <a class="nav-link link-danger active bg-warning" aria-current="page" href="teacherRegistation.php">Lecture Notes </a>

                                                </nav>

                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-8"></div>
                                <!--  /nav bar -->

                                <!--  details   -->
                                <div class="col-12  offset-lg-1 col-lg-10 mt-5">
                                    <div class="row">
                                        <table class="table">
                                            <thead class="table-dark">
                                                <td>Assignment_id</td>
                                                <td>Subject</td>
                                                <td>topic</td>
                                                <td>PDF</td>


                                            </thead>
                                            <tbody>
                                                <?php
                                                $rs = Database::search("SELECT lecture_notes.id AS lsid, subjects.name AS lname,lecture_notes.topic, lecture_notes.pdf FROM `lecture_notes` INNER JOIN `subjects` ON `subjects`.`id` = `lecture_notes`.`subjects_id` WHERE `grade`='" . $_SESSION["us"]["grade"] . "'; ");
                                                $n = $rs->num_rows;
                                                if ($n >= 1) {


                                                    for ($i = 0; $i < $n; $i++) {
                                                        $d = $rs->fetch_assoc();
                                                ?>

                                                        <tr>
                                                            <td><?php echo $d["lsid"] ?></td>
                                                            <td><?php echo $d["lname"] ?></td>
                                                            <td><?php echo $d["topic"] ?></td>
                                                            <td><a class="link-danger" href="<?php echo $d['pdf'] ?>">
                                                                    <div class="col-10 offset-1">
                                                                        <div class="row d-grid">
                                                                            <lable for="pdfuploader" class="btn btn-danger">Download</lable>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </td>


                                                        </tr>

                                                <?php
                                                    }
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                        <!-- /details  -->
                                    </div>
                                </div>



                            </div>
                        </div>

                        <div class="col-12 col-lg-2 px-5 mt-md-5 mt-3" style="margin-bottom: 35px;">

                            <div class="row d-grid rbutton">
                                <button class="btn btn-primary my-2 " onclick="gotoStudentAssignments();">Assignments</button>
                            </div>


                            <div class="row d-grid rbutton1">
                                <button class="btn btn-warning my-2 disabled">Lecture Notes</button>
                            </div>


                            <div class="row d-grid rbutton">
                                <button class="btn btn-danger my-2" onclick="gotoPaymentArea();">Payment</button>
                            </div>


                        </div>


                    </div>


                </div>
            </div>
        </div>

        <script src="script.js"></script>
    </body>

    </html>

<?php

} else {
?>

    <script>
        window.location = "index.php";
    </script>
<?php
}