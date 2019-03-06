    <?php 
    session_start();
    include "connection.php"; ?>
    <?php include "header.php"; ?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add Books Info</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="col-lg-6" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                        <input type="text" name="booksname" class="form-control" placeholder="books name" required="">
                                        </td>
                                    </tr>
                                      <tr>
                                        <td>
                                        Book Image
                                        <input type="file" name="f1" required="">
                                        </td>
                                    </tr>
                                      <tr>
                                        <td>
                                        <input type="text" name="bauthorname" class="form-control" placeholder="Books Author Name" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <input type="text" name="bname" class="form-control" placeholder="Publication Name" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <input type="text" name="bpurchasedt" class="form-control" placeholder="Books Purchase Date" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <input type="text" name="bprice" class="form-control" placeholder="Books Price" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <input type="text" name="bqty" class="form-control" placeholder="Books Quantity" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <input type="text" name="aqty" class="form-control" placeholder="Available Quantity" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <input type="submit" name="submit1" class="btn btn-default submit" value="insert books details" style="background-color:blue; color:#fff";>
                                        </td>
                                    </tr>
                                </table>
                            </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <?php
        //Start upload book code
        if (isset($_POST['submit1'])) 
        {
        $tm=md5(time());
        $fnm=$_FILES["f1"]["name"];
        $dst="./books_image/".$tm.$fnm;
        $dst1="books_image/".$tm.$fnm;
        move_uploaded_file($_FILES["f1"]["tmp_name"], $dst);

                   mysqli_query($link, "INSERT INTO add_books VALUES('','$_POST[booksname]','$dst1','$_POST[bauthorname]','$_POST[bname]','$_POST[bpurchasedt]','$_POST[bprice]','$_POST[bqty]','$_POST[aqty]','$_SESSION[librarian]')");
                   ?>
                   <script type="text/javascript">
                       alert("books insert successfully");
                   </script>

                 <?php  
               }       

        ?>


<?php include "footer.php"; ?>