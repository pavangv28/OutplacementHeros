<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

//dummy example (ignore)
Route::view('demo','demo');

Route::get('/','OutplacementherosController@index');
//Route::view('/','welcome');


//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');



//Route::get('/','JobController@index');
Route::get('/jobs/create','JobController@create')->name('job.create');
Route::post('/jobs/create','JobController@store')->name('job.store');

//Route::get('/jobs/{id}/{job}','JobController@show')->name('jobs.show');
Route::get('dynamic-field', 'DynamicFieldController@index')->name('dynamic-field.index');

Route::post('dynamic-field/insert', 'DynamicFieldController@insert')->name('dynamic-field.insert');
Route::get('dynamic-field1', 'DynamicFieldController1@index')->name('dynamic-field1.index');

Route::post('dynamic-field1/insert', 'DynamicFieldController1@insert')->name('dynamic-field1.insert');
//mail view 

Route::get('/email',function(){
    return new WelcomeMail();
});

//employer register
Route::view('employer/register','auth.employer-register')->name('employer.register');
Route::post('employer/register','EmployerRegisterController@employerRegister')->name('emp.register');

//HIRING EMPLOYER from a COMPANY
Route::get('/company/{id}/{company}','CompanyController@index')->name('company.index');
Route::get('company/create','CompanyController@create')->name('company.view');
Route::post('company/create','CompanyController@store')->name('company.store');
Route::post('company/logo','CompanyController@companyLogo')->name('company.logo');
Route::post('company/coverphoto','CompanyController@coverPhoto')->name('cover.photo');
Route::post('user/logo/delete','CompanyController@delete_elogo')->name('elogo.delete');
Route::post('user/coverphoto/delete','CompanyController@delete_ecover')->name('ecover.delete');
//Separating Company
Route::get('/secompany/{id}/{company}','SemployerController@index')->name('secompany.index');
Route::get('secompany/create','SemployerController@create')->name('secompany.view');
Route::post('secompany/create','SemployerController@store')->name('secompany.store');
Route::post('secompany/logo','SemployerController@companyLogo')->name('secompany.logo');
Route::post('secompany/coverphoto','SemployerController@coverPhoto')->name('secover.photo');
Route::post('seuser/logo/delete','SemployerController@delete_elogo')->name('seelogo.delete');
Route::post('seuser/coverphoto/delete','SemployerController@delete_ecover')->name('seecover.delete');
//Consultant
Route::get('/consultant/{id}/{company}','ConsultantController@index')->name('consultant.index');
Route::get('consultant/create','ConsultantController@create')->name('consultant.view');
Route::post('consultant/create','ConsultantController@store')->name('consultant.store');
Route::post('consultant/logo','ConsultantController@companyLogo')->name('consultant.logo');
Route::post('consultant/coverphoto','ConsultantController@coverPhoto')->name('concover.photo');
Route::post('conuser/logo/delete','ConsultantController@delete_elogo')->name('conelogo.delete');
Route::post('conuser/coverphoto/delete','ConsultantController@delete_ecover')->name('concover.delete');


//See all companies
Route::get('/companies','CompanyController@company')->name('company');
Route::view('semployer/register','auth.semployer-register')->name('semployer.register');
//Route::view('success','auth.success')->name('success');
Route::post('semployer/register','SemployerRegisterController@semployerRegister')->name('semp.register');

//consultant
Route::view('consultant/register','auth.consultant-register')->name('consultant.register');
Route::post('consultant/register','ConsultantRegisterController@consultantRegister')->name('cons.register');

//SEEKER
Route::get('user/profile','UserController@index')->name('user.profile');
Route::post('user/profile/create','UserController@store')->name('profile.create');
//Route::post('user/coverletter','UserController@coverletter')->name('cover.letter');
Route::post('user/resume','UserController@resume')->name('resume');
Route::post('user/profile_pic','UserController@profile_pic')->name('profile_pic');
Route::post('user/profile_pic/delete','UserController@delete_spic')->name('spic.delete');
Route::post('user/resume/delete','UserController@delete_resume')->name('resume.delete');
Route::get('/user/{id}','UserController@show_profile')->name('user.show'); //checked
//user work,education history
Route::get('user/profile/history','UserController@history')->name('user.history');

