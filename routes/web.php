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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::get('package-list','Superadmin\CompanyController@packagelist')->name('registerpackage');
Route::post('register','UserController@registerstore')->name('registerstore');


Route::group(['middleware' => ['auth', 'role:superadmin'],'prefix' => 'superadmin'], function () {
Route::get('/', function () {
    return view('superadmin.dashboard');
})->name('superadmin.login');



//Super Admin
Route::get('superadmindata', 'Superadmin\SuperadminController@superadmindata')->name('superadmindata');
Route::get('superadmin', 'Superadmin\SuperadminController@index')->name('superadmin');
Route::get('superadmin-create', 'Superadmin\SuperadminController@create')->name('createsuperadmin');
Route::post('superadmin-create', 'Superadmin\SuperadminController@store')->name('storesuperadmin');
Route::get('superadmin-edit', 'Superadmin\SuperadminController@edit')->name('editsuperadmin');
Route::put('superadmin-update', 'Superadmin\SuperadminController@update')->name('updatesuperadmin');
Route::get('superadmin-delete', 'Superadmin\SuperadminController@destroy')->name('deletesuperadmin');

// Company Management
Route::get('companydata', 'Superadmin\CompanyController@companydata')->name('companydata');
Route::get('company', 'Superadmin\CompanyController@index')->name('company');
Route::get('createcompany', 'Superadmin\CompanyController@create')->name('createcompany');
Route::post('createcompany', 'Superadmin\CompanyController@store')->name('storecompany');
Route::get('editcompany', 'Superadmin\CompanyController@edit')->name('editcompany');
Route::put('editcompany', 'Superadmin\CompanyController@update')->name('updatecompany');
Route::get('deletecompany', 'Superadmin\CompanyController@destroy')->name('deletecompany');
Route::get('packagelist','Superadmin\CompanyController@packagelist')->name('packagelist');


// Invoice Management
Route::get('invoice', 'Superadmin\InvoiceController@index')->name('invoice');
Route::get('invoicedata', 'Superadmin\InvoiceController@invoicedata')->name('invoicedata');
Route::get('downloadPDF','Superadmin\InvoiceController@downloadPDF')->name('downloadPDF');

//Tool Controller
Route::get('modelsdata', 'Superadmin\ToolController@modulesdata')->name('modulesdata');
Route::get('modules', 'Superadmin\ToolController@index')->name('modules');
Route::get('createmodules', 'Superadmin\ToolController@create')->name('createmodules');
Route::post('createmodules', 'Superadmin\ToolController@store')->name('storemodules');
Route::get('editmodules', 'Superadmin\ToolController@edit')->name('editmodules');
Route::put('editmodules', 'Superadmin\ToolController@update')->name('updatemodules');
Route::get('deletemodules', 'Superadmin\ToolController@destroy')->name('deletemodules');


//Department
Route::get('departmentdata', 'Superadmin\DepartmentController@departmentdata')->name('departmentdata');
Route::get('department', 'Superadmin\DepartmentController@index')->name('department');
Route::get('createdepartment', 'Superadmin\DepartmentController@create')->name('createdepartment');
Route::post('createdepartment', 'Superadmin\DepartmentController@store')->name('storedepartment');
Route::get('editdepartment', 'Superadmin\DepartmentController@edit')->name('editdepartment');
Route::put('editdepartment', 'Superadmin\DepartmentController@update')->name('updatedepartment');
Route::get('deletedepartment', 'Superadmin\DepartmentController@destroy')->name('deletedepartment');

//Designation
Route::get('designationdata', 'Superadmin\DesignationController@designationdata')->name('designationdata');
Route::get('designation', 'Superadmin\DesignationController@index')->name('designation');
Route::get('createdesignation', 'Superadmin\DesignationController@create')->name('createdesignation');
Route::post('createdesignation', 'Superadmin\DesignationController@store')->name('storedesignation');
Route::get('editdesignation', 'Superadmin\DesignationController@edit')->name('editdesignation');
Route::put('editdesignation', 'Superadmin\DesignationController@update')->name('updatedesignation');
Route::get('deletedesignation', 'Superadmin\DesignationController@destroy')->name('deletedesignation');

//Standard
Route::get('standarddata', 'Superadmin\StandardController@standarddata')->name('standarddata');
Route::get('standard', 'Superadmin\StandardController@index')->name('standard');
Route::get('createstandard','Superadmin\StandardController@create')->name('createstandard');
Route::post('createstandard','Superadmin\StandardController@store')->name('storestandard');
Route::get('editstandard', 'Superadmin\StandardController@edit')->name('editstandard');
Route::put('editstandard', 'Superadmin\StandardController@update')->name('updatestandard');
Route::get('deletestandard', 'Superadmin\StandardController@destroy')->name('deletestandard');

//Scope
Route::get('scopedata', 'Superadmin\ScopeController@scopedata')->name('scopedata');
Route::get('scope', 'Superadmin\ScopeController@index')->name('scope');
Route::get('createscope', 'Superadmin\ScopeController@create')->name('createscope');
Route::post('createscope', 'Superadmin\ScopeController@store')->name('storescope');
Route::get('editscope', 'Superadmin\ScopeController@edit')->name('editscope');
Route::put('editscope', 'Superadmin\ScopeController@update')->name('updatescope');
Route::get('deletescope', 'Superadmin\ScopeController@destroy')->name('deletescope');

//Package Management
Route::get('packagedata', 'Superadmin\PackageController@packagedata')->name('packagedata');
Route::get('package', 'Superadmin\PackageController@index')->name('package');
Route::get('createpackage', 'Superadmin\PackageController@create')->name('createpackage');
Route::post('createpackage', 'Superadmin\PackageController@store')->name('storepackage');
Route::get('editpackage', 'Superadmin\PackageController@edit')->name('editpackage');
Route::put('editpackage', 'Superadmin\PackageController@update')->name('updatepackage');
Route::get('deletepackage', 'Superadmin\PackageController@destroy')->name('deletepackage');

// User Management
Route::get('userdata', 'UserController@userdata')->name('userdata');
Route::get('user', 'UserController@index')->name('users');
Route::get('edituser', 'UserController@edit')->name('edituser');
Route::put('updateuser', 'UserController@update')->name('updateuser');

Route::get('viewuser', 'UserController@show')->name('viewuser');
Route::get('deleteuser', 'UserController@destroy')->name('deleteuser');

// Document Management
Route::get('documentdata', 'Superadmin\DocumentController@getdata')->name('documentnamedata');
Route::get('document', 'Superadmin\DocumentController@index')->name('document.index');
Route::get('document/create', 'Superadmin\DocumentController@create')->name('document.create');
Route::post('document/create', 'Superadmin\DocumentController@store')->name('document.store');
Route::get('document/edit', 'Superadmin\DocumentController@edit')->name('document.edit');
Route::put('document/update', 'Superadmin\DocumentController@update')->name('document.update');
Route::get('document/delete', 'Superadmin\DocumentController@destroy')->name('document.delete');


// Document Template Management
Route::get('template', 'Superadmin\DocumentTemplateController@getdata')->name('templatedata');
Route::get('document-template', 'Superadmin\DocumentTemplateController@index')->name('document-template.index');
Route::get('document-template/create', 'Superadmin\DocumentTemplateController@create')->name('document-template.create');
Route::post('document-template/create', 'Superadmin\DocumentTemplateController@store')->name('document-template.store');
Route::get('document-template/edit', 'Superadmin\DocumentTemplateController@edit')->name('document-template.edit');
Route::put('document-template/update', 'Superadmin\DocumentTemplateController@update')->name('document-template.update');
Route::get('document-template/view', 'Superadmin\DocumentTemplateController@show')->name('document-template.view');
Route::get('document-template/delete', 'Superadmin\DocumentTemplateController@destroy')->name('document-template.delete');

// // Country 
// Route::get('countrydata', 'CountryController@countrydata')->name('countrydata');
// Route::get('country', 'CountryController@index')->name('country');
// Route::get('createcountry', 'CountryController@create')->name('createcountry');
// Route::post('storecountry', 'CountryController@store')->name('storecountry');
// Route::get('editcountry', 'CountryController@edit')->name('editcountry');
// Route::put('updatecountry', 'CountryController@update')->name('updatecountry');
// Route::get('deletecountry', 'CountryController@destroy')->name('deletecountry');

// //State 
// Route::get('statedata', 'StateController@statedata')->name('statedata');
// Route::get('state', 'StateController@index')->name('state');
// Route::get('createstate', 'StateController@create')->name('createstate');
// Route::post('storestate', 'StateController@store')->name('storestate');
// Route::get('editstate', 'StateController@edit')->name('editstate');
// Route::put('updatestate', 'StateController@update')->name('updatestate');
// Route::get('deletestate', 'StateController@destroy')->name('deletestate');

// //District 
// Route::get('districtdata', 'DistrictController@districtdata')->name('districtdata');
// Route::get('district', 'DistrictController@index')->name('district');
// Route::get('createdistrict', 'DistrictController@create')->name('createdistrict');
// Route::post('storedistrict', 'DistrictController@store')->name('storedistrict');
// Route::get('editdistrict', 'DistrictController@edit')->name('editdistrict');
// Route::put('updatedistrict', 'DistrictController@update')->name('updatedistrict');
// Route::get('deletedistrict', 'DistrictController@destroy')->name('deletedistrict');

// //City 
// Route::get('citydata', 'CityController@citydata')->name('citydata');
// Route::get('city', 'CityController@index')->name('city');
// Route::get('createcity', 'CityController@create')->name('createcity');
// Route::post('storecity', 'CityController@store')->name('storecity');
// Route::get('editcity', 'CityController@edit')->name('editcity');
// Route::put('updatecity', 'CityController@update')->name('updatecity');
// Route::get('deletecity', 'CityController@destroy')->name('deletecity');

});

