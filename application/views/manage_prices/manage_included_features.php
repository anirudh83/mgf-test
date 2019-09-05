<h3><?= $title ?></h3>
<table>
	<tbody>
		<tr>
			<td><label class="control-label" for="design">Base Design: </label></td>
			<td>
				<select name="design" id="design" onchange="set_base_design(this.value);">
					<option value="">-- Select --</option>
					<?php foreach ($this->price_model->base_rate_designs() as $key => $value) { ?>
						<option value="<?= $value['id'] ?>" <?= ($value['id'] == $design)?'selected':''; ?>><?= $value['name'] ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
	</tbody>
</table>

<?php if($design != ''){ $design_row = $this->price_model->base_rate_designs_check($design)[0]['included']; $included = explode(',', $design_row); ?>
<form action="<?= base_url('manage_prices/included_features_save'); ?>" method="post">
<div class="form-horizontal">
	<?php foreach ($this->price_model->get_categories() as $key => $__value) { ?>
		<h4><?= $__value['name'] ?></h4>

		<?php foreach ($this->price_model->get_subcategories($__value['id']) as $_key => $_value) { ?>
			<div class="split half control-group">
				<div>
					<h5><?= $_value['name'] ?></h5>

					<table class="tabResult" cellspacing="0" style="border-collapse:collapse;">
						<tbody>
							<tr>
								<th class="first">Action</th>
								<th>Feature Name</th>
								<th>Included</th>
								<th>Quantity</th>
							</tr>
							<?php foreach($this->price_model->get_optional_features($_value['id']) as $key => $value) { ?>
								<?php if($prices == ''){ ?>
									<tr>
										<td class="first">
											
											<a href="<?= base_url('manage_prices/included_features/?d_id='.$design.'&f_id='.$value['id']) ?>" class="a_rows">Edit</a>
										
										</td>
										<td style="width: 200px;">
											<?= $value['name'] ?>
										</td>
										<td style="width: 100px;"  class="first">
											<input type="checkbox" name="" <?= (in_array($value['id'], $included))?'checked':''; ?> disabled>
										</td>
										<td class="first" align="center">
											<?= (in_array($value['id'], $included))?'1':''; ?>
										</td>
									</tr>	
								<?php }else{ ?>

									<?php if($prices['id'] == $value['id']){ ?>
										
										<tr>
											<td class="first">
												
												<input type="submit" value="Save">

												<a href="<?= base_url('manage_prices/optional_prices') ?>" class="a_rows" style="padding: 4px 20px;">		Cancel
												</a>
											
											</td>
											<td style="width: 200px;">
												<?= $value['name'] ?>
											</td>

											<td style="width: 100px;"  class="first">
												<input type="checkbox" value="<?= $value['id'] ?>" name="included[]" <?= (in_array($value['id'], $included))?'checked':''; ?> autofocus>
											</td>
											<td style="width: 393px;" class="first" align="center">
												<input type="text" name="" value="1" readonly>
												<input type="hidden" name="d_id" value="<?= $design; ?>">
											</td>
										</tr>	
										
									<?php }else{ ?>

										<tr>
											<td class="first">
												
												<a href="<?= base_url('manage_prices/included_features/?d_id='.$design.'&f_id='.$value['id']) ?>" class="a_rows">Edit</a>
											
											</td>
											<td style="width: 200px;">
												<?= $value['name'] ?>
											</td>
											<td style="width: 100px;"  class="first">
												<input type="checkbox" name="included[]" value="<?= $value['id'] ?>" <?= (in_array($value['id'], $included))?'checked':''; ?> style="pointer-events: none;">
											</td>
											<td class="first" align="center">
												<?= (in_array($value['id'], $included))?'1':''; ?>
											</td>
										</tr>

								<?php } } ?>
							<?php } ?>
						</tbody>
					</table>

				</div>
			</div>
		<?php } ?>
		<br clear="left">
	<?php } ?>
</div>
<?php } ?>
</form>

<script type="text/javascript">
	function set_base_design(value){
		if(value != ''){
			window.location.href = '<?= base_url("manage_prices/included_features?d_id="); ?>'+value;
		}else{
			window.location.href = '<?= base_url("manage_prices/included_features"); ?>';
		}
	}
</script>

<div class="_space">
</div>

<style type="text/css">
	.tabResult td{
		padding: 5px !important;
	}
	.tabResult th{
		padding: 0 10px !important;	
	}
</style>