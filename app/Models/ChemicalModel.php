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
class ChemicalModel extends Connection
{
	//put your code here

    public function ChemicalList()
    {
        $Query3 = "SELECT * FROM chemical WHERE chemicalactive = 'Y'";
        //// dd($Query1);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }



    public function AddChemicalDB($data)
	{
		$Query2 = "INSERT INTO chemical (chemicalname) 
                    VALUES ('{$data->chemicalname}')";
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

    public function DeleteChemical($data)
    {
        $Query4 = "UPDATE chemical SET chemicalactive = 'N' WHERE chemicalid = '{$data->chemicalid}'";
        //dd($Query4);
        $results = app('db')->connection('hsl')->update($Query4);
        //dd($results);
        return $results;
    }


    public function EditPageChemical($data)
    {
        $Query3 = "SELECT * FROM chemical C WHERE C.chemicalactive = 'Y' AND C.chemicalid = '{$data->chemicalid}'";
        //dd($Query3);
        $results = app('db')->connection('hsl')->select($Query3);
        //dd($results);
        return $results;
    }


    public function EditChemical($data)
    {
        $Query4 = "UPDATE chemical SET chemicalname = '{$data->chemicalname}' WHERE chemicalid = '{$data->chemicalid}'";
        //dd($Query4);
        $results = app('db')->connection('hsl')->update($Query4);
        //dd($results);
        return $results;
    }
}
