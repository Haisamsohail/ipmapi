<?php
namespace App\Models;
use App\Models\Connection;
use DB;
use App\Http\HttpClientCommunication;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserLogin
 *
 * @author haisamsohail
 */
class ActivityReportModel extends Connection
{
	const END_POINT_USER = 'user/';
    public function __construct()
    {
            parent::__construct();
    }


    public function APPInput()
    {
        //dd("AAA");
        $Query3 = "SELECT SA.stationapplyno AS stationapplyno, C.companyname AS companyname, B.branchname AS branchname, L.branchlocationname AS branchlocationname, S.stationname AS stationname, A.activityName AS activityName, A.activitytype AS activitytype, I.stationid AS stationid, I.activityid AS activityid, I.activitytype AS activitytype, I.outputcheckbox AS outputcheckbox, I.outputnumber AS outputnumber, I.outputobservationtext AS outputobservationtext, I.outputobservationImage AS outputobservationImage, I.outputfumigationchemicalid AS outputfumigationchemicalid, I.outputfumigationchemicaldai AS outputfumigationchemicaldai, I.outputfumigationchemicalconsumption AS outputfumigationchemicalconsumption, I.correcticeactionnumber AS correcticeactionnumber, I.correcticeactionimage AS correcticeactionimage, I.correcticeactionrootcase AS correcticeactionrootcase, I.correcticeactioncorrection AS correcticeactioncorrection, I.correcticeactionupdate AS correcticeactionupdate, DATE_FORMAT(I.createddate, '%e, %b %y') AS createddate FROM company C, branch B, branchlocation L, processacitvity I, station S, activity A, stationapply SA WHERE C.companyid = B.companyid AND B.branchid = L.branchid AND L.branchlocationid = SA.branchlocationid AND SA.stationid = S.stationid AND S.stationid = A.stationid AND SA.stationapplyid = I.stationid AND A.activityid = I.activityid ORDER BY I.id DESC";
        //// dd($Query1);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }



	public function AddStationDB($stationname, $stationdescription )
	{
		$data = array('stationname' => $stationname, 'stationdescription' => $stationdescription);
		//dd($data);	
        $AddStationDBCallAPI = app(HttpClientCommunication::class);
		
		$response = $AddStationDBCallAPI->storeData(self::END_POINT_USER."AddStation", $data, true);
		//dd($response);
		//$array =  (array) $response;
		//dd(gettype($response));
		return $response->body();
	}


    public function SearchActivityReport($Datarequest)
    {
        //dd("AAA");
        $Query3 = "SELECT C.companyname, B.branchname, L.branchlocationname,  S.stationname, A.stationapplyid, A.stationapplyno, S.stationid, A.stationapplycreateddate FROM company C, branch B, branchlocation L, station S, stationapply A WHERE C.companyid = B.companyid AND B.branchid = L.branchid AND L.branchlocationid = A.branchlocationid AND A.stationid = S.stationid";
        //// dd($Query1);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }

    public function DeleteStation($stationid)
    {
        $data = array();
        $data = array('stationid' => $stationid);
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."DeleteStation", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }


    public function EditPageStation($stationid)
    {
        $data = array();
        $data = array('stationid' => $stationid);
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."EditPageStation", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }


    public function EditStation($stationname, $stationdescription, $stationid)
    {
        $data = array();
        $data = array('stationid' => $stationid, 'stationname' => $stationname, 'stationdescription' => $stationdescription);
        //dd($data);
        $StationListCallAPI = app(HttpClientCommunication::class);
        $response = $StationListCallAPI->storeData(self::END_POINT_USER."EditStation", $data, true);
        //dd($response);
        //$array =  (array) $response;
        //dd(gettype($response));
        return $response->body();
    }


    public function GetLocations($Datarequest)
    {
        $Query3 = "SELECT L.branchlocationid AS branchlocationid, L.branchlocationname AS branchlocationname FROM company C, branch B, branchlocation L WHERE C.companyid = B.companyid AND B.branchid = L.branchid AND B.branchactive = 'Y' AND L.branchlocationactive = 'Y' AND C.companyid = '{$Datarequest->companyid}'";
        $results = app('db')->connection('hsl')->select($Query3);
        return $results;
    }

    public function SearchActivityReportData($Datarequest)
    {
        $Query3 = "SELECT DISTINCT(S.stationid) AS stationid, S.stationname AS stationname FROM station S, stationapply SA, branchlocation L WHERE S.stationactive = 'Y' AND S.stationid = SA.stationid AND SA.branchlocationid = L.branchlocationid AND L.branchlocationid = '{$Datarequest->branchlocationid}'";
        $results = app('db')->connection('hsl')->select($Query3);
        return $results;
    }

}