Route::group(['middleware' => ['auth', 'role:admin'],'prefix' => 'admin'], function () {
Route::get('/', function () {
    return view('admin.dashboard');
})->name('admin');

Route::get('clientdata', 'Admin\ClientController@clientdata')->name('admin.clientdata');
Route::get('client', 'Admin\ClientController@index')->name('admin.client.index');
Route::get('client-create', 'Admin\ClientController@create')->name('admin.client.create');
Route::post('client-store', 'Admin\ClientController@store')->name('admin.client.store');
Route::get('client-edit', 'Admin\ClientController@edit')->name('admin.client.edit');
Route::put('client-edit', 'Admin\ClientController@update')->name('admin.client.update');
Route::get('client-delete', 'Admin\ClientController@destroy')->name('admin.client.delete');

Route::get('employeedata', 'Admin\EmployeeController@employeedata')->name('admin.employeedata');
Route::get('employee', 'Admin\EmployeeController@index')->name('admin.employees.index');
Route::get('employee-create', 'Admin\EmployeeController@create')->name('admin.employees.create');
Route::post('employee-store', 'Admin\EmployeeController@store')->name('admin.employees.store');
Route::get('employee-edit', 'Admin\EmployeeController@edit')->name('admin.employees.edit');
Route::put('employee-edit', 'Admin\EmployeeController@update')->name('admin.employees.update');
Route::get('employee-delete', 'Admin\EmployeeController@destroy')->name('admin.employees.delete');

    });

