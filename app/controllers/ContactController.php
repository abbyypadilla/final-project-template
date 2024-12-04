<?php
namespace app\controllers;

use app\models\ContactModel;

class ContactController {
    
    private $contactModel;
    
    public function __construct() {
        $this->contactModel = new ContactModel();
    }
    
    public function submitContactForm() {
        if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $message = trim($_POST['message']);

            if (empty($name) || empty($email) || empty($message)) {
                echo "All fields are required!";
                return;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email format!";
                return;
            }

            $contactModel = new ContactModel();
            $isSaved = $contactModel->saveMessage($name, $email, $message);

            if ($isSaved) {
                echo "Thank you! Your message has been sent.";
            } else {
                echo "Something went wrong. Please try again later.";
            }
        } else {
            echo "Invalid form submission.";
        }
    }

    public function handleContactForm() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            
            $result = $this->contactModel->saveMessage($name, $email, $message);
            
            if ($result) {
                header("Location: /thank-you");
            } else {
                echo "There was an error saving your message.";
            }
        }
    }
}
