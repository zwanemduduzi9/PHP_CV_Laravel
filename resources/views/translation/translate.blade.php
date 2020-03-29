@extends('layouts.app')
@section('content')
<meta name="csrf-token" content="{{csrf_token()}}"/>
<div class="row justify-content-center">
  <div class="col-sm-12 col-md-12 col-lg-12">
     <div class="card">
         <div class="card-header">
          <div class="card-header"><h3><strong>Translate</strong></h3></div>
         </div>

         <div class="card-body">
           {{Form::open(array('url'=>'/translate','method'=>'Post','id'=>'translateForm'))}}
              <div class="row">
                <div class="col-4">
                  {!!Form::select('fromLanguage',$languages,null,array('placeholder'=>'Please select','class'=>'form-control','required'=>'required'))!!}
                </div>

                <div class=col-4>
                  {!!Form::text('inputed',null,array('placeholder'=>'Enter text','class'=>'form-control selectpicker','required'=>'required'))!!}
                </div>

                <div class="col-4">
                  {!!Form::select('toLanguage',$languages,null,array('placeholder'=>'please select','class'=>'form-control','required'=>'required'))!!}
                </div>
                
              </div>
              <br>
              <div class="row">
                <div class="col">
                  <button class="btn btn-success" style="width: 100%; color:white" type="submit" onclick="tranlation()"><i class="fa fa-plus"></i> translate</button>
                </div>

              </div>
              <br>
              <div class="row">
                <div class="col-4">
                  {!!Form::text('result',null,array('placeholder'=>'Translated Text','class'=>'form-control','id'=>'result'))!!}
                </div>

              </div>


           {{Form::close()}}
         </div>
     </div>
  </div>
</div>










@endsection