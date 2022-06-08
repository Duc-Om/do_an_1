<?php
    require_once '../header/index.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <form action="" method="post">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Email</th>
                            <th scope="col">Quyền</th>
                            <th scope="col">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once "../../connect/query.php";
                            $query = new Database();
                            $data = 'users';
                            $result = $query->getAll($data,null);
                        ?>
                        <?php while($rows = mysqli_fetch_array($result)){?>
                        <tr>
                            <th scope="row"><?php echo $rows['id'] ?></th>
                            <td><img class="rounded-circle" height="30" width="30" src="../../<?php echo $rows['avatar'] ?>"></td>
                            <td><?php echo $rows['name'] ?></td>
                            <td><?php echo $rows['gender'] ?></td>
                            <td><?php echo $rows['address'] ?></td>
                            <td><?php echo $rows['phone'] ?></td>
                            <td><?php echo $rows['email'] ?></td>
                            <td>
                                <?php 
                                    echo ($rows['roles_id']==1) ? 'ADMIN' : 'USER'
                                ?>
                            </td>
                            <td >
                                <a href="../users/process_delete.php?id=<?php echo $rows['id']?>"
                                    style="text-decoration:none; width: 30px; height:30px; line-height: 30px;"
                                    class="badge badge-warning display-1" onclick="return confirm('Bạn có chắc bạn muốn xóa mục này?');" >Xóa</a>
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