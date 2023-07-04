<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

    class Common_Model extends CI_Model{

        public function __construct()
        {
			parent::__construct();
            $this->load->database();
        }
      
		function randomImageName($length = 4) {
			$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[random_int(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		function randomPassword($length = 6) {
			$characters = '0123456789';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[random_int(0, $charactersLength - 1)];
			}
			return $randomString;
		}
        function otp($length = 4) {
			$characters = '0123456789';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[random_int(0, $charactersLength - 1)];
			}
			return $randomString;
		}
        function ImageUpload($imageName,$target_dir)
        {
            $photo="";
                $strDocName = $imageName;
                if (isset($_FILES[$strDocName]['name']) && $_FILES[$strDocName]['name'] != '') 
                {
                    $_FILES['file']['name']     = $_FILES[$strDocName]['name']; 
                    $_FILES['file']['type']     = $_FILES[$strDocName]['type']; 
                    $_FILES['file']['tmp_name'] = $_FILES[$strDocName]['tmp_name']; 
                    $_FILES['file']['error']     = $_FILES[$strDocName]['error']; 
                    $_FILES['file']['size']     = $_FILES[$strDocName]['size']; 
                    
                    $photo='';
                    $new_doc_name = "";
                    $new_doc_name = date('Ymd').$this->randomImageName();
                    
                    $config = array(
                            'upload_path' => $target_dir,
                            'allowed_types' => "jpg|png|jpeg|pdf",
                            'max_size' => "0", 
                            'file_name' =>$new_doc_name
                            );
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config); 
                    if($this->upload->do_upload($strDocName))
                    { 
                        $docDetailArray = $this->upload->data();
                        //echo "<pre>"; print_r($docDetailArray);	
                        $photo =  $docDetailArray['file_name'];
                    }
                    else
                    {
                        echo $this->upload->display_errors();
                    }
                    if($_FILES[$strDocName]['error']==0)
                    { 
                        $photo=$photo;
                    }
                }
            return $photo;
        }
		
		public function insert_data($tablename,$data)
		{
			if($this->db->insert(TBPREFIX.$tablename,$data))
			{
				return $this->db->insert_id();
			}
			else
				return false;
		}
		
		public function update_data($tablename,$where,$id,$data = array()) 
		{
		  	if($id > 0) 
			{
		    	$this->db->where($where,$id);
			  	$this->db->update(TBPREFIX.$tablename,$data); 
		  	}
		} 

        public function delete_data($tablename,$where,$id) 
		{
		  	if($id > 0) 
			{
		    	$this->db->where($where,$id);
			  	$this->db->delete(TBPREFIX.$tablename); 
		  	}
		} 

		
		
    }
?>