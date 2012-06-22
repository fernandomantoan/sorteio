<?php

require_once 'Slim/Slim.php';

$app = new Slim(array(
    'view' => new Slim_View(),
    'templates.path' => __DIR__ . DIRECTORY_SEPARATOR . 'views'
));

$app->get('/', function() use($app) {
    $app->render('view.php');
});

$app->post('/prize', function() use($app) {
    $employees = explode("\n", $app->request()->post('employees'));
    $sorted = explode(",", $app->request()->post('sorted'));

    $employees = array_values(array_diff($employees, $sorted));

    if (sizeof($employees) <= 0) return;
    $totalEmployees = sizeof($employees);
    $indexRandomized = rand(0, $totalEmployees - 1);

    sleep(3);

    $employee = new stdClass();
    $employee->name = $employees[$indexRandomized];

    echo json_encode($employee);
});

$app->run();