@extends('layouts.school_admin_master')

@section('content')
<div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
    <nav>
        <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item"><a href="#">E-pošte</a></li>
            <li class="breadcrumb-item active">Urnik</li>
        </ol>
    </nav>
</div>

<div class="card custom-card mt-3">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table text-nowrap">
                <thead>
                    <tr>
                        <th>Ime</th>
                        <th>Urnik</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($app_emails as $app_email)
                        <tr>
                            <td title="{{ $app_email->app_email_description }}">{{ $app_email->app_email_name }}</td>
                            <td>
                                @php
                                    $schedules = $app_email->schedules($school_organization->app_organization->id);
                                @endphp
                                @if ($schedules->isNotEmpty())
                                    @foreach ($schedules->sortBy('app_day_id') as $schedule)
                                        <div class="d-flex align-items-center mb-1">
                                            {{ substr($schedule->day->app_day_name, 0, 1) }}: 
                                            {{ $schedule->app_email_schedule_time ? \Carbon\Carbon::createFromFormat('H:i:s', $schedule->app_email_schedule_time)->format('G:i') : 'Ni določenega časa' }}
                                            <button class="btn btn-sm btn-warning ms-2" data-bs-toggle="modal" data-bs-target="#editScheduleModal{{ $schedule->id }}">Uredi</button>
                                            <button class="btn btn-sm btn-danger ms-1" data-bs-toggle="modal" data-bs-target="#deleteScheduleModal{{ $schedule->id }}">Briši</button>
                                        </div>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editScheduleModal{{ $schedule->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ action('App\Http\Controllers\SchoolAdmin\AppEmailSchedulesController@update', $schedule->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Uredi urnik</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="day" class="form-label">Dan</label>
                                                                <select name="app_day_id" class="form-select">
                                                                    @foreach ($app_days as $day)
                                                                        <option value="{{ $day->id }}" {{ $schedule->app_day_id == $day->id ? 'selected' : '' }}>
                                                                            {{ $day->app_day_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="time" class="form-label">Čas</label>
                                                                <input type="time" name="app_email_schedule_time" class="form-control" value="{{ old('app_email_schedule_time', $schedule->app_email_schedule_time) }}" step="60" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Prekliči</button>
                                                            <button type="submit" class="btn btn-primary">Shrani spremembe</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteScheduleModal{{ $schedule->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ action('App\Http\Controllers\SchoolAdmin\AppEmailSchedulesController@destroy', $schedule->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Potrdi brisanje</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Ste prepričani, da želite izbrisati ta urnik?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger">Izbriši</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Prekliči</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <span class="text-muted">Ni aktivnih urnikov</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addScheduleModal{{ $app_email->id }}">Dodaj urnik</button>
                            </td>
                            <!-- Add Schedule Modal -->
                            <div class="modal fade" id="addScheduleModal{{ $app_email->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ action('App\Http\Controllers\SchoolAdmin\AppEmailSchedulesController@store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="app_email_id" value="{{ $app_email->id }}">
                                            <input type="hidden" name="app_organization_id" value="{{ $school_organization->app_organization->id }}">
                                            
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{ $app_email->app_email_name }} - Dodaj nov urnik</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="day" class="form-label">Dan</label>
                                                <select name="app_day_id" class="form-select" required>
                                                    <option value="" disabled selected>Izberite dan</option>
                                                    @foreach ($app_days as $day)
                                                        <option value="{{ $day->id }}" {{ old('app_day_id') == $day->id ? 'selected' : '' }}>
                                                            {{ $day->app_day_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('app_day_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                                <div class="mb-3">
                                                    <label>Ura:</label>
                                                    <input type="time" name="app_email_schedule_time" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Shrani</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
