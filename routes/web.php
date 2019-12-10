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




/*
Route::get('/', function()
{
   return view('pages.home');
});
Route::get('/about', function()
{
   return view('pages.contact');
});
*/



Route::get('/home', 'StudentController@index')->name('home');
Route::get('/students/create', 'StudentController@create')->name('students.create');
Route::get('/students/show/{id}', 'StudentController@show')->name('students.show');
Route::post('/students/store', 'StudentController@store')->name('students.store');
Route::delete('/students/delete/{id}','StudentController@destroy')->name('students.destroy'); 
Route::get('/students/edit/{id}','StudentController@edit')->name('students.edit');
Route::post('/students/edit/{id}','StudentController@update')->name('students.update');  
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');



Route::get('fonttest', function(){
	return view('fontawesome');
});

Route::resource('courses', 'CourseController');

Route::get('/proba1', function(){

	$students = App\Program::find(1)->students;
	foreach ($students as $stud) {
    	echo $stud->name. '<br>';
	}

	$student = App\Student::find(1);
	echo $student->program->name;

});

Route::get('/proba2', function(){

	// Egy hallgató kurzusai
	$student = App\Student::find(1);
	$courses = $student->courses;
	foreach ($courses as $course) {
    	echo $course->name. '<br>';
	}

	// Egy kurzus hallgatói
	$course = App\Course::find(1);
	$students = $course->students;
	foreach ($students as $stud) {
    	echo $stud->name. '<br>';
	}
	
});