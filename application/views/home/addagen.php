<div id="body" class="width">
  <section id="content" class="two-column with-right-sidebar">
          <table border = '0' width = '80%' align = 'center'>
        <form class="form-inline" action="<?php echo site_url('template/addsubagen');?>" method="post">
        <?php for ($i=0;$i<6;$i++) { ?>
        
          <tr>
            <td>
            <div class="form-group">
            <label >ระเบียบวาระที่</label>
              <input type="text" class="form-control"  placeholder="ระเบียบวาระที่" name="noagen<?php echo $i; ?>">
              </div>
              </td>

              <td>
              <div class="form-group">
              <label >รายละเอียด</label>
              <textarea type="text" class="form-control" rows="3" name="detailagen<?php echo $i; ?>">
              </textarea>
              </div>
              </td>
            </tr>
            <?php } ?>
            <tr>
              <td></td>
              <td colspan="2">
              </br><button type="submit" class="btn btn-default">วาระการประชุม</button>
              </td>
            </tr>
        </form>   
        
        
      </table>  


  </section>