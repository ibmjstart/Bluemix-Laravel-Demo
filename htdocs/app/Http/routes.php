<?php
Route::get('/','FrontEndController@mainview');
Route::get('/profile', function () {
    return view('profile');
});

Route::get('/board', function () {
    return view('board');
});

Route::get('/modal', function () {
    return view('modal');
});

Route::get('/explorer', ['as'=>'explorer','uses'=>'FrontEndController@mainview']);
Route::get('/home', ['as'=>'home','uses'=>'FrontEndController@homeview','middleware'=>'auth']);
Route::get('/an-gi-bay-gio', 'FrontEndController@searchfoodview');
Route::group(['prefix'=>'search'],function()
{
	Route::get('user','SearchController@searchUser');
	Route::get('board','SearchController@searchBoard');
	Route::get('post','SearchController@searchPost');
    Route::get('create','SearchController@createIndexMapping');

});
Route::get('/{user_name}','UserController@getUser');
//Route::get('/{user_name}/{board_name}','UserController@getUserBoards');

Route::get('post/{post_id}','PostController@getPostById');
Route::get('board/{board_id','BoardController@getBoard');
Route::group(['prefix'=>'api'],function()
{
	Route::resource('board','BoardController');
	Route::resource('post','PostController');
	Route::resource('photo','StorageController');
	Route::resource('user','UserController');
	Route::post('user/follow','UserController@follow');
	Route::get('user/{user_id}/boards','UserController@getBoards');
	Route::get('user/{user_id}/posts','UserController@getPosts');
	Route::get('user/{user_id}/following','UserController@getFollowing');
	Route::get('user/{user_id}/follower','UserController@getFollower');
    Route::get('user/{user_id}/profile','UserController@getProfile');
	Route::get('user/{user_id}/timeline','UserController@getPostsByFollowingUserId');
    Route::get('post/{post_id}/like','LikeController@likePost');
    Route::post('post/{post_id}/comment',['uses'=>'CommentController@commentPost','middleware'=>'auth']);
    Route::get('post/{post_id}/recommend','RecommendController@getPost');
});
Route::post('facebook/login', 'FrontEndController@login');
Route::post('/upload-img', 'FrontEndController@uploadimg');
Route::post('/upload-post', 'FrontEndController@uploadpost');
Route::post('/load-more', 'FrontEndController@loadmore');
Route::post('/detail-image', 'FrontEndController@detailimage');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('login', function (){
    return view('login.login');
});
Route::get('register', function (){
    return view('login.register');
});
Route::get('callback','LoginController@callback');
Route::post('register',['as'=>'sendRegister', 'uses'=>'LoginController@register']);
Route::post('login',['as'=>'postLogin', 'uses'=>'UserController@login']);
// Route::post('postLogin','LoginController@login');
Route::get('user/logout','UserController@logout');
Route::post('login-fb','LoginController@registerfb');
Route::get('search/insert','SearchController@insert');
