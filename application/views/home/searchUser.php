<div id="body" class="width">
	<section id="content" class="two-column with-right-sidebar">
        <link type="text/css" href="<?php echo base_url(); ?>/template/css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />    
        <script type="text/javascript" src="<?php echo base_url(); ?>/template/js/jquery-1.4.4.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/template/js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
        <script type="text/javascript">
          $(function () {
            var d = new Date();
            var toDay = (d.getDate() + 543 + '/' + (d.getMonth() + 1) + '/' + d.getFullYear());


            // กรณีต้องการใส่ปฏิทินลงไปมากกว่า 1 อันต่อหน้า ก็ให้มาเพิ่ม Code ที่บรรทัดด้านล่างด้วยครับ (1 ชุด = 1 ปฏิทิน)

            $("#datepicker-th").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
            });
            $(function () {
            var d = new Date();
            var toDay = (d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543));
            
            $("#datepicker-th2").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
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
                <h4>รายงานการประชุมย้อนหลัง
				<form >
					เลือกช่วงเวลาที่ต้องการ : ตั้งแต่วันที่<input class="form-control" style = "width:20%;" placeholder="" id="datepicker-th" type="text" name="datestart">
                    ถึงวันที่<input class="form-control" style = "width:20%;" placeholder="" id="datepicker-th2" type="text" name="datestop">
                    วาระ <input class="form-control" style = "width:20%;" type="search" name="searchAgenda">
                    รายละเอียดของมติ <input class="form-control" style = "width:20%;" type="search" name="searchDetailsub">
                    <a href="<?php echo site_url(''); ?>"><input type='button' value='ค้นหา'></a>

				</form>	
                
  </section>