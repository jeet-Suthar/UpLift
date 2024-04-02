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

//TODO----------------------POST SECTION------------------
// post using ajax dynamically loaded on main feed (pagination)
$routes->get('get_post/(:any)', 'PostController::get_post/$1');
$routes->get('totalPost', 'PostController::totalPost');
// for user Profile 
$routes->get('get_post_of_user_id/(:num)', 'PostController::get_post_of_user_id/$1');


//story controller
$routes->post('add_stories', 'storiesController::add_stories');
$routes->get('story_form', 'storiesController::story_form');
$routes->get('storyDialogBox', 'storiesController::storyDialogBox');
$routes->get('latestStories', 'storiesController::latestStories');
$routes->get('latestStoriesArray', 'storiesController::latestStoriesArray');
$routes->get('getStoriesOfUser/(:num)', 'storiesController::getStoriesOfUser/$1');


// habits section
$routes->get('habit', 'HabitController::habit');



//User Profile Section
$routes->get('user_profile', 'UserProfileController::index');
$routes->get('user_profile/(:num)', 'UserProfileController::user_profile/$1');


// friends section as follower following section
$routes->get('find_friends/(:num)', 'FriendsController::find_friends/$1');
$routes->get('find_friend_request_of/(:num)', 'FriendsController::find_friend_request_of/$1');
$routes->get('find_request_not_accepted_of/(:num)', 'FriendsController::find_request_not_accepted_of/$1');
$routes->get('find_followers_of_User/(:num)', 'FriendsController::find_followers_of_User/$1');
$routes->get('find_followings_of_User/(:num)', 'FriendsController::find_followings_of_User/$1');




// for admin only
$routes->get('admin', 'AdminController::index');
$routes->get('admin/users', 'AdminController::users');
