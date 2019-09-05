<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>

		<table style="width:100%">
			<tbody>
				<tr>
					<td>
						<img src="<?= base_url() ?>theme/image/logo.gif" alt="" style="width: 200px;"/>			
					</td>
					<td>
						<div style="float: right;text-align: right; font-size: 12px; font-weight: bold;">
							<img src="<?= base_url() ?>theme/image/icon_phone.gif" style="height:10px;width:10px; margin-right:5px;" /><?= $this->config->config['mobile'] ?><br />
							<img id="EmailIconImage" src="<?= base_url() ?>theme/image/email_icon.gif" alt="info@mastergrannyflats.com.au" style="height:10px; margin-right:5px;width:10px;" /><a style="color: #f58322; text-decoration: none;outline: none;"><?= $this->config->config['email'] ?></a>
						</div>
					</td>
				</tr>

				<tr>
					<td colspan="2" style="height: 200px;">
						
					</td>
				</tr>
				<tr>
					<td colspan="2" style="height: 300px;">
						<h1 style="font-size:45px; text-align: center; vertical-align: middle; color: #3c3c3d;">FLOOR PLAN NOT AVALIBLE</h1>	
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<p style="text-align: center; font-weight: bold; color: #3c3c3d;">www.mastergrannyflats.com.au | info@mastergrannyflats.com.au | PO BOX 344 South Hurstville 2221</p>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="height: 100px;">
						
					</td>
				</tr>
			</tbody>
		</table>

		<table style="width:100%; font-size: 14px;">
			<tbody>

				<tr>
					<th style="font-weight: bold;">Client's Name:</th>
					<td><?= $quote['first_name'] ?> <?= $quote['last_name'] ?></td>
					<th style="font-weight: bold;">Quotation/Job No:</th>
					<td><?= $quote['id'] ?></td>
				</tr>
				 
				<tr>
					<th style="font-weight: bold;">Job Address:</th>
					<td><?= $quote['address'] ?></td>
					<th style="font-weight: bold;">Prepared On:</th>
					<td><?= date('d-m-Y',strtotime($quote['date'])) ?></td>
				</tr>

			</tbody>
		</table>
		
			
		
	</body>
</html>


