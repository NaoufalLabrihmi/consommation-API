<?php
class Home extends Controller{
    public function __construct(){
        if(!isLoggedIn()){
redirect('authentication/login');
        }

    }
    
    public function index(){
        $this->view('dashboard/index');
    }
  
}