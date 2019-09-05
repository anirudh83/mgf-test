<h3>Manage <?= $title ?></h3>
<a href="<?= base_url('user/add') ?>">Add User</a>
<br><br>
<table class="tabResult" cellspacing="0" style="border-collapse:collapse;">
	<tbody>
		<tr>
			<th class="first">Action</th>
			<th>Name</th>
			<th>Username</th>
		</tr>
		<?php foreach ($this->user_model->get_users() as $key => $value) { ?>
			<tr>
				<td class="first">
					
						<a href="<?= base_url('user/edit/'.$value['id']) ?>" class="a_rows">Edit</a>
					<?php if($value['id'] != '1'){ ?>
						<a href="<?= base_url('user/delete/'.$value['id']) ?>" class="a_rows" onclick="return confirm('Are You Sure You Want to delete this?');">Delete</a>
					<?php } ?>
				</td>
				<td>
					<?= $value['name'] ?>
				</td>
				<td>
					<?= $value['user_name'] ?>
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