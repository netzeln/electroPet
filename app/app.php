<?php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Pet.php';

    session_start();
    if(empty($_SESSION['list_of_pets'])) {
        $_SESSION['list_of_pets'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path'=> __DIR__."/../views"));

    $app->get('/', function() use ($app) {
        return $app['twig']->render('index.html.twig', array('pets'=>Pet::getAll()));
    });

    $app->post('/pet_list', function() use ($app) {
        $pet = new Pet($_POST['nameInput']);
        $pet->savePet();
        return $app['twig']->render('pet_list.html.twig', array('newPet'=>$pet));

    });

    $app->post('/feed', function() use ($app) {
        $testPet = $_SESSION['list_of_pets'][0];
        $testPet->addFood();
        var_dump($testPet);
        return $app['twig']->render('feed.html.twig');
    });

    $app->post('/genocide', function() use ($app){
        Pet::deleteAll();
        return $app['twig']->render('genocide.html.twig');
    });

    return $app;
?>
