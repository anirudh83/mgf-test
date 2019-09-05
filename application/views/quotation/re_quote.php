<?php if($this->input->get('d_id') && !empty($this->input->get('d_id')) && $this->price_model->base_rate_designs_check($this->input->get('d_id'))){
	$designrow = $this->price_model->base_rate_designs_check($this->input->get('d_id'))[0];
}else{
	$designrow = '';
} ?>

<form action="<?= base_url('quotation/save_new_quote') ?>" method="post" id="quotation">
<h3><?= $title ?></h3>

<div id="grandtotalbox">
	<input name="grand_total" type="text" value="0" id="grand_total" class="span2" readonly>
</div>
<div class="validation-summary" id="validation-summary">
	
</div>
<div class="form-inline">
	<h4 onclick="">Base Rate Design</h4>
	<input type="hidden" name="design_hid" id="design_hid">
	<?php foreach($this->price_model->base_rate_designs() as $design_key => $design) { ?>

		<div class="control-group split fifth">
			<label class="radio">
				<span id="" class="control-label"><?= $design['name'] ?></span>
				<div class="controls">
					<input type="radio" name="BaseDesign" value="<?= $design['id'] ?>" onchange="_redirect();" <?= (!empty($designrow) && $design['id'] == $designrow['id'])?'checked':''; ?>>
					<input type="text" name="" id="design<?= $design['id'] ?>" class="span2 numners" value="<?= $design['rate'] ?>" <?= ($design['lock'] == '1')?'readonly':''; ?> onkeyup="total()">
				</div>
			</label>
		</div>

	<?php } ?>
</div>

<br clear="left">

