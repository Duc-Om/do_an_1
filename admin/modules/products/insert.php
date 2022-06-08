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
            <div class="col-md-6 col-sm-6 shadow pb-10">
                <div class="container my-1 ">
                    <?php

                        require_once '../../connect/query.php';

                        $query = new Database();

                        $data = 'suppliers';

                        $result = $query->getAll($data,null);

                    ?>
                    <h1 class="text-center ">Thêm sản phẩm</h1>

                    <form action="../products/process_insert.php" method="post" enctype="multipart/form-data">
                        <div class="form-group ">
                            <label for="exampleInputPassword1">Tên</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm...">
                        </div>
                        <!-- <div class="form-group ">
                            <label for="exampleInputPassword1">Số lượng</label>
                            <input type="number" class="form-control" name="quantity"
                                placeholder="Nhập số lượng sản phẩm....">
                        </div> -->
                        <div class="form-group ">
                            <label for="exampleInputPassword1">Giá</label>
                            <input type="number" class="form-control" name="price" placeholder="Nhập giá sản phẩm...">
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputPassword1">Giảm giá</label>
                            <input type="number" class="form-control" name="discount" placeholder="Nhập giảm giá...">
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputPassword1">Ảnh</label>
                            <input type="file" class="form-control" name="photo">
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputPassword1">Nhà cung cấp</label>
                            <select class="form-control" style="width: 200px;" name="suppliers_id" id="">
                                <?php
                                        while( $rows = mysqli_fetch_array($result)){
                                    ?>
                                <option value="<?php echo $rows['id']?>"><?php echo $rows['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" name="btnSubmit" class="btn btn-success" value="Add">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3 col-sm-3"></div>
        </div>
    </div>
</div>
<?php
require_once '../foooter/index.php';
?>