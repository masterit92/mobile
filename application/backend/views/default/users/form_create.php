<div id="content">
	<h1>Form Create User</h1>

	<form action="<?php echo base_url("admin/users/save") ?>" method="post" id="input_form">
		<p><strong>Note:</strong> Items marked <span class="required">*</span> are required fields</p>
		<fieldset id="personal">
			<legend><span>User Information</span></legend>
			<ol>
				<li><label for="full name" class="required">Full Name<span>*</span></label>
					<input name="full_name" type="text" id="full_name" value="" placeholder="Full Name"
						   class="required"/>
				</li>
				<li>
					<label for="email" class="required">Email<span>*</span></label>
					<input type="text" id="email" name="email" placeholder="Email" class="required"/>
				</li>
				<li>
					<label for="password" class="required">Password<span>*</span></label>
					<input type="password" id="password" name="password" placeholder="Password" class="required"/>
				</li>
				<li>
					<label for="Re-password" class="required">Re-Password<span>*</span></label>
					<input type="password" id="re_password" name="re_password" placeholder="Re-Password"
						   class="required"/>
				</li>
			</ol>
		</fieldset>
		<fieldset id="submitform">
			<input type="submit" id="formsubmit" name="save" value="Create User"/>
			<input type="button" name="back" value="Back" class="event_back"/>
		</fieldset>
	</form>
</div>