<div class="container-menu">
	<div class="container-menu-title">Menu Manager</div>
	<div class="container-menu-content">
		<div id='cssmenu'>
			<ul>
				<li class=' '><a href='<?php echo base_url('admin/index') ?>'><span>Home</span></a></li>
				<li class='has-sub '><a href='#'><span>User</span></a>
					<ul>
						<li><a href="<?php echo base_url('admin/users') ?>"><span>User</span></a></li>
						<li><a href="<?php echo base_url('admin/role') ?>"><span>Role</span></a></li>
					</ul>
				</li>
				<li class='has-sub '><a href="<?php echo base_url('admin/product') ?>"><span>Product</span></a>
					<ul>
						<li><a href="<?php echo base_url('admin/product') ?>"><span>Product</span></a></li>
						<li><a href="<?php echo base_url('admin/maker') ?>"><span>Maker</span></a></li>
					</ul>
				</li>
				<li><a href="<?php echo base_url('admin/category') ?>"><span>Category</span></a></li>
			</ul>
		</div>
	</div>
</div>


