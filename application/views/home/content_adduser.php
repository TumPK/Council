<!-- Page Content -->
    <div id="body" class="width">
	<section id="content" class="two-column with-right-sidebar">
          <form action="<?php echo site_url('Template/saveuser'); ?>" method="post">
				
					<h5>
						ชื่อ :  <input type='text' class="form-control" name="fname"  placeholder="ชื่อ"></br>
						สกุล :  <input type='text' class="form-control" name="lname" placeholder="สกุล"></br>
						เบอร์โทรศัพท์ :  <input type='text' class="form-control" name="tel" placeholder="0801234567"></br>
						ชื่อผู้ใช้ :  <input type='text' class="form-control" name="username" placeholder="ชื่อผู้ใช้"></br>
						รหัสผ่าน :  <input type='text' class="form-control" name="password" placeholder="รหัสผ่าน"></br>
						หน่วยงาน : 	
														
														<select class="form-control" name="section_id">
														<?php foreach($query->result() as $row) { ?>
	  														<option value="<?php echo $row->section_id ?>"><?php echo $row->name ?></option>
														<?php } ?>
														</select>
													
					
					</br> <button type="submit" class="btn btn-default">บันทึก</button>
		</form>
		
		</section>
	