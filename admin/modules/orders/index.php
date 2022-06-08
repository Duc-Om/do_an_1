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
                            <th scope="col ">Thời gian đặt</th>
                            <th scope="col ">Thông tin người nhận</th>
                            <th scope="col ">Thông tin người đặt</th>
                            <th scope="col ">Trạng thái</th>
                            <th scope="col ">Tổng tiền</th>
                            <th scope="col ">Xem và duyệt</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once "../../connect/query.php";
                            $query = new Database();
                            $sql = "SELECT orders.*,users.name,users.phone,users.address FROM orders JOIN users ON users.id = orders.user_id;";
                            $result = $query->connect($sql);
                        ?>
                        <?php foreach($result as $rows){?>
                        <tr border="1" width='100%'>
                            <th scope="row"><?php echo $rows['id'] ?></th>
                            <td><?php echo $rows['created_date'] ?></td>
                            <td>
                                <?php echo $rows['name_receiver'] ?><br>
                                <?php echo $rows['phone_receiver'] ?><br>
                                <?php echo $rows['address_receiver'] ?>
                            </td>
                            <td>
                                <?php echo $rows['name'] ?><br>
                                <?php echo $rows['phone'] ?><br>
                                <?php echo $rows['address'] ?>
                            </td>
                            <td>
                                <?php
                                    switch ( $rows['status']){
                                        case '0':
                                            echo "Đang trong giỏ hàng";
                                            break;
                                        case '1':
                                            echo "Mới đặt";
                                            break;
                                        case '2':
                                            echo "Đã xác nhận";
                                            break;
                                        case '3':
                                            echo "Đã hủy đơn";
                                            break;
                                        case '4':
                                            echo "Đã đặt lại";
                                            break;
                                    }
                                ?>
                            </td>
                            <td><?php echo number_format($rows['total'],0,'',',') ?> ₫</td>
                            <td class="text-center">
                                <a href="../orders/show.php?id=<?php echo $rows['id']?>"
                                    style="text-decoration:none; width: 50px; height:30px; line-height: 30px;"
                                    class="badge badge-primary display-1">Xem</a>
                                <?php
                                
                                    if($rows['status'] == 1){
                                
                                ?>
                                    <a href="../orders/update.php?id=<?php echo $rows['id']?>&status=2"
                                    style="text-decoration:none; width: 50px; height:30px; line-height: 30px;"
                                    class="badge badge-warning display-1">Duyệt</a>

                                <?php }else if($rows['status'] == 2){ ?>

                                    <a href="../orders/update.php?id=<?php echo $rows['id']?>&status=3"
                                    style="text-decoration:none; width: 50px; height:30px; line-height: 30px;"
                                    class="badge badge-danger display-1">Hủy</a>

                                <?php } else {?>

                                        <?php if($rows['status'] == 3){?>

                                            <a href="../orders/update.php?id=<?php echo $rows['id']?>&status=4"
                                            style="text-decoration:none; width: 50px; height:30px; line-height: 30px;"
                                            class="badge badge-secondary display-1">Đặt lại</a>

                                        <?php } else { ?>

                                            <a href="../orders/update.php?id=<?php echo $rows['id']?>&status=3"
                                            style="text-decoration:none; width: 50px; height:30px; line-height: 30px;"
                                            class="badge badge-danger display-1">Hủy</a>
                                            
                                        <?php } ?>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                
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