Route::group(['middleware' => ['auth', 'role:employee1'],'prefix' => 'employee1'], function () {

Route::get('/', function () {
    return view('employee1.dashboard');
})->name('employee1');

Route::get('clientdata', 'Employee\ClientController@clientdata')->name('employee.clientdata');
Route::get('client', 'Employee\ClientController@index')->name('employee.client.index');

Route::get('employeedata', 'Employee\EmployeeController@employeedata')->name('employee.employeedata');
Route::get('employee', 'Employee\EmployeeController@index')->name('employee.employees.index');
Route::get('employee-create', 'Employee\EmployeeController@create')->name('employee.employees.create');
Route::post('employee-store', 'Employee\EmployeeController@store')->name('employee.employees.store');
Route::get('employee-edit', 'Employee\EmployeeController@edit')->name('employee.employees.edit');
Route::put('employee-edit', 'Employee\EmployeeController@update')->name('employee.employees.update');
Route::get('employee-delete', 'Employee\EmployeeController@destroy')->name('employee.employees.delete');

});
// Route::get('master','UserController@master');


Route::group(['middleware' => ['auth', 'role:company'],'prefix' => 'company'], function () {

Route::get('/', function () {
    return view('company.dashboard');
})->name('company');


//user
Route::get('companyuserview', 'company\UserController@index')->name('companyuserview');
Route::get('companyuser', 'company\UserController@add')->name('companyuser');
Route::post('userstore', 'company\UserController@store')->name('userstore');
Route::get('companyuserupdate/{id}', 'company\UserController@update')->name('companyuserupdate');
Route::post('companyuseredit', 'company\UserController@edit')->name('companyuseredit');
Route::get('userdestroy/{id}', "company\UserController@destroy")->name('userdestroy');
Route::get('userdata', "company\UserController@userdata")->name('companyuserdata');


//auditor user
Route::get('companyauditoruserview', 'company\AuditorUserController@index')->name('companyauditoruserview');
Route::get('companyauditoruser', 'company\AuditorUserController@add')->name('companyauditoruser');
Route::post('auditoruserstore', 'company\AuditorUserController@store')->name('auditoruserstore');
Route::get('companyauditoruserupdate/{id}', 'company\AuditorUserController@update')->name('companyauditoruserupdate');
Route::post('companyauditoruseredit', 'company\AuditorUserController@edit')->name('companyauditoruseredit');
Route::post('companyauditorusereditupdate', 'company\AuditorUserController@editupdate')->name('companyauditorusereditupdate');
Route::get('auditoruserdestroy/{id}', "company\AuditorUserController@destroy")->name('auditoruserdestroy');
Route::get('auditoruserdata', "company\AuditorUserController@userdata")->name('companyauditoruserdata');



//department user
Route::get('companydepartmentuserview', 'company\DepartmentUserController@index')->name('companydepartmentuserview');
Route::get('companydepartmentuser', 'company\DepartmentUserController@add')->name('companydepartmentuser');
Route::post('departmentuserstore', 'company\DepartmentUserController@store')->name('departmentuserstore');
Route::get('companydepartmentuserupdate/{id}', 'company\DepartmentUserController@update')->name('companydepartmentuserupdate');
Route::post('companydepartmentuseredit', 'company\DepartmentUserController@edit')->name('companydepartmentuseredit');
Route::post('companydepartmentusereditupdate', 'company\DepartmentUserController@editupdate')->name('companyauditordepartmentusereditupdate');
Route::get('departmentuserdestroy/{id}', "company\DepartmentUserController@destroy")->name('departmentuserdestroy');
Route::get('departmentuserdata', "company\DepartmentUserController@userdata")->name('companydepartmentuserdata');


//department
Route::get('companydepartmentview', 'company\DepartmentController@index')->name('companydepartmentview');
Route::get('companydepartment', 'company\DepartmentController@add')->name('companydepartment');
Route::post('departmentstore', 'company\DepartmentController@store')->name('departmentstore');
Route::get('companydepartmentupdate/{id}', 'company\DepartmentController@update')->name('companydepartmentupdate');
Route::post('companydepartmentedit', 'company\DepartmentController@edit')->name('companydepartmentedit');
Route::get('companydepartmentdel/{id}', "company\DepartmentController@destroy")->name('companydepartmentdel');;
Route::get('departmentdata', "company\DepartmentController@departmentdata")->name('companydepartmentdata');

//designation
Route::get('companydesignationview', 'company\DesignationController@index')->name('companydesignationview');
Route::get('companydesignation', 'company\DesignationController@add')->name('companydesignation');
Route::post('designationstore', 'company\DesignationController@store')->name('designationstore');
Route::get('companydesignationupdate/{id}', 'company\DesignationController@update')->name('companydesignationupdate');
Route::post('companydesignationedit', 'company\DesignationController@edit')->name('companydesignationedit');
Route::get('designationdestroy/{id}', "company\DesignationController@destroy")->name('designationdestroy');
Route::get('designationdata', "company\DesignationController@designationdata")->name('companydesignationdata');
//document
Route::get('companydocumentview', 'company\DocumentTypeController@index')->name('companydocumentview');
Route::get('companydocument', 'company\DocumentTypeController@add')->name('companydocument');
Route::post('documentstore', 'company\DocumentTypeController@store')->name('documentstore');
Route::get('companydocumentupdate/{id}', 'company\DocumentTypeController@update')->name('companydocumentupdate');
Route::post('companydocumentedit', 'company\DocumentTypeController@edit')->name('companydocumentedit');
Route::get('companydocumentdel/{id}', "company\DocumentTypeController@destroy")->name('companydocumentdel');
Route::get('documentdata', "company\DocumentTypeController@documentdata")->name('companydocumentdata');
//scope
Route::get('companyscopeview', 'company\ScopeController@index')->name('companyscopeview');
Route::get('companyscope', 'company\ScopeController@add')->name('companyscope');
Route::post('scopestore', 'company\ScopeController@store')->name('scopestore');
Route::get('companyscopeupdate/{id}', 'company\ScopeController@update')->name('companyscopeupdate');
Route::post('companyscopeedit', 'company\ScopeController@edit')->name('companyscopeedit');
Route::get('companyscopedel/{id}', "company\ScopeController@destroy")->name('companyscopedel');
Route::get('scopedata', "company\ScopeController@scopedata")->name('companyscopedata');
//standard
Route::get('companystandardview', 'company\StandardController@index')->name('companystandardview');
Route::get('companystandard', 'company\StandardController@add')->name('companystandard');
Route::post('standardstore', 'company\StandardController@store')->name('standardstore');
Route::get('companystandardupdate/{id}', 'company\StandardController@update')->name('companystandardupdate');
Route::post('companystandardedit', 'company\StandardController@edit')->name('companystandardedit');
Route::get('companystandarddel/{id}', "company\StandardController@destroy")->name('companystandarddel');
Route::get('standarddata', "company\StandardController@standarddata")->name('companystandarddata');
//Activity

Route::get('companyactivityview', 'company\ActivityController@index')->name('companyactivityview');
Route::get('companyactivity', 'company\ActivityController@add')->name('companyactivity');
Route::post('activitystore', 'company\ActivityController@store')->name('activitystore');
Route::get('companyactivityupdate/{id}', 'company\ActivityController@update')->name('companyactivityupdate');
Route::post('companyactivityedit', 'company\ActivityController@edit')->name('companyactivityedit');
Route::get('activitydestroy/{id}', "company\ActivityController@destroy")->name('activitydestroy');
Route::get('activitydata', "company\ActivityController@activitydata")->name('companyactivitydata');


//Audit Program
Route::get('auditprogram', 'company\AuditController@program')->name('auditprogram');
Route::get('auditfrequency', 'company\AuditController@index')->name('auditfrequency');
Route::post('auditfrequency1', 'company\AuditController@add')->name('auditfrequency1');
Route::post('auditfrequency', 'company\AuditController@store')->name('auditstore');
Route::post('auditupdate', 'company\AuditController@update')->name('auditupdate');
Route::get('auditfrequencyview/{companyid}/{frequency}/{start}/{end}', "company\AuditController@view");
Route::get('auditfrequencydel/{companyid}/{frequency}', "company\AuditController@destroy");




//Audit Program Approved
Route::get('approvedauditprogram', 'company\AuditController@approvedprogram')->name('approvedauditprogram');
Route::get('approvedauditview/{companyid}/{frequency}/{start}/{end}', "company\AuditController@approvedauditview");

//pdf
Route::get('auditprogrampdf', "company\DynamicPDFController@index")->name('auditprogrampdf');
Route::get('AuditPlanPdf', 'company\DynamicPDFController@AuditPlanPdf')->name('AuditPlanPdf');




//circulate
Route::post('auditcirculated', "company\AuditController@auditcirculated")->name('auditcirculated');
Route::get('mrcirculateprogram', 'company\AuditController@mrcirculateprogram')->name('mrcirculateprogram');
Route::get('mrcirculateview/{companyid}/{frequency}/{start}/{end}', 'company\AuditController@mrcirculateview')->name('mrcirculateview');
Route::post('circulateupdate', 'company\AuditController@circulateupdate')->name('circulateupdate');
Route::get('approvedcirculateprogram', 'company\AuditController@approvedcirculateprogram')->name('approvedcirculateprogram');
Route::get('approvedcirculateview/{companyid}/{frequency}', 'company\AuditController@approvedcirculateview')->name('approvedcirculateview');


//audit_plan
Route::get('program_select', 'company\AuditPlanController@program_select')->name('program_select');
Route::get('audit_plan/{companyid}/{audit_number}', 'company\AuditPlanController@audit_plan')->name('audit_plan');
Route::post('auditplan_store', 'company\AuditPlanController@auditplan_store')->name('auditplan_store');
Route::post('auditplan_update', 'company\AuditPlanController@auditplan_update')->name('auditplan_update');
Route::get('plandelete/{companyid}/{audit_number}', 'company\AuditPlanController@destroy')->name('plandelete');
Route::get('auditplan_view', 'company\AuditPlanController@auditplan_view')->name('auditplan_view');
Route::get('planview/{companyid}/{audit_number}', 'company\AuditPlanController@planview')->name('planview');
Route::post('plancirculated', 'company\AuditPlanController@plancirculated')->name('plancirculated');
Route::get('circulateplan_view', 'company\AuditPlanController@circulateplan_view')->name('circulateplan_view');
Route::get('circulateauditplanview/{companyid}/{audit_number}', 'company\AuditPlanController@circulateauditplanview')->name('circulateauditplanview');


Route::post('auditorsearch/{department}', 'company\AuditPlanController@auditorsearch')->name('auditorsearch');
Route::post('auditeesearch/{department}', 'company\AuditPlanController@auditeesearch')->name('auditeesearch');


//document

Route::get('approvedview', 'company\MRDocumentUploadController@approvedview')->name('approvedview');
Route::get('mrdocumentview', 'company\MRDocumentUploadController@view')->name('mrdocumentview');
Route::get('documenthistory/{id}', "company\MRDocumentUploadController@documenthistory")->name('documenthistory');
Route::get('documentaccept/{id}', "company\MRDocumentUploadController@documentaccept")->name('documentaccept');
Route::get('documentdestroy/{id}', "company\DocumentUploadController@documentdestroy")->name('documentdestroy');

Route::get('documentacceptmr/{id}', "company\MRDocumentUploadController@documentacceptmr")->name('documentacceptmr');

//document Setting
Route::get('settingview', 'company\SettingController@index')->name('settingview');
Route::post('settingstore', 'company\SettingController@store')->name('settingstore');
Route::get('settingdestroy/{id}', "company\SettingController@destroy")->name('settingdestroy');
});

