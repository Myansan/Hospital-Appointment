@extends('Doctor.layout.app')
@section('css')
    <style>
        h4 {
            margin: 15px 0;
        }
        .badge
        {
            vertical-align: middle;
        }
    </style>
@endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-content-paste"></i>
            </span> Appointments Detail
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <button type="button" class="btn btn-inverse-primary btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Edit status</button>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <img class="w-100" src="{{ $appointment->doctor->image }}"
                                alt="{{ $appointment->patient->name }}">
                        </div>
                        <div class="offset-md-1 col-md-6 mb-md-3 text-secondary">
                            @php
                                $time_from = date('h:i A', strtotime($appointment->doctorTime->time_from));
                                $time_to = date('h:i A', strtotime($appointment->doctorTime->time_to));
                            @endphp
                            <h3>{{ "$time_from - $time_to / {$appointment->doctorTime->day->name}" }}  {!! getAppointmentStatus($appointment->status) !!}</h3>
                            <h4>Name: {{ $appointment->patient->name }}</h4>
                            @php
                                $age = date_diff(date_create($appointment->patient->date_of_birth), date_create('now'))->y;
                            @endphp
                            <h4>Diagnosis: {{ $appointment->disease->name }}</h4>
                            <h4>Age: {{ $age }}</h4>
                            <h4>Gender: {{ $appointment->patient->gender }}</h4>
                            <h4>Phone: {{ $appointment->patient->phone }}</h4>
                            <h4>Address: {{ $appointment->patient->address }}</h4>
                        </div>
                        <div class="col">
                            <h4>Appointment Note</h4>
                            <p>{{ $appointment->note }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#status_select').niceSelect();
        });
    </script>
@endsection
