@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />



<style>

.card > .card-header + .list-group,
.card > .list-group + .card-footer {
  border-top: 0;
}

.card-header {
  padding: 0.5rem 1rem;
  margin-bottom: 0;
  color: var(--cui-card-cap-color, unset);
  background-color: var(--cui-card-cap-bg, rgba(0, 0, 21, 0.03));
  border-bottom: 1px solid var(--cui-card-border-color, rgba(0, 0, 21, 0.125));
}
.card-header:first-child {
  border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}

.card-header-tabs {
  margin-right: -0.5rem;
  margin-bottom: -0.5rem;
  margin-left: -0.5rem;
  border-bottom: 0;
}

.card-header-pills {
  margin-right: -0.5rem;
  margin-left: -0.5rem;
}

  .card-group > .card:not(:last-child) .card-img-top,
.card-group > .card:not(:last-child) .card-header {
    border-top-right-radius: 0;
  }

  .card-group > .card:not(:first-child) .card-img-top,
.card-group > .card:not(:first-child) .card-header {
    border-top-left-radius: 0;
  }
  .vl {
  border-left: 2px solid green;
  height: 500px;
}

</style>



@if ($person != null)
    <div class="row">
        <div class="col-md12 col-sm-12">
            
            <div class="img-edit">
            </div>
        </div>
    </div>
@endif

<div class="row">
    <div class="col-md-2">
            <div class="card"> 
                <div class="row">
                    <div class="col-md12 col-sm-12">
                            <div class="img-edit">
                                <img style= "width:100%" src="/storage/users/{{$user->user_profile_image}}">
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                    </div>
                </div>
            </div>
            <br>
        
    </div>
    <div class="col-md-10">
        <div class="vl">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                      <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                          <div class="card-icon">
                            <a href="http://myq.test/quality/systems" title="Sistemi kakovosti"><i class="fa fa-building fa-2x"></i></a>
                          </div>
                          <h3 class="card-title">Sistemi</h3>
                        </div>
                          <h3 class="card-body">
                            <div class="row">
                              
                              @foreach ($quality_systems as $quality_system)
                                <div class="col-md-6 col-sm-6">
                                  <a href="/quality/systems/{{$quality_system->id}}" title="{{$quality_system->quality_system_name}}">
                                      <img class="card-img-top" src="/storage/quality/systems/{{$quality_system->quality_system_image}}" alt="Ikone">
                                  </a>
                                </div>
                              @endforeach
                            </div>
                          </h3>

                        <div class="card-footer">
                          <div class="stats">
                            <i class="material-icons text-danger">warning</i>
                            <a href="http://myq.test/quality/systems">Poglej sisteme</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                      <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                          <div class="card-icon">
                            <i class="material-icons">store</i>
                          </div>
                          <p class="card-category">Revenue</p>
                          <h3 class="card-title">$34,245</h3>
                        </div>
                        <div class="card-footer">
                          <div class="stats">
                            <i class="material-icons">date_range</i> Last 24 Hours
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                      <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                          <div class="card-icon">
                            <i class="material-icons">info_outline</i>
                          </div>
                          <p class="card-category">Fixed Issues</p>
                          <h3 class="card-title">75</h3>
                        </div>
                        <div class="card-footer">
                          <div class="stats">
                            <i class="material-icons">local_offer</i> Tracked from 
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                      <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                          <div class="card-icon">
                            <i class="fa fa-twitter"></i>
                          </div>
                          <p class="card-category">Followers</p>
                          <h3 class="card-title">+245</h3>
                        </div>
                        <div class="card-footer">
                          <div class="stats">
                            <i class="material-icons">update</i> Just Updated
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <hr>
        </div>
    </div>
</div>


@endsection
