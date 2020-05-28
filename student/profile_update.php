<?php

require_once 'header.php';


#id ta view page theke anlam
if(isset($_GET['id'])){

    $id=$_GET['id'];
    #db theke data tole niye asa
    $result=  mysqli_query($con,"SELECT * FROM `students` WHERE `id`='$id'");
    $tim=mysqli_fetch_assoc($result);



}









if(isset($_POST['id'])){





    $id = $_POST['id'];

    $fname = $_POST['fname'];

    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $roll = $_POST['roll'];
    $reg = $_POST['reg'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];



    $result= mysqli_query($con,"UPDATE `students` SET `fname`='$fname',`lname`='$lname',`roll`='$roll',`reg`='$reg',`email`='$email',`username`='$username',`phone`='$phone'  WHERE `id`='$id'");









}












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
<div class="row animated fadeInLeft">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>Update your pofile</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">


                    <form class="form-horizontal" action="<?=$_SERVER['PHP_SELF']?>"  method="post">

                        <div class="form-group">
                            <label for="email2" class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?=$tim['fname']?>" >
                                <input type="hidden" name="id" value="<?=$tim['id'];    ?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="email2" class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lname" placeholder="Last Name"  value="<?=$tim['lname'] ?>">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="email2" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" placeholder="Email"   value="<?=$tim['email'] ?>">
                            </div>
                        </div>








                        <div class="form-group">
                            <label for="email2" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="username" placeholder="User Name" value="<?= $tim['username'] ?>"  >
                            </div>
                        </div>




                        <div class="form-group">
                            <label for="email2" class="col-sm-2 control-label">Roll</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="roll" placeholder="Roll" pattern="[0-9]{6}"  value="<?=$tim['roll'] ?>" readonly>
                            </div>
                        </div>




                        <div class="form-group">
                            <label for="email2" class="col-sm-2 control-label">Reg</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="reg" placeholder="Reg No" pattern="[0-9]{6}"  value="<?=$tim['reg']  ?>" readonly>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="email2" class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="phone" placeholder="01*********" pattern="01[1|5|6|7|8|9][0-9]{8}"  value="<?=$tim['phone']  ?>" readonly>
                            </div>
                        </div>




                        <div  class="forn-group col-sm-offset-2">
                            <input class="btn btn-primary btn-block" type="submit" name="save_info" value="Upadate users">
                        </div>






                    </form>

                </div>
            </div>
        </div>
    </div>
</div>




<?php

require_once 'footer.php';



?>

