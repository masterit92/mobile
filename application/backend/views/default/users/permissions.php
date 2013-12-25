<form action="<?php echo base_url('admin/users/save_permissions') ?>" method="post">
	<input type="hidden" value="<?php echo $this->input->get('user_id') ?>" name="user_id"/>
	<table class="zebra">
		<caption>Selected permissions for User</caption>
		<thead>
		<tr>
			<th>Module</th>
			<th>Check</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$arr_role = array();
		foreach ($data['list_permissions'] as $role_id)
		{
			$arr_role[] = $role_id['role_id'];
		}
		foreach ($data['list_role'] as $role)
		{
			?>
			<tr>
				<td><?php echo $role['name'] ?></td>
				<td>
					<input type="checkbox" name="ckb_role[]"
						   value="<?php echo $role['role_id'] ?>" <?php echo in_array($role['role_id'], $arr_role) ? 'checked' : '' ?>/>
				</td>
			</tr>
		<?php
		}
		?>
		</tbody>
		<tr>
			<td colspan="2">
				<input type="submit" id="formsubmit" name="save" value="Save"/>
				<input type="button" name="back" value="Back" class="event_back"/>
			</td>
		</tr>
	</table>
</form>