<?php

$routes->get('/', 'DashboardController::index');
$routes->match(['get', 'post'],'/polls', 'PollController::index');
