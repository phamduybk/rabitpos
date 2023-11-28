<?php
/**
 * Get buttonId & tableId
 */
$tableId = (isset($tableId)) ? $tableId : '';
?>
<div class="btn-group pull-right" title="View Account">
	<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
		<i class="fa fa-fw fa-bars"></i> Export <span class="caret"></span>
	</a>
	<ul role="menu" class="dropdown-menu dropdown-light pull-right">
	 <li>
		<a style="cursor:pointer" class='downloadExcel' data-table-id="<?=$tableId?>" title="Download Excel Format" data-toggle="tooltip" data-placement="top">
			<i class="fa fa-fw fa-file-excel-o text-red"></i>Excel
		</a>
	<!-- 	<a style="cursor:pointer" class='downloadPdf' data-table-id="<?=$tableId?>" title="Download PDF Format" data-toggle="tooltip" data-placement="top">
			<i class="fa fa-fw fa-file-pdf-o text-red"></i>PDF
		</a> -->
	</li>
</ul>
</div>