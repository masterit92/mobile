<div class="banner">
	<div class="banner-logo">
		<a href="<?php echo base_url('admin') ?>">
			<img src="<?php echo base_url("public/backend/images/logo.png") ?>" width="150" height="150"/>
		</a>
	</div>
	<div class="banner-top">
		<img src="<?php echo base_url("public/backend/images/banner.jpg") ?>" width="850" height="110"/>
	</div>
	<div class="banner-menu">
		<div class="menu5">
			<a> Hello,
				<b>
					<?php
					$user = $this->session->userdata("user_infor");
					echo $user->full_name;
					?>
				</b> >>>>
			</a>
			<a href="<?php echo base_url('admin/users/password?user_id=' . $user->user_id) ?>">Change password</a> |
			<a href="<?php echo base_url('admin/users/profile?user_id=' . $user->user_id) ?>">Edit profile</a> |
			<a href="<?php echo base_url('admin/index/logout') ?>">Logout</a>
		</div>
	</div>
</div>