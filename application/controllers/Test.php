<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('email');
        
    }

    public function index()
    {
        $to = 'shfdell@gmail.com';
        $body = 'Hello';
        $subject = 'recover password';

        $cek = sendMail($to, $body, $subject);
        
    }
}

/* End of file Test.php and path \application\controllers\Test.php */