Route::group(['middleware' => ['auth', 'role:topmanagement'],'prefix' => 'topmanagement'], function () {
Route::get('/', function () {
    return view('topmanagement.dashboard');
})->name('topmanagement');

//pdf

Route::get('auditprogrampdf2', "topmanagement\DynamicPDFController@index")->name('auditprogrampdf2');

//topmanagement
Route::get('viewauditprogram', 'topmanagement\AuditController@index')->name('viewauditprogram');
Route::get('approvedprogram', 'topmanagement\AuditController@approvedprogram')->name('approvedprogram');
Route::post('comment', 'topmanagement\AuditController@comment')->name('comment');
Route::post('approve', 'topmanagement\AuditController@approve')->name('approve');
Route::get('auditfrequencydel/{companyid}/{frequency}', "topmanagement\AuditController@audit_del");
Route::get('auditfrequencyview/{companyid}/{frequency}/{start}/{end}', "topmanagement\AuditController@audit_view");
Route::get('approvedauditview/{companyid}/{frequency}/{start}/{end}', "topmanagement\AuditController@approvedaudit_view");
Route::post('topmanagementauditupdate', 'topmanagement\AuditController@auditupdate')->name('topmanagementauditupdate');

Route::get('topcirculateprogram', 'topmanagement\AuditController@topcirculateprogram')->name('topcirculateprogram');
Route::get('topcirculateview/{companyid}/{frequency}/{start}/{end}', 'topmanagement\AuditController@topcirculateview')->name('topcirculateview');
Route::post('circulatecomment', 'topmanagement\AuditController@circulatecomment')->name('circulatecomment');
Route::post('circulateapprove', 'topmanagement\AuditController@circulateapprove')->name('circulateapprove');
Route::post('topcirculateupdate', 'topmanagement\AuditController@topcirculateupdate')->name('topcirculateupdate');
Route::get('topapprovedcirculateprogram', 'topmanagement\AuditController@topapprovedcirculateprogram')->name('topapprovedcirculateprogram');

Route::get('topapprovedcirculateview/{companyid}/{frequency}', 'topmanagement\AuditController@topapprovedcirculateview')->name('topapprovedcirculateview');


//audit_plan
Route::get('top_auditplan', 'topmanagement\AuditController@top_auditplan')->name('top_auditplan');
Route::get('top_planview/{companyid}/{audit_number}', 'topmanagement\AuditController@top_planview')->name('top_planview');
Route::get('top_circulateplan_view', 'topmanagement\AuditController@top_circulateplan_view')->name('top_circulateplan_view');
Route::get('top_circulateauditplanview/{companyid}/{audit_number}', 'topmanagement\AuditController@top_circulateauditplanview')->name('top_circulateauditplanview');
Route::get('AuditPlanPdf12', 'topmanagement\DynamicPDFController@AuditPlanPdf')->name('AuditPlanPdf12');

});



