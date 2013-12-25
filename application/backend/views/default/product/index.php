<script>
	$(function () {
		$('.event_page').click(function () {
			var page = $(this).attr('id');
			page = parseInt(page) + 1;
			$('.container-right').load('<?php echo base_url('admin/product/index')   ?>', {'page': page});

		});
	});
</script>
<table class="zebra">
	<caption>Product</caption>
	<tr>
		<td colspan="8"><a href="<?php echo base_url('admin/product/create') ?>">Add New</a></td>
	</tr>
	<thead>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Thumb</th>
		<th>Maker</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>
	<?php

	foreach ($data['list_product'] as $product)
	{
		$maker = $this->model_maker->maker_by_id($product['m_id']);
		?>
		<tr>
			<td><?php echo $product['p_id'] ?></td>
			<td><?php echo $product['name'] ?></td>
			<td><img src="<?php echo base_url($product['thumb']) ?>" width="150" height="150"/></td>
			<td><?php echo $maker[0]['name'] ?></td>
			<td><?php echo $product['price'] ?></td>
			<td><?php echo $product['quantity'] ?></td>
			<td>
				<?php
				if (intval($product['status']) === 1)
				{
					echo '<a href="' . base_url('admin/product/set_status?p_id=' . $product['p_id'] . '&status=' . $product['status']) . '">Active</a>';
				}
				else
				{
					echo '<a href="' . base_url('admin/product/set_status?p_id=' . $product['p_id'] . '&status=' . $product['status']) . '">No Active</a>';
				}
				?>
			</td>
			<td>
				<a href="<?php echo base_url('admin/product/edit?p_id=' . $product['p_id']); ?>">Edit</a>
				<a href="<?php echo base_url('admin/product/delete?p_id=' . $product['p_id']); ?>" class="event_delete">Delete</a>
			</td>
		</tr>
	<?php
	}
	$num_page = intval($data['num_page']);
	$url = '#';
	$class_name = 'event_page';
	?>
	<tr>
		<td colspan="8">
			<a href="#?page=1" class="<?php echo $class_name ?>" id="0">Start</a>
			<?php
			$current = 1;
			if (isset($_GET['page']))
			{
				$current = $_GET['page'];
			}
			$flag = TRUE;
			for ($i = 1; $i <= $num_page; $i++)
			{
				if ($i > ($current - 3) && $i < ($current + 3))
				{
					$flag = TRUE;
					echo ' <a href="' . $url . '?page=' . $i . '" class="' . $class_name . '" id="' . ($i - 1) . '">' . $i . '</a>';
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
			<a href="#?page=<?php echo $num_page ?>" class="<?php echo $class_name ?>" id="<?php echo $num_page - 1 ?>">End</a>
		</td>
	</tr>
	</tbody>
</table>
