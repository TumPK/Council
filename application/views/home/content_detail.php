   <!-- Page Content -->
    <div class="container"></br></br></br></br>
          <table border = '1' width = '80%' align = 'center'>
			<?php foreach($query->result() as $row) { ?>	
				</br></br></br></br><tr align = 'left'>
					<h5>&nbsp;&nbsp;&nbsp;employeeNumber : <?php echo $row->employeeNumber;?></br>
						&nbsp;&nbsp;&nbsp;lastName : <?php echo $row->lastName;?></br>
						&nbsp;&nbsp;&nbsp;firstName : <?php echo $row->firstName;?></br>
						&nbsp;&nbsp;&nbsp;extension : <?php echo $row->extension;?></br>
						&nbsp;&nbsp;&nbsp;email : <?php echo $row->email;?></br></h5></br></td></tr></table></br>
					<p align = 'center'>
					<a href="<?php echo site_url('template/lab8_DeleteDetail/'.$row->employeeNumber); ?>"><input type='button' value='delete'></a>
					<a href="<?php echo site_url('template/lab8_detail2/'.$row->employeeNumber); ?>"><input type='button' value='update'></a></p>
		<?php } ?>
		</br></br></br></br>
	</div>