<?php

class Customers extends CI_Controller
{

    // ------------------------ //
    //   Registration section   //
    // ------------------------ //

    // This function allows you to sign up the customers account.
    public function signUp()
    {
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('signUp');
        } else {

            // Assigning variables.
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $gender = $this->input->post('gender');
            $company = $this->input->post('company');
            $phone = $this->input->post('phone');
            $fax = $this->input->post('fax');
            $mail = $this->input->post('mail');
            $password = $this->input->post('password');

            // Creation of a random key for the activation of the account.
            $set = "123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $key = substr(str_shuffle($set), 30, 45);

            // After defining the values ​​and sending the model so that it switches to sending in db.
            $customers['firstname'] = $firstname;
            $customers['lastname'] = $lastname;
            $customers['gender'] = $gender;
            $customers['company'] = $company;
            $customers['phone'] = $phone;
            $customers['fax'] = $fax;
            $customers['email'] = $mail;
            $customers['password'] = password_hash($password, PASSWORD_DEFAULT);
            $customers['user_key'] = $key;
            $customers['user_active'] = false;

            // Insert form data into database.
            if ($this->Customers_model->signUp($customers, $mail)) {

                if ($this->Customers_model->sendMail($mail, $key)) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Vous êtes bien inscrit, un mail de comfirmation vous à été envoyer !</div>');
                    redirect('Customers/signUp');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Une erreur est survenu, merci de réessayer plus tard !</div>');
                    redirect('Customers/signUp');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Une erreur est survenu, merci de réessayer plus tard !</div>');
                redirect('Customers/signUp');
            }
        }
    }

    // This function allows you to activate customers account.
    public function activateUser($key)
    {

        $key = $this->uri->segment(3);
        $customers = $this->Customers_model->getKey($key);

        if ($customers->user_key == $key) {
            $customers->user_active = true;

            if ($this->Customers_model->activateAccount($customers, $key)) {
                $this->session->set_flashdata('verify_msg', '<div class="alert alert-success text-center">Votre email à été vérifier avec succès, merci de vous connecter pour continuer !</div>');
                redirect('Customers/signUp');
            } else {
                $this->session->set_flashdata('verify_msg', '<div class="alert alert-success text-center">Une erreur est survenu lors de la vérification de votre adresse.</div>');
                redirect('Customers/signUp');
            }
        }
    }

    // ------------------------ //
    //      LogIn section       //
    // ------------------------ //

    // This function allows you to connect.
    public function logIn()
    {
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('logIn');
        } else {

            // Assignment of variables.
            $mail = $this->input->post('mail');
            $password = $this->input->post('password');

            // Retrieving user information from db.
            $customers = $this->Customers_model->getLogIn($mail);
            // Verification of the correspondence between the two passwords.
            $verifPassword = password_verify($password, $customers->password);

            // Now have test the password and the email address to be able to put the user in db.
            if ($mail == $customers->email & $password == $verifPassword) {

                $ses_data = array(
                    'id' => $customers->id,
                    'firstname' => $customers->firstname,
                    'lastname' => $customers->lastname,
                    'gender' => $customers->gender,
                    'email' => $customers->email,
                    'phone' => $customers->phone,
                    'fax' => $customers->fax,
                );

                $this->session->set_userdata($ses_data);
                $this->session->set_flashdata('verify_msg', '<div class="alert alert-success text-center">Vous êtes connecter !</div>');
                redirect('Customers/logIn');
            } else {
                $this->session->set_flashdata('verify_msg', '<div class="alert alert-success text-center">Compte invalide.</div>');
                redirect('Customers/logIn');
            }
        }
    }

    // This function allows you to log out customers.
    public function logOut()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Déconnecter.</div>');
        redirect('Customers/logIn');
        echo ($_SESSION);
    }

    // ------------------------ //
    //  User management section //
    // ------------------------ //

    // This function allows you to forgot password a,nd
    public function forgotPassword()
    {
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('forgotPassword');
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center"Une erreur est survenu.</div>');
        } else {
            // Assigned variables.
            $mail = $this->input->post('mail');
            $customers = $this->Customers_model->getLogIn($mail);
            // Recover user information.
            if ($this->Customers_model->getLogin($mail)) {
                $key = $customers->user_key;
                // If the mail entered matches the mail in the database, have created a temporary password and deactivated the user.
                if ($mail == $customers->email) {

                    $set = "123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                    $tmpPassword = substr(str_shuffle($set), 20, 30);

                    $customers->user_active = FALSE;
                    $customers->password = $tmpPassword;
                    // Have sent an email so that the user can modify his password.
                    if ($this->Customers_model->modifyCoordinates($customers, $mail)) {
                        $this->Customers_model->sendMailPassword($mail, $key);
                        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Merci de vérifier vos mails.</div>');
                        redirect('Customers/forgotPassword');
                    } else {
                        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Une erreur est survenu merci de réessayer.</div>');
                        redirect('Customers/forgotPassword');
                    }
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Une erreur est survenu merci de réessayer.</div>');
                    redirect('Customers/forgotPassword');
                }
            }
        }
    }

    // Function which allows password change.
    public function changePassword($key)
    {
        $this->form_validation->set_rules('password', 'Mot de passe', 'required');
        // TODO REGEX PASSWORD !!!!
        $this->form_validation->set_rules(
            'passwordConfirm',
            'Comfirmation du mot de passe',
            array('required', 'matches[password]'),
            array('required' => 'Confirmer votre mot de passe !', 'matches' => 'Votre mot de passe n\'est pas identique avec le précédent')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('changePassword');
        } else {
            // Have defined variables
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $data['password'] = $password;
            $data['user_active'] = TRUE;

            // Have sent an email to confirm the password change.
            if ($this->Customers_model->modifyPassword($data, $key)) {

                $customers = $this->Customers_model->getKey($key);
                $mail = $customers->email;

                $this->Customers_model->sendMailConfirmPasswordReset($mail);
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Votre mot de passe à été modifier, vous allez recevoir un mail de confirmation.</div>');
                redirect('Customers/logIn');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Une erreur est survenu merci de réessayer.</div>');
                redirect('Customers/forgotPassword');
            }
        }
    }

    public function deleteCustomers($customersId)
    {
        if ($this->Customers_model->removeCustomers($customersId)) {
            $this->session->set_flashdata('confirm', 'L\'utilisateur à bien été supprimer');
        } else {
            $this->session->set_flashdata('error', 'Une erreur c\'est produite');
        }
        return redirect('Customers/listCustomers');
    }


    // ------------------------ //
    //          Other           //
    // ------------------------ //

    public function homeCustomersSpace()
    {
        $this->load->view('header');
        $this->load->view('home-customers-space');
    }

    public function listCustomers()
    {
        $customers['numberCustomers'] = $this->Customers_model->countAllCustomers();
        $customers['listCustomers'] = $this->Customers_model->listCustomers();
        $this->load->view('header');
        $this->load->view('list_customers', $customers);
    }


    public function clientArea(){
        $this->load->view('header');
        $this->load->view('client_area');
        


    }

    public function help()
    {

        $this->form_validation->set_rules(
            'firstname',
            'Prénom',
            array('required', 'regex_match[/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ-]+$/]'),
            array('required' => 'Entrer un prénom', 'regex_match' => 'Votre prénom comporte erreurs')
        );
        $this->form_validation->set_rules(
            'mail',
            'Adresse mail',
            array('required', 'regex_match[/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/]'),
            array('required' => 'Entrer un nom', 'regex_match' => 'Votre mail comporte erreurs')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('help');
        } else {

            $firstname = $this->input->post('firstname');
            $mail = $this->input->post('mail');
            $subject = $this->input->post('subject');
            $question = $this->input->post('question');

            $contentMail =  "
            <html>
                <head>
                    <title>Demande aide</title>
                    <h1>Direct Cartouche</h1>       
                </head>
                <body>
                    <h2>Merci de nous avoir envoyer un mail, nous nous éfforceront de vous y répondre le plus rapidement possible.</h2>
                    <h3>Voici un petit rappel de votre message :</h3>
                        <span>Nom : ' . $firstname . '</span>
                        <span>Adresse mail : ' . $mail . '</span>
                        <span>Sujet : ' . $subject . '</span>
                        <span>Question : ' . $question . '</span>
                        <p>Direct Cartouche vous remerci de linteret porté pour nous.</p>
                </body>
            </html>";

            $this->email->from('confirmatio@directBureau.com');
            $this->email->to($mail);
            $this->email->set_mailtype('html');
            $this->email->subject('Réception message de contact');
            $this->email->message($contentMail);

            if ($this->email->send() == TRUE) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Votre questions viens de nous être envoyer. Un récapitulatif viens de vous être envoyer.</div>');
                redirect('Customers/help');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Une erreur est survenu merci de réessayer.</div>');
                redirect('Customers/help');
            }
        }
    }


}
