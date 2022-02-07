<?php
include('admin_auth.php');
include('includes/header.php');
?>
    <div class="container">
        <div class="row">
            
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
                            Register User List
                            
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl.no</th>
                                    <th>Display</th>
                                    <th>Phone</th>
                                    <th>Email Id</th>
                                    <th>Role as</th>
                                    <th>Disable/Enable</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                             <?php
                             include('dbcon.php');
                             $users = $auth->listUsers();

                             $i=1;
                             foreach ($users as $user) 
                             {
                               ?>
                               <tr>
                                   <td><?=$i++;?></td>
                                   <td><?=$user->displayName ?></td>
                                   <td><?=$user->phoneNumber ?></td>
                                   <td><?=$user->email ?></td>
                                   <td>
                                        
                                        <span class="border bg-warning p-2">
                                            <?php
                                                $claims = $auth->getUser($user->uid)->customClaims;

                                                if(isset($claims['admin']) == true)
                                                {
                                                    echo "Role : Admin";
                                                }elseif(isset($claims['super_admin']) == true)
                                                {
                                                    echo "Role : Super Admin";
                                                }
                                                elseif($claims == null)
                                                {
                                                    echo "Role : No Role";
                                                }
                                            ?>
                                        </span>
                                   </td>
                                   <td>
                                       <?php
                                       if($user->disabled)
                                       {
                                            echo "Disabled";
                                       }
                                       else
                                       {
                                            echo "Enabled";
                                       }
                                       ?>
                                   </td>
                                   <td>
                                       <a href="user-edit.php?id=<?=$user->uid;?>" class="btn btn-primary btn-sm">Edit</a>
                                   </td>
                                   <td>
                                       <!-- <a href="user-delete.php" class="btn btn-danger btn-sm">Delete</a> -->
                                       <form action="code.php" method="POST">
                                            <button type="submit" name="reg_user_delete_btn" value="<?=$user->uid;?>" class="btn btn-danger btn-sm">Delete</button>
                                       </form>
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
 include('includes/footer.php')
?>
    