<div class="form-horizontal">
	<h4>External</h4>
	<div class="split half control-group">
		<h5>Facade</h5>
		<?php
			if($quote['cate1'] != 'null'){ 
				$cate1 = json_decode($quote['cate1']);
			}else{
				$cate1 = '';
			}
		?>
		<input type="hidden" name="catetext1" id="catetext1">
		<?php foreach ($this->price_model->get_optional_features('1') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate1" value="<?= $value['id'] ?>" onchange="total();" <?php if($cate1 != '' && $value['id'] == $cate1[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" value="<?php if($cate1 != '' && $value['id'] == $cate1[0]){ echo $cate1[1]; }else{ echo $value['rate']; } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>

	</div>
	<div class="split half control-group">
		<h5>Roof</h5>
		<?php
			if($quote['cate2'] != 'null'){ 
				$cate2 = json_decode($quote['cate2']);
			}else{
				$cate2 = '';
			}
		?>
		<input type="hidden" name="catetext2" id="catetext2">
		<?php foreach ($this->price_model->get_optional_features('2') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate2" value="<?= $value['id'] ?>" onchange="total();" <?php if($cate2 != '' && $value['id'] == $cate2[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" value="<?php if($cate2 != '' && $value['id'] == $cate2[0]){ echo $cate2[1]; }else{ echo $value['rate']; } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>

	</div>
	<div class="split half control-group">
		<h5>Framing</h5>
		<?php
			if($quote['cate3'] != 'null'){ 
				$cate3 = json_decode($quote['cate3']);
			}else{
				$cate3 = '';
			}
		?>
		<input type="hidden" name="catetext3" id="catetext3">
		<?php foreach ($this->price_model->get_optional_features('3') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate3" value="<?= $value['id'] ?>" onchange="total();" <?php if($cate3 != '' && $value['id'] == $cate3[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" value="<?php if($cate3 != '' && $value['id'] == $cate3[0]){ echo $cate3[1]; }else{ echo $value['rate']; } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>

	</div>
</div>

<br clear="left">

<div class="form-horizontal">
	<h4>Bedrooms</h4>
	<div class="split half control-group">
		<h5>Bedroom Floor Finishers</h5>
		<?php
			if($quote['cate4'] != 'null'){ 
				$cate4 = json_decode($quote['cate4']);
			}else{
				$cate4 = '';
			}
		?>
		<input type="hidden" name="catetext4" id="catetext4">
		<?php foreach ($this->price_model->get_optional_features('4') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate4" value="<?= $value['id'] ?>" onchange="total();" <?php if($cate4 != '' && $value['id'] == $cate4[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" value="<?php if($cate4 != '' && $value['id'] == $cate4[0]){ echo $cate4[1]; }else{ echo $value['rate']; } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Wardrobes</h5>
		<?php $cate5 = json_decode($quote['cate5']); ?>
		<?php foreach ($this->price_model->get_optional_features('5') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="hidden" name="cateid5[]" value="<?= $value['id'] ?>">
					<input type="text" maxlength="2" name="cate5qty[]" id="cate5qty<?= $key ?>" class="num numners" value="<?= $cate5[$key][1] ?>" onkeyup="total();">
					<input type="text" id="cate5text<?= $key ?>" name="cate5text[]" onkeyup="total();" class="span1 numners" 
					<?php if(empty($cate5[$key][2])){ ?>
					value="<?= (!empty($designrow) && in_array($value['id'], explode(',', $designrow['included'])))?'inc':$value['rate']; ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>
					<?php }else{ ?>
					value="<?= $cate5[$key][2] ?>"
					<?php } ?> <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>
</div>

<br clear="left">

<div class="form-horizontal">
	<h4>Kitchen</h4>

	<div class="split half control-group">
		<h5>Kitchen/Living</h5>
		<?php
			if($quote['cate6'] != 'null'){ 
				$cate6 = json_decode($quote['cate6']);
			}else{
				$cate6 = '';
			}
		?>
		<input type="hidden" name="catetext6" id="catetext6">
		<?php foreach ($this->price_model->get_optional_features('6') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate6" value="<?= $value['id'] ?>" onchange="total();" <?php if($cate6 != '' && $value['id'] == $cate6[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" value="<?php if($cate6 != '' && $value['id'] == $cate6[0]){ echo $cate6[1]; }else{ echo $value['rate']; } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Splash Back</h5>
		<?php
			if($quote['cate7'] != 'null'){ 
				$cate7 = json_decode($quote['cate7']);
			}else{
				$cate7 = '';
			}
		?>
		<input type="hidden" name="catetext7" id="catetext7">
		<?php foreach ($this->price_model->get_optional_features('7') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate7" value="<?= $value['id'] ?>" onchange="total();" <?php if($cate7 != '' && $value['id'] == $cate7[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" value="<?php if($cate7 != '' && $value['id'] == $cate7[0]){ echo $cate7[1]; }else{ echo $value['rate']; } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Cabinets</h5>
		<?php
			if($quote['cate8'] != 'null'){ 
				$cate8 = json_decode($quote['cate8']);
			}else{
				$cate8 = '';
			}
		?>
		<input type="hidden" name="catetext8" id="catetext8">
		<?php foreach ($this->price_model->get_optional_features('8') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate8" value="<?= $value['id'] ?>" onchange="total();" <?php if($cate8 != '' && $value['id'] == $cate8[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" value="<?php if($cate8 != '' && $value['id'] == $cate8[0]){ echo $cate8[1]; }else{ echo $value['rate']; } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Appliances</h5>
		<?php foreach ($this->price_model->get_optional_features('9') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="checkbox" name="cate9[]" id="cate9<?= $key ?>" value="<?= $value['id'] ?>" onchange="total();" <?= chek_array($value['id'],$quote['cate9'])[0] ?>>
					<input type="text" id="cate9text<?= $key ?>" name="cate9text<?= $value['id'] ?>" onkeyup="total();" class="span1 numners" 
					<?php if(chek_array($value['id'],$quote['cate9'])[0] == ''){ ?> 
					value="<?= (!empty($designrow) && in_array($value['id'], explode(',', $designrow['included'])))?'inc':$value['rate']; ?>" 
					<?php }else{ ?>
						value="<?= chek_array($value['id'],$quote['cate9'])[1] ?>"	
					<?php } ?>
					<?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Kitchen Benchtop</h5>
		<?php
			if($quote['cate10'] != 'null'){ 
				$cate10 = json_decode($quote['cate10']);
			}else{
				$cate10 = '';
			}
		?>
		<input type="hidden" name="catetext10" id="catetext10">
		<?php foreach ($this->price_model->get_optional_features('10') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate10" value="<?= $value['id'] ?>" onchange="total();" <?php if($cate10 != '' && $value['id'] == $cate10[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" value="<?php if($cate10 != '' && $value['id'] == $cate10[0]){ echo $cate10[1]; }else{ echo $value['rate']; } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Sink</h5>
		<?php
			if($quote['cate11'] != 'null'){ 
				$cate11 = json_decode($quote['cate11']);
			}else{
				$cate11 = '';
			}
		?>
		<input type="hidden" name="catetext11" id="catetext11">
		<?php foreach ($this->price_model->get_optional_features('11') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate11" value="<?= $value['id'] ?>" onchange="total();" <?php if($cate11 != '' && $value['id'] == $cate11[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" value="<?php if($cate11 != '' && $value['id'] == $cate11[0]){ echo $cate11[1]; }else{ echo $value['rate']; } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Doors</h5>
		<?php foreach ($this->price_model->get_optional_features('12') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="checkbox" name="cate12[]" id="cate12<?= $key ?>" value="<?= $value['id'] ?>" onchange="total();" <?= chek_array($value['id'],$quote['cate12'])[0] ?>>
					<input type="text" id="cate12text<?= $key ?>" name="cate12text<?= $value['id'] ?>" onkeyup="total();" class="span1 numners" 
					<?php if(chek_array($value['id'],$quote['cate12'])[0] == ''){ ?>
					value="<?= (!empty($designrow) && in_array($value['id'], explode(',', $designrow['included'])))?'inc':$value['rate']; ?>" 
					<?php }else{ ?>
						value="<?= chek_array($value['id'],$quote['cate12'])[1] ?>"	
					<?php } ?>
					<?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Oven</h5>
		<?php
			if($quote['cate13'] != 'null'){ 
				$cate13 = json_decode($quote['cate13']);
			}else{
				$cate13 = '';
			}
		?>
		<input type="hidden" name="catetext13" id="catetext13"  value="<?php if($cate13 != ''){ echo $cate13[1]; } ?>">
		<?php foreach ($this->price_model->get_optional_features('13') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate13" value="<?= $value['id'] ?>" onchange="total();" <?php if($cate13 != '' && $value['id'] == $cate13[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" value="<?php if($cate13 != '' && $value['id'] == $cate13[0]){ echo $cate13[1]; }else{ echo $value['rate']; } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Cooktop</h5>
		<?php foreach ($this->price_model->get_optional_features('14') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="checkbox" name="cate14[]" id="cate14<?= $key ?>" value="<?= $value['id'] ?>" onchange="total();" <?= chek_array($value['id'],$quote['cate14'])[0] ?>>
					<input type="text" id="cate14text<?= $key ?>" name="cate14text<?= $value['id'] ?>" onkeyup="total();" class="span1 numners" 
					<?php if(chek_array($value['id'],$quote['cate14'])[0] == ''){ ?> 
					value="<?= (!empty($designrow) && in_array($value['id'], explode(',', $designrow['included'])))?'inc':$value['rate']; ?>" 
					<?php }else{ ?>
						value="<?= chek_array($value['id'],$quote['cate14'])[1] ?>"	
					<?php } ?>
					<?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Rangehood</h5>
		<?php
			if($quote['cate15'] != 'null'){ 
				$cate15 = json_decode($quote['cate15']);
			}else{
				$cate15 = '';
			}
		?>
		<input type="hidden" name="catetext15" id="catetext15" value="<?php if($cate15 != ''){ echo $cate15[1]; } ?>">
		<?php foreach ($this->price_model->get_optional_features('15') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate15" value="<?= $value['id'] ?>" onchange="total();"  <?php if($cate15 != '' && $value['id'] == $cate15[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" value="<?php if($cate15 != '' && $value['id'] == $cate15[0]){ echo $cate15[1]; }else{ echo $value['rate']; } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

</div>

<br clear="left">

<div class="form-horizontal">
	<h4>Windows / Sliding Doors</h4>

	<div class="split half control-group">
		<h5>Standard Aluminium</h5>
		<?php
			if($quote['cate16'] != 'null'){ 
				$cate16 = json_decode($quote['cate16']);
			}else{
				$cate16 = '';
			}
		?>
		<input type="hidden" name="catetext16" id="catetext16" value="<?php if($cate16 != ''){ echo $cate16[1]; } ?>">
		<?php foreach ($this->price_model->get_optional_features('16') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate16" value="<?= $value['id'] ?>" onchange="total();" <?php if($cate16 != '' && $value['id'] == $cate16[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" value="<?php if($cate16 != '' && $value['id'] == $cate16[0]){ echo $cate16[1]; }else{ echo $value['rate']; } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Toilet</h5>
		<?php
			if($quote['cate17'] != 'null'){ 
				$cate17 = json_decode($quote['cate17']);
			}else{
				$cate17 = '';
			}
		?>
		<input type="hidden" name="catetext17" id="catetext17" value="<?php if($cate17 != ''){ echo $cate17[1]; } ?>">
		<?php foreach ($this->price_model->get_optional_features('17') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate17" value="<?= $value['id'] ?>" onchange="total();" <?php if($cate17 != '' && $value['id'] == $cate17[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" value="<?php if($cate17 != '' && $value['id'] == $cate17[0]){ echo $cate17[1]; }else{ echo $value['rate']; } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Shower</h5>
		<?php
			if($quote['cate18'] != 'null'){ 
				$cate18 = json_decode($quote['cate18']);
			}else{
				$cate18 = '';
			}
		?>
		<input type="hidden" name="catetext18" id="catetext18" value="<?php if($cate18 != ''){ echo $cate18[1]; } ?>">
		<?php foreach ($this->price_model->get_optional_features('18') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate18" value="<?= $value['id'] ?>" onchange="total();" <?php if($cate18 != '' && $value['id'] == $cate18[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" value="<?php if($cate18 != '' && $value['id'] == $cate18[0]){ echo $cate18[1]; }else{ echo $value['rate']; } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Size</h5>
		<?php
			if($quote['cate19'] != 'null'){ 
				$cate19 = json_decode($quote['cate19']);
			}else{
				$cate19 = '';
			}
		?>
		<input type="hidden" name="catetext19" id="catetext19" value="<?php if($cate19 != ''){ echo $cate19[1]; } ?>">
		<?php foreach ($this->price_model->get_optional_features('19') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate19" value="<?= $value['id'] ?>" onchange="total();" <?php if($cate19 != '' && $value['id'] == $cate19[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" value="<?php if($cate19 != '' && $value['id'] == $cate19[0]){ echo $cate19[1]; }else{ echo $value['rate']; } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Hot water system</h5>
		<?php
			if($quote['cate20'] != 'null'){ 
				$cate20 = json_decode($quote['cate20']);
			}else{
				$cate20 = '';
			}
		?>
		<input type="hidden" name="catetext20" id="catetext20" value="<?php if($cate20 != ''){ echo $cate20[1]; } ?>">
		<?php foreach ($this->price_model->get_optional_features('20') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate20" value="<?= $value['id'] ?>" onchange="total();" <?php if($cate20 != '' && $value['id'] == $cate20[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" value="<?php if($cate20 != '' && $value['id'] == $cate20[0]){ echo $cate20[1]; }else{ echo $value['rate']; } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Bathroom Tiles</h5>
		<?php
			if($quote['cate21'] != 'null'){ 
				$cate21 = json_decode($quote['cate21']);
			}else{
				$cate21 = '';
			}
		?>
		<input type="hidden" name="catetext21" id="catetext21" value="<?php if($cate21 != ''){ echo $cate21[1]; } ?>">
		<?php foreach ($this->price_model->get_optional_features('21') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate21" value="<?= $value['id'] ?>" onchange="total();" <?php if($cate21 != '' && $value['id'] == $cate21[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" value="<?php if($cate21 != '' && $value['id'] == $cate21[0]){ echo $cate21[1]; }else{ echo $value['rate']; } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Frame Upgrade</h5>
		<?php
			if($quote['cate22'] != 'null'){ 
				$cate22 = json_decode($quote['cate22']);
			}else{
				$cate22 = '';
			}
		?>
		<input type="hidden" name="catetext22" id="catetext22" value="<?php if($cate22 != ''){ echo $cate22[1]; } ?>">
		<?php foreach ($this->price_model->get_optional_features('22') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate22" value="<?= $value['id'] ?>" onchange="total();" <?php if($cate22 != '' && $value['id'] == $cate22[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" value="<?php if($cate22 != '' && $value['id'] == $cate22[0]){ echo $cate22[1]; }else{ echo $value['rate']; } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Clothes Dryer</h5>
		<?php
			if($quote['cate23'] != 'null'){ 
				$cate23 = json_decode($quote['cate23']);
			}else{
				$cate23 = '';
			}
		?>
		<input type="hidden" name="catetext23" id="catetext23" value="<?php if($cate23 != ''){ echo $cate23[1]; } ?>">
		<?php foreach ($this->price_model->get_optional_features('23') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate23" value="<?= $value['id'] ?>" onchange="total();" <?php if($cate23 != '' && $value['id'] == $cate23[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" value="<?php if($cate23 != '' && $value['id'] == $cate23[0]){ echo $cate23[1]; }else{ echo $value['rate']; } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>P/C Item Pack</h5>
		<?php
			if($quote['cate24'] != 'null'){ 
				$cate24 = json_decode($quote['cate24']);
			}else{
				$cate24 = '';
			}
		?>
		<input type="hidden" name="catetext24" id="catetext24" value="<?php if($cate24 != ''){ echo $cate24[1]; } ?>">
		<?php foreach ($this->price_model->get_optional_features('24') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate24" value="<?= $value['id'] ?>" onchange="total();" <?php if($cate24 != '' && $value['id'] == $cate24[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" value="<?php if($cate24 != '' && $value['id'] == $cate24[0]){ echo $cate24[1]; }else{ echo $value['rate']; } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

</div>

<br clear="left">

<div class="form-horizontal">
	<h4>Electrical</h4>

	<div class="split half control-group">
		<h5>Standard Electrical Inclusion</h5>
		<?php $cate25 = json_decode($quote['cate25']); ?>
		<?php foreach ($this->price_model->get_optional_features('25') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="hidden" name="cateid25[]" value="<?= $value['id'] ?>">
					<input type="text" maxlength="2" name="cate25qty[]" id="cate25qty<?= $key ?>" class="num numners" value="<?= $cate25[$key][1] ?>" onkeyup="total();">
					<input type="text" id="cate25text<?= $key ?>" name="cate25text[]" onkeyup="total();" class="span1 numners" value="<?= $cate25[$key][2] ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Electrical Upgrades</h5>
		<?php $cate26 = json_decode($quote['cate26']); ?>
		<?php foreach ($this->price_model->get_optional_features('26') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="hidden" name="cateid26[]" value="<?= $value['id'] ?>">
					<input type="text" maxlength="2" name="cate26qty[]" id="cate26qty<?= $key ?>" class="num numners" value="<?= $cate26[$key][1] ?>" onkeyup="total();">
					<input type="text" id="cate26text<?= $key ?>" name="cate26text[]" onkeyup="total();" class="span1 numners" value="<?= $cate26[$key][2] ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Seperate Meters</h5>
		<?php foreach ($this->price_model->get_optional_features('27') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="checkbox" name="cate27[]" id="cate27<?= $key ?>" value="<?= $value['id'] ?>" onchange="total();" <?= chek_array($value['id'],$quote['cate27'])[0] ?>>
					<input type="text" id="cate27text<?= $key ?>" name="cate27text<?= $value['id'] ?>" onkeyup="total();" class="span1 numners" 
					<?php if(chek_array($value['id'],$quote['cate27'])[0] == ''){ ?> 
					value="<?= (!empty($designrow) && in_array($value['id'], explode(',', $designrow['included'])))?'inc':$value['rate']; ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>
					<?php }else{ ?>
						value="<?= chek_array($value['id'],$quote['cate27'])[1] ?>"	
					<?php } ?>>
				</div>
			</label>
		<?php } ?>
	</div>


	<div class="split half control-group">
		<h5>Rain Water Tank</h5>
		<?php
			if($quote['cate28'] != 'null'){ 
				$cate28 = json_decode($quote['cate28']);
			}else{
				$cate28 = '';
			}
		?>
		<input type="hidden" name="catetext28" id="catetext28" value="<?php if($cate28 != ''){ echo $cate28[1]; } ?>">
		<?php foreach ($this->price_model->get_optional_features('28') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="radio" name="cate28" value="<?= $value['id'] ?>" onchange="total();" <?php if($cate28 != '' && $value['id'] == $cate28[0]){ echo "checked"; } ?>>
					<input type="text" id="cate_text<?= $value['id'] ?>" name="" onkeyup="total();" class="span1 numners" 
					value="<?php if($cate28 != '' && $value['id'] == $cate28[0]){ echo $cate28[1]; }else{ if(!empty($designrow) && in_array($value['id'], explode(',', $designrow['included']))){ echo 'inc'; } else{ echo $value['rate']; } } ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>On Site Cost</h5>
		<?php $cate29 = json_decode($quote['cate29']); ?>
		<?php foreach ($this->price_model->get_optional_features('29') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="hidden" name="cateid29[]" value="<?= $value['id'] ?>">
					<input type="text" maxlength="2" name="cate29qty[]" id="cate29qty<?= $key ?>" class="num numners" value="<?= $cate29[$key][1] ?>" onkeyup="total();">
					<input type="text" id="cate29text<?= $key ?>" name="cate29text[]" onkeyup="total();" class="span1 numners" 
					<?php if(empty($cate29[$key][2])){ ?>
					value="<?= (!empty($designrow) && in_array($value['id'], explode(',', $designrow['included'])))?'inc':$value['rate']; ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>
					<?php }else{ ?>
					value="<?= $cate29[$key][2] ?>"
					<?php } ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Additional Approvals</h5>
		<?php $cate30 = json_decode($quote['cate30']); ?>
		<?php foreach ($this->price_model->get_optional_features('30') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="hidden" name="cateid30[]" value="<?= $value['id'] ?>">
					<input type="text" maxlength="2" name="cate30qty[]" id="cate30qty<?= $key ?>" class="num numners" onkeyup="total();" value="<?= $cate30[$key][1] ?>">
					<input type="text" id="cate30text<?= $key ?>" name="cate30text[]" onkeyup="total();" class="span1 numners" 
					<?php if(empty($cate30[$key][2])){ ?>
					value="<?= (!empty($designrow) && in_array($value['id'], explode(',', $designrow['included'])))?'inc':$value['rate']; ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>
					<?php }else{ ?>
					value="<?= $cate30[$key][2] ?>"
					<?php } ?>>
				</div>
			</label>
		<?php } ?>
	</div>

	<div class="split half control-group">
		<h5>Other</h5>
		<?php foreach ($this->price_model->get_optional_features('31') as $key => $value) { ?>
			<label class="radio">
				<span class="control-label"><?= $value['name'] ?></span>
				<div class="controls">
					<input type="checkbox" name="cate31[]" id="cate31<?= $key ?>" value="<?= $value['id'] ?>" onchange="total();" <?= chek_array($value['id'],$quote['cate31'])[0] ?>>
					<input type="text" id="cate31text<?= $key ?>" name="cate31text<?= $value['id'] ?>" onkeyup="total();" class="span1 numners" 
					<?php if(chek_array($value['id'],$quote['cate31'])[0] == ''){ ?> 
						value="<?= (!empty($designrow) && in_array($value['id'], explode(',', $designrow['included'])))?'inc':$value['rate']; ?>" <?= ($value['lock'] == '1')?'readonly':''; ?>

					<?php }else{ ?>
						value="<?= chek_array($value['id'],$quote['cate31'])[1] ?>"	
					<?php } ?>>
				</div>
			</label>
		<?php } ?>
	</div>
</div>


<br clear="left">
<br clear="left">

<div class="form-horizontal">
	<h4>Others</h4>
	<?php $extra = json_decode($quote['extra']); ?>
	<div class="split half control-group">
		<?php for ($i=1; $i <= 8; $i++) { ?>
			<div class="others">
				<span><?= $i; ?>. </span>
				<input type="text" name="other_note[]" class="input-xlarge" maxlength="100" value="<?= $extra[$i - 1][0]; ?>">
				<input type="text" name="other_rate[]" id="others_rate<?= $i - 1; ?>" class="span1 numners" maxlength="7" onkeyup="total();" value="<?= $extra[$i - 1][1]; ?>">
			</div>
		<?php } ?>
		
	</div>
	<div class="split half control-group">
		<?php for ($i=9; $i <= 16; $i++) { ?>
			<div class="others">
				<span><?= $i; ?>. </span>
				<input type="text" name="other_note[]" class="input-xlarge" maxlength="100" value="<?= $extra[$i - 1][0]; ?>">
				<input type="text" name="other_rate[]" id="others_rate<?= $i - 1; ?>" class="span1 numners" maxlength="7" onkeyup="total();" value="<?= $extra[$i - 1][1]; ?>">
			</div>
		<?php } ?>
		
	</div>
</div>

<br clear="left">
<br clear="left">

<div class="form-horizontal">
	<h4>Customer Info</h4>

	<div class="split half control-group">
		<label class="control-label" for="title">Title</label>
		<div class="controls">
			<select name="salutation_name" id="title">
				<option value="Mr" <?= sel('Mr',$quote['title']) ?>>Mr</option>
				<option value="Mrs" <?= sel('Mrs',$quote['title']) ?>>Mrs</option>
				<option value="Ms" <?= sel('Ms',$quote['title']) ?>>Ms</option>
			</select>
		</div>

		<label class="control-label" for="first_name">First Name</label>
		<div class="controls">
			<input type="text" name="first_name" class="input-medium" id="first_name" value="<?= $quote['first_name'] ?>">
		</div>

		<label class="control-label" for="last_name">Last Name</label>
		<div class="controls">
			<input type="text" name="last_name" class="input-medium" id="last_name" value="<?= $quote['last_name'] ?>">
		</div>

		<label class="control-label" for="title2">Title</label>
		<div class="controls">
			<select name="salutation_name2" id="title2">
				<option value="Mr" <?= sel('Mr',$quote['title2']) ?>>Mr</option>
				<option value="Mrs" <?= sel('Mrs',$quote['title2']) ?>>Mrs</option>
				<option value="Ms" <?= sel('Ms',$quote['title2']) ?>>Ms</option>
			</select>
		</div>

		<label class="control-label" for="first_name2">First Name</label>
		<div class="controls">
			<input type="text" name="first_name2" class="input-medium" id="first_name2" value="<?= $quote['first_name2'] ?>">
		</div>

		<label class="control-label" for="last_name2">Last Name</label>
		<div class="controls">
			<input type="text" name="last_name2" class="input-medium" id="last_name2" value="<?= $quote['last_name2'] ?>">
		</div>

		<label class="control-label" for="address">Street Address</label>
		<div class="controls">
			<input type="text" name="address" class="input-large" id="address" value="<?= $quote['address'] ?>">
		</div>

		<label class="control-label" for="suburb">Suburb</label>
		<div class="controls">
			<input type="text" name="suburb" class="input-medium" id="suburb" value="<?= $quote['suburb'] ?>">
		</div>

		<label class="control-label" for="state">State</label>
		<div class="controls">
			<select name="state" id="state">
				<option value="ACT" <?= sel('Mr',$quote['state']) ?>>ACT</option>
				<option value="NSW" <?= sel('Mr',$quote['state']) ?>>NSW</option>
				<option value="NT" <?= sel('Mr',$quote['state']) ?>>NT</option>
				<option value="QLD" <?= sel('Mr',$quote['state']) ?>>QLD</option>
				<option value="SA" <?= sel('Mr',$quote['state']) ?>>SA</option>
				<option value="TAS" <?= sel('Mr',$quote['state']) ?>>TAS</option>
				<option value="VIC" <?= sel('Mr',$quote['state']) ?>>VIC</option>
				<option value="WA" <?= sel('Mr',$quote['state']) ?>>WA</option>
			</select>
		</div>

		<label class="control-label" for="postcode">Postcode</label>
		<div class="controls">
			<input type="text" name="postcode" class="input-mini" id="postcode" value="<?= $quote['postcode'] ?>">
		</div>

		<label class="control-label" for="email">Email Address</label>
		<div class="controls">
			<input type="text" name="email" class="input-large" id="email" value="<?= $quote['email'] ?>">
		</div>

		<label class="control-label" for="landline">Landline</label>
		<div class="controls">
			<input type="text" name="landline" class="input-medium" id="landline" value="<?= $quote['landline'] ?>">
		</div>

		<label class="control-label" for="mobile">Mobile</label>
		<div class="controls">
			<input type="text" name="mobile" class="input-medium" id="mobile" value="<?= $quote['mobile'] ?>">
		</div>

		<label class="control-label" for="fax">Fax</label>
		<div class="controls">
			<input type="text" name="fax" class="input-medium" id="fax" value="<?= $quote['fax'] ?>">
		</div>

	</div>
	<div class="split half control-group">
		<label class="control-label" for="certificate">149 Certificate</label>
		<div class="controls">
			<input type="checkbox" name="certificate" id="certificate" value="1" <?= che('1',$quote['certificate']) ?>>
			<span style="font-size: 14px; font-weight: normal; line-height: 20px;">(Owner supplied)</span>
		</div>

		<label class="control-label" for="diagram">Sewer Diagram</label>
		<div class="controls">
			<input type="checkbox" name="diagram" id="diagram" value="1" <?= che('1',$quote['diagram']) ?>>
			<span style="font-size: 14px; font-weight: normal; line-height: 20px;">(Owner supplied)</span>
		</div>

		<label class="control-label" for="approval_cost">Approval Cost</label>
		<div class="controls">
			<input type="text" name="approval_cost" class="input-mini numners" id="approval_cost" value="<?= $quote['approval_cost'] ?>">
		</div>

		<label class="control-label" for="demolition_cost">Demolition Cost</label>
		<div class="controls">
			<input type="text" name="demolition_cost" class="input-mini numners" id="demolition_cost" value="<?= $quote['demolition_cost'] ?>">
		</div>

		<label class="control-label" for="land_clearing_cost">Land Clearing Cost</label>
		<div class="controls">
			<input type="text" name="land_clearing_cost" class="input-mini numners" id="land_clearing_cost" value="<?= $quote['land_clearing_cost'] ?>">
		</div>

		<label class="control-label" for="">Additional Connection Length / Linear Meter</label>
		<div class="controls">
			<input type="text" name="meter" class="input-mini numners" id="meter" value="<?= $quote['meter'] ?>">
			<span style="font-size: 14px; font-weight: normal; line-height: 20px; margin-left: 5px;">meter (length)</span><br>
			<input type="text" name="price_meter" class="input-mini numners" id="price_meter" value="<?= $quote['amount'] ?>" style="margin-top: 5px;" >
			<span style="font-size: 14px; font-weight: normal; line-height: 30px; margin-top: 5px; margin-left: 5px;">$ (per meter)</span>
		</div>
		<br>
		<label class="control-label" for="demolitions"></label>
		<div class="controls">
			<span style="font-size: 14px; font-weight: normal; line-height: 20px;">Council contributions will be paid by &nbsp;&nbsp;&nbsp;owner.</span>
		</div>
	</div>

</div>

<br clear="left">

<div class="form-horizontal">
	<h4>This quotation is based on </h4>

	<textarea name="remarks" id="remarks" class="span8" rows="2" cols="20"><?= $quote['description'] ?></textarea>
</div>

<br clear="left">
<div class="form-horizontal">
	<table>
		<tr>
			<td><input type="hidden" name="discount_code" class="input-medium" id="discount_code" value="" placeholder="Discount Code"></td>
			
		</tr>
	</table>

	
	<p style="color: red; font-weight: bold;" id="Discount_code_error"></p>
</div>

<br clear="left">

<input type="submit" value="Save Quote" class="btn">


<hr>

<span class="note">
	<em>Note: This financial calculator is a guide only – contact us if you have any questions.</em>
</span>

</form>
<script type="text/javascript">
	function _redirect(){
		value = $("input[name='BaseDesign']:checked").val();
		window.location.href = '<?= base_url("quotation/new?d_id="); ?>'+value;
	}
	total();
</script>
<br clear="left">

<div class="_space">
</div>


<script type="text/javascript">
	$(function(){
		$('#upload_banner_button').click(function(){

            if($('#discount_code').val() != ''){
                $.ajax({
                    url: "<?= base_url('quotation/discount_check') ?>",
                    type: "POST",
                    data:{"code" : $('#discount_code').val()},
                    beforeSend: function() {
                        $('#upload_banner_text_hid').show();
                        $('#upload_banner_text').hide();
                        $('#upload_banner_button').attr('disabled',true);
                    },
                    success:function(data)
                    {
                        setTimeout(function(){  
                     		if(data == 0){
                				$('#Discount_code_error').html('Please Enter Valid Discount Code');  
                				$('#upload_banner_text_hid').hide();
		                        $('#upload_banner_text').show();
		                        $('#upload_banner_button').removeAttr('disabled');   			
                     		}       
                     		else{
                     			$('#Discount_code_error').html('');     			
                     			$('#upload_banner_text_hid').hide();
		                        $('#upload_banner_text').show();
		                        $('#upload_banner_button').removeAttr('disabled');
                     		}
                        }, 1000);
                    }
                });
            }
            else{
            	$('#Discount_code_error').html('Please Enter Discount Code');
            }
        
		})
	})
</script>