<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table style="width:100%">
		<tbody>
			<tr>
				<td>Dear <?= $quote['first_name'] ?></td>
			</tr>
			<tr>
				<td style="height: 60px;"></td>
			</tr>
			<tr>
				<td>Following on from our discussions regarding your interest in building a Master Granny Flat, please find attached the appropriate documentation for your review and signature.</td>
			</tr>
			<tr>
				<td style="height: 60px;"></td>
			</tr>
			<tr>
				<td>We will be speaking with you soon to move the project forward.</td>
			</tr>
			<tr>
				<td style="height: 60px;"></td>
			</tr>
			<tr>
				<td>Yours<br>
				<?= $this->config->config['name'] ?><br>
				Master Granny Flats<br>
				<?= $this->config->config['mobile2'] ?><br>
				<?= $this->config->config['email'] ?>
				</td>
			</tr>
			<tr>
				<td style="height: 30px;"></td>
			</tr>
			<tr>
				<td>
					<img src="<?= base_url('theme/image') ?>/logo.gif" style="width: 200px;">
				</td>
			</tr>
			<tr>
				<td>
					<table style="width:100%;">
                        <tbody>
                            <tr>
                                <td style="width: 20px;">
                                    <img src="<?= base_url('theme/image') ?>/icon_phone.gif" width="20" height="20" alt="Phone 0414 875 463">
                                </td>
                                <td>
                                     
                                         <strong><?= $this->config->config['mobile'] ?></strong>
                                     
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="<?= base_url('theme/image') ?>/email_icon.gif" width="20" height="20" alt="Phone 0414 875 463">
                                </td>
                                <td> 
                                    <strong><?= $this->config->config['email'] ?></strong>
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
				</td>
			</tr>
		</tbody>
	</table>

</body>
</html>