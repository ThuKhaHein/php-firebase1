<?php
include('authentication.php');
include('includes/header.php');
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5>Total No of Record:
                            <?php
                                include('dbcon.php');
                                $ref_table = 'contacts';
                                $total_count = $database->getReference($ref_table)->getSnapshot()->numChildren();
                                echo $total_count;
                            ?>
                        </h5>
                    </div>

                </div>
            </div>
            <div class="col-md-12">

                <?php
                if(isset($_SESSION['status']))
                {
                    echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
                    unset($_SESSION['status']);
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4>
                            PHP Firebase CRUD - Realtime Database
                            <a href="add-contact.php" class="btn btn-primary float-end">Add Contacts</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl.no</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('dbcon.php');
                                $ref_table = 'contacts';
                                $fetchdata = $database->getReference($ref_table)->getValue();

                                if ($fetchdata > 0)
                                {
                                    $i=1;
                                    foreach($fetchdata as $key => $row)
                                    {
                                     ?>
                                     <tr>
                                         <td><?=$i++;?></td>
                                         <td><?=$row['fname'];?></td>
                                         <td><?=$row['lname'];?></td>
                                         <td><?=$row['email'];?></td>
                                         <td><?=$row['phone'];?></td>
                                         <td>
                                             <a href="edit-contact.php?id=<?=$key;?>" class="btn btn-primary btn-sm">Edit</a>
                                         </td>
                                         <td>
                                             <!-- <a href="delete-contact.php? name="delete" class="btn btn-danger btn-sm">Delete</a> -->
                                             <form action="code.php" method="POST">
                                                 <button type="submit" name="delete_btn" value="<?=$key?>" class="btn btn-danger btn-sm">Delete</button>
                                             </form>
                                         </td>
                                     </tr>
                                     <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                        <tr>
                                            <td colspan="7">No Record Found</td>
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
 include('includes/footer.php')
?>
    