<div class="tab-pane" id="report-tab-pane" role="tabpanel" 
    aria-labelledby="report-tab" tabindex="0">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Potrditveno polje in besedilo -->
        <div class="d-flex align-items-center">
            <input type="checkbox" id="toggle-report-form" class="form-check-input me-2">
            <label for="toggle-report-form" class="fw-medium fs-15 mb-0">Poročilo o službeni poti</label>
        </div>
        
        <!-- Ikona PDF -->
        <a href="" 
        class="btn btn-icon btn-sm btn-primary3-light btn-wave" 
        target="_blank" title="Prenesi PDF">
            <i class="ri-file-pdf-line fs-18"></i> <!-- RemixIcon PDF ikona -->
        </a>
    </div>

    <!-- Skrit obrazec za poročilo -->
    <div id="report-form-container" class="mt-3" style="display: none;">
        {!! Form::model($calendar_event, ['action' => ['App\Http\Controllers\School\SchoolCalendarEventsController@update', $calendar_event->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

            @csrf
            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                <label for="input-label" class="form-label">Datum in čas odhoda</label>
                <div class="row align-items-center mt-2">
                    <div class="col-md-4">
                        
                        <!-- Obrazec za vnos datuma -->
                        <input type="date" name="calendar_event_report_start_date" class="form-control" id="input-date" 
                            value="{{ old('calendar_start_date', date('Y-m-d', strtotime($calendar_event->calendar_event_start_time))) }}">
                        @error('calendar_start_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <input type="time" name="calendar_event_report_start_time" class="form-control" id="input-time" 
                            value="{{ old('calendar_start_time', date('H:i', strtotime($calendar_event->calendar_event_start_time))) }}">
                        @error('calendar_start_time')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Konec dogodka -->
            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                <label for="input-label" class="form-label">Datum in čas prihoda</label>
                <div class="row align-items-center mt-2">
                    <div class="col-md-4">
                        <!-- Obrazec za vnos datuma -->
                        <input type="date" name="calendar_event_report_end_date" class="form-control" id="input-date" 
                            value="{{ old('calendar_end_date', date('Y-m-d', strtotime($calendar_event->calendar_event_end_time))) }}">
                        @error('calendar_end_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <input type="time" name="calendar_event_report_end_time" class="form-control" id="input-time" 
                            value="{{ old('calendar_end_time', date('H:i', strtotime($calendar_event->calendar_event_end_time))) }}">
                        @error('calendar_end_time')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                <label for="input-label" class="form-label">Relacija službene poti:</label>
                <input type="text" class="form-control" id="input" name="calendar_event_report_relation" value="Velenje - {{  $calendar_event->calendar_event_location }} - Velenje">
                @error('calendar_event_report_relation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                <label for="transport" class="form-label">Vozilo:</label>
                    <!-- Spustni seznam za službena vozila -->
                    <select class="form-control mb-3" id="official-vehicle-select" name="calendar_event_report_transport_official" {{ old('personal_vehicle') ? 'disabled' : '' }}>
                        <option value="" >Izberite službeno vozilo</option>
                        @if ($calendar_event->calendar->organization->app_organization->app_organization_parent_id != null)
                            @foreach($calendar_event->calendar->organization->app_organization->parent->vehicles as $vehicle)
                                <option value="{{ $vehicle->registration }}" 
                                    {{ $calendar_event->calendar_event_report_transport_official == $vehicle->registration ? 'selected' : '' }}>
                                    {{ $vehicle->app_vehicle_license_plate	 }}
                                </option>
                            @endforeach
                        @else
                            @foreach($calendar_event->calendar->organization->app_organization->vehicles as $vehicle)
                                <option value="{{ $vehicle->registration }}" 
                                    {{ $calendar_event->calendar_event_report_transport_official == $vehicle->registration ? 'selected' : '' }}>
                                    {{ $vehicle->app_vehicle_license_plate	 }}
                                </option>
                            @endforeach
                        @endif
                    </select>

                <!-- Potrditveno polje za osebno vozilo -->
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="personal-vehicle-checkbox" name="personal_vehicle" {{ old('personal_vehicle') ? 'checked' : '' }}>
                    <label class="form-check-label" for="personal-vehicle-checkbox">Uporaba osebnega vozila</label>
                </div>

                <!-- Polje za vnos registrske številke osebnega vozila -->
                <div id="personal-vehicle-container" style="{{ old('personal_vehicle') ? '' : 'display: none;' }}">
                    <label for="personal-vehicle-registration" class="form-label">Registrska številka osebnega vozila:</label>
                    <input type="text" class="form-control" id="personal-vehicle-registration" name="calendar_event_report_transport_personal" value="{{ $calendar_event->calendar_event_report_transport_personal }}">
                </div>

                <!-- Prikaz napak za validacijo -->
                @error('calendar_event_report_transport_official')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                @error('calendar_event_report_transport_personal')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const personalVehicleCheckbox = document.getElementById('personal-vehicle-checkbox');
                    const personalVehicleContainer = document.getElementById('personal-vehicle-container');
                    const officialVehicleSelect = document.getElementById('official-vehicle-select');

                    // Prikaz ali skrivanje polja za osebno vozilo na podlagi potrditvenega polja
                    personalVehicleCheckbox.addEventListener('change', function() {
                        if (this.checked) {
                            personalVehicleContainer.style.display = 'block'; // Prikaži polje za osebno vozilo
                            officialVehicleSelect.disabled = true; // Onemogoči izbiro službenega vozila
                        } else {
                            personalVehicleContainer.style.display = 'none'; // Skrij polje za osebno vozilo
                            officialVehicleSelect.disabled = false; // Omogoči izbiro službenega vozila
                        }
                    });
                });
            </script>

            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                <label for="input-label" class="form-label">Voznica:</label>
                <input type="text" class="form-control" id="input" name="calendar_event_title" value="{{  $calendar_event->calendar_event_title }}">
                @error('calendar_event_title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                <label for="input-label" class="form-label">Udeleženci:</label>
                <input type="text" class="form-control" id="input" name="calendar_event_title" value="{{  $calendar_event->calendar_event_title }}">
                @error('calendar_event_title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                <label for="input-label" class="form-label">Namen potovanja:</label>
                <input type="text" class="form-control" id="input" name="calendar_event_title" value="{{  $calendar_event->calendar_event_title }}">
                @error('calendar_event_title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>



            <div class="mb-3">
                <label for="report-details" class="form-label">Poročilo</label>
                <textarea class="form-control" id="report-details" name="report_details" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Shrani poročilo</button>
        {!! Form::close() !!}
    </div>

    <script>
        // Prikaz ali skrivanje obrazca na podlagi izbire potrditvenega polja
        document.getElementById('toggle-report-form').addEventListener('change', function() {
            var formContainer = document.getElementById('report-form-container');
            if (this.checked) {
                formContainer.style.display = 'block'; // Prikaže obrazec
            } else {
                formContainer.style.display = 'none'; // Skrije obrazec
            }
        });
    </script>



    
    
</div>