<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\languageModel;
use App\Http\Model\translateModel;
use Illuminate\Support\Facades\Redirect;
class translateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages=languageModel::pluck('languages','languages')->all();

        return view('translation.translate',compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data              = $request->all();
        $from_language     = substr($data['fromLanguage'],0,2);
        $to_language       = substr($data['toLanguage'],0,2);
        $text_to_translate = $data['inputed'];
      
        $key='AIzaSyADazE6GHdB3h51c4kMMMn9Lt726Vo6Lbc';
        $format=[
            'key'    => $key,
            'source' => $from_language,
            'target' => $to_language,
            'q'      => $text_to_translate
        ];

        $config               = http_build_query($format);
        $url                  = 'https://translation.googleapis.com/language/translate/v2?'.$config;
        $getting_http_request = file_get_contents($url);
        $response             = json_decode($getting_http_request);
        $response_data        = $response->data->translations[0]->translatedText;
        $sendDataToAjax       = ['response_data'=>$response_data];

        $saveDataOject                  = new translateModel();
        $saveDataOject->from_language   = $data['fromLanguage'];
        $saveDataOject->inputed_text    = $data['inputed'];
        $saveDataOject->to_language     = $data['toLanguage'];
        $saveDataOject->results         = isset($response_data) ? $response_data : null;
        $saveDataOject->save();


        return response()->json($sendDataToAjax);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
