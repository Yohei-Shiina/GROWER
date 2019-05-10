<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bucket;
use Illuminate\Support\Facades\Input;

class BucketsController extends Controller
{
    public function index()
    {
        $buckets = Bucket::all();

        return view('buckets.index')->with('buckets', $buckets);
    }
    
    public function store(Request $request)
    {
        Bucket::create([
            "wish" => $request->wish,
            "status" => "0",
        ]);
        return redirect('/buckets');
    }

    
    public function postForm($id)
    {
        if(Input::get('change')){
            $this->update($id);

        }elseif (Input::get('delete')){
            $this->destroy($id);
        }
        return redirect('/buckets');
    }

    public function update($id)
    {
        $wish = Bucket::find($id);

        if($wish->status == false){
            $wish->update(array('status' => true));

        }else{
            $wish->update(array('status' => false));
        }
    }

    public function destroy($id) {
        Bucket::destroy($id);
    }

}