Route::group(['middleware' => ['auth', 'role:audit'],'prefix' => 'audit'], function () {    
Route::get('/', function () {return view('company.dashboard');})->name('auditstaff');
//Auditor
Route::get('auditor_auditplan', 'company\AuditorController@auditor_auditplan')->name('auditor_auditplan');
Route::get('auditee_auditplan', 'company\AuditorController@auditee_auditplan')->name('auditee_auditplan');
Route::get('auditor_planview/{companyid}/{audit_number}', 'company\AuditorController@auditor_planview')->name('auditor_planview');
Route::get('auditor_circulateplan_view', 'company\AuditorController@auditor_circulateplan_view')->name('auditor_circulateplan_view');
Route::get('auditor_circulateauditplanview/{companyid}/{audit_number}', 'company\AuditorController@auditor_circulateauditplanview')->name('auditor_circulateauditplanview');

Route::get('AuditPlanPdf1', 'company\DynamicPDFController@AuditPlanPdf')->name('AuditPlanPdf1');

//audit report
Route::get('audit_report_select', 'company\AuditReportController@audit_report_select')->name('audit_report_select');
Route::get('audit_report_complete/{companyid}/{audit_number}/{department}/{AuditPlanNo}', 'company\AuditReportController@audit_report_complete')->name('audit_report_complete');

Route::get('reportview/{companyid}/{AuditPlanNo}', 'company\AuditReportController@reportview')->name('reportview');
Route::get('ncdata', "company\AuditReportController@ncdata")->name('ncdata');

Route::post('AuditReportStore', 'company\AuditReportController@add')->name('AuditReportStore');
Route::get('auditreportview', 'company\AuditReportController@view')->name('auditreportview');

//Non Conformance Start
Route::get('nonconformance', 'company\NonConformanceController@nonconformance')->name('nonconformance');
Route::get('ncview/{AuditPlanNo}', "company\NonConformanceController@view")->name('ncview');
Route::get('ncviewdetail/{AuditPlanNo}', "company\NonConformanceController@ncviewdetail")->name('ncviewdetail');
Route::get('ncreffective/{id}/{AuditPlanNo}', "company\NonConformanceController@ncreffective")->name('ncreffective');
Route::get('auditeencdata', "company\AuditeeReportController@ncdata")->name('auditeencdata');
Route::get('auditeencview/{AuditPlanNo}', "company\AuditeeNonConformanceController@view")->name('auditeencview');
Route::get('auditeencviewdetail/{AuditPlanNo}', "company\AuditeeNonConformanceController@ncviewdetail")->name('auditeencviewdetail');
Route::get('auditeencreffective/{id}/{AuditPlanNo}', "company\AuditeeNonConformanceController@ncreffective")->name('auditeencreffective');

Route::get('ncrwithdraw/{id}', "company\NonConformanceController@destroy")->name('ncrwithdraw');
//Non Conformance end

//OBS Start
Route::get('OBSview/{AuditPlanNo}', "company\OBSController@view")->name('OBSview');

Route::get('OBSviewdetail/{AuditPlanNo}', "company\OBSController@OBSviewdetail")->name('OBSviewdetail');
Route::get('obswithdraw/{id}', "company\OBSController@destroy")->name('obswithdraw');

Route::get('AuditeeOBSviewdetail/{AuditPlanNo}', "company\AuditeeOBSController@OBSviewdetail")->name('AuditeeOBSviewdetail');
Route::get('auditeeOBSview/{AuditPlanNo}', "company\AuditeeOBSController@view")->name('auditeeOBSview');
Route::post('OBSstore', 'company\OBSreportController@store')->name('OBSstore');
//OBS end
//IMP Start
Route::get('IMPview/{AuditPlanNo}', "company\IMPController@view")->name('IMPview');
Route::get('IMPviewdetail/{AuditPlanNo}', "company\IMPController@IMPviewdetail")->name('IMPviewdetail');
Route::get('impwithdraw/{id}', "company\IMPController@destroy")->name('impwithdraw');
Route::get('auditeeIMPviewdetail/{AuditPlanNo}', "company\AuditeeIMPController@IMPviewdetail")->name('auditeeIMPviewdetail');
Route::get('auditeeIMPview/{AuditPlanNo}', "company\AuditeeIMPController@view")->name('auditeeIMPview');
Route::post('IMPstore', 'company\IMPreportController@store')->name('IMPstore');
//IMP end
Route::get('auditeereportview', 'company\AuditeeReportController@view')->name('auditeereportview');

Route::post('correctionstore', 'company\NCReportController@store')->name('correctionstore');
Route::post('correctionupdate', 'company\NCReportController@update')->name('correctionupdate');
Route::get('import_excel', 'company\ImportExcelController@index')->name('importexcel');
Route::post('import_excel/import', 'company\ImportExcelController@import')->name('import');
Route::resource('sample', 'SampleController');

Route::post('sample/update', 'SampleController@update')->name('sample.update');

Route::get('sample/destroy/{id}', 'SampleController@destroy');

Route::get('importupdate/{id}', 'company\ImportExcelController@update')->name('importupdate');
Route::post('importedit', 'company\ImportExcelController@edit')->name('importedit');
Route::get('importdestroy/{id}', "company\ImportExcelController@destroy")->name('importdestroy');
Route::get('importdata', "company\ImportExcelController@importdata")->name('importdata');


Route::get('newdocument', 'company\DocumentUploadController@index')->name('newdocument');
Route::post('store', 'company\DocumentUploadController@store')->name('store');
Route::get('documentview', 'company\DocumentUploadController@view')->name('documentview');
Route::get('documentdestroy/{id}', "company\DocumentUploadController@documentdestroy")->name('documentdestroy');
//Route::get('documenthistory/{id}', "company\DocumentUploadController@documenthistory")->name('documenthistory');
Route::get('approved_document', "company\DocumentUploadController@approved_document")->name('approved_document');

});




