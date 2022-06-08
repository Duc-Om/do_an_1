<?php
    require_once '../header/index.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <a href="../suppliers/insert.php"
                style="text-decoration:none; width: 100px; height:30px; margin-bottom:10px; line-height: 30px;"
                class="badge badge-success display-1">Thêm</a>
            <form action="#" method="post">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Email</th>
                            <th scope="col">Cập nhật và xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once "../../connect/query.php";

                            $query = new Database();

                            $data = 'suppliers';

                            $result = $query->getAll($data,null);
                        ?>
                        <?php while($rows = mysqli_fetch_array($result)){?>
                        <tr>
                            <th scope="rows"><?php echo $rows['id'] ?></th>
                            <td><?php echo $rows['name'] ?></td>
                            <td><?php echo $rows['address'] ?></td>
                            <td><?php echo $rows['phone'] ?></td>
                            <td><?php echo $rows['email'] ?></td>
                            <td>
                                <a href="../suppliers/update.php?id=<?php echo $rows['id']?>"
                                    style="text-decoration:none; width: 30px; height:30px; line-height: 30px;"
                                    class="badge badge-dark display-1">Sửa</a>
                                <a href="../suppliers/process_delete.php?id=<?php echo $rows['id']?>"
                                    style="text-decoration:none; width: 30px; height:30px; line-height: 30px;"
                                    class="badge badge-warning display-1" onclick="return confirm('Bạn có chắc bạn muốn xóa mục này?');">Xóa</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </form>
        </div>
    </div>
    <div class="pull-right">
        <ul class="pagination pull-right">
            <li class="page-item"><a class="page-link" href="#">Trước</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item"><a class="page-link" href="#">Sau</a></li>
        </ul>
    </div>
</div>
<?php
require_once '../foooter/index.php';
?>