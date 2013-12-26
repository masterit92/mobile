<?php
$product = $data['product'][0];
?>
<div class="detail">
	<div class="detail_top">
		<b><a href="#" class="event_back">Back</a></b>
	</div>
	<div class="detail_left">
		<img src="<?php echo base_url($product['thumb']) ?>" alt="No image"/>
	</div>
	<div class="detail_right">
		<h1><?php echo strtoupper($product['name']) ?></h1>
		<hr/>
		<p>PRICE: <b><?php echo '$' . round($product['price'], 2) ?></b></p>

		<p>DESCRIPTION:</p><b><?php echo $product['description'] ?></b>

		<p>MAKER:</p>
		<b>
			<?php
			$maker = $this->model_maker->maker_by_id($product['m_id']);
			echo $maker[0]['name'];
			?>
		</b>

		<p>
			<?php echo $product['quantity'] > 0 ? 'IN STOCK!' : 'OUT STOCK!' ?>
		</p>
	</div>
	<div class="cl"></div>
</div>
<?php if(isset($data['arr_relate']) && count($data['arr_relate'])>0):?>
<div class="detail">
	<div class="detail_top">
		<h3>Product Related:</h3>
		<section class="services">
			<div class="shell">
				<div class="boxes">
					<div class="cl">&nbsp;</div>
					<?php
					foreach ($data['arr_relate'] as $product):
						?>
						<div class="box">
							<a href="<?php echo base_url('product/detail?p_id=' . $product['p_id']) ?>">
								<img src="<?php echo base_url($product['thumb']) ?>" alt=""/>

								<h3><?php echo $product['name'] ?></h3>
								<?php echo '$' . round($product['price'], 2) ?>
							</a>
						</div>
					<?php
					endforeach;
					?>
				</div>
			</div>
		</section>
	</div>
</div>
<?php endif;?>