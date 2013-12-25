<table class="zebra">
	<caption>Maker</caption>
	<thead>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($data['list_maker'] as $maker):
		?>
		<tr>
			<td><?php echo $maker['m_id'] ?></td>
			<td><?php echo $maker['name'] ?></td>
			<td>
				<a href="<?php echo base_url('admin/maker/edit?m_id=' . $maker['m_id']) ?>">Edit</a>
				<a href="<?php echo base_url('admin/maker/delete?m_id=' . $maker['m_id']) ?>" class="event_delete">Delete</a>
			</td>
		</tr>
	<?php
	endforeach;
	?>
	<tr>
		<td colspan="3">
			<a href="<?php echo base_url('admin/maker/create') ?>">Add New</a>
		</td>
	</tr>
	</tbody>
</table>