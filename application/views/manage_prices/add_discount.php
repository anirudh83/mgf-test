<h3><?= $title ?></h3>	

	<form method="post" action="<?= base_url('manage_prices/save_code') ?>">
		<div style="width:500px; margin: 10px auto;">
			<fieldset class="login">
				<br>
				<table cellpadding="2">
					<tr>
						<td><label for="code">Discount Code:</label></td>
						<td>
							<input name="code" type="text" id="code" class="textEntry" value="<?= set_value('code'); ?>" />
							<?= form_error('code'); ?>
						</td>
					</tr>
					<tr>
						<td><label for="percentage">Percentage:</label></td>
						<td>
							<input name="percentage" type="text" id="percentage" onkeyup="per()" class="textEntry numners" value="<?= set_value('percentage'); ?>" />
							<?= form_error('percentage'); ?>
						</td>
					</tr>
					<tr>
						<td><label for="amount">Amount:</label></td>
						<td>
							<input name="amount" type="text" id="amount" onkeyup="famount()" class="passwordEntry numners" value="<?= set_value('amount'); ?>"/>
							<?= form_error('amount'); ?>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<input type="submit" value="Save" class="btn" />
						</td>
					</tr>
				</table>
			</fieldset>
		</div>
	</form>


	<script type="text/javascript">
		function per(){
			if($('#percentage').val() != '')
			{
				$('#amount').val('');
			}
		}
		function famount(){
			if($('#amount').val() != '')
			{
				$('#percentage').val('');
			}
		}
	</script>