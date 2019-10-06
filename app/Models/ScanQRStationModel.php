<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
    namespace App\Models;
    use App\Models\Connection;
    /**
     * Description of User
     *
     * @author shahnawazkhan
     */
    class ScanQRStationModel extends Connection
    {

        public function ScanQRStationActivity($data)
        {
            //dd($data);
            //var_dump($data);
            $Query3 = "SELECT A.activityid AS activityid, A.activitytype AS activitytype, A.activityName AS activityName, A.activitydescription AS activitydescription FROM stationapply SA, activity A WHERE SA.stationapplyid = '{$data->ScanQRcode}' AND SA.stationid = A.stationid AND A.activityactive = 'Y'";
            //// dd($Query1);
            $results = app('db')->connection('hsl')->select($Query3);
            //dd($results);
            return $results;
        }

        public function ScanQRGetCompanyDetail($data)
        {
            //dd($data);
            //var_dump($data);
            $Query3 = "SELECT C.companyname AS companyname, B.branchname AS branchname, L.branchlocationname AS branchlocationname, S.stationname AS stationname, S.stationid AS stationid FROM company C, branch B, branchlocation L, stationapply SA, station S WHERE SA.stationapplyid = '{$data->ScanQRcode}' AND SA.stationid = S.stationid AND SA.branchlocationid = L.branchlocationid AND L.branchid = B.branchid AND B.companyid = C.companyid";
            //// dd($Query1);
            $results = app('db')->connection('hsl')->select($Query3);
            //dd($results);
            return $results;
        }

        public function MaxAppInsertID($data)
        {
            //dd($data);
            //var_dump($data);
            $Query3 = "SELECT MAX(P.appinsertid) AS MAXAppInsertID FROM processacitvity P WHERE P.createdby = '{$data->createdby}'";
            //// dd($Query1);
            $results = app('db')->connection('hsl')->select($Query3);
            //dd($results);
            return $results;
        }

        public function ProcessAcitvity($data)
        {
            $Query2 = "INSERT INTO processacitvity (stationid, activityid, activitytype, outputcheckbox, outputnumber, outputobservationtext, outputobservationImage, outputfumigationchemicalid, outputfumigationchemicaldai, outputfumigationchemicalconsumption, correcticeactionnumber, correcticeactionimage, correcticeactionrootcase, correcticeactioncorrection, correcticeactionupdate, createdby, appinsertid) 
                    VALUES ( {$data->stationid}, {$data->activityid}, '{$data->activitytype}', '{$data->outputcheckbox}', '{$data->outputnumber}', '{$data->outputobservationtext}', '{$data->outputobservationImage}', '{$data->outputfumigationchemicalid}', '{$data->outputfumigationchemicaldai}', '{$data->outputfumigationchemicalconsumption}', '{$data->correcticeactionnumber}', '{$data->correcticeactionimage}', '{$data->correcticeactionrootcase}', '{$data->correcticeactioncorrection}', '{$data->correcticeactionupdate}', {$data->createdby}, {$data->appinsertid} )";
        //dd($Query2);
		$results = app('db')->connection('hsl')->insert($Query2);
		//dd($results);
        return $results;
        }


        public function EditPageStation($data)
        {
            $Query3 = "SELECT * FROM station WHERE stationactive = 'Y' AND stationid = '{$data->stationid}'";
            //dd($Query3);
            $results = app('db')->connection('hsl')->select($Query3);
            //dd($results);
            return $results;
        }

        public function CheckAppStatus($data)
        {
            $Query3 = "SELECt * FROM ecoapp E WHERE E.activeststus = 'Y' ";
            //dd($Query3);
            $results = app('db')->connection('hsl')->select($Query3);
            //dd($results);
            return $results;
        }


        public function EditStation($data)
        {
            $Query4 = "UPDATE station SET stationname = '{$data->stationname}', stationdescription = '{$data->stationdescription}' WHERE stationid = '{$data->stationid}'";
            //dd($Query4);
            $results = app('db')->connection('hsl')->update($Query4);
            //dd($results);
            return $results;
        }
    }
