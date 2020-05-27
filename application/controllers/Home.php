<?php
class Home extends CI_Controller
{

public function main(){
    $this->load->view('header');
    $this->load->view('accueil');
}

public function contact(){
    $this->load->view('contact');
}

public function test(){
    $this->load->view('test');
}








}
?>