<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class ContentMangement extends Controller
{
    public function index (){
        $tags=Tag::all();
        return view('webcontrol.contentMnagment.index',compact('tags'));
    }
    public function store (Request $request){

    }
    public function update(Request $request, $id)
    {
        $tags = $request->input('selectedTag');
        if (!$tags) {
            $tags = $request->input('selectedTag' . $id);

        }
        $tagsInRequest = array_filter(explode(',', $tags), 'strlen');


        foreach (Tag::whereIn('id', $tagsInRequest)->get() as $tag) {
            $tagOrder = array_filter(explode(',', $tag->order), 'strlen');
            $missingNumbers = array_diff($tagsInRequest, $tagOrder);

            if ( !$tagOrder ) {

                $tag->order = $id;
            } else {

                $tag->order .= ',' . $id;
            }

            $tag->save();
        }

        return response()->json(['status' => 'success']);
    }


public function destroy(Request $request){
    $tagid = $request->input('id');
    $removedTag=$request->input('sectionId');

 $thetag=Tag::find($tagid);
 $TheTagorders=array_filter(explode(',',$thetag->order));
 $neworder='';
foreach ($TheTagorders as $key => $value) {
 if ($value!=$removedTag) {
    $neworder .=',' .$value;
 }
}
if(!$neworder){
    $thetag->order=0;
    $thetag->update();

}else{
    $thetag->order=$neworder;
    $thetag->update();

}


return response()->json(['status' => 'success','neworder'=>$neworder]);

}

}