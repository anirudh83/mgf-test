<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>

		<table style="width:100%">
			<tbody>
				<tr>
					<td>
						<img src="<?= base_url() ?>theme/image/logo.gif" alt="" style="width: 150px;"/>			
					</td>
					<td>
						<div style="float: right;text-align: right; font-size: 12px; font-weight: bold;">
							<img src="<?= base_url() ?>theme/image/icon_phone.gif" style="height:10px;width:10px; margin-right:5px;" /><?= $this->config->config['mobile'] ?><br />
							<img id="EmailIconImage" src="<?= base_url() ?>theme/image/email_icon.gif" alt="" style="height:10px; margin-right:5px;width:10px;" /><a style="color: #f58322; text-decoration: none;outline: none;"><?= $this->config->config['email'] ?></a>
						</div>
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<p style="text-align: center; font-weight: bold;">Quotation Summary</p>
					</td>
				</tr>
				
			</tbody>
		</table>

		<div style="width: 100%;">
			
			<div style="width: 70%;">
				<table style="width:100%; font-size: 10px;">
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
			</div>

		</div>

		<table style="width: 100%; border: solid 1px #000000; font-size: 11px; ">
			<thead>
				<tr>
					<th width="130" style="background-color: #2f2b2b; color: #ffffff; border: solid 1px #000000; text-align: center; font-weight: bold;"></th>
					<th width="156" style="background-color: #2f2b2b; color: #ffffff; border: solid 1px #000000; text-align: center; font-weight: bold;"></th>
					<th width="42" style="background-color: #2f2b2b; color: #ffffff; border: solid 1px #000000; text-align: center; font-weight: bold;">Colour</th>
					<th width="40" style="background-color: #2f2b2b; color: #ffffff; border: solid 1px #000000; text-align: center; font-weight: bold;">Units</th>
					<th width="85" style="background-color: #2f2b2b; color: #ffffff; border: solid 1px #000000; text-align: center; font-weight: bold;">Unit Price(AUD) Incl.GST</th>
					<th width="85" style="background-color: #2f2b2b; color: #ffffff; border: solid 1px #000000; text-align: center; font-weight: bold;">Total</th>
				</tr>
			</thead>
			<tbody>

				<?php if(!empty($quote['design_id'])){ ?>
					<tr>
						<td colspan="6" style="background-color: #f58322;color: #ffffff; font-weight: bold;border: solid 1px #000000;">Base Design</td>
					</tr>
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left;"></td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->base_rate_designs_check($quote['design_id'])[0]['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$quote['design_text'], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$quote['design_text'], 2, '.', '') ?></td>
					</tr>
				<?php } ?>

				<?php if($quote['cate1'] != 'null' || $quote['cate2'] != 'null' || $quote['cate3'] != 'null'){ ?>
					<tr>
						<td colspan="6" style="background-color: #f58322;color: #ffffff; font-weight: bold;border: solid 1px #000000;">External</td>
					</tr>
				<?php } ?>

				<?php if($quote['cate1'] != 'null'){ $cate1 = json_decode($quote['cate1']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">Facade</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate1[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate1[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate1[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>

				<?php if($quote['cate2'] != 'null'){ $cate2 = json_decode($quote['cate2']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">Roof</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate2[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate2[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate2[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>


				<?php if($quote['cate3'] != 'null'){ $cate3 = json_decode($quote['cate3']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">Framing</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate3[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate3[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate3[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>

				<?php $cate5 = json_decode($quote['cate5']); $co = 0; ?>

				<?php foreach ($cate5 as $key => $value) { 
					if($value[1] != ''){
						$co++;
					}
				} ?>
				<?php if($quote['cate4'] != 'null' || $co != 0){ ?>
					<tr>
						<td colspan="6" style="background-color: #f58322;color: #ffffff; font-weight: bold;border: solid 1px #000000;">Bedrooms</td>
					</tr>
				<?php } ?>
				<?php if($quote['cate4'] != 'null'){ $cate4 = json_decode($quote['cate4']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">Bedroom Floor Finishers</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate4[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate4[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate4[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>


				<?php $cate5 = json_decode($quote['cate5']); $co = 0; ?>

				<?php foreach ($cate5 as $key => $value) { ?>
					<?php if(!empty($value[1])){ ?>
						<tr>
							<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">
								<?= ($co == 0)?'Wardrobes':''; ?>		
							</td>
							<td width="156" style="border: solid 1px #000000; text-align: left;">
								<?= $this->price_model->get_optional_features_id($value[0])['name'] ?>
							</td>
							<td width="42" style="border: solid 1px #000000;"></td>
							<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;"><?= $value[1]; ?></td>
							<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$value[2], 2, '.', '') ?></td>
							<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$value[2], 2, '.', '') ?></td>
						</tr>
					<?php $co++; } ?>
				<?php } ?>
					
				<?php if($quote['cate6'] != 'null' || $quote['cate7'] != 'null' || $quote['cate8'] != 'null' || $quote['cate9'] != 'null' || $quote['cate10'] != 'null' || $quote['cate11'] != 'null' || $quote['cate12'] != 'null' || $quote['cate13'] != 'null' || $quote['cate14'] != 'null' || $quote['cate15'] != 'null'){ ?>
					<tr>
						<td colspan="6" style="background-color: #f58322;color: #ffffff; font-weight: bold;border: solid 1px #000000;">Kitchen
						</td>
					</tr>
				<?php } ?>

				<?php if($quote['cate6'] != 'null'){ $cate6 = json_decode($quote['cate6']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">Kitchen/Living</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate6[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate6[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate6[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>

				<?php if($quote['cate7'] != 'null'){ $cate7 = json_decode($quote['cate7']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">Splash Back</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate7[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate7[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate7[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>

				<?php if($quote['cate8'] != 'null'){ $cate8 = json_decode($quote['cate8']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">Cabinets</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate8[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate8[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate8[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>



				<?php if($quote['cate9'] != 'null'){ $cate9 = json_decode($quote['cate9']); ?>
					<?php foreach ($cate9 as $key => $value) { ?>
						<tr>
							<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;"><?= ($key == 0)?'Appliances':''; ?></td>
							<td width="156" style="border: solid 1px #000000; text-align: left;">
								<?= $this->price_model->get_optional_features_id($value[0])['name'] ?>
							</td>
							<td width="42" style="border: solid 1px #000000;"></td>
							<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
							<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$value[1], 2, '.', '') ?></td>
							<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$value[1], 2, '.', '') ?></td>
						</tr>
					<?php } ?>	
				<?php } ?>

				<?php if($quote['cate10'] != 'null'){ $cate10 = json_decode($quote['cate10']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">Kitchen Benchtop</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate10[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate10[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate10[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>

				<?php if($quote['cate11'] != 'null'){ $cate11 = json_decode($quote['cate11']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">Sink</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate11[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate11[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate11[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>

				<?php if($quote['cate12'] != 'null'){ $cate12 = json_decode($quote['cate12']); ?>
					<?php foreach ($cate12 as $key => $value) { ?>
						<tr>
							<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;"><?= ($key == 0)?'Doors':''; ?></td>
							<td width="156" style="border: solid 1px #000000; text-align: left;">
								<?= $this->price_model->get_optional_features_id($value[0])['name'] ?>
							</td>
							<td width="42" style="border: solid 1px #000000;"></td>
							<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
							<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$value[1], 2, '.', '') ?></td>
							<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$value[1], 2, '.', '') ?></td>
						</tr>
					<?php } ?>	
				<?php } ?>

				<?php if($quote['cate13'] != 'null'){ $cate13 = json_decode($quote['cate13']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">Oven</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate13[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate13[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate13[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>

				<?php if($quote['cate14'] != 'null'){ $cate14 = json_decode($quote['cate14']); ?>
					<?php foreach ($cate14 as $key => $value) { ?>
						<tr>
							<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;"><?= ($key == 0)?'Cooktop':''; ?></td>
							<td width="156" style="border: solid 1px #000000; text-align: left;">
								<?= $this->price_model->get_optional_features_id($value[0])['name'] ?>
							</td>
							<td width="42" style="border: solid 1px #000000;"></td>
							<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
							<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$value[1], 2, '.', '') ?></td>
							<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$value[1], 2, '.', '') ?></td>
						</tr>
					<?php } ?>	
				<?php } ?>

				<?php if($quote['cate15'] != 'null'){ $cate15 = json_decode($quote['cate15']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">Rangehood</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate15[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate15[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate15[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>

				<?php if($quote['cate17'] != 'null' || $quote['cate18'] != 'null' || $quote['cate18'] != 'null' || $quote['cate19'] != 'null' || $quote['cate20'] != 'null' || $quote['cate21'] != 'null' || $quote['cate22'] != 'null' || $quote['cate23'] != 'null' || $quote['cate24'] != 'null'){ ?>

					<tr>
						<td colspan="6" style="background-color: #f58322;color: #ffffff; font-weight: bold;border: solid 1px #000000;">Windows / Sliding Doors
						</td>
					</tr>

				<?php } ?>

				<?php if($quote['cate16'] != 'null'){ $cate16 = json_decode($quote['cate16']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">Standard Aluminium</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate16[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate16[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate16[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>

				<?php if($quote['cate17'] != 'null'){ $cate17 = json_decode($quote['cate17']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">Toilet</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate17[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate17[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate17[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>

				<?php if($quote['cate18'] != 'null'){ $cate18 = json_decode($quote['cate18']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">Shower</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate18[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate18[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate18[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>

				<?php if($quote['cate19'] != 'null'){ $cate19 = json_decode($quote['cate19']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">Size</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate19[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate19[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate19[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>

				<?php if($quote['cate20'] != 'null'){ $cate20 = json_decode($quote['cate20']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">Hot water system</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate20[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate20[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate20[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>

				<?php if($quote['cate21'] != 'null'){ $cate21 = json_decode($quote['cate21']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">Bathroom Tiles</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate21[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate21[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate21[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>

				<?php if($quote['cate22'] != 'null'){ $cate22 = json_decode($quote['cate22']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">Frame Upgrade</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate22[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate22[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate22[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>

				<?php if($quote['cate23'] != 'null'){ $cate23 = json_decode($quote['cate23']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">Clothes Dryer</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate23[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate23[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate23[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>

				<?php if($quote['cate24'] != 'null'){ $cate24 = json_decode($quote['cate24']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">P/C Item Pack</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate24[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate24[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate24[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>

				<?php $cate25 = json_decode($quote['cate25']); $co = 0; ?>

				<?php foreach ($cate25 as $key => $value) {
					if($value[1] != ''){
						$co++;
					}
				} ?>

				<?php $cate26 = json_decode($quote['cate26']); $co2 = 0; ?>

				<?php foreach ($cate26 as $key => $value) {
					if($value[1] != ''){
						$co2++;
					}
				} ?>

				<?php $cate29 = json_decode($quote['cate29']); $co3 = 0; ?>

				<?php foreach ($cate29 as $key => $value) {
					if($value[1] != ''){
						$co3++;
					}
				} ?>

				<?php $cate30 = json_decode($quote['cate30']); $co4 = 0; ?>

				<?php foreach ($cate30 as $key => $value) {
					if($value[1] != ''){
						$co4++;
					}
				} ?>
				<?php if($co != 0 || $co2 != 0 || $quote['cate27'] != 'null' || $quote['cate28'] != 'null' || $co3 != 0 || $co4 != 0 || $quote['cate31'] != 'null' ){ ?>

					<tr>
						<td colspan="6" style="background-color: #f58322;color: #ffffff; font-weight: bold;border: solid 1px #000000;">Electrical
						</td>
					</tr>
				<?php } ?>

				<?php $cate25 = json_decode($quote['cate25']); $co = 0; ?>

				<?php foreach ($cate25 as $key => $value) { ?>
					<?php if(!empty($value[1])){ ?>
						<tr>
							<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">
								<?= ($co == 0)?'Standard Electrical Inclusion':''; ?>		
							</td>
							<td width="156" style="border: solid 1px #000000; text-align: left;">
								<?= $this->price_model->get_optional_features_id($value[0])['name'] ?>
							</td>
							<td width="42" style="border: solid 1px #000000;"></td>
							<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;"><?= $value[1]; ?></td>
							<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$value[2], 2, '.', '') ?></td>
							<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$value[2], 2, '.', '') ?></td>
						</tr>
					<?php $co++; } ?>
				<?php } ?>

				<?php $cate26 = json_decode($quote['cate26']); $co = 0; ?>

				<?php foreach ($cate26 as $key => $value) { ?>
					<?php if(!empty($value[1])){ ?>
						<tr>
							<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">
								<?= ($co == 0)?'Electrical Upgrades':''; ?>		
							</td>
							<td width="156" style="border: solid 1px #000000; text-align: left;">
								<?= $this->price_model->get_optional_features_id($value[0])['name'] ?>
							</td>
							<td width="42" style="border: solid 1px #000000;"></td>
							<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;"><?= $value[1]; ?></td>
							<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$value[2], 2, '.', '') ?></td>
							<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$value[2], 2, '.', '') ?></td>
						</tr>
					<?php $co++; } ?>
				<?php } ?>

				<?php if($quote['cate27'] != 'null'){ $cate27 = json_decode($quote['cate27']); ?>
					<?php foreach ($cate27 as $key => $value) { ?>
						<tr>
							<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;"><?= ($key == 0)?'Seperate Meters':''; ?></td>
							<td width="156" style="border: solid 1px #000000; text-align: left;">
								<?= $this->price_model->get_optional_features_id($value[0])['name'] ?>
							</td>
							<td width="42" style="border: solid 1px #000000;"></td>
							<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
							<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$value[1], 2, '.', '') ?></td>
							<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$value[1], 2, '.', '') ?></td>
						</tr>
					<?php } ?>	
				<?php } ?>

				<?php if($quote['cate28'] != 'null'){ $cate28 = json_decode($quote['cate28']); ?>
					
					<tr>
						<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">Rain Water Tank</td>
						<td width="156" style="border: solid 1px #000000; text-align: left;">
							<?= $this->price_model->get_optional_features_id($cate28[0])['name'] ?>
						</td>
						<td width="42" style="border: solid 1px #000000;"></td>
						<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate28[1], 2, '.', '') ?></td>
						<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$cate28[1], 2, '.', '') ?></td>
					</tr>

				<?php } ?>

				<?php $cate29 = json_decode($quote['cate29']); $co = 0; ?>

				<?php foreach ($cate29 as $key => $value) { ?>
					<?php if(!empty($value[1])){ ?>
						<tr>
							<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">
								<?= ($co == 0)?'On Site Cost':''; ?>		
							</td>
							<td width="156" style="border: solid 1px #000000; text-align: left;">
								<?= $this->price_model->get_optional_features_id($value[0])['name'] ?>
							</td>
							<td width="42" style="border: solid 1px #000000;"></td>
							<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;"><?= $value[1]; ?></td>
							<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$value[2], 2, '.', '') ?></td>
							<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$value[2], 2, '.', '') ?></td>
						</tr>
					<?php $co++; } ?>
				<?php } ?>

				<?php $cate30 = json_decode($quote['cate30']); $co = 0; ?>

				<?php foreach ($cate30 as $key => $value) { ?>
					<?php if(!empty($value[1])){ ?>
						<tr>
							<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">
								<?= ($co == 0)?'Additional Approvals':''; ?>		
							</td>
							<td width="156" style="border: solid 1px #000000; text-align: left;">
								<?= $this->price_model->get_optional_features_id($value[0])['name'] ?>
							</td>
							<td width="42" style="border: solid 1px #000000;"></td>
							<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;"><?= $value[1]; ?></td>
							<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$value[2], 2, '.', '') ?></td>
							<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$value[2], 2, '.', '') ?></td>
						</tr>
					<?php $co++; } ?>
				<?php } ?>

				<?php if($quote['cate31'] != 'null'){ $cate31 = json_decode($quote['cate31']); ?>
					<?php foreach ($cate31 as $key => $value) { ?>
						<tr>
							<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;"><?= ($key == 0)?'Other':''; ?></td>
							<td width="156" style="border: solid 1px #000000; text-align: left;">
								<?= $this->price_model->get_optional_features_id($value[0])['name'] ?>
							</td>
							<td width="42" style="border: solid 1px #000000;"></td>
							<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;">1</td>
							<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$value[1], 2, '.', '') ?></td>
							<td width="85" style="border: solid 1px #000000; text-align: right;"><?= number_format((float)$value[1], 2, '.', '') ?></td>
						</tr>
					<?php } ?>	
				<?php } ?>

				<?php $others = json_decode($quote['extra']); $co = 0; ?>
				<?php foreach ($others as $key => $value) { if(!empty($value[1]) || !empty($value[0])){ $co++; } } ?>

				<?php if($co != 0){ ?>
					<tr>
						<td colspan="6" style="background-color: #f58322;color: #ffffff; font-weight: bold;border: solid 1px #000000;">Others
						</td>
					</tr>
				<?php } ?>


				<?php $others = json_decode($quote['extra']); $co = 0; ?>
				<?php foreach ($others as $key => $value) { ?>
					<?php if(!empty($value[1]) || !empty($value[0])){ ?>
						<tr>
							<td width="130" style="border: solid 1px #000000; text-align: left; font-weight: bold;">
										
							</td>
							<td width="156" style="border: solid 1px #000000; text-align: left;">
								<?= $value[0] ?>
							</td>
							<td width="42" style="border: solid 1px #000000;"></td>
							<td width="40" style="border: solid 1px #000000; text-align: center; font-weight: 600;"></td>
							<td width="85" style="border: solid 1px #000000; text-align: right;">
								<?= number_format((float)$value[1], 2, '.', '') ?>		
							</td>
							<td width="85" style="border: solid 1px #000000; text-align: right;">
								<?= number_format((float)$value[1], 2, '.', '') ?>		
							</td>
						</tr>
					<?php $co++; } ?>
				<?php } ?>

				<tfoot>
					<?php if(!empty($quote['d_code'])){ ?>
						<tr>
							<td colspan="5" style="text-align: right; border: solid 1px #000000; font-size: 12px; color: #ffffff; background-color: #2f2b2b; font-weight: bold;">Discount</td>
							<td style="text-align: right; border: solid 1px #000000; font-size: 12px; color: #ffffff; background-color: #2f2b2b; font-weight: bold;"> - <?= $quote['d_value'] ?><?= ($quote['d_type'] == 'p')?'%':''; ?></td>
						</tr>
					<?php } ?>
					<tr>
						<td colspan="5" style="text-align: right; border: solid 1px #000000; font-size: 12px; color: #ffffff; background-color: #2f2b2b; font-weight: bold;">Grand Total</td>
						<td style="text-align: right; border: solid 1px #000000; font-size: 12px; color: #ffffff; background-color: #2f2b2b; font-weight: bold;"><?= $quote['grand_total'] ?></td>
					</tr>
				</tfoot>

			</tbody>
		</table>
		
			
		
	</body>
</html>


