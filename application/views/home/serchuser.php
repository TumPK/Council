<div id="body" class="width">
	<section id="content" class="two-column with-right-sidebar">
<form action="<?php echo site_url('template/serchuser2/1'); ?>" method="post">
	          <h5>
						เลขที่<input type='text' class="form-control" name="staff_id" value = ''></br>
						ชื่อ<input type='text' class="form-control" name="fname" value = ''></br>
						นามสกุล<input type='text' class="form-control" name="lname" value = ''></br>
						เบอร์โทร<input type='text' class="form-control" name="tel" value = ''></br>
						หน่วยงาน<select class="form-control" name="namesec">
						<option value=""></option>
														<?php foreach($query2->result() as $row) { ?>
														
	  											<option value="<?php echo $row->section_id ?>"><?php echo $row->name ?></option>
														<?php } ?>
														</select></br>
						สถานะ : <select class="form-control" name="name">
						<option value=""></option>
														
														<option value="หน่วยงาน">หน่วยงาน</option>
	  											<option value="ผู้ดูแลระบบ">ผู้ดูแลระบบ</option>
														
														</select></br>
						
						</br> <button type="submit" class="btn btn-default">ค้นหา</button>
	          
	      </form>
		  </section>