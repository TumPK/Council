   <!-- Page Content -->
     <div class="container"></br></br></br></br></br></br></br></br>
    	<form action="<?php echo site_url('template/lab8_UpdateDetail'); ?> " method="post">
    		<p><h3>respondents</h3></p>
    		<?php foreach($query->result() as $row) { ?>	
					<h5>&nbsp;&nbsp;&nbsp;employeeNumber : <input type='text' name="employeeNumber" value = '<?php echo $row->employeeNumber;?>'></br>
					&nbsp;&nbsp;&nbsp;lastName : <input type='text' name="lastName" value = '<?php echo $row->lastName;?>'></br>
					&nbsp;&nbsp;&nbsp;firstName : <input type='text' name="firstName" value = '<?php echo $row->firstName;?>'></br>
					&nbsp;&nbsp;&nbsp;extension : <input type='text' name="extension" value = '<?php echo $row->extension;?>'></br>
					&nbsp;&nbsp;&nbsp;email : <input type='text' name="email" value = '<?php echo $row->email;?>'></br>
					<?php } ?><p align = 'center'><button type="summit" value="summit">Submit</button></p>
	</form></br></br></br></br>
	</div>