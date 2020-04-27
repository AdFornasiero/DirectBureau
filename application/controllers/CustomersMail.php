<?php

class CustomersMail extends CI_Controller{

    public function sendMail(){
        // Have the form checked.
        $this->form_validation->set_rules('firstname','Prénom',
                                    array('required', 'regex_match[/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ-]+$/]'),
                                    array('required' => 'Entrer un prénom', 'regex_match' => 'Votre prénom comporte des erreurs'));
        $this->form_validation->set_rules('lastname','Nom',
                                    array('required', 'regex_match[/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ-]+$/]'),
                                    array('required' => 'Entrer un nom', 'regex_match' => 'Votre nom comporte des erreurs'));
        $this->form_validation->set_rules('phone','Téléphone',
                                    array('regex_match[/^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/]'),
                                    array('required' => 'Entrer un numéro de téléphone', 'regex_match' => 'Votre numéro de téléphone comporte des erreurs'));
        $this->form_validation->set_rules('mail','Adresse mail',
                                    array('required', 'regex_match[/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/]'),
                                    array('required' => 'Entrer un nom', 'regex_match' => 'Votre mail comporte erreurs'));
        $this->form_validation->set_rules('message','Message',
                                    array('required', 'regex_match[/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._,;:!()\s-]+$/]'),
                                    array('required' => 'Entrer un message', 'regex_match' => 'Votre prénom comporte erreurs'));

        // If the form is false have displayed the form otherwise have done the necessary processing. 
        if($this->form_validation->run() == FALSE){
            $this->load->view('contact');
        } else {

            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $phone = $this->input->post('phone');
            $subject = $this->input->post('subject');
            $mail = $this->input->post('mail');
            $message = $this->input->post('message');

            $customers['firstname'] = $firstname;
            $customers['lastname'] = $lastname;
            $customers['phone'] = $phone;
            $customers['subject'] = $subject;
            $customers['mail'] = $mail;
            $customers['message'] = $message;

            //  If the addition in the db to be carried out have sent a summary email, if not warn the user that his email could not be sent.
           if($this->ContactModel->addMail($customers)){

                $msg = "
                <html>
                    <head>
                        <title>Confirmation prise de contact</title>
                        <h1>Direct Cartouche</h1>       
                    </head>
                    <body>
                        <h2>Merci de nous avoir envoyer un mail, nous nous éfforceront de vous y répondre le plus rapidement possible.</h2>
                        <h3>Voici un petit rappel de votre message :</h3>
                            <span>Nom : ' . $firstname . '</span>
                            <span>Prénom : ' . $lastname. '</span>
                            <span>Téléphone : ' . $phone . '</span>
                            <span>Adresse mail : ' . $mail . '</span>
                            <span>Sujet : ' . $subject . '</span>
                            <span>Message : ' . $message . '</span>
                            <p>Direct Cartouche vous remerci de linteret porté pour nous.</p>
                    </body>
                </html>";

                $this->email->from('confirmatio@directBureau.com');
                $this->email->to($mail);
                $this->email->set_mailtype('html');
                $this->email->subject('Réception message de contact');
                $this->email->message($msg);
                $this->email->send();

                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Votre mail à bien été envoyer, un mail récapitulatif viens de vous être envoyer.</div>');
                redirect('CustomersMail/sendMail');
            } else {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Une erreur est survenu, merci de réesayer.</div>');
                redirect('CustomersMail/sendMail');
            }
        }    
    }
    
    //  TODO
}