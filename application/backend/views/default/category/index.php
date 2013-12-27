<table class="zebra">
	<caption>Category</caption>
	<thead>
	<tr>
		<th>List category</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>
			<?php

			function show_tree_view($arr_cat, $parent_id = 0, $text = '&triangleright;')
			{
				foreach ($arr_cat as $cat)
				{
					if ($cat['parent_id'] == $parent_id):
						echo $text . html_escape($cat['name']);
						?>
						<a href="<?php echo base_url('admin/category/set_status?c_id=' . $cat['c_id'] . '&status=' . $cat['status']) ?>"><?php echo $cat['status'] == 1 ? 'Active' : 'No active' ?></a>&nbsp;&nbsp;
						<a href="<?php echo base_url('admin/category/edit?c_id=' . $cat['c_id']) ?>">Edit</a>&nbsp;&nbsp;
						<a href="<?php echo base_url('admin/category/delete?c_id=' . $cat['c_id']) ?>"
						   class="event_delete">Delete</a><br/><br/>
						<?php
						show_tree_view($arr_cat, $cat['c_id'], $text . '&triangleright;&triangleright;&triangleright;');
					endif;
				}
			}

			show_tree_view($data['list_category']);
			?>
		</td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('admin/category/create') ?>">Add New</a></td>
	</tr>
	</tbody>
</table>
