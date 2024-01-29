<?php
require_once 'php/include.php';
require_once 'vendor/autoload.php';
require_once 'secrets.php';

// The library needs to be configured with your account's secret key.
// Ensure the key is kept out of any version control system you might be using.
$stripe = new \Stripe\StripeClient('sk_test_51N4siGE2uBhK8kS7vxxI2yP6k4TByk75zM2TV5aGj7fEFKUMLsrwmlVaeyLP4Mdx0Gcw9FFevpoJnkrA5Q5aFlt300muk8ZJIs');

// This is your Stripe CLI webhook secret for testing your endpoint locally.
$endpoint_secret = 'whsec_l5oetpYjzSWfsPwzEvSEtuu0CXG0pmuP';

$payload = @file_get_contents('php://input');
$data = json_decode($payload, true);
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
$event = null;

try {
  $event = \Stripe\Webhook::constructEvent(
    $payload, $sig_header, $endpoint_secret
  );
} catch(\UnexpectedValueException $e) {
  // Invalid payload
  http_response_code(400);
  exit();
} catch(\Stripe\Exception\SignatureVerificationException $e) {
  // Invalid signature
  http_response_code(400);
  exit();
}
$status = $data['data']['object']['status'];
$grade = $data['data']['object']['metadata']['grade'];
$email = $data['data']['object']['customer_details']['email'];
// Handle the event
switch ($event->type) {
  case 'checkout.session.completed':
    $session = $event->data->object;
  default:
  if($status == "complete"){
  $req = $DB->prepare("UPDATE users SET grade = :grade WHERE email = :email");
  $req->execute(array('grade' => $grade, 'email' => $email));   
}
}
http_response_code(200);