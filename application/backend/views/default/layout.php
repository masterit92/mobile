<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<script type="text/javascript">
		var url_root = '<?php echo base_url()?>';
	</script>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<?php
	$arr_file_css = array('menu_left.css', 'menu_top.css', 'style_admin.css', 'treeview.css', 'table.css', 'form.css');
	$arr_file_js = array('jquery.validate.min.js', 'ckeditor/ckeditor.js', 'my_js.js');
	echo $this->render->render_js($arr_file_js, 'backend');
	echo $this->render->render_css($arr_file_css, 'backend');
	if ($this->session->flashdata('error'))
	{
		$error = $this->session->flashdata('error');
		echo "<script> alert('$error');</script>";
	}
	?>
	<title><?php echo $title ?></title>
</head>
<body>
<div class="wraper">
	<?php $this->load->view('default/header'); ?>
	<div class="container">
		<?php $this->load->view('default/left'); ?>
		<div class="container-right">
			<?php $this->load->view($template, $data = ''); ?>
		</div>
	</div>
	<div class="clear"></div>
	<?php $this->load->view('default/footer'); ?>
</div>
</body>
</html>