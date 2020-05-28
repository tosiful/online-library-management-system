<?php

require_once 'header.php';


if(isset($_POST['issue_book'])){

$student_id=$_POST['student_id'];
$book_id=$_POST['book_id'];
$book_issue_date=$_POST['book_issue_date'];


 $result=mysqli_query($con,"INSERT INTO `issue_books`(`student_id`, `book_id`, `book_issue_date`) VALUES ('$student_id','$book_id','$book_issue_date')");

 if($result){

     ?>
     <script type="text/javascript">

         alert("Book issue successfully!")
         javascript:history.go(-1);



     </script>

     <?php


 }else{

     ?>
     <script type="text/javascript">

         alert("Book  not issued !")


     </script>

     <?php

 }


}



?>
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                <li></i><a href="javascript:avoid(0)">Issue book</a></li>

            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInDown">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-inline" method="post" action="">
                                <div class="form-group">


                                                  <select class="from-control" name="std_id">
                                                      <option value=" ">Selected </option>


                                                        <?php

                                                        $result=mysqli_query($con,"SELECT * FROM `students` WHERE `status`='1'");
                                                        while ($row=mysqli_fetch_assoc($result )) {
                                                            ?>

                                                            <option value="<?= $row['id'] ?> "><?= $row['fname'].$row['lname'].' -'. ' ('.$row['roll'].')' ?> </option>


                                                            <?php

                                                        }?>



                                                  </select>

                                                  </div>

                                <div class="form-group">
                                    <button type="submit" name="search"  class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>

             <?php
             if(isset($_POST['search'])){
/*amra id dore data db theke tole niye asbo*/

              $id=$_POST['std_id'];


                 $result=mysqli_query($con,"SELECT * FROM `students` WHERE  `id`='$id' AND `status`='1' ");
                 $row=mysqli_fetch_assoc($result);


                 ?>
                 <div class="panel">
                     <div class="panel-content">
                         <div class="row">
                             <div class="col-md-12">
                                 <form method="post" action="">
                                     <div class="form-group">
                                         <label for="name">Student Name</label>
                                         <input type="name" class="form-control" id="name" value="<?= ucwords($row['fname'].' '. $row['lname']) ?>"  readonly >
                                         <input type="hidden" value="<?=$row['id']  ?>" name="student_id">
                                     </div>
<div class="form-group">
    <label >Book name</label>

    <select class="from-control" name="book_id">
        <option value=" ">Selected </option>


        <?php

        $result=mysqli_query($con,"SELECT * FROM `books` WHERE `available_qty` >0");
        while ($row=mysqli_fetch_assoc($result )) {
            ?>

            <option value="<?= $row['id'] ?> "><?= $row['book_name'] ?> </option>


            <?php

        }?>



    </select>




</div>

                                     <div class="form-group">
                                         <label>Book Issue Date</label>
                                         <input class="form-control" type="text"name="book_issue_date" value="<?=date('d-m-Y')?>" readonly>


                                     </div>




                                     <div class="form-group">
                                         <button type="submit" name="issue_book"  class="btn btn-primary">Save issue book</button>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
                 <?php



             } ?>
                </div>
            </div>


        </div>
    </div>



<?php

require_once 'footer.php';



?>