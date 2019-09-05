<h3><?= $title ?></h3>
<?php if($this->input->post() && $results == 0){ ?>
	<span class="message">No records found.</span>
<?php } ?>
<form method="post" action="<?= base_url('quotation/index') ?>">
<table cellpadding="10px">
	<tbody>
		<tr>
			<td><label class="control-label" for="">First Name:</label></td>
			<td><input type="text" name="first_name" class="input-medium" value="<?= $name[0] ?>"></td>
			<td><label class="control-label" for="">Last Name:</label></td>
			<td><input type="text" name="last_name" class="input-medium" value="<?= $name[1] ?>"></td>
		</tr>
		<tr>
			<td><label class="control-label" for="">Address:</label></td>
			<td><input type="text" name="address" class="input-medium" value="<?= $add[0] ?>"></td>
			<?php if($this->session->userdata('id') == 1){ ?>
			<td><label class="control-label" for="">Created By:</label></td>
			<td>
			
				<select name="created_by">
					<option value="">Select</option>
					<?php foreach ($this->user_model->get_users_all() as $key => $value) { ?>
						<option value="<?= $value['id'] ?>" <?= ($add[1] == $value['id'])?'selected':''; ?>><?= $value['name'] ?></option>
					<?php } ?>
				</select>
			</td>
			<?php }else{ ?>
				<input type="hidden" name="created_by" value="">
			<?php } ?>
		</tr>
		<tr>
			<td><label class="control-label" for="">Date From (dd/mm/yyyy):</label></td>
			<td>
				<input type="text" name="date_from" class="input-medium" maxlength="10" value="<?= $date[0] ?>">
				<a href="javascript:;">
					<img src="<?= base_url(); ?>theme/image/calendar.jpg">
				</a>
			</td>
			<td><label class="control-label" for="">Date To (dd/mm/yyyy):</label></td>
			<td>
				<input type="text" name="date_to" class="input-medium" maxlength="10" value="<?= $date[1] ?>">
				<a href="javascript:;">
					<img src="<?= base_url(); ?>theme/image/calendar.jpg">
				</a>
			</td>

		</tr>
		<tr>
			<td>
				<input type="submit" value="Search Quote" class="btn">
			</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
</table>
</form>
<br>

<?php if($results > 0){ ?>
<table width="100%" cellpadding="0" cellspacing="0" class="tabResult">
	<tbody>
		<tr>
			<th class="first">View Quotation</th>
			<th>Re-quote</th>
			<th>Quotation Letter</th>
			<th>Trade Breakup</th>
			<th>Floor Plan</th>
			<th>Contract</th>
			<th>Contract 5 Installments</th>
			<th>Delete</th>
 			<th align="left">Quotation Number</th>
			<th align="left">Customer Name</th>
			<?php if($this->session->userdata('id') == 1){ ?>
				<th align="left">Created By</th>
			<?php } ?>
			<th align="left">Date Prepared</th>
		</tr>
		<?php foreach ($result as $key => $value) { ?>
			<tr>
				<td class="first" style="width:40px;">
					<a target="_blank" href="<?= base_url('quotation/view/'.$value['id']) ?>">View</a>
				</td>
				<?php $row = $this->quotation_model->get_full_quote($value['id'])[0]; ?>
				<?php if($row['design_id'] != ''){
                    $ids = '?id='.$value['id'].'&d_id='.$row['design_id'];
                }else{ 
                	$ids = '?id='.$value['id'];
                } ?>
				<td style="width:60px;">
					<a target="_blank" href="<?= base_url('quotation/re_quote/'.$ids) ?>">Re-quote</a>
				</td>
				<td>
					<a href="<?= base_url('my_pdf/quotation_later/').$value['id'] ?>" target="_blank">View</a>&nbsp;/&nbsp;
					<a href="<?= base_url('quotation/send/').$value['id']; ?>" target="_blank">Send</a>
				</td>
				<td style="width:40px;">
					<a target="_blank" href="<?= base_url('quotation/trade_backup/').$value['id'] ?>">Doc</a>
				</td>
				<td>
					<a target="_blank" href="<?= base_url('my_pdf/floor_plan/').$value['id']; ?>">Floor Plan</a>
				</td>
				<td style="width:20px;">
					<a href="#">Pdf</a>
				</td>
				<td style="width:20px;">
					<a href="#">Pdf</a>
				</td>
				<td style="width:20px;">
					<a href="<?= base_url('quotation/delete/'.$value['id']); ?>" onclick="return confirm('Are You Sure wnt to delete this Quotation ?');">Delete</a>
				</td>
				<td><?= $value['id'] ?></td>
				<td><?= $value['first_name'] ?> <?= $value['last_name'] ?></td>
				<?php if($this->session->userdata('id') == 1){ ?>
					<td><?= $this->user_model->get_user($value['user_id'])['name']; ?></td>
				<?php } ?>
				<td><?= date('d/m/Y' , strtotime($value['date'])) ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<?php } ?>

<div class="_space">
</div>