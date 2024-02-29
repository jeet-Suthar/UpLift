<?php

use App\Controllers\DemoController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('demo', [DemoController::class, 'index']);
// $routes->get('login', 'DemoController::login');

$routes->get('/', 'Home::index');
$routes->post('dashboard', 'DemoController::dashboard');

//for new user
// $routes->post('new', 'DemoController::new');

//for login
$routes->match(['get', 'post'], 'login', 'UpliftController::login');
$routes->match(['get', 'post'], 'signup', 'UpliftController::signup');

//for logout

$routes->get('logout', 'UpliftController::logout');



//for home page
$routes->get('uplift', 'UpliftController::uplift');
$routes->post('uplift', 'UpliftController::uplift');

//for posts
$routes->get('post_form', 'UpliftController::post_form');
$routes->post('submitPost', 'UpliftController::submitPost');

$routes->get('post', 'UpliftController::post');

//for post using ajax
$routes->get('get_post/(:any)', 'PostController::get_post/$1');
$routes->get('totalPost', 'PostController::totalPost');

//story controller
$routes->post('add_stories', 'storiesController::add_stories');
$routes->get('story_form', 'storiesController::story_form');
$routes->get('storyDialogBox', 'storiesController::storyDialogBox');
$routes->get('latestStories', 'storiesController::latestStories');
$routes->get('latestStoriesArray', 'storiesController::latestStoriesArray');
$routes->get('getStoriesOfUser/(:num)', 'storiesController::getStoriesOfUser/$1');




// for admin only
$routes->get('admin', 'AdminController::index');
$routes->get('admin/users', 'AdminController::users');
