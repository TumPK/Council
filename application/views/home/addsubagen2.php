<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(".modal-dialog").hide();

    $("#btn0").click(function(){
        $("#check0").show();
    });
    $("#btn1").click(function(){
        $("#check1").show();
    });
    $("#btn2").click(function(){
        $("#check2").show();
    });
    $("#btn3").click(function(){
        $("#check3").show();
    });
    $("#btn4").click(function(){
        $("#check4").show();
    });
    $("#btn5").click(function(){
        $("#check5").show();
    });
     $("#close0").click(function(){
        $("#check0").hide();
    });
     $("#close1").click(function(){
        $("#check1").hide();
    });
     $("#close2").click(function(){
        $("#check2").hide();
    });
     $("#close3").click(function(){
        $("#check3").hide();
    });
     $("#close4").click(function(){
        $("#check4").hide();
    });
     $("#close5").click(function(){
        $("#check5").hide();
    });
     $("#al").click(function(){
        alert("บันทึกเสร็จสิ้น");
    });
});
</script>

<div id="body" class="width">
  <section id="content" class="two-column with-right-sidebar">  
        ระเบียบวาระที่ <?php echo $_SESSION['noagen2'].": ".$_SESSION['detailagen2']; ?>
<form class="form-inline" action="<?php echo site_url('Template/addsubagen3'); ?>" method="post"> 
  <?php for ($i=0;$i<5;$i++) { ?>
 <table border = '0' width = '80%' align = 'center'>
        
     <tr >
      <td ><div class="form-group" valign="top" >
            <label >วาระที่</label><input type="text" class="form-control"  placeholder="วาระที่" name="nosubagen<?php echo $i; ?>">
              </div><br><br>
            </td>
      <td><div class="form-group">
              <label >รายละเอียด</label>
              <textarea type="text" class="form-control" rows="3" name="detailsubagen<?php echo $i; ?>">
              </textarea>
              </div></td>
      <td><div class="form-group">
              <label >สรุปผล/มติที่ประชุม</label>
              <textarea type="text" class="form-control" rows="3" name="detailOFterm<?php echo $i; ?>">
              </textarea>
              </div></td>
      <td><button type="button" id="btn<?php echo $i; ?>" class="btn btn-default" data-toggle="modal" data-target="#myMaodl">ผู้รับผิดชอบ</button></td>
     </tr>
     <tr>
    
      <td colspan=4><div class="modal-dialog" id="check<?php echo $i; ?>">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">หน่วยงานผู้รับผิดชอบ</h4>
                      </div>
                   
                      <div class="modal-body">
                          <?php foreach($query4->result() as $row) { ?>
                            <label><input type="checkbox" name="section_id<?php echo $i; ?>[]" value="<?php echo $row->section_id ?>" ><?php echo $row->name ?></label></br>
                          <?php } ?>
                      </div>

                      <div class="modal-footer">
                        <button type="button" id="close<?php echo $i ;?>"class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                     
                    </div></td>
     </tr>




   </table>  
  
 <?php } 

 ?> 
      
 <?php    
    if($_SESSION['noagen2']==$_SESSION['stop']){
       echo '<button type="submit" class="btn btn-default" id="al"><a href="'.site_url('template/').'"><i class="fa fa-submit"></i>เสร็จสิ้น</a></button>';
    }
    else{
      echo '<button type="submit" class="btn btn-default">ถัดไป</button>';
    }


 ?>
      <!-- <button type="submit" class="btn btn-default">ถัดไป</button>
     <button type="submit" class="btn btn-default">บันทึก</button> -->

   </form> 
  </section>