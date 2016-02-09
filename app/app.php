<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/JobOpening.php";
    require_once __DIR__."/../src/Contact.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        return "<!DOCTYPE html>
                <html>
                <head>
                    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
                    <title>Post a Job</title>
                </head>
                <body>
                    <div class='container'>
                        <h1>Post a Job</h1>
                        <form action='/result'>
                            <div class='form-group'>
                                <label for='title'>Enter the job title:</label>
                                <input id='title' name='title' class='form-control' type='text'>
                            </div>
                            <div class='form-group'>
                                <label for='description'>Enter the job description:</label>
                                <input id='description' name='description' class='form-control' type='text'>
                            </div>
                            <div class='form-group'>
                                <label for='name'>Enter your name:</label>
                                <input id='name' name='name' class='form-control' type='text'>
                            </div>
                            <div class='form-group'>
                                <label for='phone'>Enter your phone number:</label>
                                <input id='phone' name='phone' class='form-control' type='number'>
                            </div>
                            <div class='form-group'>
                                <label for='email'>Enter your email:</label>
                                <input id='email' name='email' class='form-control' type='text'>
                            </div>
                            <button type='submit' class='btn-success'>Submit</button>
                        </form>
                    </div>
                </body>
                </html>";
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
