<?php

use Illuminate\Support\Facades\Auth;

$user = Auth::user();
$person = $user->active_person; 
$school_year = $person->school_organization_year_current;
$user_school_active = $user->active_organization->school;

$school_organization_people = $school_year->people; 