<?php

// DB table to use
$table = 'db_category';

// Table's primary key
$primaryKey = 'id';


$columns = array(

    array( 'db' => 'category_code',  'dt' => 0 ),
    array( 'db' => 'category_name',  'dt' => 1 ),
      array( 'db' => 'description',     'dt' => 2 ),
      array('db' => 'status', 'dt' => 3, 'field' => 'status',
	    	'formatter' => function($d, $row){
				if($d==1)
					return "<span onclick='update_status(".$row['id'].",0)' id='span_".$row['id']."'  class='label label-success' style='cursor:pointer'>Active </span>";
				else
					return "<span onclick='update_status(".$row['id'].",1)' id='span_".$row['id']."'  class='label label-danger' style='cursor:pointer'> Inactive </span>";

	    	}
	    ),
	  array('db' => 'id', 'dt' => 4, 'field' => 'id',
	  	'formatter' => function($d, $row){


			return '<div class="btn-group" >
										<a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
											Action <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu dropdown-light pull-right">
											
											<li>
												<a title="Update Record ?" href="category.php?id='.$d.'">
													Update
												</a>
											</li>
											<li>
												<a style="cursor:pointer" title="Delete Record ?" onclick="delete_category('.$d.')">
													Delete
												</a>
											</li>
											
										</ul>
									</div>';

	  	}
	  ),
	
);

// SQL server connection information
$sql_details = array(
	'user' => 'root',
	'pass' => '',
	'db'   => 'invento',
	'host' => 'localhost'
);



require('ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
