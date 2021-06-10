<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Question;

class PddController extends Controller
{
    public function getCount(){
    	$tickets = DB::table('questions')->pluck('ticket')->toArray();

    	$tickets = array_values(array_unique($tickets, SORT_REGULAR));

    	return response()->json($tickets, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getTicket($id){
    	$tickets = Question::where('ticket', $id)->get();

    	$result = [];

    	foreach ($tickets as $ticket) {
	    	$temp = [];
	    	$temp['title'] = $ticket->title; 
	    	$temp['question'] = $ticket->question;
	    	$temp['image'] = $ticket->image;
	    	$temp['answer'] = json_decode($ticket->answers);
	    	$temp['tip'] = $ticket->tip;
	    	$temp['topic'] = $ticket->topic;
	    	$result[] = $temp;
    	}

    	return response()->json($result, 200, [], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
