<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Models;
use App\Models\Connection;

class LocationModel extends Connection
{
	//put your code here
	public function AddLocationDB($data)
	{
		$Query2 = "INSERT INTO branchlocation (branchlocationname, branchid, createduserby) 
                    VALUES ('{$data->branchlocationname}', '{$data->branchid}',  103 )";
       //// dd($Query1);
		$results = app('db')->connection('hsl')->insert($Query2);
		//dd($results);
        return $results;
	}

    public function LocationList($data )
    {
        $Query3 = "SELECT L.branchlocationid AS branchlocationid, L.branchlocationname AS branchlocationname, L.branchid AS branchid, B.branchname AS branchname FROM branchlocation L, branch B WHERE L.branchid = B.branchid AND L.branchlocationactive = 'Y' AND L.branchid = '{$data->branchid}'";
        //dd($Query3);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }


    public function BStation($data )
    {
        $Query3 = "SELECT  B.branchname AS branchname, A.stationapplyid AS stationapplyid, A.stationapplyno AS stationapplyno, S.stationname AS stationname, L.branchlocationname AS branchlocationname FROM stationapply A, station S, branchlocation L, branch B  WHERE A.stationid = S.stationid AND A.branchlocationid = L.branchlocationid AND L.branchid = B.branchid AND B.branchid = '{$data->branchid}' AND A.stationapplyactive = 'Y' AND L.branchlocationactive = 'Y'  ORDER BY A.stationapplyno";
        //dd($Query3);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }

    public function GenerateLabel($data )
    {
        $Query3 = "SELECT A.stationapplyno AS stationapplyno, A.stationapplyid AS stationapplyid, C.companyname AS companyname, L.branchlocationid AS branchlocationid, L.branchlocationname AS branchlocationname, S.stationname AS stationname FROM stationapply A, branchlocation L, branch B, company C, station S WHERE A.stationapplyid = '{$data->stationapplyid}' AND A.branchlocationid = L.branchlocationid AND L.branchid = B.branchid AND B.companyid = C.companyid AND A.stationid = S.stationid";
        //dd($Query3);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }

    public function AllLocationList($data )
    {
        $Query3 = "SELECT * FROM branchlocation L WHERE L.branchlocationactive = 'Y'";
        //dd($Query3);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }

    public function DeleteLocation($data)
    {
        $Query4 = "UPDATE  branchlocation SET branchlocationactive = 'N' WHERE branchlocationid = '{$data->branchlocationid}'";
        //dd($Query4);
        $results = app('db')->connection('hsl')->update($Query4);
        //dd($results);
        return $results;
    }

    public function EditPageLocation($data)
    {
        $Query3 = "SELECT * FROM  branchlocation WHERE branchlocationactive = 'Y' AND branchlocationid = '{$data->branchlocationid}'";
        //dd($Query3);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }

    public function EditLocation($data)
    {
        $Query4 = "UPDATE branchlocation SET branchlocationname = '{$data->branchlocationname}' WHERE branchlocationid = '{$data->branchlocationid}'";
        //dd($Query4);
        $results = app('db')->connection('hsl')->update($Query4);
        //dd($results);
        return $results;
    }
}
