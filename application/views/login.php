	

	<form method="post" action="<?= base_url('welcome/auth') ?>">
		<div style="width:500px; margin: 10px auto;">
			<fieldset class="login">
				<legend>Account Information</legend>
				<?php if($this->session->flashdata('error') != ''){ ?>
					<span class="failureNotification">
						Login failed. Please try again.
					</span>
				<?php $this->session->set_flashdata('error', ''); } ?>
				<br>
				<table cellpadding="2">
					<tr>
						<td><label for="username">Username:</label></td>
						<td><input name="username" type="text" id="username" class="textEntry" required /></td>
					</tr>
					<tr>
						<td><label for="password">Password:</label></td>
						<td><input name="password" type="password" id="password" class="passwordEntry" required/></td>
					</tr>
					<tr>
						<td colspan="3">
							<input type="submit" value="Log In" class="btn" />
						</td>
					</tr>
				</table>
			</fieldset>
		</div>
	</form>