// Education Controller
Route::post('/profile/education/store', 'EducationController@storeEducation');
Route::post('/profile/education/update', 'EducationController@updateEducation');
Route::post('/profile/education/delete', 'EducationController@deleteEducation');

// Work Controller
Route::post('/profile/work/store', 'WorkController@storeWork');
Route::post('/profile/work/update', 'WorkController@updateWork');
Route::post('/profile/work/delete', 'WorkController@deleteWork');

//LOCATION controller
Route::get('/getStates/{id}', 'LocationController@getStates');
Route::get('/getCities/{id}', 'LocationController@getCities');

//SKILL Controller
Route::post('/profile/skills/store', 'SkillController@storeSkill');
Route::post('/profile/skills/edit', 'SkillController@editSkill');

//admin (Only can post something now! Will add more)
Route::get('/dashboard','DashboardController@index')->middleware('admin');
Route::get('/dashboard/create','DashboardController@create')->middleware('admin');
Route::post('/dashboard/create','DashboardController@store')->name('post.store')->middleware('admin');
Route::post('/dashboard/destroy','DashboardController@destroy')->name('post.delete')->middleware('admin');
Route::get('/dashboard/{id}/edit','DashboardController@edit')->name('post.edit')->middleware('admin');
Route::post('/dashboard/{id}/update','DashboardController@update')->name('post.update')->middleware('admin');
Route::get('/dashboard/trash','DashboardController@trash')->middleware('admin');
Route::get('/dashboard/{id}/trash','DashboardController@restore')->name('post.restore')->middleware('admin');
Route::get('/dashboard/{id}/toggle','DashboardController@toggle')->name('post.toggle')->middleware('admin');
Route::get('/posts/{id}/{slug}','DashboardController@show')->name('post.show');
Route::get('/show_All','DashboardController@show_All')->name('post.show_All');


//display all seekers
Route::group(['middleware' => 'check_role:admin,employer' ], function() {
    Route::get('/seekers','SeekerController@index')->name('seeker.index');
    Route::get('/seeker/{id}','SeekerController@show_profile')->name('seeker.show');
});

//Mentor Support VOLUNTEER
Route::view('volunteer/register','auth.volunteer-register')->name('volunteer.register');
Route::post('volunteer/register','VolunteerRegisterController@volunteerRegister')->name('vol.register');

Route::get('volunteer/profile','VolunteerController@index')->name('volunteer.profile');
Route::post('user/volunteer/create','VolunteerController@store')->name('volunteer.store');
Route::post('volunteer/profile_pic','VolunteerController@vprofile_pic')->name('vprofile_pic');
Route::post('volunteer/profile_pic/delete','VolunteerController@delete_vpic')->name('vpic.delete');
Route::get('volunteer/{id}','VolunteerController@show')->name('volunteer.show'); //checked

Route::get('/vseekers','VolunteerController@listseekers')->name('vseeker.index');
Route::get('/vseeker/{id}','VolunteerController@show_profile')->name('vseeker.show');


//Job Search Support VOLUNTEER

Route::view('jvolunteer/register','auth.jvolunteer-register')->name('jvolunteer.register');
Route::post('jvolunteer/register','JvolunteerRegisterController@jvolunteerRegister')->name('jvol.register');

Route::get('jvolunteer/profile','JvolunteerController@index')->name('jvolunteer.profile');
Route::post('user/jvolunteer/create','JvolunteerController@store')->name('jvolunteer.store');
Route::post('jvolunteer/profile_pic','JvolunteerController@jvprofile_pic')->name('jvprofile_pic');
Route::post('jvolunteer/profile_pic/delete','JvolunteerController@delete_jvpic')->name('jvpic.delete');
Route::get('jvolunteer/{id}','JvolunteerController@show')->name('jvolunteer.show'); //checked

Route::get('/jvseekers','JvolunteerController@listseekers')->name('jvseeker.index');
Route::get('/jvseeker/{id}','JvolunteerController@show_profile')->name('jvseeker.show');


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


