<h3><?= $title ?></h3>


<div class="form-horizontal">
	<?php foreach ($this->price_model->get_categories() as $key => $__value) { ?>
		<h4><?= $__value['name'] ?></h4>

		<?php foreach ($this->price_model->get_subcategories($__value['id']) as $_key => $_value) { ?>

			<div>
				<h5><?= $_value['name'] ?></h5>
				<table class="tabResult" cellspacing="0" style="border-collapse:collapse;">
					<tbody>
						<tr>
							<th class="first">Action</th>
							<th>Feature Name</th>
							<th>Price</th>
							<th>Lock</th>
							<th>Colors</th>
						</tr>
						<?php foreach($this->price_model->get_optional_features($_value['id']) as $key => $value) { ?>
							<?php if($prices == ''){ ?>
								<tr>
									<td class="first">
										
											<a href="<?= base_url('manage_prices/optional_prices/'.$value['id']) ?>" class="a_rows">Edit</a>
									
									</td>
									<td style="width: 200px;">
										<?= $value['name'] ?>
									</td>
									<td style="width: 100px;"  class="first">
										<?= $value['rate'] ?>
									</td>

									<td style="width: 100px;"  class="first">
										<input type="checkbox" name="" <?= ($value['lock'] == 1)?'checked':''; ?> disabled>
									</td>
									<td style="width: 393px;" class="first">
										
									</td>
								</tr>	
							<?php }else{ ?>

								<?php if($prices['id'] == $value['id']){ ?>
									<form action="<?= base_url('manage_prices/optional_price_save'); ?>" method="post">
										<tr>
											<td class="first">
												
												<input type="submit" value="Save">

												<a href="<?= base_url('manage_prices/optional_prices') ?>" class="a_rows" style="padding: 4px 20px;">		Cancel
												</a>
											
											</td>
											<td style="width: 200px;">
												<input name="base_rate_name" type="text" value="<?= set_value('base_rate_name',$value['name']) ?>" style="width:150px;" autofocus>
											</td>
											<td style="width: 100px;"  class="first">
												<input type="hidden" name="main_id" value="<?= set_value('main_id',$value['id']) ?>">
												<input name="base_rate_price" type="text" value="<?= set_value('base_rate_price',$value['rate']) ?>" style="width:100px;">
												<?= form_error('base_rate_price'); ?>
											</td>

											<td style="width: 100px;"  class="first">
												<input type="checkbox" value="1" name="base_rate_lock" <?= (set_value('base_rate_lock',$value['lock']) == 1)?'checked':''; ?> >
											</td>
											<td style="width: 393px;" class="first">
										
											</td>
										</tr>	
									</form>
								<?php }else{ ?>

									<tr>
										<td class="first">
											
												<a href="<?= base_url('manage_prices/optional_prices/'.$value['id']) ?>" class="a_rows">Edit</a>
										
										</td>
										<td style="width: 200px;">
											<?= $value['name'] ?>
										</td>
										<td style="width: 100px;"  class="first">
											<?= $value['rate'] ?>
										</td>

										<td style="width: 100px;"  class="first">
											<input type="checkbox" name="" <?= ($value['lock'] == 1)?'checked':''; ?> disabled>
										</td>
										<td style="width: 393px;" class="first">
										
										</td>
									</tr>

							<?php } } ?>
						<?php } ?>
					</tbody>
				</table>
			</div>

		<?php }?>


	<?php } ?>
		
		
</div>



<div class="_space">
</div>

<style type="text/css">
	.tabResult td{
		padding: 10px !important;
	}
	.tabResult th{
		padding: 0 10px !important;	
	}
</style>