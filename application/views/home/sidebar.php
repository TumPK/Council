<aside class="sidebar big-sidebar right-sidebar">
      <ul>
          <li><h4>ยินดีต้อนรับ</h4>
              <ul class="blocklist">
                
                <h5><?php echo "คุณ  ".$_SESSION['fname']." ".$_SESSION['lname'];?></h5><br>
				<h5><?php echo $_SESSION['name']; ?></h5>
				
                
				
                </ul>
          </li>
		  <?php if($_SESSION['intype'] == 1) { ?>
		  <a href="<?php echo site_url('template/addre/'); ?>"><li><h4>เพิ่มรายงาน</h4></li></a>
		  <a href="<?php echo site_url('template/reportuser/1/'.$_SESSION['section_id']); ?>"><li><h4>มติที่รับผิดชอบ</h4></li></a>
		  <a href="<?php echo site_url('template/user/1'); ?>"><li><h4>ผู้ใช้ทั้งหมด</h4></li></a>
		  <?php } ?>
		  <?php echo form_open("th/logout");?>
		  <a href="<?php echo site_url('template/logout');?>"><li><h4>ออกจากระบบ</h4></li></a>
		  </from>
		  
      </ul>    
    </aside>
  <div class="clear"></div>
</div>