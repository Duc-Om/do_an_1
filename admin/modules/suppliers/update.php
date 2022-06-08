<?php
    require_once '../header/index.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
        <div class="col-md-3 col-sm-3">
            <a href="../suppliers/index.php"
                    style="text-decoration:none; width: 100px; height:30px; margin-bottom:10px; line-height: 30px;"
                    class="badge badge-success display-1">Back to page</a>
        </div>
        <div class="col-md-6 col-sm-6 shadow pb-1">
            <div class="container my-1 ">
                <h1 class="text-center ">Sửa nhà cung cấp</h1>
                <?php 

                    require_once '../../connect/query.php';

                    $id = $_GET['id'];

                    $query = new Database();
                        
                    $data = 'suppliers';

                    $result = $query->getAll($data,$id);
                    
                    
                ?>
                <?php
                    foreach($result as $rows){
                ?>
                <form action="../suppliers/process_update.php" method="post">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="id" value="<?php  echo $rows['id'] ?>"> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tên nhà cung cấp</label>
                        <input type="text" class="form-control" name="name" value="<?php  echo $rows['name'] ?>"> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Số điện thoại nhà cung cấp</label>
                        <input type="text" class="form-control" name="address" value="<?php  echo $rows['address'] ?>"> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Địa chỉ nhà cung cấp</label>
                        <input type="text" class="form-control" name="phone" value="<?php  echo $rows['phone'] ?>"> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email nhà cung cấp</label>
                        <input type="email" class="form-control" name="email" value="<?php  echo $rows['email'] ?>"> 
                    </div>
                    <div class="form-group text-center">
                        <!-- <button type="button" class="btn btn-success">Add</button> -->
                        <input type="submit" name="btnUpdate" class="btn btn-success" value="Update">
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-3 col-sm-3"></div>
        </div>
    </div>
</div>
<?php
require_once '../foooter/index.php';
?>