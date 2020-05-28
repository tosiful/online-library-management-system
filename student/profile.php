<?php

require_once 'header.php';


$result=mysqli_query($con,"SELECT * FROM `students`");
$row=mysqli_fetch_assoc($result );


$id=$_SESSION['student_login'];


$student_info=mysqli_query($con,"SELECT * FROM `students`WHERE  `email`='$id'");
$student_info_row=mysqli_fetch_assoc($student_info);



?>
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Profile</a></li>

        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInLeft">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive ">

                    <div class="col-md-12">
                        <form class="form-horizontal" method="post">
                            <div class="form-group">
                                <label for="email2" class="col-sm-2 control-label">First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?=$student_info_row['fname'] ?>" >
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="email2" class="col-sm-2 control-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="lname" placeholder="Last Name"  value="<?=$student_info_row['lname'] ?>">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="email2" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" placeholder="Email"   value="<?=$student_info_row['email'] ?>">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="email2" class="col-sm-2 control-label">Roll</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="roll" placeholder="Roll" pattern="[0-9]{6}"  value="<?=$student_info_row['roll'] ?>">
                                </div>
                            </div>




                            <div class="form-group">
                                <label for="email2" class="col-sm-2 control-label">Reg</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="reg" placeholder="Reg No" pattern="[0-9]{6}"  value="<?=$student_info_row['reg']  ?>">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="email2" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" placeholder="User Name" value="<?= $student_info_row['username'] ?>" >
                                </div>
                            </div>

                            <div  class="form-group col-md-8">
                                <a href="profile_update.php?id= <?=$_SESSION['id']?>" class="btn btn-primary btn-block">EDIT</a>
                            </div>




                        </form>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php

require_once 'footer.php';



?>