//audit

Route::group(['middleware' => ['auth', 'role:audit'],'prefix' => 'audit'], function () {
Route::get('/', function () {
    return view('company.dashboard');
})->name('audit');
//Auditor
Route::get('auditor_auditplan', 'company\AuditorController@auditor_auditplan')->name('auditor_auditplan');
Route::get('auditee_auditplan', 'company\AuditorController@auditee_auditplan')->name('auditee_auditplan');
Route::get('auditor_planview/{companyid}/{audit_number}', 'company\AuditorController@auditor_planview')->name('auditor_planview');
Route::get('auditor_circulateplan_view', 'company\AuditorController@auditor_circulateplan_view')->name('auditor_circulateplan_view');
Route::get('auditor_circulateauditplanview/{companyid}/{audit_number}', 'company\AuditorController@auditor_circulateauditplanview')->name('auditor_circulateauditplanview');

Route::get('AuditPlanPdf1', 'company\DynamicPDFController@AuditPlanPdf')->name('AuditPlanPdf1');

//audit report
Route::get('audit_report_select', 'company\AuditReportController@audit_report_select')->name('audit_report_select');
Route::get('audit_report_complete/{companyid}/{audit_number}/{department}/{AuditPlanNo}', 'company\AuditReportController@audit_report_complete')->name('audit_report_complete');

Route::get('reportview/{companyid}/{AuditPlanNo}', 'company\AuditReportController@reportview')->name('reportview');
Route::get('ncdata', "company\AuditReportController@ncdata")->name('ncdata');

Route::post('AuditReportStore', 'company\AuditReportController@add')->name('AuditReportStore');
Route::get('auditreportview', 'company\AuditReportController@view')->name('auditreportview');

//Non Conformance Start
Route::get('nonconformance', 'company\NonConformanceController@nonconformance')->name('nonconformance');
Route::get('ncview/{AuditPlanNo}', "company\NonConformanceController@view")->name('ncview');
Route::get('ncviewdetail/{AuditPlanNo}', "company\NonConformanceController@ncviewdetail")->name('ncviewdetail');
Route::get('ncreffective/{id}/{AuditPlanNo}', "company\NonConformanceController@ncreffective")->name('ncreffective');
Route::get('auditeencdata', "company\AuditeeReportController@ncdata")->name('auditeencdata');
Route::get('auditeencview/{AuditPlanNo}', "company\AuditeeNonConformanceController@view")->name('auditeencview');
Route::get('auditeencviewdetail/{AuditPlanNo}', "company\AuditeeNonConformanceController@ncviewdetail")->name('auditeencviewdetail');
Route::get('auditeencreffective/{id}/{AuditPlanNo}', "company\AuditeeNonConformanceController@ncreffective")->name('auditeencreffective');

Route::get('ncrwithdraw/{id}', "company\NonConformanceController@destroy")->name('ncrwithdraw');
//Non Conformance end

//OBS Start
Route::get('OBSview/{AuditPlanNo}', "company\OBSController@view")->name('OBSview');

Route::get('OBSviewdetail/{AuditPlanNo}', "company\OBSController@OBSviewdetail")->name('OBSviewdetail');
Route::get('obswithdraw/{id}', "company\OBSController@destroy")->name('obswithdraw');

Route::get('AuditeeOBSviewdetail/{AuditPlanNo}', "company\AuditeeOBSController@OBSviewdetail")->name('AuditeeOBSviewdetail');
Route::get('auditeeOBSview/{AuditPlanNo}', "company\AuditeeOBSController@view")->name('auditeeOBSview');
Route::post('OBSstore', 'company\OBSreportController@store')->name('OBSstore');
//OBS end
//IMP Start
Route::get('IMPview/{AuditPlanNo}', "company\IMPController@view")->name('IMPview');
Route::get('IMPviewdetail/{AuditPlanNo}', "company\IMPController@IMPviewdetail")->name('IMPviewdetail');
Route::get('impwithdraw/{id}', "company\IMPController@destroy")->name('impwithdraw');
Route::get('auditeeIMPviewdetail/{AuditPlanNo}', "company\AuditeeIMPController@IMPviewdetail")->name('auditeeIMPviewdetail');
Route::get('auditeeIMPview/{AuditPlanNo}', "company\AuditeeIMPController@view")->name('auditeeIMPview');
Route::post('IMPstore', 'company\IMPreportController@store')->name('IMPstore');
//IMP end
Route::get('auditeereportview', 'company\AuditeeReportController@view')->name('auditeereportview');

Route::post('correctionstore', 'company\NCReportController@store')->name('correctionstore');
Route::post('correctionupdate', 'company\NCReportController@update')->name('correctionupdate');
Route::get('import_excel', 'company\ImportExcelController@index')->name('importexcel');
Route::post('import_excel/import', 'company\ImportExcelController@import')->name('import');
Route::resource('sample', 'SampleController');

Route::post('sample/update', 'SampleController@update')->name('sample.update');

Route::get('sample/destroy/{id}', 'SampleController@destroy');

Route::get('importupdate/{id}', 'company\ImportExcelController@update')->name('importupdate');
Route::post('importedit', 'company\ImportExcelController@edit')->name('importedit');
Route::get('importdestroy/{id}', "company\ImportExcelController@destroy")->name('importdestroy');
Route::get('importdata', "company\ImportExcelController@importdata")->name('importdata');


Route::get('newdocument', 'company\DocumentUploadController@index')->name('newdocument');
Route::post('store', 'company\DocumentUploadController@store')->name('store');
Route::get('documentview', 'company\DocumentUploadController@view')->name('documentview');
Route::get('documentdestroy/{id}', "company\DocumentUploadController@documentdestroy")->name('documentdestroy');
Route::get('documenthistory/{id}', "company\DocumentUploadController@documenthistory")->name('documenthistory');

Route::get('reviewer_document', "company\DocumentUploadController@reviewer_document")->name('reviewer_document');

Route::get('approvedaccept/{id}', "company\DocumentUploadController@approvedaccept")->name('approvedaccept');

Route::get('documentedit/{id}', "company\DocumentUploadController@documentedit")->name('documentedit');
Route::post('documentupdate', "company\DocumentUploadController@update")->name('documentupdate');

//Approver
Route::get('approver_document', "company\DocumentUploadController@approver_document")->name('approver_document');
Route::get('approved_document/{id}/{approve}', "company\DocumentUploadController@approved_document")->name('approved_document');

});




