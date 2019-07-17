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
use App\Post;
Route::get('/', function () {
    return view('welcome');
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
    $post = Post::create(['title'=>'Create Title by create method 12', 'body'=>'Create Body by posts create mathed', 'is_admin'=>'1']);
    return $post;
});

Route::get('/update-where', function(){
    $post = Post::where('id', 4)->where('is_admin', 0)->update(['title'=> 'Instructor Laravel 4', 'body'=>'Laravel Instructure is very good 4']);
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

    Post::find(13)->delete();
});

//Get Soft Deleted

Route::get('/readsoftdelete', function(){
    //$post = Post::find(13);
    $post = Post::withTrashed()->where('id',7)->get();
    return $post;
});
