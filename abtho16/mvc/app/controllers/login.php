
<?php
class Login extends Controller {

    public function index() {
        
        $this->view('login/index');
    }
    
	function run()
	{
		$this->model->run();
		
	}
	
	
	/* logging out the user 
	function logout()
	{
		
		header('location: index');
		exit;
	}
*/
}

