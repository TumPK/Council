<div id="body" class="width">
	<section id="content" class="two-column with-right-sidebar">
     <table border = '1' width = '80%' align = 'center'>
		<?php foreach ($query->result() as $row) {
			echo "<tr></br>".$row->no."/".$year."</tr></br>";
			foreach ($query2->result() as $value) {
				if($value->vara == $row->no)
				echo "<tr>วาระที่ ".$value->number."</tr></br>";

			}
		} ?>
	</table>
  </section>

  

	<!--  <table border = '1' width = '80%' align = 'center'>
      	<tr><td>
		<?php foreach($query->result() as $row) { ?>
			<?php echo $row->year; ?>
		<?php } ?>
		</td></tr></table> -->