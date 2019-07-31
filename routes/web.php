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
//For Post Model Namespace
use App\Post;
//For User Model Namespace
use App\User;
Use App\Role;
Use App\Country;
Route::get('/', function () {
    //return view('welcome');
    return view('landing');
});

Route::get('/post', 'PostsController@index');
Route::get('/post_view/{id}', 'PostsController@post_view');
Route::get('/contact-us', 'PostsController@contact_us');

Route::resource('posts', 'PostsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Insert
Route::get('/insert ', function(){
    //echo 'keshav';
    DB::insert('insert into posts(title, body) values(?, ?)', ['PHP wth Laravel', 'Laravel isthe best fremwork Keshav']);
} );

/*--------------------------------------------------------------------------
/ Web Routes get
/--------------------------------------------------------------------------
*/
Route::get('/read', function(){
    $results = DB:: select('select * from posts where id = ?', [5]);
    return var_dump($results);
    // return $results;
/*     foreach($results as $result){
        return $result->title;
    } */
});

Route::get('/update', function(){
    $updated = DB::update('update posts set title = "Update Keshav & Abhay" where id=?', [5]);
    return $updated;
});

Route::get('/delete', function(){
    $deleted = DB::delete('delete from posts where id=?', [1]);
    return $deleted;
});

//By model Elequent ORM

Route::get('/readall', function(){
/*     $posts = Post::all();
    $title = [];
    foreach($posts as $post){
        echo $title = $post->title."<br/>";
    } */
    //return $title;

    $posts = Post::find(4);
    return $posts->title;
    //var_dump($posts);
});

Route::get('/findwhere', function(){
    $posts = Post::where('is_admin', 1)->orderBy('id', 'asc')->take(2)->get();
    return $posts;
});

Route::get('/findmore', function(){
    $posts = Post::findOrFail(5);
    return $posts;
});

Route::get('/basicinsert', function(){
    $post = new Post;
    $post->title = 'ORM Title Insert';
    $post->body = 'ORM Body Insert Detail';

    $post->save();
});

Route::get('/basicupdate', function(){
    $post = Post::find(2);
    $post->title = 'Update by ORM Title id2';
    $post->body = 'Update body by ORM query';
    $post->save();
});

Route::get('/create', function(){
    $post = Post::create(['user_id'=>'1','title'=>'Create Title by create method 3', 'body'=>'Create Body by posts create mathed new 3', 'is_admin'=>'1']);
    return $post;
});

Route::get('/update-where', function(){
    $post = Post::where('id', 4)->where('is_admin', 0)->update(['user_id'=>'1', 'title'=> 'Instructor Laravel 4', 'body'=>'Laravel Instructure is very good 4']);
});

//Delete
Route::get('/find-delete', function(){
    $post = Post::find(11);
    $deleted = $post->delete();
    var_dump($deleted);
});

//Delete Multiple
Route::get('/delete-multiple', function(){
    Post::destroy([9,10]);
    //Post::where('is_admin', 1)->delete();
});

//Soft Delete
Route::get('/softdelete', function(){

    Post::find(8)->delete();
});

//Get all with Soft Deleted

Route::get('/readall', function(){
    //$post = Post::find(13);
    //$post = Post::withTrashed()->where('is_admin',0)->get();
    $post = Post::withTrashed()->get();
    return $post;
});

//Get not deleted data use post model
Route::get('/getnotdeleted', function(){
    $post = Post::where('is_admin', 0)->get();
    return $post;
});

Route::get('/onlydeleted', function(){
    //$post = Post::onlyTrashed()->where('is_admin',0)->get();
    $post = Post::onlyTrashed()->get();
    return $post;
});

//Restore from delete #restoredeleted
Route::get('/restoredeleted', function(){
    Post::withTrashed()->where('id', 8)->where('is_admin', 0)->restore();
});

//Delete permanently from table
Route::get('/forcedelete', function(){
    Post::withTrashed()->where('id', 8)->where('is_admin', 0)->forceDelete();
});

/***
 * Elequent Relationship for Post Model hasOne
 ***/
#one to one relationship
Route::get('/user/{id}/post', function($id){
    return User::find($id)->post->title;
});

#User blongs to post
Route::get('/post/{id}/user', function($id){
    return Post::find($id)->user;
});

#one to many relationship
Route::get('/postsmany/{id}', function($id=null){
    // $posts = User::find($id)->posts;
    // return $posts;
    $user = User::find($id);
    foreach($user->posts as $post){
        echo $post->title."<br/>";
    }
});

//Many to Many Relationship
Route::get('/user/{id}/role', function($id){
    //$roles = User::find($id)->roles;
    //echo"<pre>";print_r($roles); echo"</pre>";exit;
    $roles = User::find($id)->roles()->orderBy('id', 'desc')->get();
    foreach($roles as $role){
        echo $role->name."<br/>";
    }
    //return var_dump($roles);
});

//Accessing the intermediate table or pivot table
Route::get('user/pivot/{id}', function($id){
    $user = User::find($id);
    return $user->roles;
/*     foreach($user->roles as $role){
        return $role->pivot;
    } */
});

//By Has Many Through Relation
Route::get('user/country/{id}', function($id){
    $country = Country::find($id);
    foreach($country->posts as $post){
        echo $post->title;
    }
});
