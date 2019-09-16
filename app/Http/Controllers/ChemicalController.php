<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\ActivityModel;
use App\Models\ChemicalModel;
use App\Models\StationModel;
use App\Models\User;
use Illuminate\Http\Request;
/**
 * Description of UserController
 *
 * @author shahnawazkhan
 */
class ChemicalController
{
	//put your code here


    public function ChemicalList(Request $request)
    {
        try
        {
            $login = app(ChemicalModel::class);
            $response = $login->ChemicalList();
            //dd(count($response));
            if(count($response) > 0)
            {
                return ["status" => "Y", "response" => $response];
            }
            else
            {
                return ["status" => "N", "response" => ""];
            }

        }
        catch (Exception $ex)
        {
            abort(500, 'Internal Server Error');
        }
    }


	public function AddChemicalDB(Request $request)
	{
		$data = $request->getContent();
		$data = json_decode($data);
		if(empty($data))
		{
			return ["status"=> 404 , "message" => "Post data cannot be null"];
		}
		
		try
		{
			$login = app(ChemicalModel::class);
			$response = $login->AddChemicalDB($data);
            //dd(($response));
            //dd(count($response));
            //dd(($response[0]->userid));
			if($response == true)
			{
				return ["status" => "Y", "response" => $response];
			}
			else
			{
				return ["status" => "N", "response" => ""];
			}
			
		} 
		catch (Exception $ex) 
		{
			abort(500, 'Internal Server Error');
		}
	}


    public function DeleteChemical(Request $request)
    {
        $data = $request->getContent();
        $data = json_decode($data);
        //dd($data);
        try
        {
            $login = app(ChemicalModel::class);
            $response = $login->DeleteChemical($data);
            //dd(($response));
            if($response > 0)
            {
                return ["status" => "Y", "response" => "Deleted"];
            }
            else
            {
                return ["status" => "N", "response" => "Not Deleted"];
            }

        }
        catch (Exception $ex)
        {
            abort(500, 'Internal Server Error');
        }
    }


    public function EditPageChemical(Request $request)
    {
        $data = $request->getContent();
        $data = json_decode($data);
        //dd($data);
        try
        {
            $login = app(ChemicalModel::class);
            $response = $login->EditPageChemical($data);
            //dd(($response));
            if(count($response) > 0)
            {
                return ["status" => "Y", "response" => $response];
            }
            else
            {
                return ["status" => "N", "response" => "No Data"];
            }

        }
        catch (Exception $ex)
        {
            abort(500, 'Internal Server Error');
        }
    }


    public function EditChemical(Request $request)
    {
        $data = $request->getContent();
        //dd($data);
        $data = json_decode($data);

        try
        {
            $login = app(ChemicalModel::class);
            $response = $login->EditChemical($data);
            //dd(($response));
            if($response == true)
            {
                return ["status" => "Y", "response" => $response];
            }
            else
            {
                return ["status" => "N", "response" => ""];
            }

        }
        catch (Exception $ex)
        {
            abort(500, 'Internal Server Error');
        }
    }
}
