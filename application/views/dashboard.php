<h3><?= $title ?></h3>


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
		<?php foreach ($this->quotation_model->dashboard_list() as $key => $value) { ?>
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

<div class="_space">
</div>