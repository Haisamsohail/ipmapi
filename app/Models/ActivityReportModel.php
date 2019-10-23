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
    public function DailyActicityCount($Datarequest)
    {
<<<<<<< HEAD
        //$DatarequestDate = explode ("-", $Datarequest->daterange);
        //$Query3 = "SELECT I.activityid, COUNT(I.activityid) AS CounT FROM processacitvity I WHERE I.activestatus = 'Y' AND I.stationid = '{$Datarequest->stationid}' AND I.activityid IN (".(implode(',', $Datarequest->activityids)).")  group by I.activityid";

        $Query3 = "SELECT A.activityid, COUNT(I.activityid) AS CounT FROM activity A left join processacitvity I on I.activityid = A.activityid and I.stationid = '{$Datarequest->stationid}' AND I.activestatus = 'Y' where A.activityid IN (".(implode(',', $Datarequest->activityids)).") GROUP BY I.activityid ORDER BY I.activityid DESC";



=======
        $DatarequestDate = explode ("-", $Datarequest->daterange);
        //dd($Datarequest);
        $Query3 = "SELECT I.activityid, COUNT(I.activityid) AS CounT FROM processacitvity I WHERE I.activestatus = 'Y' AND I.stationid = '{$Datarequest->stationid}' AND I.activityid IN (".(implode(',', $Datarequest->activityids)).")  group by I.activityid";
>>>>>>> 7b9d86dbb8794f5b9be356dace1e800779d85edb
        //$Query3 = "SELECT COUNT(*) AS CounT FROM processacitvity I WHERE I.activestatus = 'Y' AND I.stationid = '{$Datarequest->stationid}' AND I.activityid = '{$Datarequest->activityid}'";
        //$Query3 = "exec DailyActicity({$Datarequest->activityid},{$Datarequest->stationid})";
        //$Query3 = "EXEC DailyActicity({$Datarequest->activityid},{$Datarequest->stationid})";
        //$Query3 = "SET @p0='{$Datarequest->activityid}'; SET @p1='{$Datarequest->stationid}'; CALL 'DailyActicity'(@p0, @p1);";

        //$results = app('db')->connection('hsl')->select("call DailyActicity(?, ?)", [$Datarequest->activityid, $Datarequest->stationid]);
        $results = app('db')->connection('hsl')->select($Query3);
        return $results;
    }
    public function SearchActivityReportData($Datarequest)
    {
        $LocationSet  = "";
        if ($Datarequest->branchlocationid == 'All')
        {
            $LocationSet  = "";
        }
        else
        {
            $LocationSet  = " AND L.branchlocationid = '{$Datarequest->branchlocationid}'";
        }
        $Query3 = "SELECT DISTINCT(S.stationid) AS stationid, S.stationname AS stationname, L.branchlocationid AS branchlocationid, L.branchlocationname AS branchlocationname, C.companyname AS companyname FROM station S, stationapply SA, branchlocation L, branch B, company C WHERE S.stationid = SA.stationid AND SA.branchlocationid = L.branchlocationid AND L.branchid = B.branchid AND B.companyid = C.companyid AND C.companyid = '{$Datarequest->companyid}' $LocationSet group by stationname ORDER BY  stationname";
        $results = app('db')->connection('hsl')->select($Query3);
        return $results;
    }
    public function SearchActivityReportDataByLocAndStation($Datarequest)
    {
        $LocationSet  = "";
        if ($Datarequest->branchlocationid == 'All')
        {
            $LocationSet  = "";
        }
        else
        {
            $LocationSet  = " AND L.branchlocationid = '{$Datarequest->branchlocationid}'";
        }
        $Query3 = "SELECT SA.stationapplyid AS stationapplyid, S.stationid AS stationid, S.stationname AS stationname, L.branchlocationid AS branchlocationid, L.branchlocationname AS branchlocationname, C.companyname AS companyname, SA.stationapplyno AS stationapplyno FROM station S, stationapply SA, branchlocation L, branch B, company C WHERE /*S.stationactive = 'Y' AND*/ S.stationid = SA.stationid AND SA.branchlocationid = L.branchlocationid AND L.branchid = B.branchid AND B.companyid = C.companyid AND C.companyid = '{$Datarequest->companyid}' $LocationSet AND S.stationid = '{$Datarequest->stationid}' ORDER BY branchlocationname, stationapplyno";
        $results = app('db')->connection('hsl')->select($Query3);
        return $results;
    }
}