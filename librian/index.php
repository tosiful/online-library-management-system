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
                            <li></i><a href="add-books.php">Add Books</a></li>

                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInDown">
                    <div class="col-sm-12">

                    <?php



                    $student=mysqli_query($con,"SELECT * FROM `students` ");
                    $total_students=mysqli_num_rows($student);









                    ?>
                         <!--BOX Style 3-->
                            <div class="col-sm-4 col-lg-2">
                                <div class="panel widgetbox wbox-3 bg-primary ">
                                    <a href="students.php">
                                        <div class="panel-content">
                                            <span class="icon fa fa-users"></span>
                                            <h1 class="title color-scale-2">Total students</h1>
                                            <h4 class="numbers"><b><?=$total_students?></b></h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--BOX Style 3-->
                            <?php



                            $librian=mysqli_query($con,"SELECT * FROM `librian` ");
                            $total_librian=mysqli_num_rows($librian);






                            ?>

                            <!--BOX Style 3-->
                                <div class="col-sm-4 col-lg-2">
                                    <div class="panel widgetbox wbox-3 bg-primary ">
                                        <a href="students.php">
                                            <div class="panel-content">
                                                <span class="icon fa fa-users"></span>
                                                <h1 class="title color-scale-2">Total librian</h1>
                                                <h4 class="numbers"><b><?=$total_librian?></b></h4>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <!--BOX Style 3-->
                        <?php



                        $books=mysqli_query($con,"SELECT * FROM `books` ");
                        $total_books=mysqli_num_rows($books);


                        $book_qty=mysqli_query($con," SELECT  SUM(`book_qty`)as total  FROM `books`  ");

                        $qty=mysqli_fetch_assoc($book_qty);


                        $available_qty=mysqli_query($con," SELECT SUM(`available_qty`)as total FROM `books` ");
                        $ava_qty=mysqli_fetch_assoc($available_qty);








                        ?>

                        <!--BOX Style 3-->
                        <div class="col-sm-4 col-lg-2">
                            <div class="panel widgetbox wbox-3 bg-primary ">
                                <a href="manage-books.php">
                                    <div class="panel-content">
                                        <span class="icon fa fa-book"></span>
                                        <h1 class="title color-scale-2"><b>Total books</h1>
                                        <h4 class="numbers"><?=$total_books.' ('.$qty['total'].'-'.$ava_qty['total'].')'?></b></h4>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
            </div>



<?php

require_once 'footer.php';



?>

