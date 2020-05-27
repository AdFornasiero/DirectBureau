<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customers_model extends CI_Model
{

    // ------------------------ //
    //      LogIn section       //
    // ------------------------ //

    // connection function that allows connection.
    public function logIn($mail, $password)
    {
        $this->db->where('email', $mail);
        $this->db->where('password', $password);
        $stmt = $this->db->get('customers');
        if ($stmt->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Function for retrieving user information using email.
    public function getLogIn($mail)
    {
        $this->db->where('email', $mail);
        return $this->db->get('customers')->row();
    }

    // Function for retrieving user information thanks to this key.
    public function getKey($key)
    {
        $this->db->where('user_key', $key);
        return $this->db->get('customers')->row();
    }

    // ------------------------ //
    //   Registration section   //
    // ------------------------ //

    // function that allows user registration.
    public function signUp($customers, $mail)
    {
        $this->db->where('email', $mail);
        $check = $this->db->get('customers')->result()[0];
        if ($check < 1) {
            return $this->db->insert('customers', $customers);
        }
    }

    // function that activates the account.
    public function activateAccount($customers, $key)
    {
        $this->db->where('user_active', $key);
        if ($this->db->update('customers', $customers)) {
            return true;
        } else {
            return false;
        }
    }

    public function sendMail($mail, $key)
    {
        $msg =
            '<html>
    <head>
        <title>Verification d\'inscription</title>
    </head>
    <body>
        <h2>Merci de vous être inscrit.</h2>
        <p>Votre compte :</p>
        <p>Email :' . $mail . '</p>
        <p>Merci de cliquer sur le lien.</p>
        <a href="http://localhost/DirectBureau/index.php/Customers/activateUser/' . $key . '"> Activer votre compte</a>
    </body>
    </html>';

        $this->email->from('confirmatio@directBureau.com');
        $this->email->to($mail);
        $this->email->set_mailtype('html');
        $this->email->subject('Confirmation d\'inscription');
        $this->email->message($msg);
        $this->email->send();
    }


    // ------------------------ //
    //  User management section //
    // ------------------------ //

    public function countAllCustomers(){
        return $this->db->count_all('customers');
    }

    // functio which allow the list customers.
    public function listCustomers()
    {
        return $this->db->get('customers')->result();
    }

    public function selectOneCustomers($customersId)
    {
        $this->db->where('id', $customersId);
        return $this->db->get('customers');
    }

    // function which allows the deletion of a user.
    public function removeCustomers($customersId)
    {
        $this->db->where('id', $customersId);
        $this->db->delete('customers');
    }

    // function which allows the modify of a user.
    public function modifyCoordinates($customers, $mail)
    {
        $this->db->where('email', $mail);
        if ($this->db->update('customers', $customers)) {
            return true;
        } else {
            return false;
        }
    }

    public function modifyPassword($data, $key)
    {
        $this->db->where('user_key', $key);
        if ($this->db->update('customers', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function sendMailPassword($mail, $key)
    {
        $msg =
            '<html>
                <head>
                    <title>Changement de mot de passe</title>
                </head>
                <body>
                    <h2>Changement de mot de passe</h2>
                    <p>Votre compte :</p>
                    <p>Email :' . $mail . '</p>
                    <p>Merci de cliquer sur le lien.</p>
                    <a href="http://localhost/DirectBureau/index.php/Customers/changePassword/' . $key . '"> Modifier mon mot de passe</a>
                </body>
                </html>';

        $this->email->from('confirmatio@directBureau.com');
        $this->email->to($mail);
        $this->email->set_mailtype('html');
        $this->email->subject('Modification de mot de passe');
        $this->email->message($msg);
        $this->email->send();
    }

    public function sendMailConfirmPasswordReset($mail)
    {
        $msg =
            '<html>
                <head>
                    <title>Confirmation changement de mot de passe</title>
                </head>
                <body>
                    <h2>Votre mot de passe à été changer avec succès !</h2>
                    <p>Votre compte :</p>
                    <p>Email :' . $mail . '</p>
                    <p>Merci de cliquer sur le lien.</p>
                    <a href="http://localhost/DirectBureau/index.php/Customers/logIn">Ce connecter</a>
                </body>
                </html>';

        $this->email->from('confirmatio@directBureau.com');
        $this->email->to($mail);
        $this->email->set_mailtype('html');
        $this->email->subject('Confirmation réinitialisation du mot de passe');
        $this->email->message($msg);
        $this->email->send();
    }



    // TODO
}
