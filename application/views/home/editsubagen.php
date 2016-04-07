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
      <!-- Page Content -->
    <?php foreach($query2->result() as $row) { ?>
		<?php } ?>
		<form action="<?php echo site_url('template/save_editsubagen/'.$row->subagenda_id.'/'.$row->term_id.'/'.$row->responsible_id); ?> " method="post">
    		<label >เลขที่</label>
              <input type="text" class="form-control"  name="no" value="<?php echo $row->no;?>" >
			  <label >รายละเอียด</label>
              <input type="text" class="form-control"  name="detail" value="<?php echo $row->detail;?>" >
			  <label >งาน</label>
              <input type="text" class="form-control"  name="deatailOFterm" value="<?php echo $row->deatailOFterm;?>" >
			  <label >ผู้รับผิดชอบ</label>
              <select class="form-control" name="section_id">
			  <option value="<?php echo $row->section_id ?>"><?php echo $row->name ?></option>
														<?php foreach($query->result() as $low) { ?>
	  														<option value="<?php echo $low->section_id ?>"><?php echo $low->name ?></option>
														<?php } ?>
														</select>
			  </br><button type="submit" class="btn btn-default" id="al">บันทึก</button>
					</form> 	
			
	
  </section>