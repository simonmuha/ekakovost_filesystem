@extends('layouts.app_user')
@section ('content')

{!! Form::open(['action' => ['App\Http\Controllers\UsersController@update_user_home_image', $user->id], 'method' =>'POST', 'enctype'=>'multipart/form-data']) !!}

<div class="row">
    <div class="col-md-12">
        <div class="card user-card">
            <div class="card-header user-card-header">
                <h4> 
                    Urejanje naslovne slike
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img style= "width:100%" src="/storage/users/{{$user->person->person_home_image}}">
                    </div>
                    <div class="col-md-6">
                        <b>Izberite novo sliko:</b><br>
                        <small>Priporočljiva velikost slike je: 1400x400 pt.</small>
                        <br>
                        <div class='form-group'>                            
                            {!! Form::file('user_home_image') !!}
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
    </div>
</div>  

@endsection