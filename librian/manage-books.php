<?php

require_once 'header.php';



?>
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li></i><a href="javascript:avoid(0)">Manage Books</a></li>

        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>All students</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Book name</th>
                            <th>Book author name</th>
                            <th>Book publication name</th>
                            <th>Book purchase_date</th>
                            <th>Book price</th>
                            <th>Book qty</th>
                            <th>Available qty</th>
                            <th>Action</th>

                        </tr>
                        </thead>

                        <tbody>
                        <?php

                        $result=mysqli_query($con,"SELECT * FROM `books`");
                        while ($row=mysqli_fetch_assoc($result )){

                            ?>


                            <tr>
                           <td><?=$row['book_name']?></td>
                           <td><?=$row['book_author_name']?></td>
                           <td><?=$row['book_publication_name']?></td>
                           <td><?=date('d-M-Y',strtotime($row['book_purchase_date']))?></td>
                           <td><?=$row['book_price']?></td>
                           <td><?=$row['book_qty']?></td>
                           <td><?=$row['available_qty']?></td>
                           <td>

                           <a href="javascript:avoid()" class="btn btn-info" data-toggle="modal" data-target="#book-<?=$row['id']?>"><i class="fa fa-eye"></i></a>
                           <a href="" class="btn btn-warning"  data-toggle="modal" data-target="#book-update<?=$row['id']?>"   ><i class="fa fa-pencil"></i></a>

                           <a href="delete.php?bookdelete=<?=base64_encode($row['id'])?>" class="btn btn-danger" onclick="return confirm('Are you sure  to delete?')"><i class="fa fa-trash-o"></i></a>





                           </td>



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

$result=mysqli_query($con,"SELECT * FROM `books`");
while ($row=mysqli_fetch_assoc($result )){


    #book jotota takbe loop ta totobar gorbe and nicehr model a show korbe
?>





<div class="modal fade" id="book-<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book</h4>
            </div>
            <div class="modal-body">

            <table class="table table-bordered">

                <tr>
                    <th>Book name</th>
                    <td><?=$row['book_name']?></td>

                </tr>

                <tr>

                       <th>Book author name</th>

                    <td><?=$row['book_author_name']?></td>


                </tr>
                <tr>

                    <th>Book Publication name</th>
                    <td><?=$row['book_publication_name']?></td>

                </tr>
                <tr>


                    <th>Book purchase date</th>
                    <td><?=date('d-M-Y',strtotime($row['book_purchase_date']))?></td>


                </tr>
                <tr>


                    <th>Book price</th>
                    <td><?=$row['book_price']?></td>


                </tr>
                <tr>


                    <th>Book qty</th>
                    <td><?=$row['book_qty']?></td>
                </tr>
                <tr>
                    <th>Available qty</th>
                    <td><?=$row['available_qty']?></td>
                </tr>


            </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




    <?php

}

?>




<?php

#update the book



$result=mysqli_query($con,"SELECT * FROM `books`");
while ($row=mysqli_fetch_assoc($result )){


    $id=$row['id'];
    $book_info=mysqli_query($con,"SELECT * FROM `books` WHERE `id`='$id'");
    $book_info_row=mysqli_fetch_assoc($book_info);



    #book jotota takbe loop ta totobar gorbe and nicehr model a show korbe


    ?>





    <div class="modal fade" id="book-update<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Book</h4>
                </div>
                <div class="modal-body">
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post" action="">


                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Book_name</label>
                                            <div class="input-group" class="col-sm-8">
                                                <input  name="book_name" placeholder="book_name" class="form-control" value="<?=$book_info_row['book_name']?>" type="text" >
                                                <input  name="id" class="form-control" value="<?=$book_info_row['id']?>" type="hidden" >
                                            </div>



                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Book publication name</label>
                                            <div class="input-group" class="col-sm-8">
                                                <input  name="book_publication_name" placeholder="Book publication name" class="form-control" value="<?=$book_info_row['book_publication_name']?>" type="text">

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
                                                <input  name="book_author_name" placeholder="book_author_name" value="<?=$book_info_row['book_author_name']?>" class="form-control"  type="text">



                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Book purchase date</label>
                                            <div class="input-group" class="col-sm-8">
                                                <input  name="book_purchase_date" placeholder="book_purchase_date" value="<?=$book_info_row['book_purchase_date']?>" class="form-control"  type="date">

                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Book Price</label>

                                            <div class="input-group" class="col-sm-8">
                                                <input  name="book_price" placeholder="Book Price" class="form-control" value="<?=$book_info_row['book_price']?>" type="number">



                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Book qty</label>

                                            <div class="input-group" class="col-sm-8">
                                                <input  name="book_qty" placeholder="book_qty" class="form-control" value="<?=$book_info_row['book_qty']?>" type="number">




                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Available qty</label>

                                            <div class="input-group" class="col-sm-8">
                                                <input  name="available_qty" placeholder="available_qty"value="<?=$book_info_row['available_qty']?>" class="form-control"  type="number">




                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>




    <?php

}






if(isset($_POST['update'])){

    $id=$_POST['id'];
    $book_name=$_POST['book_name'];

    #$book_image=$_POST['book_image'];
    $book_author_name=$_POST['book_author_name'];
    $book_publication_name=$_POST['book_publication_name'];
    $book_purchase_date  =$_POST['book_purchase_date'];
    $book_price=$_POST['book_price'];
    $book_qty =$_POST['book_qty'];
    $available_qty =$_POST['available_qty'];
    $libraian_username=$_SESSION['libraian_username'];


 $result=mysqli_query($con,"UPDATE `books` SET `book_name`='$book_name',`book_author_name`='$book_author_name',`book_publication_name`='$book_publication_name',`book_purchase_date`='$book_purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty'  WHERE `id`='$id'");




    if($result){

        ?>
        <script type="text/javascript">

            alert("Book update successfully!")


        </script>

        <?php


    }else{

        ?>
        <script type="text/javascript">

            alert("Book  not updated !")


        </script>

        <?php

    }




}










?>





<?php

require_once 'footer.php';



?>

