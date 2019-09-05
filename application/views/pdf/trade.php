 <!DOCTYPE html>
<html>
	<head>
	</head>
	<body>

		<table style="width:100%">
			<tbody>
				<tr>
					<td style="height: 170px;">
						
					</td>
				</tr>
				<tr>
					<td align="center">
						<img src="<?= base_url() ?>theme/image/logo.gif" alt="" style="width: 400px;"/>			
					</td>
				</tr>

				<tr>
					<td style="height: 150px;">
						
					</td>
				</tr>

				<tr>
					<td align="center">
						<h1 style="font-size: 28px;">Home building contract<br> for work over $5,000</h1>
					</td>
				</tr>
				<tr>
					<td style="height: 160px;">
						
					</td>
				</tr>
				<tr>
					<td style="">
						<div style="float: right;text-align: right; font-size: 12px; font-weight: bold;">
							<img src="<?= base_url() ?>theme/image/icon_phone.gif" style="height:10px;width:10px; margin-right:5px;" /><?= $this->config->config['mobile'] ?><br />
							<img id="EmailIconImage" src="<?= base_url() ?>theme/image/email_icon.gif" alt="info@mastergrannyflats.com.au" style="height:10px; margin-right:5px;width:10px;" /><a style="color: #f58322; text-decoration: none;outline: none;"><?= $this->config->config['email'] ?></a><br>
							<a style="color: #f58322; text-decoration: none;outline: none;">www.mastergrannyflats.com.au</a>
						</div>
					</td>
				</tr>
			</tbody>
		</table>

		<!--  page 2 -->

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
			</tbody>
		</table>
		<br><br>
		<table style="width: 100%;">
			<tr>
				<td colspan="3">
					<h1>Introduction</h1>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<p style="font-size: 11px;">
						Before signing, the owner should carefully go through all of the items in the check list overleaf. If you
answer ‘no’ to any of the questions in the check list you may not be ready to sign the contract. Both parties
should take time to read and understand all the contract documents.
					</p>
					<p style="font-size: 11px;">
						This contract should have been available to both parties in sufficient time to allow for reading and for advice
to be obtained if necessary, prior to signature
					</p>
					<p style="font-size: 11px;">
						References to costs and prices throughout the contract are inclusive of GST where applicable (Goods and
Services Tax levied by the Federal Government).
					</p>
				</td>
			</tr>
			<tr>
				<td colspan="3" style="height: 20px;">
					
				</td>
			</tr>
			<tr>
				<td>
					<p style="font-style: italic;"><b>Note:</b> In this contract: </p>
				</td>
				<td>
					<p style="font-style: italic;">Refers to explanatory notes of primary interest to contractors.</p>
				</td>
				<td>
					<p style="font-style: italic;">Refers to explanatory notes of primary interest to owners.</p>
				</td>
			</tr>
			<tr>
				<td colspan="3" style="height: 10px;">
					
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<h1>Signatures</h1>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<p style="font-size: 11px;">
						Do not sign this contract unless you have read and understand the clauses as well as the notes and
explanations contained in this document.
					</p>
				</td>
			</tr>
			<tr>
				<td colspan="3" style="height: 20px;">
					
				</td>
			</tr>
		</table>

		<table style="width: 100%;" cellpadding="3">
			<tr>
				<td width="30%">
					<div style="font-style: italic;">
						<b>Warning:</b> The contract
price may increase in accordance
with the contract terms. This is
because not all costs can be
absolutely determined at the outset
although the contractor is obliged to
make reasonable estimates given
known conditions. The reasons for
possible increases include:
					
						<ul>
							<li>Increase in taxes, eg. GST (Clause 3) </li>
							<li>Provisional Sums (Clause 10) </li>
							<li>Prime Cost Items (Clause 11) </li>
							<li>Variations, including those due to unforeseen matters or required by council (Clause 13)</li>
							<li>Interest on overdue payments (Clause 14)</li>
							<li>Boundary Survey (Clause 20).</li>
						</ul>
						<b>Note:</b> Where the owner
or the contractor is a company
or partnership or the contract is
to be signed by an authorised
agent of the owner, the capacity
of the person signing the contract,
eg. director, must be inserted.
					</div>
				</td>
				<td width="70%">
					<table width="100%" cellpadding="2">
						<tr>
							<td width="30%">
								<p style="font-size: 13px; font-weight: bold;">Contract price<br>
								<span style="font-size: 10px; font-weight: normal;">(including GST)</span></p>
							</td>
							<td width="70%">
							</td>
						</tr>
						<tr>
							<td>
								<p style="font-size: 10px; font-weight: bold;">Amount in words</p>
							</td>
							<td style="border: 1px solid #000000;">
								<?= numberTowords($quote['grand_total']); ?>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								
							</td>
						</tr>
						<tr>
							<td></td>
							<td style="">
								<p style="text-align: right;font-size: 11px;border: 1px solid #000000;">$ <?= $quote['grand_total'] ?></p>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								
							</td>
						</tr>
						<tr>
							<td width="30%">
								<p style="font-size: 13px; font-weight: bold;">Owner’s signature</p>
							</td>
							<td width="70%" style="border: 1px solid #000000; height: 25px;">

							</td>
						</tr>
						<tr>
							<td colspan="2">
								
							</td>
						</tr>
						<tr>
							<td width="30%">
								<p style="font-size: 10px; font-weight: bold;">Name (print)</p>
							</td>
							<td width="70%" style="border: 1px solid #000000;">
								<?= $quote['first_name'] ?> <?= $quote['last_name'] ?>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								
							</td>
						</tr>
						<tr>
							<td width="30%">
								<p style="font-size: 10px; font-weight: bold;">Name 2</p>
							</td>
							<td width="70%" style="border: 1px solid #000000;">
								<?= $quote['first_name2'] ?> <?= $quote['last_name2'] ?>
							</td>
						</tr>

						<tr>
							<td colspan="2">
								
							</td>
						</tr>
						<tr>
							<td width="30%">
								<p style="font-size: 10px; font-weight: bold;">Date</p>
							</td>
							<td width="70%" style="border: 1px solid #000000;">
								
							</td>
						</tr>
						<tr>
							<td colspan="2">
								
							</td>
						</tr>
						<tr>
							<td width="30%">
								<p style="font-size: 13px; font-weight: bold;">Owner’s signature</p>
							</td>
							<td width="70%" style="border: 1px solid #000000; height: 25px;">

							</td>
						</tr>
						<tr>
							<td colspan="2">
								
							</td>
						</tr>
						<tr>
							<td width="30%">
								<p style="font-size: 10px; font-weight: bold;">Name (print)</p>
							</td>
							<td width="70%" style="border: 1px solid #000000;">
								<?= $this->config->config['contractor_name']; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								
							</td>
						</tr>
						<tr>
							<td width="30%">
								<p style="font-size: 10px; font-weight: bold;">Date</p>
							</td>
							<td width="70%" style="border: 1px solid #000000;">
								
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		
		<!-- END page 2 -->

	</body>
</html>


