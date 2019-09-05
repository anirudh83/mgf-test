<h3><?= $title ?></h3>


<form method="post" action="<?= base_url('quotation/mail_send') ?>" enctype="multipart/form-data">
<div>
	<table cellspacing="10px">
		<tbody>
			<tr>
				<td><label class="control-label" for="email">To Email:</label></td>
				<td><input type="text" name="email" id="email" class="input-large" value="<?= $quote['email'] ?>" style="width:500px;"></td>
			</tr>

			<tr>
				<td><label class="control-label" for="subject">Subject:</label></td>
				<td>
					<input type="text" name="subject" id="subject" class="input-large" value="Construction of new granny flat" style="width:500px;">
				</td>
			</tr>
			<tr>
				<td><label class="control-label" for="subject">Body:</label></td>
				<td>
                    <textarea cols="80" id="editor1" name="body" rows="20" data-sample-short>
                        <div style="border: solid 1px #FFFFFF; width: 700px; padding:5px;">
    
                            <p>
                                Dear <?= $quote['first_name'] ?>
                            </p>
                            <br>
                            <p>
                                Following on from our discussions regarding your interest in building a  Master Granny Flat, please find attached the appropriate documentation for your review  and signature.
                            </p>
                            <br>
                            <p>
                                We will be speaking with you soon to move the project forward.
                            </p>
                            <br>
                            <p>
                                Yours<br> 
                                Thomas Tang<br>
                                Master Granny Flats<br>
                                Phone:  1 300 643 528<br>
                                <a href="mailto:<?= $this->config->config['email'] ?>" target="_blank"><?= $this->config->config['email'] ?></a>             
                            </p>
                            <table style="width:100%;">
                                <tbody>
                                    <tr>
                                        <td colspan="2"><img src="<?= base_url('theme/image') ?>/logo.gif" alt=""></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20px;">
                                            <img src="<?= base_url('theme/image') ?>/icon_phone.gif" width="20" height="20" alt="Phone 0414 875 463">
                                        </td>
                                        <td>
                                             <h2>
                                                 <strong><?= $this->config->config['mobile'] ?></strong>
                                             </h2>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <img src="<?= base_url('theme/image') ?>/email_icon.gif" width="20" height="20" alt="Phone 0414 875 463">
                                        </td>
                                        <td> 
                                            <h2>
                                                 <strong>
                                                    <a href="mailto:<?= $this->config->config['email'] ?>" ><?= $this->config->config['email'] ?></a></strong>
                                            </h2>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>             
                        </div>
                    </textarea>              
                </td>
			</tr>
            <tr>
                <td colspan="2">
                    <br>
                </td>
            </tr>
            <tr>
                <td><label class="control-label" for="">Attachments:</label></td>
                <td>
                    <table>
                        <tr>
                            <td><input type="checkbox" name="quotation_later"></td>
                            <td><a href="<?= base_url('my_pdf/quotation_later/').$quote['id'] ?>" target="_blank">Quotation Letter</a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="quotation_summary"></td>
                            <td><a href="<?= base_url('my_pdf/summary/').$quote['id'] ?>" target="_blank">Quotation Summary</a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="contract_of_work"></td>
                            <td><a href="#" target="_blank">Contract of Work</a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="pc_item_1"></td>
                            <td><a href="<?= base_url('my_pdf/pc_item_1'); ?>" target="_blank">P/C Item 1</a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="pc_item_2"></td>
                            <td><a href="<?= base_url('my_pdf/pc_item_2'); ?>" target="_blank">P/C Item 2</a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="pc_item_3"></td>
                            <td><a href="<?= base_url('my_pdf/pc_item_3'); ?>" target="_blank">P/C Item 3</a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="trade_breakup"></td>
                            <td><a href="<?= base_url('my_pdf/trade_Backup') ?>" target="_blank">Trade Breakup</a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="home_warranty"></td>
                            <td><a href="<?= base_url('my_pdf/home_warrantity') ?>" target="_blank">Home Warranty</a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="floor_plan"></td>
                            <td><a href="<?= base_url('my_pdf/floor_plan/').$quote['id'] ?>" target="_blank">Floor Plan</a></td>
                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                            <td style="color: #888888;font-size: 12px;height: 35px;padding-top: 15px;">Optional Attachments for this Email (if any)?
                            </td>
                        </tr>

                        <tr>
                            <td>1.</td>
                            <td>
                                <input type="file" name="attch1">
                            </td>
                        </tr>

                        <tr>
                            <td>2.</td>
                            <td>
                                <input type="file" name="attch2">
                            </td>
                        </tr>

                        <tr>
                            <td>3.</td>
                            <td>
                                <input type="file" name="attch3">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <br>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Send Quote" class="btn">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
		</tbody>
	</table>
</div>
<input type="hidden" name="quote_id" value="<?= $quote['id'] ?>">
</form>









<script src="<?= base_url('theme/js/ckeditor/') ?>ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor1', {
      height: 260,
      width: 800,
    });
</script>



<div class="_space">
</div>

