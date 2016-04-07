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
      <table border = '1' width = '80%' align = 'center'>
        <link type="text/css" href="<?php echo base_url(); ?>/template/css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />    
        <script type="text/javascript" src="<?php echo base_url(); ?>/template/js/jquery-1.4.4.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/template/js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
        <script type="text/javascript">
          $(function () {
            var d = new Date();
            var toDay = ( d.getDate()+ '/' + (d.getMonth() + 1) + '/' + (d.getFullYear()+ 543) );


            // กรณีต้องการใส่ปฏิทินลงไปมากกว่า 1 อันต่อหน้า ก็ให้มาเพิ่ม Code ที่บรรทัดด้านล่างด้วยครับ (1 ชุด = 1 ปฏิทิน)

            $("#datepicker-th").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});


            });
        </script>
        <style type="text/css">

            .demoHeaders { margin-top: 2em; }
            #dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
            #dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
            ul#icons {margin: 0; padding: 0;}
            ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
            ul#icons span.ui-icon {float: left; margin: 0 4px;}
            ul.test {list-style:none; line-height:30px;}
        </style>    
        <?php foreach($query2->result() as $row) { ?>
		<?php } ?>
		<?php 
		$date 	= $row->date;
		list($y, $m, $d) = explode('-', $date);
		$dt = $d."/".$m."/".$y;
		?>
		
        <form action="<?php echo site_url('template/save_editreport/'.$row->report_id); ?> " method="post">
          วัน/เดือน/ปี<input class="form-control" style = "width:40%;"  id="datepicker-th" type="text" name="date0" value="<?php echo $dt; ?>" >
          ครั้งที่ : <input class="form-control" style = "width:40%;"  type='text' name="nore" value="<?php echo $row->no;?>" >
        </br><button type="submit" class="btn btn-default" id="al">บันทึก</button>
        </form> 
  </table>
  </section>