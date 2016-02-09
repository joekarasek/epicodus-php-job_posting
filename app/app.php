<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/JobOpening.php";
    require_once __DIR__."/../src/Contact.php";

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('form.html.twig');
    });

    $app->get("/result", function() {
        // $title = $_GET['title'];
        // $description = $_GET['description'];
        // $name = $_GET['name'];
        // $phone = $_GET['phone'];
        // $email = $_GET['email'];
        // refactored

        $contact = new Contact($_GET['name'], $_GET['phone'], $_GET['email']);
        $job = new JobOpening($_GET['title'], $_GET['description'], $contact);

        return "<!DOCTYPE html>
                <html>
                <head>
                    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
                    <title>Find a Car</title>
                </head>
                <body>
                    <div class='container'>
                        <h1>Job Board!</h1>

                        <div class='container'>
                          <h2 class='job_title'>".$job->getTitle()."</h2>
                          <p class='job_description'>".$job->getDescription()."</p>
                          <p class='job_contact'>".$job->getContactInfo()->getName()."</p>
                          <p class='job_contact'>".$job->getContactInfo()->getPhone()."</p>
                          <p class='job_contact'>".$job->getContactInfo()->getEmail()."</p>
                        </div>

                    </div>
                </body>
                </html>";
    });

    return $app;
?>
