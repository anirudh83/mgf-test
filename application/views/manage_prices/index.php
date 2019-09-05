<h3><?= $title ?></h3>

<ul>
	<li>
		<a href="<?= base_url('manage_prices/manage_base_rate') ?>">Manage Base Rate Design Prices</a>	
	</li>
	<li>
		<a href="<?= base_url('manage_prices/optional_prices'); ?>">Manage Optional Feature Prices</a>	
	</li>
	<li>
		<a href="<?= base_url('manage_prices/included_features'); ?>">Manage Included Features</a>	
	</li>
	<li>
		<a href="<?= base_url('files/Master Granny Flat Quotation System User Manual.docx') ?>">View User Manual</a>	
	</li>
	<li>
		<a href="javascript:;" onclick="displayPopup();">Upload/Replace Pdf Files</a>	
	</li>
</ul>


<div style="width: 500px; height: auto; margin-left: 250px; position: fixed; border: 1px solid rgb(128, 128, 128); background-color: rgb(255, 255, 255); bottom: 1%; display: none;" id="pdfUpdater">
	<form method="post" action="<?= base_url('manage_prices/upload_images'); ?>" enctype="multipart/form-data">
	<table class="Border">
		<tbody>
			<tr>
				<td height="50" colspan="2" class="heading">Update Following Attachments (pdf)</td>
			</tr>
			<tr>
				<td width="211" height="50">P/C Items 1</td>
				<td width="277" height="50">
					<a href="Fileupload">
						<input type="file" class="upload" name="pc_one" onchange="return readURL(this);">
					</a>
				</td>
			</tr>
			<tr>
				<td width="211" height="50">P/C Items 2</td>
				<td width="277" height="50">
					<a href="Fileupload">
						<input type="file" class="upload" name="pc_two" onchange="return readURL(this);">
					</a>
				</td>
			</tr>
			<tr>
				<td width="211" height="50">P/C Items 3</td>
				<td width="277" height="50">
					<a href="Fileupload">
						<input type="file" class="upload" name="pc_three" onchange="return readURL(this);">
					</a>
				</td>
			</tr>
			<tr>
				<td height="50">Trade Breakup</td>
				<td width="277" height="50">
					<a href="Fileupload">
						<input type="file" class="upload" name="trade" onchange="return readURL(this);">
					</a>
				</td>
			</tr>
			<tr>
				<td height="50">Contract of Work</td>
				<td width="277" height="50">
					<a href="Fileupload">
						<input type="file" class="upload" name="contract" onchange="return readURL(this);">
					</a>
				</td>
			</tr>
			<tr>
				<td height="50">Home Warranty</td>
				<td width="277" height="50">
					<a href="Fileupload">
						<input type="file" class="upload" name="warrenty" onchange="return readURL(this);">
					</a>
				</td>
			</tr>
			<tr>
				<td height="50" colspan="2">(*Selected files will replace existing files on server.)</td>
			</tr>
			<tr>
				<td height="50">
					<label id="inProgress" style="display: none;">Upload In Progress</label>
				</td>
				<td height="50">
					<button type="submit" href="javascript:;" >Update</button>
					<a href="javascript:;" style="margin-left: 50px;" onclick="javascript:cancelUpload();">Cancel</a>
				</td>
			</tr>
		</tbody>
	</table>
	</form>
</div>

<script>
        function cancelUpload() {
            $('#pdfUpdater').hide();
            location.reload(true);
        }

        function displayPopup() {
            $('#pdfUpdater').show();
        }

        
    </script>

    <style>
        .heading {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-style: normal;
            line-height: normal;
            text-transform: capitalize;
            color: #FFFFFF;
            background-color: #FF9933;
            border: #FF6600;
            font-size: 16px;
        }

        .Border {
            width: 500px;
            height: auto;
            border: #FF6600;
        }
    </style>

<div class="_space">
</div>

<script type="text/javascript">
	function readURL(input) {
        if (input.files && input.files[0]) {
            
            var FileSize = input.files[0].size / 1024 / 1024; // in MB
            var extension = input.files[0].name.substring(input.files[0].name.lastIndexOf('.')+1);
            
            if (FileSize > 6) {
                alert("Maxiumum Image Size Is 5 Mb.");
                input.value = '';
                return false;
            }
            else{
                if (extension == 'pdf') {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $("#imgProfile").attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
                else
                {
                    alert("Only Allowed '.pdf' ( PDF Files )");
                    input.value = '';
                    return false;
                }
            }
        }
    }
</script>

