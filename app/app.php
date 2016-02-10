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

    $app->get("/result", function() use ($app) {
        // $title = $_GET['title'];
        // $description = $_GET['description'];
        // $name = $_GET['name'];
        // $phone = $_GET['phone'];
        // $email = $_GET['email'];
        // refactored

        $contact = new Contact($_GET['name'], $_GET['phone'], $_GET['email']);
        $job = new JobOpening($_GET['title'], $_GET['description'], $contact);

        return $app['twig']->render('result.html.twig', array('job'=>$job));
    });

    return $app;
?>
