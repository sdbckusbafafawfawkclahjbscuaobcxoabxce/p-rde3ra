<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//public
Route::get('/', 'Gilasweb_HomeController@index')->name('home');
Route::get('/home', 'Gilasweb_HomeController@index')->name('home');

//before login
Auth::routes();
Route::post( '/phone/checkphone', [ 'as' => 'form', 'uses' => 'Auth\PhoneController@checkphonelogin']);
Route::get( '/phone/checkphone','Auth\PhoneController@checkphonelogin');
Route::post( '/phone/checkcode', [ 'as' => 'form', 'uses' => 'Auth\PhoneController@checkcodelogin'] );
Route::get( '/phone/checkcode','Auth\PhoneController@checkcodelogin');

//after login
Route::get( '/levelcheck', 'Gilasweb_LevelcheckController@index' )->middleware( 'levelcheck' );

//blog
Route::post( '/contents/search','Gilasweb_ContentController@search_all')->name('show_search_all');
Route::get( '/contents','Gilasweb_ContentController@archive_all')->name('show_archive_all');
Route::get( '/contents/pst/{post_type_id}','Gilasweb_ContentController@archive_all')->name('show_archive_all_wi');
Route::get( '/contents/{content}','Gilasweb_ContentController@single_sll')->name('show_single_sll');

//user
Route::get( '/user','User\Gilasweb_UserController@index');
Route::get( '/user/','User\Gilasweb_UserController@index');
Route::get( '/user/information','User\Gilasweb_UserController@show_information')->name('show_user_information');
Route::post( '/user/information','User\Gilasweb_UserController@action_information')->name('action_user_information');
Route::get( '/user/changepassword','User\Gilasweb_UserController@show_changepassword')->name('show_user_changepassword');
Route::post( '/user/changepassword','User\Gilasweb_UserController@action_changepassword')->name('action_user_changepassword');

//admin
Route::get( '/admin','Admin\Gilasweb_AdminController@index');
Route::get( '/admin/','Admin\Gilasweb_AdminController@index');

Route::get( '/admin/users','Admin\Gilasweb_AdminController@show_users')->name('show_admin_users');

Route::get( '/admin/generalinfo','Admin\Gilasweb_AdminController@show_generalinfo')->name('show_admin_generalinfo');
Route::post( '/admin/generalinfo','Admin\Gilasweb_AdminController@action_generalinfo')->name('action_admin_generalinfo');

Route::get( '/admin/catgories/{post_type_id}','Admin\Gilasweb_AdminController@show_catgory')->name('show_admin_catgories');
Route::post( '/admin/catgories/{post_type_id}','Admin\Gilasweb_AdminController@action_catgory')->name('action_admin_catgories');
Route::get( '/admin/catgories/{post_type_id}/{cat_id}','Admin\Gilasweb_AdminController@show_catgory')->name('show_admin_catgories_edit');

Route::get( '/admin/banners','Admin\Gilasweb_AdminController@show_banners')->name('show_admin_banners');
Route::post( '/admin/banners','Admin\Gilasweb_AdminController@action_banners')->name('action_admin_banners');
Route::get( '/admin/banners/{banner_id}','Admin\Gilasweb_AdminController@show_banners')->name('show_admin_banners_edit');

Route::get( '/admin/contents_list/{post_type_id}','Admin\Gilasweb_AdminController@show_contents_list')->name('show_admin_contents_list');
Route::get( '/admin/files_list','Admin\Gilasweb_AdminController@show_files_list')->name('show_admin_files_list');
Route::post( '/admin/files_upload','Admin\Gilasweb_AdminController@action_files_upload')->name('action_admin_files_upload');

Route::any( '/admin/uploads/contents/img', 'Admin\Gilasweb_AdminController@content_img_upload' )->name( 'contents/img/upload' );

Route::get( '/admin/contents/{post_type_id}','Admin\Gilasweb_AdminController@show_content')->name('show_admin_contents');
Route::post( '/admin/contents/{post_type_id}','Admin\Gilasweb_AdminController@action_content')->name('action_admin_contents');
Route::get( '/admin/contents/{post_type_id}/{post_id}','Admin\Gilasweb_AdminController@show_content')->name('show_admin_contents_edit');

Route::get( '/public_actions/{model}/{row_id}','Admin\Gilasweb_AdminController@show_public_edits')->name('show_public_edits');
Route::post( '/public_actions/{model}/{row_id}','Admin\Gilasweb_AdminController@action_public_edits')->name('action_public_edits');
Route::get( '/public_actions/{model}/{row_id}/{cname}/{function}','Admin\Gilasweb_AdminController@public_actions')->name('public_actions');