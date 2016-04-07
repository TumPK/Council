<div id="body" class="width">
	<section id="content" class="two-column with-right-sidebar">  
        ระเบียบวาระที่ <?php 
    foreach ($query->result() as $row) { echo $row->no.;
      echo ":".$row->detail;?>
				<form>
					วาระที่<input class="form-control" style = "width:40%;" type="text" name="nosub" placeholder="1.1">
          <input class="form-control" style = "width:40%;"  type='text' name="dsub" placeholder="รายละเอียด">
					สรุปผลมติที่ประชุม<input class="form-control" style = "width:100%;"  type='text' name="dterm" placeholder="รายละเอียด">
          <input type="radio" class="form-control" name="section_id">
                            <?php foreach($query->result() as $row) { ?>
                                <option value="<?php echo $row->section_id ?>"><?php echo $row->name ?></option>
                            <?php } ?>
                            </select>
				  

        <?php } ?>

        </br> <button type="submit" class="btn btn-default">บันทึก</button>
   </form>    
  </section>