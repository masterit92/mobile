<?php
if ($this->session->userdata('filter_by'))
{
	$filter_by = $this->session->userdata('filter_by');
}
$arr_m_id = '';
foreach ($data['makers'] as $maker)
{
	$arr_m_id .= $maker['m_id'] . ',';
}
$arr_m_id = rtrim($arr_m_id, ',');
?>
<script>
	var arr_m_id = new Array(<?php echo $arr_m_id;?>);
	$(function () {
		$("#slider-range").slider({
			range: true,
			min: <?php echo $data['min_max_price']['min_price']?>,
			max: <?php echo $data['min_max_price']['max_price']?>,
			values: [<?php echo (isset($filter_by['price_min'])) ? $filter_by['price_min'] :  $data['min_max_price']['min_price']?>, <?php echo (isset($filter_by['price_max'])) ? $filter_by['price_max'] :  $data['min_max_price']['max_price']?>],
			slide: function (event, ui) {
				$("#amount").val("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]);
			}
		});
		$("#amount").val("$" + $("#slider-range").slider("values", 0) +
			" - $" + $("#slider-range").slider("values", 1));


	});
</script>
<script src="<?php echo base_url('public/fontend/js/my_js.js'); ?>" type="text/javascript"></script>
<div class="left">
	<div class="menu_left">
		<div class="left_title">Brands</div>
		<div class="left_content">
			<?php
			if (isset($data['makers']) && count($data['makers']) > 0):
				foreach ($data['makers'] as $makers):
					if (isset($filter_by['arr_m_id']) && $filter_by['arr_m_id'] !== 'NULL' && in_array($makers['m_id'], $filter_by['arr_m_id'])):
						?>
						<input type="checkbox" class="event_makers" checked
							   id="<?php echo 'makerid_' . $makers['m_id'] ?>" name="cb_maker[]"
							   id="<?php echo $makers['m_id'] ?>"
							/> <?php echo html_escape($makers['name']) ?>
						<br/>
					<?php
					else:
						?>
						<input type="checkbox" class="event_makers"
							   id="<?php echo 'makerid_' . $makers['m_id'] ?>" name="cb_maker[]"
							   id="<?php echo $makers['m_id'] ?>"
							/> <?php echo html_escape($makers['name']) ?>
						<br/>
					<?php
					endif;
					?>
				<?php
				endforeach;
			else:
				echo '<b>No Maker</b>';
			endif;
			?>
		</div>
	</div>

	<div class="menu_left">
		<div class="left_title">Price</div>
		<div class="left_content">
			<p>
				<label for="amount"><b>Price range:</b></label>
				<input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;">
			</p>

			<div id="slider-range"></div>
		</div>
	</div>
</div>