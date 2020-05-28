<?php

require_once 'header.php';


if(isset($_POST['save_info'])){

    $book_name=$_POST['book_name'];
    #$book_image=$_POST['book_image'];
    $book_author_name=$_POST['book_author_name'];
    $book_publication_name=$_POST['book_publication_name'];
    $book_purchase_date  =$_POST['book_purchase_date'];
    $book_price=$_POST['book_price'];
    $book_qty =$_POST['book_qty'];
    $available_qty =$_POST['available_qty'];
    $libraian_username=$_SESSION['libraian_username'];


    /*
     eita erroe astece bidai korte pari nai .pore try korbo

     $image=explode('.',$_FILES['book_image']['name']);
     $img_ext=end($image);
     $image=date('Ymdhis').$img_ext;
     echo $image;

    */






     //php form validation
     $input_errors =array();
     if(empty($book_name)){

         $input_errors['book_name']="Book name field is required!";
     }

     if(empty($book_publication_name)){

         $input_errors['book_publication_name']="Book publication name field is required!";
     }


     if(empty($book_author_name)){

         $input_errors['book_author_name']="Book author name field is required!";
     }
     if(empty($book_purchase_date)){

         $input_errors['book_purchase_date']="Book purchase date  is required!";
     }
     if(empty($book_price)){

         $input_errors['book_price']="Book price  field is required!";
     }
     if(empty($book_qty)){

         $input_errors['book_qty']="Book qty field is required!";
     }
     if(empty($available_qty)){

         $input_errors['available_qty']="Available qty field is required!";
     }

if(count($input_errors)==0){


    //jodi $result success hoi tahole msg ta show korve


    $book=mysqli_query($con,"SELECT * FROM `books` WHERE `book_name`='$book_name'");
    $book_check=mysqli_num_rows($book);
    if($book_check==0){


        $result=mysqli_query($con,"INSERT INTO `books`( `book_name`,`book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `libraian_username`) VALUES ('$book_name','$book_author_name','$book_publication_name','$book_purchase_date','$book_price','$book_qty','$available_qty','$libraian_username')");



        if($result){


            $success="data insert successfully";
        }else{


            $error="something wrong";
        }



    }else{

        $book_exists="this book already exists";
    }

















}















}



?>
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li></i><a href="javascript:avoid(0)">Add Books</a></li>

        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-8 col-sm-offset-2">






        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">










                        <form class="well form-horizontal" action=" " method="post"  enctype="multipart/form-data">


                            <!-- Form Name -->
                            <legend><center><h2><b>Add Books</b></h2></center></legend><br>



                            <?php

                            //alert msg show


                            if(isset($success)){
                                ?>



                                <div class="alert alert-success" role="alert">
                                    <?=$success?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>


                                    </button>


                                </div>


                                <?php


                            }




                            ?>



                            <?php

                            if(isset($error)){
                                ?>



                                <div class="alert alert-danger" role="alert">
                                    <?=$error?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>


                                    </button>


                                </div>


                                <?php


                            }




                            ?>





                            <?php

                            //alert msg show


                            if(isset($book_exists)){
                                ?>



                                <div class="alert alert-danger" role="alert">
                                    <?=$book_exists?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>


                                    </button>


                                </div>


                                <?php


                            }




                            ?>











                            <div class="form-group">
                                <label class="col-md-4 control-label">Book_name</label>
                                <div class="input-group" class="col-sm-8">
                                    <input  name="book_name" placeholder="book_name" class="form-control" value="<?=isset($book_name)?$book_name:''?>" type="text">
                                    <?php
                                    if(isset($input_errors['book_name'])){

                                        echo '<span class="input_errors">'.$input_errors['book_name'] .'</span>';
                                    }
                                    ?>
                                </div>



                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label">Book publication name</label>
                                <div class="input-group" class="col-sm-8">
                                    <input  name="book_publication_name" placeholder="Book publication name" class="form-control" value="<?=isset($book_publication_name)?$book_publication_name:'' ?>" type="text">
                                    <?php
                                    if(isset($input_errors['book_publication_name'])){

                                        echo '<span class="input_errors">'.$input_errors['book_publication_name'] .'</span>';
                                    }
                                    ?>

                                </div>
                            </div>

                          <!--

                           <div class="form-group">
                                <label class="col-md-4 control-label">Book Image</label>
                                <div class="col-sm-8">
                                    <input type="file" name="book_image" placeholder="Book Image" class="form-control" >
                                </div>
                            </div>
-->



                            <div class="form-group">
                                <label class="col-md-4 control-label">Book author name</label>
                                <div class="input-group" class="col-sm-8">
                                    <input  name="book_author_name" placeholder="book_author_name" value="<?=isset($book_author_name)?$book_author_name:'' ?>" class="form-control"  type="text">


                                    <?php
                                    if(isset($input_errors['book_author_name'])){

                                        echo '<span class="input_errors">'.$input_errors['book_author_name'] .'</span>';
                                    }
                                    ?>

                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-4 control-label">Book purchase date</label>
                                <div class="input-group" class="col-sm-8">
                                    <input  name="book_purchase_date" placeholder="book_purchase_date" value="<?=isset($book_purchase_date)?$book_purchase_date:''?>" class="form-control"  type="date">

                                    <?php
                                    if(isset($input_errors['book_purchase_date'])){

                                        echo '<span class="input_errors">'.$input_errors['book_purchase_date'] .'</span>';
                                    }
                                    ?>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-4 control-label">Book Price</label>

                                <div class="input-group" class="col-sm-8">
                                    <input  name="book_price" placeholder="Book Price" class="form-control" value="<?=isset($book_price)?$book_price:''?>" type="number">

                                    <?php
                                    if(isset($input_errors['book_price'])){

                                        echo '<span class="input_errors">'.$input_errors['book_price'] .'</span>';
                                    }
                                    ?>

                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label">Book qty</label>

                                <div class="input-group" class="col-sm-8">
                                    <input  name="book_qty" placeholder="book_qty" class="form-control" value="<?=isset($book_qty)? $book_qty:''?>" type="number">


                                    <?php
                                    if(isset($input_errors['book_qty'])){

                                        echo '<span class="input_errors">'.$input_errors['book_qty'] .'</span>';
                                    }
                                    ?>

                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-4 control-label">Available qty</label>

                                <div class="input-group" class="col-sm-8">
                                    <input  name="available_qty" placeholder="available_qty" value="<?=isset($available_qty)?$available_qty:'' ?>" class="form-control"  type="number">


                                    <?php
                                    if(isset($input_errors['available_qty'])){

                                        echo '<span class="input_errors">'.$input_errors['available_qty'] .'</span>';
                                    }
                                    ?>

                                </div>
                            </div>



                            <div class="form-group">

                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" name="save_info" class="btn btn-primary"><i class="fa fa-save"></i> Save Book</button>
                                </div>
                            </div>















                        </form>














                    </div>
                </div>
            </div>
        </div>















    </div>
</div>



<?php

require_once 'footer.php';



?>























