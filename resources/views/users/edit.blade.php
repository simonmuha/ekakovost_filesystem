@extends('layouts.app_user') 
@section ('content')
{!! Form::open(['action' => ['App\Http\Controllers\UsersController@update', $user->id], 'method' =>'POST', 'enctype'=>'multipart/form-data']) !!}
<div class="row">
    <div class="col-md-12">
        <div class="card user-card">
            <div class="card-header user-card-header">
                <h4>
                    <div class="row"> 
                        <div class="d-flex align-items-center justify-content-between bd-highlight" >
                            <div class="bd-highlight">
                                <h4> 
                                    Prijavni podatki
                                </h4>
                            </div>
                            <div class="bd-highlight">
                            <a href="{{ url()->previous() }}" title="Nazaj">
                                <i class="fa fa-arrow-circle-left fa-lg icon-menu"> </i>
                            </a>
                            </div>
                        </div>
                    </div>
                </h4>
            </div>
        </div>
    </div>
</div>
<br>    

    <div class="row">
        <div class="col-sm-2">
            <div class="card border-0">
                <img class="rounded-image" src="/storage/users/{{$user->user_profile_image}}" alt="Profilna slika" class="card-img-top"> 
                <div class="row">
                    <div class="col-sm-12 text-center">
                        {{ Auth::user()->name }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card user-card">
                        <div class="card-header user-card-header">
                            <h4> 
                                Podatki za prijavo
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row" style="display: flex; justify-content: flex-end">
                            </div>  
                            <table style="width:100%">
                                <tr>
                                    <td>
                                        Vrsta profila: 
                                    </td>
                                    <td>
                                        @if (Auth::user()->user_status==1)
                                            <i class="fa fa-unlock fa-2x" title="Javen profil"></i> Javen profil
                                        @else
                                            <i class="fa fa-lock fa-2x" title="Zaseben profil"></i> Zaseben profil
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        E-naslov: 
                                    </td>
                                    <td>
                                        {{ Auth::user()->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{Form::label('user_name','Ime')}}
                                    </td>
                                    <td>
                                        {{Form::text('user_name',$user->name,['class' =>'form-control', 'placeholder'=>'Ime'])}}
                                    </td>
                                </tr>
                              </table>
                        </div> 
                        <div class="row" style="display: flex; justify-content: flex-end">
                            <div class="col-sm-12" style="display: flex; justify-content: flex-end">
                                {{Form::hidden('_method','PUT')}}
                                {{Form::submit('Shrani prijavne podatke', ['class' =>'btn btn-info' ])}}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <br>
            <div class="card user-card">
                <div class="card user-card">
                    <div class="card-header user-card-header">
                        <h4> 
                        {{ __('Sprememba gesla') }}
                        </h4>
                    </div>
                <form action="{{ route('update-password') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <table style="width:100%">
                            <tr>
                                <td>
                                    <label for="oldPasswordInput" class="form-label">Staro geslo</label>
                                </td>
                                <td>
                                    <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                        placeholder="Staro geslo">
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="newPasswordInput" class="form-label">Novo geslo</label>
                                </td>
                                <td>
                                    <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                        placeholder="Novo geslo">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="confirmNewPasswordInput" class="form-label">Potrditev gesla</label>
                                </td>
                                <td>
                                    <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                        placeholder="Potrdite novo geslo">
                                </td>
                            </tr>
                          </table>
                          <div class="row" style="display: flex; justify-content: flex-end">
                                <div class="col-sm-12" style="display: flex; justify-content: flex-end">
                                    <button class="btn btn-info">Spremeni geslo</button>
                                </div>
                          </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection