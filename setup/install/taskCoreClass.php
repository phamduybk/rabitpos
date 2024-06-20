<?php
class Core {
	function checkEmpty($data)
	{
	    if(!empty($data['hostname']) && !empty($data['username']) && !empty($data['database']) && !empty($data['url']) ){
	        return true;
	    }else{
	        return false;
	    }
	}

	function show_message($type,$message) {
		return $message;
	}
	
	function getAllData($data) {
		return $data;
	}

	function write_config($data) {

       
        $template_path 	= 'includes/templatevthree.php';

		$output_path 	= '../../application/config/database.php';

		$database_file = file_get_contents($template_path);

		$new  = str_replace("%HOSTNAME%",$data['hostname'],$database_file);
		$new  = str_replace("%USERNAME%",$data['username'],$new);
		$new  = str_replace("%PASSWORD%",$data['password'],$new);
		$new  = str_replace("%DATABASE%",$data['database'],$new);

		$handle = fopen($output_path,'w+');
		@chmod($output_path,0777);
		
		if(is_writable(dirname($output_path))) {

			if(fwrite($handle,$new)) {
				//return true;
				if($this->write_config2($data)){
					@chmod($output_path,0644);
					return true;
				}
				return false;

			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	function write_config2($data) {

        $template_path 	= 'includes/config_file.php';
		$output_path 	= '../../application/config/config.php';

		$database_file = file_get_contents($template_path);

		$new  = str_replace("%BASE_URL%",$data['url'],$database_file);
		
		$handle = fopen($output_path,'w+');
		@chmod($output_path,0777);
		
		if(is_writable(dirname($output_path))) {

			if(fwrite($handle,$new)) {
				//return true;
				if($this->write_config3($data)){
					@chmod($output_path,0644);
					return true;
				}
				return false;

			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	function write_config3($data) {

        $template_path 	= '../install/assets/codeigniter_index_page/index.php';
		$output_path 	= '../../index.php';


		@chmod($template_path,0777);
		@chmod($output_path,0777);
		
		if(copy($template_path, $output_path)){
			if($this->write_config4($data)){
				@chmod($output_path,0644);
				return true;
			}
			return false;
		}
		return false;
	}
	function write_config4($data) {

        $mid_path = '../../application/controllers/Login.php';
		

		$mid_path_content = file_get_contents($mid_path);

		$new  = str_replace("@@appinfo@@",appinfo(),$mid_path_content);
		
		$handle = fopen($mid_path,'w+');
		@chmod($mid_path,0777);
		
		if(is_writable(dirname($mid_path))) {

			if(fwrite($handle,$new)) {
				@chmod($mid_path,0644);
				return true;	
			} else {
				echo "write_config4";
				return false;
			}
		} else {
			return false;
		}
	}

	/*function update_db($base_url){
		$database_updated = file_get_contents($base_url."updates/update_db");
		if($database_updated=='success'){
			return true;
		}
		return false;
	}*/
	function checkFile(){
	    $output_path = '../../application/config/database.php';
	    
	    if (file_exists($output_path)) {
           return true;
        } 
        else{
            return false;
        }
	}
}