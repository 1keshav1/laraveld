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
