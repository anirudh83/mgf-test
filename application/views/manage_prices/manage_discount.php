<h3><?= $title ?></h3>

<a href="<?= base_url('manage_prices/add_discount') ?>">Add Code</a>
<br><br>
<table class="tabResult" cellspacing="0" style="border-collapse:collapse;">
	<tbody>
		<tr>
			<th class="first">Action</th>
			<th>Code</th>
			<th>Discount</th>
		</tr>
		<?php foreach ($this->db->get('discount')->result_array() as $key => $value) { ?>
			<tr>
				<td class="first">
					<a href="<?= base_url('manage_prices/delete_discount/'.$value['id']) ?>" class="a_rows" onclick="return confirm('Are You Sure You Want to delete this?');">Delete</a>
				</td>
				<td>
					<?= $value['code'] ?>
				</td>
				<td>
					<?= (!empty($value['percent']))? $value['percent'].' %':$value['amount']; ?>
				</td>
			</tr>	
		<?php } ?>
	</tbody>
</table>
<div class="_space">
</div>

<style type="text/css">
	.tabResult td{
		width: auto !important; 
		padding: 10px !important;
	}
	.tabResult th{
		padding: 0 10px !important;	
	}
</style>