Route::group(['middleware' => ['auth', 'role:company'],'prefix' => 'document'], function () {
    Route::get('/','company\AccessController@index')->name('document');
    Route::get('/get_designation_by_department/{id}','company\AccessController@getDesignation')->name('get_designation_by_department');
    Route::post('/store-access','company\AccessController@storeAccess')->name('store-access');
    Route::get('/edit-access/{id}','company\AccessController@editAccess')->name('edit-access');
    Route::post('/update-access','company\AccessController@updateAccess')->name('update-access');
    Route::get('/delete-access/{id}','company\AccessController@deleteAccess')->name('delete-access');
});

//common to Company, Audit, Staff
Route::group(['middleware' => ['auth', 'role:company,audit,staff'],'prefix' => 'document'], function () {
    Route::get('documenthistory/{id}', "company\DocumentUploadController@documenthistory")->name('documenthistory');
    Route::get('documentcomment/{id}', "company\MRDocumentUploadController@documentcomment")->name('documentcomment');
    Route::post('comment_create', "company\MRDocumentUploadController@comment_create")->name('comment_create');
});


// Preparator
Route::group(['middleware' => ['auth', 'role:staff'],'prefix' => 'preparator'], function(){
    Route::get('document-in-process','Staff\PreparatorController@documentInProcess')->name('preparator-document');
    Route::get('upload-document','Staff\PreparatorController@uploadDocument')->name('upload-document');
    Route::post('store-document','Staff\PreparatorController@storeDocument')->name('store-document');
    Route::get('documentdestroy/{id}', "Staff\PreparatorController@documentdestroy")->name('documentdestroy');
    Route::get('document-edit/{id}', "Staff\PreparatorController@documentedit")->name('document-edit');
    Route::post('documentupdate', "Staff\PreparatorController@update")->name('preparator-documentupdate');
});

// Reviewer
 Route::group(['middleware' => ['auth', 'role:staff'],'prefix' => 'reviewer'], function(){
    Route::get('approved_document', "Staff\ReviewerController@approved_document")->name('reviewer-document');
    Route::get('reviewed/{id}', "Staff\ReviewerController@approvedaccept")->name('approvedaccept');
 });

//Approver
 Route::group(['middleware' => ['auth', 'role:staff'],'prefix' => 'approver'], function(){
    Route::get('approver-document', "Staff\ApproverController@approver_document")->name('approver-document');
    Route::get('approved/{id}/{approve}', "Staff\ApproverController@approved")->name('approver-approved');
 });