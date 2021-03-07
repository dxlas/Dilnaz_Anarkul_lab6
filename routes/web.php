<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
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


Route::get('/insert', function () {
    DB::insert('insert into posts(Name, Date_Of_Birth, GPA, Advisor)values(?,?,?,?)',["Dilnaz", "27-07-2002", "2.9","Zhangir Rayev"]);
});
 Route::get('/select', function () {
$results=DB::select('select * from posts where id=?',[1]);
foreach ($results as $posts) {
	echo "Name is ".$posts->Name;
	echo "<br>";
	echo "Date of birth: ".$posts->Date_Of_Birth;
	echo "<br>";
	echo "GPA is: ".$posts->GPA;
	echo "<br>";
	echo "Advisor is: ".$posts->Advisor;
}
});
 Route::get('/update', function () {
   $updated=DB::update('update posts set GPA="3.6" where id=?',[1]);
    return $updated;
});
Route::get('/insert', function () {
    DB::insert('insert into posts(Name, Date_Of_Birth, GPA, Advisor)values(?,?,?,?)',["Aruzhan", "02-07-2001", "3.8","Zhangir Rayev"]);
});
 Route::get('/delete', function () {
   $deleted=DB::delete('delete from posts where id=?',[1]);
    return $deleted;
});
 Route::get('/insert2',function(){
    $student = new Student;
    $student->Name = "Aslan";
    $student->Date_Of_Birth = "2001-01-21";
    $student->GPA = "3.5";
    $student->Advisor = "Aigul Bayadil";
    $student->save();    
});
 Route::get('/read',function(){
    $students = Student::all();
    foreach($students as $student){
        echo "id: ".$student->id." name is: ".$student->Name.", GPA: ".$student->GPA."<br>";
    }
});
Route::get('/basicUpdate',function(){
    $student = Student::find(17);
    $student->name = 'Dias';
    $student->save();
    
});
Route::get('/basicDelete',function(){
    $student = Student::find(17);
    $student->delete();
    
});