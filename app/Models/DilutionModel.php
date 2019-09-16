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
class DilutionModel extends Connection
{
	//put your code here

    public function DilutionList()
    {
        $Query3 = "SELECT * FROM dilution WHERE activestatus = 'Y' ORDER BY dilutionname";
        //// dd($Query1);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }



    public function AddDilutionDB($data)
	{
		$Query2 = "INSERT INTO dilution (dilutionname) VALUES ('{$data->dilutionname}')";
       //// dd($Query1);
		$results = app('db')->connection('hsl')->insert($Query2);
		//dd($results);
        return $results;
	}

    public function CompanyList()
    {
        $Query3 = "SELECT C.companyid AS companyid, C.companyname AS companyname, I.industrytypename AS industrytypename FROM company C, industrytype I WHERE C.companyindustrytypeid = I.industrytypeid AND C.companyactive = 'Y'";
        //// dd($Query1);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }

    public function DeleteDilution($data)
    {
        $Query4 = "UPDATE dilution SET activestatus = 'N' WHERE dilutionid = '{$data->dilutionid}'";
        //dd($Query4);
        $results = app('db')->connection('hsl')->update($Query4);
        //dd($results);
        return $results;
    }


    public function EditPageDilution($data)
    {
        $Query3 = "SELECT * FROM dilution C WHERE C.activestatus = 'Y' AND C.dilutionid = '{$data->dilutionid}'";
        //dd($Query3);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }


    public function EditDilution($data)
    {
        $Query4 = "UPDATE dilution SET dilutionname = '{$data->dilutionname}' WHERE dilutionid = '{$data->dilutionid}'";
        //dd($Query4);
        $results = app('db')->connection('hsl')->update($Query4);
        //dd($results);
        return $results;
    }
}
