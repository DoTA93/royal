<?php

use Mailgun\Mailgun;

$app->get('/', function ($request, $response) {
  return $this->view->render($response, 'home.twig');
})->setName('home');

$app->get('/about', function ($request, $response) {
  return $this->view->render($response, 'about.twig');
})->setName('about');

$app->get('/contact', function ($request, $response) {
  return $this->view->render($response, 'contact.twig');
})->setName('contact');

$app->get('/plywoood-and-lamination', function ($request, $response) {
  return $this->view->render($response, 'sectors/plywood.and.lamination.twig');
})->setName('plywoood.and.lamination');

$app->get('/construction', function ($request, $response) {
  return $this->view->render($response, 'sectors/construction.twig');
})->setName('construction');

$app->get('/real-estate', function ($request, $response) {
  return $this->view->render($response, 'sectors/real.estate.twig');
})->setName('real.estate');

$app->get('/dairy-farming', function ($request, $response) {
  return $this->view->render($response, 'sectors/dairy.farming.twig');
})->setName('dairy.farming');

$app->get('/car-rentals', function ($request, $response) {
  return $this->view->render($response, 'sectors/car.rentals.twig');
})->setName('car.rentals');

$app->get('/land-development', function ($request, $response) {
  return $this->view->render($response, 'sectors/land.development.twig');
})->setName('land.development');

$app->get('/textiles', function ($request, $response) {
  return $this->view->render($response, 'sectors/textiles.twig');
})->setName('textiles');

$app->get('/fmcg', function ($request, $response) {
  return $this->view->render($response, 'sectors/fmcg.twig');
})->setName('fmcg');

$app->get('/interior-design', function ($request, $response) {
  return $this->view->render($response, 'sectors/interior.design.twig');
})->setName('interior.design');

$app->get('/career', function ($request, $response) {
  return $this->view->render($response, 'career.twig');
})->setName('career');

$app->get('/gallery', function ($request, $response) {
  return $this->view->render($response, 'gallery.twig');
})->setName('gallery');


$app->post('/send', function ($request, $response, $args) {
    $name = $request->getParam('name');
    $email = $request->getParam('email');
    $phone = $request->getParam('phone');
    $message = $request->getParam('message');

    $data = array(
      'name' => $name,
      'email' => $email,
      'phone' => $phone,
      'message' => $message
    );
    $mg = Mailgun::create('key-9793adf968a4fb57cc6f619b58b98d4c');

    # Now, compose and send your message.
    # $mg->messages()->send($domain, $params);
    $mg->messages()->send('idevia.in', [
      'from'    => "Royalty Iquinox <no-reply@royaltyiquinox.com>",
      // 'to'      => 'mortuzalam@gmail.com',
      'to'      => 'info@royaltyiquinox.com',
      'subject' => 'Website Contact Form',
      'text'    => "Hello, My name is " . $name . " . Contact ph: " . $phone . " & email: " . $email . "I want to say: " . $message
    ]);

    // $arr = array('send' => 'true');
    return $response->withJson($data);
})->setName('send');

$app->post('/subscribe', function ($request, $response, $args) {
  $email = $request->getParam('email');

  $mg = Mailgun::create('key-9793adf968a4fb57cc6f619b58b98d4c');

    # Now, compose and send your message.
    # $mg->messages()->send($domain, $params);
    $mg->messages()->send('idevia.in', [
      'from'    => "FCI Mailer <no-reply@flipcoininvestment.com>",
      // 'to'      => 'mortuzalam@gmail.com',
      'to'      => 'flipcoininvestments@gmail.com',
      'subject' => 'FCI Newsletter subscription',
      'text'    => "Hi FCI, Want to subscribe your news letters. My email address is " . $email
    ]);

  return $response->write($email);
});