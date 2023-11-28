<?php
/**
 * Author: Askarali
 */
class MY_Controller extends CI_Controller{
     // public $source_version = app_version();
      public function __construct()
      {
        parent::__construct();
       // $this->output->enable_profiler(TRUE);
        set_time_limit(0);
      }
      public function load_info(){
           

            //If currency not set retrieve from DB
            if(!$this->session->has_userdata('currency')){
              $q1=$this->db->query("SELECT a.currency_name,a.currency,a.currency_code,a.symbol,b.currency_placement FROM db_currency a,db_sitesettings b WHERE a.id=b.currency_id AND b.id=1");
              $currency = $q1->row()->currency;
              $currency_placement = $q1->row()->currency_placement;
              $currency_code = $q1->row()->currency_code;
              $this->session->set_userdata(array('currency'  => $currency,'currency_placement'  => $currency_placement,'currency_code'  => $currency_code));
            }
            //end

            

            $query =$this->db->select('site_name,version,language_id,timezone,time_format,date_format')->where('id',1)->get('db_sitesettings');
            date_default_timezone_set(trim($query->row()->timezone));
            $time_format = (trim($query->row()->time_format)=='24') ? date("h:i:s") : date("h:i:s a");
            $date_view_format = trim($query->row()->date_format);
            $this->session->set_userdata(array('view_date'  => $date_view_format));
            $this->session->set_userdata(array('view_time'  => $query->row()->time_format));
            

            //CHECK LANGUAGE IN SESSION ELSE FROM DB
            if(!$this->session->has_userdata('language') && $this->session->has_userdata('logged_in') ){
              $this->load->model('language_model');
              $this->language_model->set($query->row()->language_id);
            }
            if($this->session->has_userdata('logged_in')){
              $this->lang->load($this->session->userdata('language'), $this->session->userdata('language'));
            }
            //End

            $this->data = array('theme_link'    => base_url().'theme/',
                                'base_url'      => base_url(),
                                'SITE_TITLE'    => $query->row()->site_name,
                                'VERSION'       => $query->row()->version,
                                'CURRENCY'       => $this->session->userdata('currency'),
                                'CURRENCY_PLACE' => $this->session->userdata('currency_placement'),
                                'CURRENCY_CODE' => $this->session->userdata('currency_code'),
                                'CUR_DATE'      => date("Y-m-d"),
                                'VIEW_DATE'      => $date_view_format,
                                'CUR_TIME'      => $time_format,
                                'SYSTEM_IP'     => $_SERVER['REMOTE_ADDR'],
                                'SYSTEM_NAME'   => gethostbyaddr($_SERVER['REMOTE_ADDR']),
                                'CUR_USERNAME'  => $this->session->userdata('inv_username'),
                                'CUR_USERID'    => $this->session->userdata('inv_userid'),
                                    );
      }
      public function load_global(){
            //Check login or redirect to logout
            if($this->session->userdata('logged_in')!=1){ redirect(base_url().'logout','refresh');    }
            $this->load_info();
      }

      public function currency($value='',$with_comma=false){
        $value = trim($value);

        if(!empty($value) && is_numeric($value)){
          $value= ($with_comma) ? number_format($value,0) : number_format($value,0,'.','');
        }

        if($this->session->userdata('currency_placement')=='Left'){
          if(!empty($value)){
            return $this->session->userdata('currency')." ".$value;
          }
          return $this->session->userdata('currency')."".$value;
          
        }
        else{
          if(!empty($value)){
            return $value." ".$this->session->userdata('currency');    
          }
         return $value."".$this->session->userdata('currency'); 
        }
      }
      
      public function currency_code($value=''){
        if(!empty($this->session->userdata('currency_code'))){
          if($this->session->userdata('currency_placement')=='Left'){
            return $this->session->userdata('currency_code')." ".$value;
          }
          else{
           return $value." ".$this->session->userdata('currency'); 
          }
        }
        else{
          return $value;
        }
      }
      public function permissions($permissions=''){
          //If he the Admin
          if($this->session->userdata('inv_userid')==1){
            return true;
          }

          $tot=$this->db->query('SELECT count(*) as tot FROM db_permissions where permissions="'.$permissions.'" and role_id='.$this->session->userdata('role_id'))->row()->tot;
          if($tot==1){
            return true;
          }
           return false;
        }
        public function permission_check($value=''){
          if(!$this->permissions($value)){
             show_error("Access Denied", 403, $heading = "You Don't Have Enough Permission!!");
          }
          return true;
        }
        public function permission_check_with_msg($value=''){
          if(!$this->permissions($value)){
             echo "You Don't Have Enough Permission for this Operation!";
            exit();
          }
          return true;
        }
        public function show_access_denied_page()
        {
          show_error("Access Denied", 403, $heading = "You Don't Have Enough Permission!!");
        }
            //end
        public function get_current_version_of_db(){
          return $this->db->select('version')->from('db_sitesettings')->get()->row()->version;
        }
        
}