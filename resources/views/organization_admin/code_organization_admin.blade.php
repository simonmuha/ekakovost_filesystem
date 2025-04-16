<!-- --------------------------------------------------------------------------------  -->
<!-- ---------------------- Modalno okno --------------------------------------------  -->

<!-- Add Area to Position -->
<div class="modal fade" id="AddMainAreaToPossitionModal" tabindex="-1" role="dialog" aria-labelledby="AddMainAreaToPossitionModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['action' => 'App\Http\Controllers\App\AppSideBarsController@store', 'method' =>'POST', 'enctype'=>'multipart/form-data', 'onsubmit'=>'return validateForm()'] ) !!}
        <input name="app_position_id" type="hidden" value="{{$app_position->id}}"> 
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Dodajte stranski meni k področju</h3>
                    </div>
                </div>
            </div>
            <div class="modal-body" >
                <div class='form-group'>
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::label('app_side_bar_app_area_id ','Stranski meni')}}
                        </div>
                        <div class="col-md-9">
                        <select name="app_side_bar_app_area_id" id="app_side_bar_app_area_id" class="form-control">
                                <option value="" disabled selected>Izberite področje</option>
                                @foreach($app_areas as $areaId => $areaName)
                                    @php
                                        // Določite, če je področje glavno (nima "—" v imenu)
                                        $isSelected = in_array($areaId, $selected_app_areas);
                                    @endphp
                                    <option value="{{ $areaId }}" @if($isSelected) disabled @endif>
                                        {{ $areaName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Zapri</button>
                {{Form::submit('Dodaj stranski meni', ['class' =>'btn btn-primary' ])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
 </div>

<!----------->
 <!-- Main -->
 <a href="#" data-target="#AddMainAreaToPossitionModal" data-toggle="modal"> <i class="fa fa-plus fa-lg icon-menu"></i> </a>





<!-- Preverjanje v kontrollerju ali ima uporabnik profil  -->
return redirect('/users/'. $user->id)
    ->with('error', 'Nimate dostopa'); // Ali katerakoli stran, kamor želiš preusmeriti nepooblaščene uporabnike

$user = Auth::user();
        if (!$user->has_person($person_id)) {
            return redirect()->back()->with('error', 'Nimate pravic. Ni vaš profil.');
        }

public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.user.area:aorgadmin'); // Tukaj specificiraš kodo področja
    }