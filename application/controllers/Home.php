<?php
class Home extends CI_Controller
{

public function index(){
    $this->load->view('header');
    $this->load->view('accueil');
}

public function contact(){
    $this->load->view('contact');
}








}
?>