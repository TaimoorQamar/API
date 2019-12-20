@extends('layouts.app')
 
@section('content')
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 mr-auto ml-auto mt-5">
        <h3 class="text-center">
            Videos
        </h3>
        
        @foreach($videos as $video)
            <div class="row mt-5">
                <div class="video" >
                    <div class="title">
                        <h4>
                            {{$video->title}}
                        </h4>
                    </div>
                   
                         <source src="{{$video->videos}}" type='video/mp4'></source>

                        <div class="alert alert-info w-100">
                             Video is currently being processed and will be available shortly
                        </div>
                  
                </div>
            </div>
        @endforeach
    </div>
@endSection