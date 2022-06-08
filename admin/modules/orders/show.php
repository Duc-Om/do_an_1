<?php
    require_once '../header/index.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
        <a href="../orders/index.php"
                    style="text-decoration:none; width: 100px; height:30px; margin-bottom:10px; line-height: 30px;"
                    class="badge badge-success display-1">Back to page</a>
            <form action="" method="post">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th class="product-image">Ảnh sản phẩm</th>
                            <th class="product-name">Tên sản phẩm</th>
                            <th class="product-price">Giá</th>
                            <th class="product-quantity">Số lượng</th>
                            <th class="product-total">Tổng</th>
                            <th class="product-total">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once "../../connect/query.php";
                            $query = new Database();
                            $order_id = $_GET['id'];
                            $sql = "SELECT * FROM order_products JOIN products ON products.id = order_products.product_id WHERE order_id = '$order_id'";
                            $result = $query->connect($sql);
                            $sum = 0;
                        ?>
                        <?php
							foreach($result as $each){
						?>
							<tr class="table-body-row">
								<td class="product-image"><img height="100" class="rounded-circle" src="../products/<?php echo $each['photo'] ?>" alt=""></td>
								<td class="product-name"><?php echo $each['name'] ?></td>
								<td class="product-price"><?php echo number_format($each['price'],0,'',',')?> ₫</td>
								<td class="product-quantity"><?php echo $each['quantity']?></td>
								<td class="product-sum">
                                    <?php 
                                        $result = $each['price'] * $each['quantity'];
                                        echo number_format($result,0,'',',');
                                        $sum += $result;
                                    ?> ₫
                                </td>
								<td class="product-total"><?php echo number_format($sum,0,'',',')?>₫</td>
							</tr>
                        <?php }?>
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