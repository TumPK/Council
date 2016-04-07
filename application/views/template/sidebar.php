    <aside class="sidebar big-sidebar right-sidebar">
      <ul>
          <li><h4>เข้าสู่ระบบ</h4>
              <ul class="blocklist">
                <form action="<?php echo site_url('Template/login_submit'); ?>" method="post" >
                    <div class="form-group">
                        <label for="username">ชื่อผู้ใช้:</label>
                            <input type="username" class="form-control" name="username" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="password">รหัสผ่าน:</label>
                          <input type="password" class="form-control" name="password" placeholder="Enter password">
                    </div>
                    <button type="submit" class="btn btn-default">เข้าสู่ระบบ</button>
                  </form>
                </ul>
          </li>
      </ul>    
    </aside>
  <div class="clear"></div>
</div>