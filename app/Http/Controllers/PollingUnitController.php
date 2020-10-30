<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PollingUnits;
use App\Models\Announced_Pu_results;
use App\Models\LGA;
use App\Models\Party;
use Illuminate\Support\Facades\Redirect;

class PollingUnitController extends Controller
{
    //
    public function view_page(){
        $polling_units = PollingUnits::where('polling_unit_id','!=','0')->paginate(10);
        // echo($polling_units);
        $data = [
            'polling_units' => $polling_units
        ];

        return view('polling_units.view')->with($data);
    }

    public function get_results($uniqueid){
        // echo $uniqueid;
        $announced_pu_results = Announced_Pu_results::where('polling_unit_uniqueid',$uniqueid)->get();
        $party_and_result = [];
        // return $announced_pu_results;
        foreach($announced_pu_results as $item){
            array_push($party_and_result,['party_name' => $item->party_abbreviation, 'party_score' => $item->party_score]);
        }
        $polling_unit = PollingUnits::where('uniqueid' , $uniqueid)->get();
        // json_decode($party_and_result);
        return response()->json([
            'polling_unit' => $polling_unit,
            'party_and_result'=>json_encode($party_and_result)
        ]);
    }

    public function all_results_view(){
        $lga = LGA::all();
        $data = [
            'lga' => $lga,
        ];
        return view('polling_units.results')->with($data);

    }

    public function results(Request $request){
        $lga = $request->input('lga');
        // $lga = LGA::all();
    
        $polling_unit_results = PollingUnits::where('lga_id', $lga)
        ->select('polling_unit.uniqueid')
            ->join('announced_pu_results', 'polling_unit.uniqueid', '=', 'announced_pu_results.polling_unit_uniqueid')
           ->sum('announced_pu_results.party_score');
        
        // return($polling_unit_results);
        
        return response()->json([
            // 'lga' => $lga,
            'results' => $polling_unit_results
        ]); 
    }

    public function save_page(){
        $party = Party::all();
        $polling_unit = PollingUnits::all();
        return view('polling_units.save_page')->with(['party'=>$party,'polling_unit' => $polling_unit]);

    }
    public function save(Request $request){

        $data = $request->all();

        // sorry i didnt do validation 

        // `result_id`, `polling_unit_uniqueid`, `party_abbreviation`, 
        //         `party_score`, `entered_by_user`, `date_entered`, `user_ip_address

        $polling_unit_uniqueid = $request->input('polling_unit_uniqueid');

        $party_abbreviation = $request->input('party_abbreviation');

        $party_score = $request->input('party_score');

        $entered_by_user = $request->input('entered_by_user');
        
        $date_entered = date("Y-m-d H:i:s");

        $user_ip_address = $_SERVER['REMOTE_ADDR'];

        $new_record = new Announced_Pu_results;

        $new_record->polling_unit_uniqueid = $polling_unit_uniqueid;

        $new_record->party_abbreviation = $party_abbreviation;

        $new_record->party_score = $party_score;

        $new_record->entered_by_user = $entered_by_user;

        $new_record->date_entered = $date_entered;

        $new_record->user_ip_address = $user_ip_address;


        if($new_record->save()){
            return back()->with('success','Saved Successfully');
        };

    }
}
