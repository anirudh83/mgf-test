<h3><?= $title ?></h3>


<table class="tabResult" cellspacing="0" style="border-collapse:collapse;">
	<tbody>
		<tr>
			<th class="first">Base Design</th>
			<th>Price</th>
			<th>Lock</th>
		</tr>
		<?php foreach($this->price_model->base_rate_designs() as $key => $value) { ?>
			<?php if($prices == ''){ ?>
				<tr>
					<td style="width: 200px;" class="first">
						<?= $value['name'] ?>
					</td>
					<td style="width: 100px;"  class="first">
						<?= $value['rate'] ?>
					</td>

					<td style="width: 100px;"  class="first">
						<input type="checkbox" name="" <?= ($value['lock'] == 1)?'checked':''; ?> disabled>
					</td>
				</tr>	
			<?php }else{ ?>

				<?php if($prices['id'] == $value['id']){ ?>
					<form action="<?= base_url('manage_prices/base_rate_save'); ?>" method="post">
						<tr>
							<td class="first">
								
								<input type="submit" value="Save">

								<a href="<?= base_url('manage_prices/manage_base_rate') ?>" class="a_rows" style="padding: 4px 20px;">		Cancel
								</a>
							
							</td>
							<td style="width: 200px;">
								<input name="base_rate_name" type="text" value="<?= set_value('base_rate_name',$value['name']) ?>" style="width:150px;">
							</td>
							<td style="width: 100px;"  class="first">
								<input type="hidden" name="main_id" value="<?= set_value('main_id',$value['id']) ?>">
								<input name="base_rate_price" type="text" value="<?= set_value('base_rate_price',$value['rate']) ?>" style="width:100px;">
								<?= form_error('base_rate_price'); ?>
							</td>

							<td style="width: 100px;"  class="first">
								<input type="checkbox" value="1" name="base_rate_lock" <?= (set_value('base_rate_lock',$value['lock']) == 1)?'checked':''; ?> >
							</td>
						</tr>	
					</form>
				<?php }else{ ?>

					<tr>
						<td class="first">
							
								<a href="<?= base_url('manage_prices/manage_base_rate/'.$value['id']) ?>" class="a_rows">Edit</a>
						
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
					</tr>

			<?php } } ?>
		<?php } ?>
	</tbody>
</table>



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