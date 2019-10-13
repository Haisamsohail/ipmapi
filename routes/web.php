<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});
$router->group(['prefix' => 'user'], function () use ($router) {
	$router->post('/login', 'UserController@login');


//    $router->post('/AddactivityDB', 'ActivityController@AddactivityDB');
//    $router->post('/ActivityList', 'ActivityController@ActivityList');
//    $router->post('/DeleteActivity', 'ActivityController@DeleteActivity');

    /***************** Station Start ***********************/
    $router->post('/AddStation', 'StationController@AddStation');
    $router->post('/StationList', 'StationController@StationList');
    $router->post('/DeleteStation', 'StationController@DeleteStation');
    $router->post('/EditStation', 'StationController@EditStation');
    $router->post('/EditPageStation', 'StationController@EditPageStation');
    /***************** Station End   ***********************/
    /***************** Activity Start ***********************/
    $router->post('/ActivityList', 'ActivityController@ActivityList');
    $router->post('/DeleteActivity', 'ActivityController@DeleteActivity');
    $router->post('/AddactivityDB', 'ActivityController@AddactivityDB');
    $router->post('/EditPageActivity', 'ActivityController@EditPageActivity');
    $router->post('/EditActivity', 'ActivityController@EditActivity');
    $router->post('/AllActivityList', 'ActivityController@AllActivityList');
    /***************** Activity End   ***********************/
    /********** Create Company Start ***************************/
    $router->post('/IndustryList', 'CompanyController@IndustryList');
    $router->post('/AddCompany', 'CompanyController@AddCompany');
    Route::post('/CompanyList', 'CompanyController@CompanyList');
    $router->post('/DeleteCompany', 'CompanyController@DeleteCompany');
    $router->post('/EditPageCompany', 'CompanyController@EditPageCompany');
    $router->post('/EditCompany', 'CompanyController@EditCompany');
    /********** Create Company End   ***************************/
    /***************** Branch Start ***********************/
    $router->post('/BranchList', 'BranchController@BranchList');
    $router->post('/AddBranchDB', 'BranchController@AddBranchDB');
    $router->post('/DeleteBranch', 'BranchController@DeleteBranch');
    $router->post('/EditPageBranch', 'BranchController@EditPageBranch');
    $router->post('/EditBranch', 'BranchController@EditBranch');
    $router->post('/AllBranchList', 'BranchController@AllBranchList');
    /***************** Branch End   ***********************/
    /********** Create Employee Start ***************************/
    Route::post('/EmployeeList', 'EmployeeController@EmployeeList');
    $router->post('/AddEmployeeDB', 'EmployeeController@AddEmployeeDB');
    $router->post('/DeleteEmployee', 'EmployeeController@DeleteEmployee');
    $router->post('/EditPageEmployee', 'EmployeeController@EditPageEmployee');
    $router->post('/EditEmployee', 'EmployeeController@EditEmployee');
    /********** Create Employee End   ***************************/
    /********** Create Location Start ***************************/
    Route::post('/LocationList', 'LocationController@LocationList');
    Route::post('/BStation', 'LocationController@BStation');
    Route::post('/GenerateLabel', 'LocationController@GenerateLabel');
    Route::post('/AddLocationDB', 'LocationController@AddLocationDB');
    $router->post('/DeleteLocation', 'LocationController@DeleteLocation');
    $router->post('/EditPageLocation', 'LocationController@EditPageLocation');
    $router->post('/EditLocation', 'LocationController@EditLocation');
    Route::post('/AllLocationList', 'LocationController@AllLocationList');
    /********** Create Location End ***************************/
    /********** Create Station Start ***************************/
    Route::post('/StationApplyList', 'StationApplyController@StationApplyList');
    $router->post('/DeleteStationApply', 'StationApplyController@DeleteStationApply');
    $router->post('/CheckStation', 'StationApplyController@CheckStation');
    Route::post('/AddStationApplyDB', 'StationApplyController@AddStationApplyDB');
    $router->post('/EditPageStationApply', 'StationApplyController@EditPageStationApply');
    $router->post('/EditStationApply', 'StationApplyController@EditStationApply');
    Route::post('/AllStationApplyList', 'StationApplyController@AllStationApplyList');
    /********** Create Station End   ***************************/
    /********** Mobile App Start ***************************/
    Route::post('/ScanQRStationActivity', 'ScanQRStation@ScanQRStationActivity');
    Route::post('/CompanyListAPP', 'CompanyController@CompanyListAPP');
    Route::post('/ProcessAcitvity', 'ScanQRStation@ProcessAcitvity');
    Route::post('/MaxAppInsertID', 'ScanQRStation@MaxAppInsertID');
    Route::post('/CheckAppStatus', 'ScanQRStation@CheckAppStatus');
    /********** Mobile App EndCheckBoxStationApplyDownload    ***************************/
    /***************** Chemical Start ***********************/
    $router->post('/ChemicalList', 'ChemicalController@ChemicalList');
    $router->post('/AddChemicalDB', 'ChemicalController@AddChemicalDB');
    $router->post('/DeleteChemical', 'ChemicalController@DeleteChemical');
    $router->post('/EditPageChemical', 'ChemicalController@EditPageChemical');
    $router->post('/EditChemical', 'ChemicalController@EditChemical');
    /***************** Chemical End   ***********************/
    /***************** Dilution Start ***********************/
    $router->post('/DilutionList', 'DilutionController@DilutionList');
    $router->post('/AddDilutionDB', 'DilutionController@AddDilutionDB');
    $router->post('/DeleteDilution', 'DilutionController@DeleteDilution');
    $router->post('/EditPageDilution', 'DilutionController@EditPageDilution');
    $router->post('/EditDilution', 'DilutionController@EditDilution');
    /***************** Dilution End   ***********************/
    /***************** Reports Start ***********************/
    $router->post('/APPInput', 'ActivityReportController@APPInput');
    $router->post('/SearchActivityReport', 'ActivityReportController@SearchActivityReport');
    $router->post('/SearchActivityReportData', 'ActivityReportController@SearchActivityReportData');
    $router->post('/AddDilutionDB', 'DilutionController@AddDilutionDB');
    $router->post('/DeleteDilution', 'DilutionController@DeleteDilution');
    $router->post('/EditPageDilution', 'DilutionController@EditPageDilution');
    $router->post('/EditDilution', 'DilutionController@EditDilution');
    $router->post('/GetLocations', 'ActivityReportController@GetLocations');
    $router->post('/SearchActivityReportDataByLocAndStation', 'ActivityReportController@SearchActivityReportDataByLocAndStation');
    $router->post('/DailyActicityCount', 'ActivityReportController@DailyActicityCount');
    /***************** Reports End   ***********************/
});
