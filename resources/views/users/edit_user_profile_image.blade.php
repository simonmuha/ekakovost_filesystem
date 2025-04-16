@extends('layouts.app_user')
@section ('content')

{!! Form::open(['action' => ['App\Http\Controllers\UsersController@update_user_profile_image', $user->id], 'method' =>'POST', 'enctype'=>'multipart/form-data']) !!}


<div class="row">
    <div class="col-md-12">
        <div class="card user-card">
            <div class="card-header user-card-header">
                <h4> 
                    Urejanje profilne slike
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img class="rounded-image" src="/storage/users/{{$user->user_profile_image}}">
                    </div>
                    <div class="col-md-8">
                        <b>Izberite novo sliko:</b><br>
                        <small>Priporočljiva velikost slike je: 400x400 pt.</small>
                        <br>
                        <div class='form-group'>                            
                            {!! Form::file('user_profile_image') !!}
                        </div>

                    </div>

                </div>  
                <div class="row">
                    <div class="col-md-12" style="display: flex; justify-content: flex-end">
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('Posodobi sliko', ['class' =>'btn btn-info' ])}}
                        {!! Form::close() !!}
                    </div>

                </div>  
            </div>
        </div>

@endsection