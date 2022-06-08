<?php
    require_once '../header/index.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="col-md-3 col-sm-3">
                <a href="../products/index.php"
                    style="text-decoration:none; width: 100px; height:30px; margin-bottom:10px; line-height: 30px;"
                    class="badge badge-success display-1">Back to page</a>
            </div>
            <div class="col-md-6 col-sm-6 shadow pb-1">
                <div class="container my-1 ">
                    <?php 

                        $id = $_GET['id'];

                        require_once '../../connect/query.php';

                        $query = new Database();
                            
                        $data = 'products';

                        $result = $query->getAll($data,$id);
                            
                        $rows = mysqli_fetch_assoc($result);
                        
                    ?>
                    <h1 class="text-center p-2 ">Sửa sản phẩm</h1>
                    <form action="../products/process_update.php" method="post">
                        <div class="text-center">
                            <img src="<?php echo $rows['photo'] ?>" alt="<?php echo $rows['photo'] ?>" class="rounded-circle" width="130">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id" value="<?php echo $rows['id'] ?>"> 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $rows['name'] ?>"> 
                        </div>
                        <!-- <div class="form-group">
                            <label for="exampleInputPassword1">Số lượng</label>
                            <input type="number" class="form-control" name="quantity" value="<?php echo $rows['quantity'];?>"> 
                        </div> -->
                        <div class="form-group">
                            <label for="exampleInputPassword1">Giá</label>
                            <input type="number" class="form-control" name="price" value="<?php  echo $rows['price'] ?>"> 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Giảm giá</label>
                            <input type="number" class="form-control" name="discount" value="<?php echo $rows['discount'] ?>"> 
                        </div>
                        <div class="form-group">
                            <!-- <label class="form-group" for="exampleInputPassword1">Nhà cung cấp</label> -->
                            <select class="form-group" style="width: 200px;" name="suppliers_id">
                                <?php
                                    $data = 'suppliers';

                                    $result = $query->getAll($data,null);
                                    while( $rows = mysqli_fetch_array($result)){
                                ?>
                                <option value="<?php echo $rows['id']?>"><?php echo $rows['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" name="btnSubmit" class="btn btn-success" value="Update">
                        </div>
                    </form>
                    <?php

                    ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">

            </div>
        </div>
    </div>
</div>
<?php
require_once '../foooter/index.php';
?>