<aside class="sidebar big-sidebar right-sidebar">
      <ul>
          <li><h4>ยินดีต้อนรับ</h4>
              <ul class="blocklist">
                <?php foreach($query2->result() as $low) { ?>  
                <h5><?php echo "คุณ".$low->lname." ".$low->fname;?></h5>
                <?php } ?>
				
                </ul>
          </li>
		  
		  
		  <a href="<?php echo site_url('template/user/1'); ?>"><li><h4>กลับ</h4></li></a>
      </ul>    
    </aside>
  <div class="clear"></div>
</div>