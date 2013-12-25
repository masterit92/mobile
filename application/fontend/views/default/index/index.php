<!-- slider-holder -->
<div class="slider-holder">
	<div class="shell">
		<span class="slider-shadow"></span>

		<div class="slider flexslider">
			<ul class="slides">
				<?php
				foreach ($data['product_selected'] as $product)
				{
					?>
					<li>
						<img src="<?php echo base_url($product['thumb']) ?>" alt=""/>

						<div class="slide-cnt">
							<h2><?php echo $product['name'] ?></h2>

							<p>
								<?php
								echo substr($product['description'],0,100);
								?>....<a
									href="<?php echo base_url('product/detail?p_id=' . $product['p_id']) ?>">Read
									More</a>
							</p>
							<a href="<?php echo base_url('product/detail?p_id=' . $product['p_id']) ?>"
							   class="slider-btn">Detail</a>
						</div>
					</li>
				<?php
				}
				?>
			</ul>
		</div>
	</div>
</div>
<!-- end of slider-holder -->
<!-- services -->
<section class="services">
	<div class="shell">
		<div class="boxes">
			<div class="cl">&nbsp;</div>
			<?php
			foreach ($data['product_new'] as $new_product)
			{
				?>
				<div class="box">
					<a href="<?php echo base_url('product/detail?p_id=' . $new_product['p_id']) ?>">
						<img src="<?php echo base_url($new_product['thumb']) ?>" alt=""/>

						<h3><?php echo $new_product['name'] ?></h3>
					</a>
				</div>
			<?php
			}
			?>
			<div class="cl">&nbsp;</div>
		</div>
	</div>
</section>
<!-- end of services -->
<!-- main -->
<div class="main">
	<div class="shell">
		<section>
			<!-- content -->
			<div class="content">
				<h2>More About Us</h2>

				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non tortor quis tellus euismod
					sodales. Donec tincidunt auctor convallis. Nunc tincidunt nibh nec odio venenatis et condimentum
					nisl dapibus. Integer ipsum elit, commodo ac congue quis, varius at eros. Praesent tempus vulputate
					tortor eu feugiat. Maecenas bibendum suscipit molestie. Phasellus erat arcu, fringilla ac suscipit
					nec, lobortis at mi.</p>

				<p>Etiam interdum mauris quis nunc faucibus porttitor. Quisque tempor posuere pharetra. Sed fringilla
					placerat nulla. Etiam tincidunt ante eget arcu sodales scelerisque. Ut elit lorem, vehicula sit amet
					dictum nec, congue venenatis quam. Cras fermentum scelerisque ma</p>
			</div>
			<!-- end of content -->
			<!-- aside -->
			<aside>
				<div class="widget">
					<h2>Product</h2>

					<div class="img-holder">
						<a href="#"><img src="css/images/projects-img1.png" alt=""/></a>
					</div>
					<div class="img-holder">
						<a href="#"><img src="css/images/projects-img2.png" alt=""/></a>
					</div>
					<div class="img-holder">
						<a href="#"><img src="css/images/projects-img3.png" alt=""/></a>
					</div>
					<div class="cl">&nbsp;</div>
				</div>
				<div class="widget">
					<h2>SERVICES</h2>

					<div class="img-holder">
						<a href="#"><img src="css/images/clients-img1.png" alt=""/></a>
					</div>
					<div class="img-holder">
						<a href="#"><img src="css/images/clients-img2.png" alt=""/></a>
					</div>
					<div class="img-holder">
						<a href="#"><img src="css/images/clients-img3.png" alt=""/></a>
					</div>
					<div class="cl">&nbsp;</div>
				</div>
			</aside>
			<!-- end of aside -->
			<div class="cl">&nbsp;</div>
		</section>
	</div>
</div>
<!-- end of main -->