<?php
if (isset($data['product']))
{
	$product = $data['product'][0];
}
if (isset($data['product_category']))
{
	$product_category = $data['product_category'];
	$_GET['product_category'] = $product_category;
}
?>
<div id="content">
	<h1>Form Product</h1>

	<form action="<?php echo base_url('admin/product/save') ?>" method="post" id="input_form"
		  enctype="multipart/form-data">
		<?php if (isset($product)): ?>
			<input type="hidden" name="p_id" value="<?php echo $product['p_id'] ?>"/>
		<?php endif; ?>
		<p><strong>Note:</strong> Items marked <span class="required">*</span> are required fields</p>
		<fieldset id="personal">
			<legend><span>Product Information</span></legend>
			<ol>
				<li><label for="Product name" class="required">Product Name<span>*</span></label>
					<input name="product_name" type="text" id="product_name"
						   value="<?php echo isset($product) ? $product['name'] : '' ?>" placeholder="Product Name"
						   class="required"/>
				</li>
				<?php if (isset($product)): ?>
					<li>
						<label for="Product name">&nbsp;<span>*</span></label>
						<img src="<?php echo base_url($product['thumb']) ?>" width="100" height="100"/><br/>
					</li>
				<?php endif; ?>
				<li><label for="Thumb" class="required">Thumb<span>*</span></label>
					<input type="file" name="thumb"/>
				</li>
				<li><label for="Price" class="required">Price<span>*</span></label>
					<input name="price" type="text" id="price"
						   value="<?php echo isset($product) ? $product['price'] : '' ?>" placeholder="Price"
						   class="required"/>
				</li>
				<li><label for="Description" class="required">Description<span>*</span></label><br/>
					<textarea name="description" id="description"
							  value="" required><?php echo isset($product) ? $product['description'] : '' ?></textarea>
					<script type="text/javascript">CKEDITOR.replace('description');</script>

				</li>
				<li><label for="Quantity" class="required">Quantity<span>*</span></label>
					<input name="quantity" type="text" id="quantity"
						   value="<?php echo isset($product) ? $product['quantity'] : '' ?>" placeholder="Quantity"
						   class="required"/>
				</li>
				<li><label for="Chooser Category" class="required">Chooser Category<span>*</span></label>
					<select name="cat_id[]" multiple size="5">
						<?php
						$arr_cat = $data['list_category'];

						function show_select($arr_cat, $parent_id = 0, $text = '&triangleright;')
						{
							foreach ($arr_cat as $cat)
							{
								if ($cat['parent_id'] == $parent_id):
									echo '<option value="' . $cat['c_id'] . '"';
									if (isset($_GET['product_category']) && in_array($cat['c_id'], $_GET['product_category']))
									{
										echo 'selected';
									}
									echo '>';
									echo $text . $cat['name'] . '</option>';
									show_select($arr_cat, $cat['c_id'], $text . '&triangleright;&triangleright;&triangleright;');
								endif;
							}
						}

						show_select($arr_cat);
						?>
					</select>
				</li>
				<li><label for="Checked show Banner">Checked show banner<span>*</span></label>
					<select name="selected">
						<option value="0">No show</option>
						<?php
						for ($i = 1; $i <= SLIDE_SHOW; $i++)
						{
							if (isset($product) && $product['selected'] == $i)
							{
								echo "<option value='$i' selected >Silde Show $i</option>";
							}
							else
							{
								echo "<option value='$i'>Silde Show $i</option>";
							}
						}
						?>
					</select>
				</li>
				<li><label for="Checked show Banner">Maker<span>*</span></label>
					<select name="m_id">
						<?php
						foreach ($this->model_maker->all_maker() as $maker)
						{
							if (isset($product) && $product['m_id'] == $maker['m_id'])
							{
								echo '<option  value="' . $maker['m_id'] . '" selected>' . $maker['name'] . '</option>';
							}
							else
							{
								echo '<option  value="' . $maker['m_id'] . '">' . $maker['name'] . '</option>';
							}
						}
						?>
					</select>
				</li>
			</ol>
		</fieldset>
		<fieldset id="submitform">
			<input type="submit" id="formsubmit" name="save"
				   value="<?php echo (isset($product)) ? 'Edit Category' : 'Create Category' ?>"/>
			<input type="button" name="back" value="Back" class="event_back"/>
		</fieldset>
	</form>
</div>