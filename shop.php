<?php
	require_once 'menu.php';
	require_once './admin/connect/query.php';
?>
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Shop</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<?php

				$query = new Database();
				
				$result = $query->getProductAll();
			?>
			
			<!-- <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".strawberry">Strawberry</li>
                            <li data-filter=".berry">Berry</li>
                            <li data-filter=".lemon">Lemon</li>
                        </ul>
                    </div>
                </div>
            </div> -->
			<div class="row product-lists">
			<?php foreach($result as $each){?>
			
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.php"><img src="./admin/modules/products/<?php echo $each['photo'] ?>" alt=""></a>
						</div>
						<h3><?php echo $each['name'] ?></h3>
						<p class="product-price"><?php echo number_format($each['price'],0,'',',') ?> ₫ </p>
						<?php 
							if(!empty($_SESSION['id'])){
						?>
						<a href="add_to_cart.php?id=<?php echo $each['id'] ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
						<?php
							}
						?>
					</div>
				</div>
			

			<?php } ?>
			</div>

			<!-- <div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li><a class="active" href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div> -->
		</div>
	</div>
	<!-- end products -->

	<?php
	require_once 'footer.php';
?>