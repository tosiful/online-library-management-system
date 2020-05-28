<?php

require_once 'header.php';




?>
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>All issue books</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Book issue date</th>


                        </tr>
                        </thead>

                        <tbody>


                        <?php


                       $student=   $_SESSION['id'];
                        $result=mysqli_query($con,"SELECT  `issue_books`.`book_issue_date`, `books`.`book_name`FROM `books`
INNER JOIN `issue_books` ON `issue_books`.`book_id`=`books`.`id`
WHERE `issue_books`.`student_id`='$student'");

                        while ($row=mysqli_fetch_assoc($result)){



                            ?>

                            <tr>

                                <td><?=$row['book_name'] ?></td>
                                <td><?=date('d-m-Y',strtotime($row['book_issue_date'])) ?></td>



                            </tr>

                        <?php

                        }

                       ?>



                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<?php

require_once 'footer.php';



?>

