<aside class="sidebar big-sidebar right-sidebar">
      <ul>
          <li><h4>ยินดีต้อนรับ</h4>
              <ul class="blocklist">
                 
            <?php echo "คุณ  ".$_SESSION['fname']." ".$_SESSION['lname'];?>
			<h5><?php echo $_SESSION['name']; ?></h5>
                </ul>
          </li>
		  <a href="<?php echo site_url('template/adduser');?>"><li><h4>เพิ่มผู้ใช้</h4></li></a>
		  <a href="<?php echo site_url('template/serchuser');?>"><li><h4>ค้นหาผู้ใช้</h4></li></a>
		  <a href="<?php echo site_url('template');?>"><li><h4>กลับหน้าหลัก</h4></li></a>
      </ul>    
    </aside>
  <div class="clear"></div>
</div>