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
$routes->get('help_support', 'UpliftController::help_support');
$routes->get('setting', 'UpliftController::setting');
// $routes->get('getUserIdOfOwner', 'UpliftController::getUserIdOfOwner');




$routes->get('uplift', 'UpliftController::uplift');
$routes->post('uplift', 'UpliftController::uplift');
$routes->get('search_users/(:any)', 'UpliftController::search_users/$1');

//for posts
$routes->get('post_form_old', 'UpliftController::post_form_old');
$routes->post('submitPost', 'UpliftController::submitPost');

$routes->get('post', 'UpliftController::post');

//TODO----------------------POST SECTION------------------
// post using ajax dynamically loaded on main feed (pagination)
$routes->get('get_post/(:any)', 'PostController::get_post/$1');
$routes->get('totalPost', 'PostController::totalPost');
// for user Profile 
$routes->get('get_post_of_user_id/(:num)', 'PostController::get_post_of_user_id/$1');
$routes->post('comment_post', 'PostController::comment_post');
$routes->post('liked_post', 'PostController::liked_post');
$routes->post('unliked_post', 'PostController::unliked_post');


//story controller
$routes->post('add_stories', 'storiesController::add_stories');
$routes->get('story_form', 'storiesController::story_form');
$routes->get('storyDialogBox', 'storiesController::storyDialogBox');
$routes->get('latestStories', 'storiesController::latestStories');
$routes->get('latestStoriesArray', 'storiesController::latestStoriesArray');
$routes->get('getStoriesOfUser/(:num)', 'storiesController::getStoriesOfUser/$1');


// habits section
$routes->get('habit', 'HabitController::habit');
$routes->get('verifier_dialog', 'HabitController::verifier_dialog');
$routes->get('get_verifiers_of/(:num)', 'HabitController::get_verifiers_of/$1');
// will get habit form 
$routes->get('validation_form_of_habit/(:num)', 'HabitController::validation_form_of_habit/$1');
// habit sent to verifier
$routes->post('habit_sent', 'HabitController::habit_sent');

// verificatin task
$routes->get('get_verification_task', 'HabitController::get_verification_task');
$routes->get('verification_task_sent_of_user/(:num)', 'HabitController::verification_task_sent_of_user/$1');
// verification task done
$routes->get('verfication_done/(:num)/(:any)/(:any)', 'HabitController::verfication_done/$1/$2/$3');



// following will get those verifier who are friends but not in current verifier list
$routes->get('new_verifier', 'HabitController::new_verifier');
// post method to remove verifiers
$routes->post('remove_verifier', 'HabitController::remove_verifier');
$routes->post('add_verifier', 'HabitController::add_verifier');



//User Profile Section
$routes->get('user_profile', 'UserProfileController::index');
$routes->get('user_profile/(:num)', 'UserProfileController::user_profile/$1');
$routes->get('edit_profile_form', 'UserProfileController::edit_profile_form');
$routes->post('profile_update', 'UserProfileController::profile_update');


// friends section as follower following section
$routes->get('find_friends/(:num)', 'FriendsController::find_friends/$1');
$routes->get('find_friends_of_owner', 'FriendsController::find_friends_of_owner');
$routes->get('find_friend_request', 'FriendsController::find_friend_request');
$routes->get('find_request_not_accepted_of/(:num)', 'FriendsController::find_request_not_accepted_of/$1');
$routes->get('find_followers_of_User/(:num)', 'FriendsController::find_followers_of_User/$1');
$routes->get('find_followings_of_User/(:num)', 'FriendsController::find_followings_of_User/$1');
$routes->get('follow_user/(:num)', 'UserProfileController::follow_user/$1');
$routes->get('unfollow_user/(:num)', 'UserProfileController::unfollow_user/$1');

//forms
$routes->get('post_form', 'PostController::Post_form');



// post submit 
$routes->post('submit_post', 'PostController::submit_post');


// CHAT SECTION
$routes->get('chat', 'ChatsController::chat');
$routes->get('chat_box', 'ChatsController::chat_box');
$routes->get('get_chats_of/(:num)', 'ChatsController::get_chats_of/$1');
$routes->post('send_message', 'ChatsController::send_message');


//!-------------------- AOk section --------------------

$routes->get('aok_page', 'AokController::aok_page');





// for admin only
$routes->get('admin', 'AdminController::index');
$routes->get('admin/users', 'AdminController::users');
