<h3><?= $title ?></h3>	

	<form method="post" action="<?= base_url('user/update') ?>">
		<div style="width:500px; margin: 10px auto;">
			<fieldset class="login">
				<br>
				<table cellpadding="2">
					<tr>
						<td><label for="name">Name:</label></td>
						<td>
							<input name="name" type="text" id="name" class="textEntry" value="<?= set_value('name',$user['name']) ?>"  />
							<?= form_error('name'); ?>
						</td>
					</tr>
					<tr>
						<td><label for="username">Username:</label></td>
						<td>
							<input name="username" type="text" id="username" class="textEntry" value="<?= set_value('username',$user['user_name']) ?>"  />
							<?= form_error('username'); ?>
						</td>
					</tr>
					<tr>
						<td><label for="password">Password:</label></td>
						<td>
							<input name="password" type="text" id="password" class="passwordEntry" value="<?= set_value('password',$user['pass']) ?>" />
							<?= form_error('password'); ?>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<input type="submit" value="Save" class="btn" />
						</td>
					</tr>
					<input type="hidden" name="main_id" value="<?= $user['id'] ?>">
				</table>
			</fieldset>
		</div>
	</form>