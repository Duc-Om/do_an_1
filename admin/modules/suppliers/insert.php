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
                    <h1 class="text-center ">Thêm nhà cung cấp</h1>
                    <form action="../suppliers/process_insert.php" method="post">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên</label>
                            <input type="text" class="form-control" name="name" required='' placeholder="Nhập tên nhà cung cấp...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" required='' placeholder="Nhập địa chỉ nhà cung cấp...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" required='' placeholder="Nhập số điện thoại nhà cung cấp...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control" name="email" required='' placeholder="Nhập email nhà cung cấp...">
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" name="btnAdd" class="btn btn-success" value="Add">
                        </div>
                    </form>
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