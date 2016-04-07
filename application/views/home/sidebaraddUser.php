<aside class="sidebar big-sidebar right-sidebar">
      <ul>
          <li><h4>ยินดีต้อนรับ</h4>
              <ul class="blocklist">
            <?php echo "คุณ  ".$_SESSION['fname']." ".$_SESSION['lname'];?>
			<h5><?php echo $_SESSION['name']; ?></h5>
                </ul>
          </li>
		  
		  <a href="<?php echo site_url('template/user/1');?>"><li><h4>กลับ</h4></li></a>
      </ul>    
    </aside>
  <div class="clear"></div>
</div>