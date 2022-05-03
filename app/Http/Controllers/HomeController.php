<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\events;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{

    public function index()
    {
        $user_id    = Auth::user()->id;
        $data['events'] = events::where('user_id',$user_id)->get();
        return view('dashboard',$data);
    }


    public function store_event(Request $request)
    {

            $validatedData = $request->validate([
                'title' => 'required|min:4',
            ]);

            Session::flash('message','Title must be atleast 4 characters');
            Session::flash('alert-class','alert-danger');
            return redirect()->back()->withErrors($validator)->withInput();
            
            $event = new events;
            $event->user_id           = Auth::user()->id;
            $event->title             = $request->title;
            $event->start_date        = $request->start_date;
            $event->end_date          = $request->end_date;
            $event->recurrence_time   = $request->recurrence_time;
            $event->recurrence_day    = $request->recurrence_day;
            $event->recurrence_months = $request->recurrence_months;

            $event->save();

            Session::flash('message','Event successfully Added');
            Session::flash('alert-class','alert-success');
            
            return back();
    }

 
    public function delete($id)
    {
        $user_id    = Auth::user()->id;
        $events = events::where('id',$id)
        ->where('user_id',$user_id)
        ->delete();
        Session::flash('message','Event successfully Deleted');
        Session::flash('alert-class','alert-success');
        return back();
    }

    public function edit($id)
    {
        $user_id    = Auth::user()->id;
        $data['event'] = events::where('id',$id)
        ->where('user_id',$user_id)
        ->first();
        return view('updateEvent',$data);
    }


    public function update_event(Request $request)
    {
        
        $validatedData = $request->validate([
            'title' => 'required|min:4',
        ]);

        if ($validatedData->fails()) {
            
            Session::flash('message','Title must be atleast 4 characters');
            Session::flash('alert-class','alert-danger');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user_id    = Auth::user()->id;
        $event = events::where('id',$request->id)
        ->where('user_id',$user_id)
        ->first();

        $event->title             = $request->title;
        $event->start_date        = $request->start_date;
        $event->end_date          = $request->end_date;
        $event->recurrence_time   = $request->recurrence_time;
        $event->recurrence_day    = $request->recurrence_day;
        $event->recurrence_months = $request->recurrence_months;

        $event->save();

        Session::flash('message','Event successfully Updated');
        Session::flash('alert-class','alert-success');
        
        return back();
    }

    public function view($id)
    {
        $user_id    = Auth::user()->id;
        $event = events::where('id',$id)
        ->where('user_id',$user_id)
        ->first();

        $current_date = date('Y-m-d');
        $dates = array();

        if($event['end_date'] >= $current_date){
            $months = $this->getMonthsInRange($event['start_date'],$event['end_date']);
            
            foreach($months as $m=>$v){
                $month = $v['month'];
                $year = $v['year'];
                $newDate = date("Y-m-d", strtotime($event['recurrence_time']." ".$event['recurrence_day']." ".$year."-".$month));
                
                array_push($dates,$newDate);
            }
            
            $data['dates'] = $dates;

        }else{
            $data['dates'] = $dates;
        }

        $data['event'] = $event;

        return view('view',$data);

    }

    function getMonthsInRange($startDate, $endDate)
    {
        $months = array();

        while (strtotime($startDate) <= strtotime($endDate)) {
            $months[] = array(
                'year' => date('Y', strtotime($startDate)),
                'month' => date('m', strtotime($startDate)),
            );

            // Set date to 1 so that new month is returned as the month changes.
            $startDate = date('01 M Y', strtotime($startDate . '+ 1 month'));
        }

        return $months;
    }
}
