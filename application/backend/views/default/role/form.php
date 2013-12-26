<?php
if (isset($data['role']))
{
	$role = $data['role'][0];
}
?>
<div id="content">
	<h1>Form Role</h1>

	<form action="<?php echo base_url('admin/role/save') ?>" method="post" id="input_form">
		<p><strong>Note:</strong> Items marked <span class="required">*</span> are required fields</p>
		<fieldset id="personal">
			<legend><span>Role Information</span></legend>
			<ol>
				<?php if (isset($role)): ?>
					<input type="hidden" name="role_id" value="<?php echo $role['role_id'] ?>"/>
				<?php endif; ?>
				<li><label for="role name" class="required">Role Name<span>*</span></label>
					<input name="role_name" type="text" id="role_name"
						   value="<?php echo (isset($role)) ? $role['name'] : '' ?>" placeholder="Role Name"
						   class="required"/>
				</li>
			</ol>
		</fieldset>
		<fieldset id="submitform">
			<input type="submit" id="formsubmit" name="save"
				   value="<?php echo (isset($role)) ? 'Edit Role' : 'Create Role' ?>"/>
			<input type="button" name="back" value="Back" class="event_back"/>
		</fieldset>
	</form>
</div>