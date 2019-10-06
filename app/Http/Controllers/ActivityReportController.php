<?php
    /**
     * Created by PhpStorm.
     * User: haisamsohail
     * Date: 03/09/2019
     * Time: 5:59 PM
     */


    namespace App\Http\Controllers;

    use App\Models\ActivityReportModel;
    use App\Models\CompanyModel;
    use App\Models\StationModel;
    use Symfony\Component\HttpFoundation\Request;
    use App\Http\Controllers\Controller;

    use Illuminate\Foundation\Bus\DispatchesJobs;
    use Illuminate\Routing\Controller as BaseController;
    use Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use DB;
    use Session;

    class ActivityReportController  extends Controller
    {
        protected $token = null;
        public function __construct()
        {
            date_default_timezone_set("Asia/Karachi");
        }

        public function HassanTest(Request $req)
        {
            echo "AAA".$req->taskID;


        }


        public function APPInput(Request $request)
        {
            try
            {
                $login = app(ActivityReportModel::class);
                $response = $login->APPInput();
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


        public function ActivityReport()
        {
            $ChemicalMod = app(CompanyModel::class);
            $response = $ChemicalMod->CompanyList();

            $StationListObjectA = app(StationModel::class);
            $responseA = $StationListObjectA->StationList();


            //dd($response);
            if($response->status == "Y")
            {
                return View('ActivityReport', ['CompanyList' => $response->response, 'StationList' => $responseA->response] );
                //.. return View('ActivityReport')->with('CompanyList', $response->response);
            }
            else
            {
                return redirect()->action('ChemicalController@CreateChemical');
            }
        }

        public function SearchActivityReport(Request $request)
        {
            $data = $request->getContent();
            $data = json_decode($data);
            //..    dd($data);
            $SearchActivityReportMod = app(ActivityReportModel::class);
            $response = $SearchActivityReportMod->SearchActivityReport($data);
            if($response == true)
            {
                return ["status" => "Y", "response" => $response];
            }
            else
            {
                return ["status" => "N", "response" => ""];
            }
        }

        public function ChemicalList(Request $request)
        {
            $ChemicalMod = app(ChemicalModel::class);
            $response = $ChemicalMod->ChemicalList();
            //dd($response);
            if($response->status == "Y")
            {
                return View('ChemicalList')->with('ChemicalList', $response->response);
            }
            else
            {
                return redirect()->action('ChemicalController@CreateChemical');
            }
        }


        public function DeleteChemical($chemicalid)
        {
            $ChemicalMod = app(ChemicalModel::class);
            $response = $ChemicalMod->DeleteChemical($chemicalid);

            if($response->status == "Y")
            {
                return redirect()->action('ChemicalController@ChemicalList');
            }
            else
            {
                return redirect()->action('ChemicalController@CreateChemical');
            }
        }


        public function EditPageChemical($chemicalid)
        {
            $StationListObject = app(ChemicalModel::class);
            $response = $StationListObject->EditPageChemical($chemicalid);
            //dd($response);
            if($response->status == "Y")
            {
                return View('EditPageChemical')->with('EditPageChemical', $response->response);
            }
            else
            {
                return redirect()->action('ChemicalController@CreateChemical');
            }
        }

        public function EditChemical(Request $request )
        {
            $StationListObject = app(ChemicalModel::class);
            $response = $StationListObject->EditChemical($request->input());
            //dd($response);
            if($response->status == "Y")
            {
                return redirect()->action('ChemicalController@ChemicalList');
            }
            else
            {
                return redirect()->action('ChemicalController@CreateChemical');
            }
        }

        public function GetLocations(Request $request )
        {
            $data = $request->getContent();
            $data = json_decode($data);
            //dd($data);
            $ActivityReportModelObject = app(ActivityReportModel::class);
            $response = $ActivityReportModelObject->GetLocations($data);
            if(count($response) > 0)
            {
                return ["status" => "Y", "response" => $response];
            }
            else
            {
                return ["status" => "N", "response" => ""];
            }
        }

        public function SearchActivityReportData(Request $request )
        {
            $data = $request->getContent();
            $data = json_decode($data);
            //dd($data);
            $SearchActivityReportDataObject = app(ActivityReportModel::class);
            $response = $SearchActivityReportDataObject->SearchActivityReportData($data);
            if(count($response) > 0)
            {
                return ["status" => "Y", "response" => $response];
            }
            else
            {
                return ["status" => "N", "response" => ""];
            }
        }

        public function SearchActivityReportDataByLocAndStation(Request $request )
        {
            $data = $request->getContent();
            $data = json_decode($data);
            //dd($data);
            $SearchActivityReportDataObject = app(ActivityReportModel::class);
            $response = $SearchActivityReportDataObject->SearchActivityReportDataByLocAndStation($data);
            //dd($response);
            if(count($response) > 0)
            {
                return ["status" => "Y", "response" => $response];
            }
            else
            {
                return ["status" => "N", "response" => ""];
            }
        }
    }