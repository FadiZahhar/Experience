<?php

/* 
 * Written by Fadi Nicolas Zahhar
 * Ajax calls for wordpress theme
 * Eastlinemarketing 2014
 */
//print_r($_POST);
//session_start();

if(isset($_POST['code']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
//if(!defined('WP_PLUGIN_URL')) {
    require_once(realpath('../../../') . '/wp-config.php');
    //require_once('includes/IMKAN.php');
//}
global $theme_options;
//global $wpdb;
global $session;
//print_r($_POST);
//print_r($session);

$firstname = sanitize_text_field($_POST['firstname']);
$lastname = sanitize_text_field($_POST['lastname']);
$email = sanitize_text_field($_POST['email']);
$subject = sanitize_text_field($_POST['subject']);
$yourmsg = "Applicant Name:" . $firstname . "&nbsp;" . $lastname . "<br/>" .  "Applicant Email:" . $email. "<br/>" . "Subject:" . $subject . "<br/>" . "Message:" . sanitize_text_field($_POST['message']);

$headers[] = "Content-type: text/html";
$headers[] = 'From:' . $firstname . " " . $lastname . ' <'.$email.'>';

//$headers[] = 'Cc: iluvwp@wordpress.org'; // note you can just use a simple email address

$subject = "Imkan - New Contact from ". $firstname . " " . $lastname;
//$wpdb->insert( 'wp_tdhc_form', array( 'fullname' => $fullname, 'phonenumber' => $phonenumber, 'email' => $email . ":" . $fullname, 'message' => $yourmsg,'appointment'=>$checkbox) );
wp_mail( "info@imkangroup.com;info@fnz.me", $subject, $yourmsg, $headers );
//print_r($_POST);
$arr = array ('message'=>'Thank you for submitting your request, we will get back to you in 48 hours');
echo json_encode($arr);
}
else {
    $arr = array ('message'=>'You can not access this code , it is secure');
	echo json_encode($arr);
}
/*EOF*/


