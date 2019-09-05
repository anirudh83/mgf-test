<?php $CI =& get_instance(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<title><?= $this->config->config['TITLE'] ?> - <?= $title; ?></title>
		<link rel="stylesheet" href="<?= base_url() ?>theme/css/bootstrap.min.css" type="text/css" />
		<link rel="stylesheet" href="<?= base_url() ?>theme/css/reset.css" type="text/css" />
		<link rel="stylesheet" href="<?= base_url() ?>theme/css/style.css" type="text/css" />
		<link rel="stylesheet" href="<?= base_url() ?>theme/css/main.css" type="text/css" />
		<link rel="stylesheet" href="<?= base_url() ?>theme/css/prettyPhoto.css" type="text/css" />
		<script type="text/javascript" src="<?= base_url() ?>theme/js/jquery-1.4.1.min.js"></script>
		<script src="<?php echo base_url(); ?>theme/js/jquery_new.js"></script>
		<script src="<?php echo base_url(); ?>theme/js/custom.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="main">
			<header>
				<div class="wrapper">
					<div id="logo">
						<a id="LogoHyperLink">
							<img src="<?= base_url() ?>theme/image/logo.gif" alt="" style="width: 100%;"/>
						</a>
					</div>
					<div id="call">
						<img id="PhoneIconImage" src="<?= base_url() ?>theme/image/icon_phone.gif" alt="Phone 1 300 643 528" style="height:20px;width:20px;" /><?= $this->config->config['mobile'] ?><br />
						<img id="EmailIconImage" src="<?= base_url() ?>theme/image/email_icon.gif" alt="<?= $this->config->config['email'] ?>" style="height:20px;width:20px;" /> 
						<a href="mailto:<?= $this->config->config['email'] ?>">
							<?= $this->config->config['email'] ?>
						</a>
					</div>
				</div>
			</header>
			
			<div class="page">
				<div class="main">
					<?php if($CI->uri->segment(2) != 'login'){ ?>
						<div class="wrapper">
							<nav>
								<ul id="menu">
									<li>
										<a href="<?= base_url('dashboard') ?>" class="<?= ($this->uri->segment(1) == 'dashboard')?'active':''; ?>">
											Dashboard
										</a>
									</li>
									<li>
										<a href="<?= base_url('quotation/new'); ?>" class="<?= ($this->uri->segment(2) == 'new')?'active':''; ?>">
											New Quotation
										</a>
									</li>
									<li>
										<a href="<?= base_url('quotation'); ?>" class="<?= ($this->uri->segment(1) == 'quotation' && $this->uri->segment(2) != 'new')?'active':''; ?>">
											Search Quotation
										</a>
									</li>
									<?php if($this->session->userdata('id') == '1'){ ?>	
										<li>
											<a href="<?= base_url('manage_prices') ?>" class="<?= ($this->uri->segment(1) == 'manage_prices')?'active':''; ?>">Manage Prices</a>
										</li>
									
										<li>
											<a href="<?= base_url('user') ?>" class="<?= ($this->uri->segment(1) == 'user')?'active':''; ?>">	Manage Users
											</a>
										</li>
									<?php } ?>
									<li>
										<a href="<?= base_url('welcome/logout') ?>">Logout</a> 
									</li>
								</ul>
							</nav>
						</div>
					<?php }else{ ?>

						<h2>
							<?= $title; ?>
						</h2>

					<?php } ?>