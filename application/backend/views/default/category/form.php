<?php
if (isset($data['category']))
{
	$category = $data['category'][0];
}
?>
<div id="content">
	<h1>Form Category</h1>

	<form action="<?php echo base_url('admin/category/save') ?>" method="post" id="input_form">
		<?php if (isset($category)): ?>
			<input type="hidden" name="c_id" value="<?php echo $category['c_id'] ?>"/>
		<?php endif; ?>
		<p><strong>Note:</strong> Items marked <span class="required">*</span> are required fields</p>
		<fieldset id="personal">
			<legend><span>Category Information</span></legend>
			<ol>
				<li><label for="category name" class="required">Category Name<span>*</span></label>
					<input name="category_name" type="text" id="category_name"
						   value="<?php echo isset($category) ? $category['name'] : '' ?>" placeholder="Category Name"
						   class="required"/>
				</li>
				<li><label for="parent name" class="required">Parent Category<span>*</span></label>
					<select name="parent_id">
						<option value="0">Root</option>
						<?php
						$arr_cat = $data['list_category'];

						function show_select($arr_cat, $parent_c, $parent_id = 0, $text = '&triangleright;')
						{
							foreach ($arr_cat as $cat)
							{
								if ($cat['parent_id'] == $parent_id):
									echo '<option value="' . $cat['c_id'] . '"';
									if (isset($_GET['c_id']))
									{
										$c_id = $_GET['c_id'];
										if ($cat['c_id'] == $c_id)
										{
											echo ' disabled ';
										}
										if ($parent_c == $cat['c_id'])
										{
											echo ' selected ';
										}
									}
									echo '>';
									echo $text . $cat['name'] . '</option>';
									show_select($arr_cat, $parent_c, $cat['c_id'], $text . '&triangleright;&triangleright;&triangleright;');
								endif;
							}
						}

						show_select($arr_cat, $category['parent_id']);
						?>
					</select>
				</li>
			</ol>
		</fieldset>
		<fieldset id="submitform">
			<input type="submit" id="formsubmit" name="save"
				   value="<?php echo (isset($category)) ? 'Edit Category' : 'Create Category' ?>"/>
			<input type="button" name="back" value="Back" class="event_back"/>
		</fieldset>
	</form>
</div>