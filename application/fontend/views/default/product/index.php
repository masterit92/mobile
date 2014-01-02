<?php $this->load->view('default/product/left'); ?>
<div class="right">
	<div class="sort_by">
		Product
		<?php
		if ($this->session->userdata('filter_by')):
			$filter = $this->session->userdata('filter_by');
			?>
			<br/><b>Filter By:</b><br/>
			<?php
			foreach ($filter as $key => $value):
				if (strcmp($key, 'price_min') == 0)
				{
					echo '- <b>Min Price</b>: ' . $value . '--<a href="#" class="event_del_filter" filter="price_min">Delete</a><br/>';
				}
				if (strcmp($key, 'price_max') == 0)
				{
					echo '- <b>Max Price</b>: ' . $value . '--<a href="#" class="event_del_filter" filter="price_max">Delete</a><br/>';
				}
				if (strcmp($key, 'sort_name') == 0)
				{
					echo '- <b>Sort Name</b>: ' . html_escape($value) . '--<a href="#" class="event_del_filter" filter="sort_name">Delete</a><br/>';
				}
				if (strcmp($key, 'sort_price') == 0)
				{
					echo '- <b>Sort Price</b>: ' . $value . '--<a href="#" class="event_del_filter" filter="sort_price">Delete</a><br/>';
				}
				if (strcmp($key, 'arr_m_id') == 0 && $value !== 'NULL')
				{
					echo '- <b>Maker</b>: ';
					$arr_maker = $this->model_maker->maker_by_id($value);
					foreach ($arr_maker as $maker)
					{
						echo html_escape($maker['name']) . '. ';
					}
					echo '--<a href="#" class="event_del_filter" filter="arr_m_id">Delete</a><br/>';
				}
			endforeach;
			if (isset($filter['c_id'])):
				echo "<a href='#' class='event_del_filter' filter='clear_filter'>Clear Filter</a>";
			endif;
		endif;
		?>
		<p>
			Sort by:
			<a href="#" class="event_sort_name" sort="DESC">Name&DoubleDownArrow;</a> -
			<a href="#" class="event_sort_name" sort="ASC">Name&DoubleUpArrow;</a> -
			<a href="#" class="event_sort_price" sort="DESC">Price&DoubleDownArrow;</a> -
			<a href="#" class="event_sort_price" sort="ASC">Price&DoubleUpArrow;</a>
		</p>
	</div>
	<?php if (count($data['list_product']) > 0): ?>
		<section class="services">
			<div class="shell">
				<div class="boxes">
					<div class="cl">&nbsp;</div>
					<?php
					foreach ($data['list_product'] as $product):
						?>
						<div class="box">
							<a href="<?php echo base_url('product/detail?p_id=' . $product['p_id']) ?>">
								<img src="<?php echo base_url($product['thumb']) ?>" alt=""/>

								<h3><?php echo html_escape($product['name']) ?></h3>
								<?php echo '$' . round($product['price'], 2) ?>
							</a>
						</div>
					<?php
					endforeach;
					$num_page = intval($data['num_page']);
					if ($num_page > 1):
						$url = '#?page';
						$class_name = 'event_page';
						?>
						<div class="cl">&nbsp;</div>
						<div class="page">
							<a href="#" class="<?php echo $class_name ?>" id="0">Start</a>
							<?php
							$current = 1;
							if (isset($data['page']))
							{
								$current = $data['page'];
							}
							$flag = TRUE;
							for ($i = 1; $i <= $num_page; $i++)
							{
								if ($i > ($current - 3) && $i < ($current + 3))
								{
									$flag = TRUE;
									if ($current === $i)
									{
										echo ' <a href="' . $url . '" class="' . $class_name . ' current" id="' . ($i - 1) . '" >' . $i . '</a>';
									}
									else
									{
										echo ' <a href="' . $url . '" class="' . $class_name . '" id="' . ($i - 1) . '" >' . $i . '</a>';
									}
								}
								else
								{
									if ($flag)
									{
										$flag = FALSE;
										echo " <a>....</a> ";
									}
								}
							}
							?>
							<a href="#" class="<?php echo $class_name ?>" id="<?php echo $num_page - 1 ?>">End</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php
	else: echo '<b>No data!</b>';
	endif;
	?>
</div>