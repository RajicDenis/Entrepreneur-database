<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Activity;
use App\Company;
use App\Contact;
use App\Opg;
use App\Opgcontact;
use Session;
use DB;
use Carbon\Carbon;

class ActivityController extends Controller
{
    public function index($id = 1) {

    	$person = Person::all();
        $selected = Person::find($id);

        if($id == 1) {
            
            $activities = Activity::where('people_id', 1)->orderBy('date', 'asc')->get();

        } else {

            $activities = Activity::where('people_id', $id)->orderBy('date', 'asc')->get();
        }


    	return view('activities.main')
    		->with('person', $person)
            ->with('selected', $selected)
    		->with('activities', $activities);
    }

    public function create($id) {

    	return view('activities.create')->with('pid', $id);

    }

    public function store(Request $request) {

    	$this->validate($request, [
                'desc' => 'max:700',
            ]);

    	$activity = new Activity;

    	$activity->desc = $request->desc;
    	$activity->date = date('Y-m-d', strtotime($request->date));
    	$activity->people_id = $request->people_id;

        $lastAct = Activity::where('people_id', $request->people_id)->orderBy('created_at', 'desc')->first();

        $activity->orderNum = $lastAct->orderNum + 1;

    	$activity->save();

        if($request->term != null && $request->term != '') {

            $cid = DB::table('companies')->where('name', $request->term)->value('id');

            $contact = new Contact;

            $contact->company_id = $cid;
            $contact->desc = $request->desc;
            $contact->date = $request->date;

            $contact->save();
        
        }

        if($request->auto != null && $request->auto != '') {

            $oid = DB::table('opgs')->where('name', $request->auto)->value('id');

            $opgcontact = new Opgcontact;

            $opgcontact->opg_id = $oid;
            $opgcontact->desc = $request->desc;
            $opgcontact->date = $request->date;

            $opgcontact->save();

        }

    	Session::flash('added', 'Aktivnost uspješno dodana!');
    	Session::flash('alert_type', 'alert-success');

    	return redirect()->back();

    }

    public function edit($id) {

    	$activity = Activity::find($id);

    	return view('activities.edit')->with('activity', $activity);

    }

    public function update(Request $request) {

    	$activity = Activity::find($request->aid);

    	$activity->desc = $request->desc;
    	$activity->date = date('Y-m-d', strtotime($request->date));

    	$activity->save();

    	Session::flash('added', 'Aktivnost uspješno uređena!');
    	Session::flash('alert_type', 'alert-warning');

    	return redirect()->back();

    }

    public function destroy($id) {

    	$activity = Activity::destroy($id);

    	Session::flash('remove', 'Aktivnost izbrisana!');
        Session::flash('alert_type', 'alert-danger');

    	return redirect()->back();

    }

    public function autocomplete(Request $request) {

        $term = $request->term;
        $data = Company::where('name', 'LIKE', "%".$term."%")->take(10)->get();
        $results=array();

        foreach($data as $key => $v) {

            $results[]=['id' => $v->id, 'value' => $v->name];
        }

        return response()->json($results);

    }

    public function autocompleteOpg(Request $request) {

        $term = $request->term;
        $data = Opg::where('name', 'LIKE', "%".$term."%")->take(10)->get();
        $results=array();

        foreach($data as $key => $v) {

            $results[]=['id' => $v->id, 'value' => $v->name];
        }

        return response()->json($results);

    }

	public function changeOrder(Request $request) {

        $oldIndex = $request->input('old');
        $newIndex = $request->input('new');
        $id = $request->input('id');

        if($oldIndex > $newIndex) {

            $inc = Activity::where('people_id', $id)->where('orderNum', $newIndex)->pluck('id');

            $oldAct = Activity::where('people_id', $id)->where('orderNum', $oldIndex)->first();

            $oldAct->orderNum = $newIndex;
            $oldAct->save();

            Activity::where('people_id', $id)->where('orderNum', $newIndex)->where('id', '!=', $oldAct->id)->increment('orderNum');

            if(($oldIndex - $newIndex) > 1) {
                Activity::where('people_id', $id)->where('orderNum', '>', $newIndex)->where('orderNum', '<', $oldIndex)->where('id', '!=', $inc)->increment('orderNum');
            }
            
        } else {

            $inc2 = Activity::where('people_id', $id)->where('orderNum', $newIndex)->pluck('id');

            $oldAct2 = Activity::where('people_id', $id)->where('orderNum', $oldIndex)->first();
            $oldAct2->orderNum = $newIndex;
            $oldAct2->save();

            Activity::where('people_id', $id)->where('orderNum', $newIndex)->where('id', '!=', $oldAct2->id)->decrement('orderNum');

            if(($newIndex - $oldIndex ) > 1) {
                Activity::where('people_id', $id)->where('orderNum', '>', $oldIndex)->where('orderNum', '<', $newIndex)->where('id', '!=', $inc2)->decrement('orderNum');
            }
        }  
    }
    
    public function resetDates() {

    	$activities = Activity::all();

        foreach($activities as $act) {
            $old = $act->date;
            $pieces = explode('.', $old);
            $new = $pieces[2].'-'.$pieces[1].'-'.$pieces[0];

            $act->date = $new;
            $act->save();

        }

        $activities->save();

    }
    

}
