<?php
	require_once 'menu.php';
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Check Out Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Địa chỉ thanh toán
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
									<?php
										// session_start();
										require_once './admin/connect/query.php';

										$id = $_SESSION['id'];

										$query = new Database();

										$tableName = 'users';

										$result = $query->getAll($tableName,$id);

										// echo $result;

										// var_dump($result);

										$each = mysqli_fetch_array($result);
									?>
						        	<form method="post" action="process_checkout.php">
						        		<p><input type="text" name="name_receiver" class="name_receiver" required='' placeholder="Tên" value="<?php echo $each['name']?>"></p>
						        		<p><input type="tel" name="phone_receiver" class="phone_receiver" required='' placeholder="Số điện thoại" value="<?php echo $each['phone']?>"></p>
						        		<p><input type="text" name="address_receiver" class="address_receiver" required='' placeholder="Địa chỉ" value="<?php echo $each['address']?>"></p>
										<!-- <p><input type="submit" class="boxed-btn" style="width: 150px; margin-top: 30px; color: white;" name="btnOrder" value="Đặt hàng"></p> -->
											<!-- <button type="submit"  name="btnOrder">Submit</button> -->
									
						        </div>
						      </div>
						    </div>
						  </div>
						</div>

					</div>
				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details">
							<thead>
								<tr>
									<th>Chi tiết đơn hàng</th>
									<th></th>
									<th>Giá</th>
								</tr>
							</thead>
							<tbody class="order-details-body">
								<tr>
									<td>Sản phẩm</td>
									<td>Số lượng</td>
									<td>Tổng</td>
								</tr>
								<?php
								
									$cart = $_SESSION['cart'];
									$sum = 0;
								?>

								<?php

									foreach($cart as $id => $each):
								
								?>
								<tr>
									<td><?php echo $each['name'] ?></td>
									<td><?php echo $each['quantity'] ?></td>
									<?php
										$sum += ($each['price'] * $each['quantity']);
									?>
									<td><?php echo number_format($each['price'],0,'',',') ?> ₫</td>
								</tr>
								<?php endforeach ?>
							</tbody>
							<tbody class="checkout-details">

								<tr>
									<td>Tổng phụ</td>
									<td style="border: none;"></td>
									<td><?php echo number_format($sum,0,'',',') ?> ₫</td>
								</tr>
								<tr>
									<td>Giảm giá</td>
									<td style="border: none;"></td>
									<td>0 ₫</td>
								</tr>
								<tr>
									<td>Tổng cộng</td>
									<td style="border: none;"></td>
									<td><?php echo number_format($sum,0,'',',') ?> ₫</td>
								</tr>
							</tbody>
						</table>
						<!-- <button class="boxed-btn">Đặt hàng</button> -->
						
						<input type="submit" class="boxed-btn" style="width: 150px; margin-top: 30px; color: white;" name="btnOrder" value="Đặt hàng">
						<!-- <button id="test">aaaa</button> -->
					</form>
						<!-- <a href="#" class="boxed-btn">Đặt hàng</a> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end check out section -->
	<script>
		// $(document).ready(function () {
		// 	$( "#test" ).click(function() {
		// 		let name_receiver = $('.name_receiver').val();
		// 		let phone_receiver = $('.phone_receiver').val();
		// 		let address_receiver = $('.address_receiver').val();
				
		// 	});
		// });
	</script>
	<?php
	require_once 'footer.php';
	?>
