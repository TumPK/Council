<body>
<div id="container"  class="width">
    <div >
        <img class="img-responsive" src="<?php echo base_url(); ?>/template/image/20140602094431.jpg" width="100%">
    </div>
    <header> 
	<div>
		<!-- <h1 align="center"><a href=""><strong>Council</strong></a></h1> -->
        <form method="post">
		<nav>
    			<ul class="sf-menu dropdown" align="center">
        			<li><a href="<?php echo site_url('template'); ?>"><i class="fa fa-home"></i>หน้าแรก</a></li>
            			<li >
					             <a href="">รายงานการประชุม</a>    			
					               <ul>
                                    <?php foreach($query3->result() as $row) { ?>    
                				    <li><a href="<?php echo site_url('template/inweb2/'.$row->year); ?>">รายงานการประชุม <?php echo $row->year; ?> </a></li>
                                   <?php } ?>   
                	       </ul>
                  </li>
				  
				  <li><a href="<?php echo site_url('template/ser3'); ?>"><i class="fa fa-search"></i>ค้นหา</a></li>
	     			      
            </ul>
        <div class="clear"></div>
    </nav>
    </form>
</div>
<div class="clear"></div>   
</header>