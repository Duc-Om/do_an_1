<?php
	require_once 'menu.php';
?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Cart</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- cart -->
<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-remove"></th>
                                <th class="product-image">Ảnh sản phẩm</th>
                                <th class="product-name">Tên sản phẩm</th>
                                <th class="product-price">Giá</th>
                                <th class="product-quantity">Số lượng</th>
                                <th class="product-total">Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // session_start();
                                $cart = $_SESSION['cart'];
                                $sum = 0;
                            ?>
                            <?php
								foreach($cart as $id => $each){
							?>
								<tr class="table-body-row">
									<td class="product-remove"><a href="delete_cart.php?id=<?php echo $id?>"><i class="far fa-window-close"></i></a></td>
									<td class="product-image"><img src="./admin/modules/products/<?php echo $each['photo'] ?>" alt=""></td>
									<td class="product-name"><?php echo $each['name'] ?></td>
									<td class="product-price"><?php echo number_format($each['price'],0,'',',')?> ₫</td>
									<td class="product-quantity">
                                        <a href="update_quantity_in_cart.php?id=<?php echo $id ?>&type=decrease"><span style="color: #051922; margin-right: 20px;"  class="fa fa-minus"></span></a>
                                        <?php echo $each['quantity'] ?>
                                        <a href="update_quantity_in_cart.php?id=<?php echo $id ?>&type=increase"><span style="color: #051922; margin-left: 20px;" class="fa fa-plus"></span></a>

                                    </td>
									<td class="product-total">
                                        <?php 
                                            $result = $each['price'] * $each['quantity'];
                                            echo number_format($result,0,'',',');
                                            $sum += $result;
                                        ?> ₫
                                    </td>
								</tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="total-section">
                    <table class="total-table">
                        <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Tổng</th>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="total-data">
                                <td><strong>Tổng phụ: </strong></td>
                                <td><?php echo number_format($sum,0,'',',') ?> ₫</td>
                            </tr>
                            
                            <tr class="total-data">
                                <td><strong>Giảm giá: </strong></td>
                                <td>0</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Tổng tiền: </strong></td>
                                <td><?php echo number_format($sum,0,'',',') ?> ₫    </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-buttons">
                        <a href="cart.php" class="boxed-btn">Cập nhật giỏ hàng</a>
                        <a href="checkout.php" class="boxed-btn black">Thanh toán</a>
                    </div>
                </div>

                <!-- <div class="coupon-section">
                    <h3>Apply Coupon</h3>
                    <div class="coupon-form-wrap">
                        <form action="index.php">
                            <p><input type="text" placeholder="Coupon"></p>
                            <p><input type="submit" value="Apply"></p>
                        </form>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- end cart -->

<?php
	require_once 'footer.php';
?>