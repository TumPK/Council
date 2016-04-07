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
          <table border = '0' width = '80%' align = 'center'>
        <form class="form-inline" action="<?php echo site_url('template/save_editagen/'.$row->agenda_id); ?>" method="post">
        
        
          <tr>
            <td>
            <div class="form-group">
            <label >วาระที่</label>
              <input type="text" class="form-control"  name="no" value="<?php echo $row->no;?>" >
              </div>
              </td>

              <td>
              <div class="form-group">
              <label >เรื่อง</label>
              <input type="text" class="form-control" rows="3" name="detail" value="<?php echo $row->detail;?>" >
             
              </div>
              </td>
            </tr>
            
            <tr>
              <td></td>
              <td colspan="2">
              </br><button type="submit" class="btn btn-default" id="al">บันทึก</button>
              </td>
            </tr>
        </form>   
        
        
      </table>  


  </section>