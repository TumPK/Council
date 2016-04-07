<!-- Page Content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
  
     $("#al").click(function(){
        alert("บันทึกเสร็จสิ้น");
    });
});
</script>
    <div id="body" class="width">
	<section id="content" class="two-column with-right-sidebar">
	<?php foreach($query2->result() as $row) { ?>
				<?php } ?>
          <form action="<?php echo site_url('Template/saveuser2/'.$row->staff_id); ?>" method="post">
				
					<h5>
						ชื่อ :  <input type='text' class="form-control" name="fname"  value="<?php echo $row->fname ?>"> </br>
						สกุล :  <input type='text' class="form-control" name="lname" value="<?php echo $row->lname ?>"> </br>
						เบอร์โทรศัพท์ :  <input type='text' class="form-control" name="tel" value="<?php echo $row->tel ?>"> </br>
						ชื่อผู้ใช้ :  <input type='text' class="form-control" name="username" value="<?php echo $row->username ?>"> </br>
						รหัสผ่าน :  <input type='text' class="form-control" name="password" value="<?php echo $row->password ?>"> </br>
						หน่วยงาน : 	
														
														<select class="form-control" name="section_id">
														<option value="<?php echo $row->section_id ?>"><?php echo $row->namesec ?></option>
														<?php foreach($query->result() as $low) { ?>
	  														<option value="<?php echo $low->section_id ?>"><?php echo $low->name ?></option>
														<?php } ?>
														</select>
													
					
					</br> <button type="submit" class="btn btn-default" id="al">บันทึก</button>
		</form>
		
		</section>
	