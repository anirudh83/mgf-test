				</div>
			</div>
			
			<footer>
				<div class="wrapper"> 
					&copy Copyright 2019 <?= $this->config->config['TITLE'] ?> &bull; All Rights Reserved &bull; <a href="mailto:<?= $this->config->config['email'] ?>"><?= $this->config->config['email'] ?></a>
				</div>
			</footer>
		</div>


		<script src="<?php echo base_url(); ?>theme/js/notifyjs/bootstrap-notify.min.js"></script>
		<script type="text/javascript">
    

		    $(function (){

		        <?php if(!empty($this->session->flashdata('error'))){ ?>
		    
			        $.notify({
			          title: '<strong></strong>',
			          icon: 'fa fa-times-circle',
			          message: '<?php echo $this->session->flashdata('error'); ?>'
			        },{
			          type: 'danger'
			        });

		    	<?php $this->session->set_flashdata('error',''); } ?>

		    	<?php if(!empty($this->session->flashdata('ok'))){ ?>
		    
			        $.notify({
			          title: '<strong></strong>',
			          icon: 'fa fa-times-circle',
			          message: '<?php echo $this->session->flashdata('ok'); ?>'
			        },{
			          type: 'success'
			        });

		    	<?php $this->session->set_flashdata('ok',''); } ?>
		    });
		</script>
</html>