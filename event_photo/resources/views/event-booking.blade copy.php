@extends('layouts.app')
@section('content')
<div class="main-content">
    <div class="header">
        <h1 class="header-title">Share Your Event Moments</h1>
        <p class="header-subtitle">Capture and share memories instantly with our QR-based photo sharing system</p>
    </div>

    <!-- Data Display Section -->
    <div class="data-display">
        <h2>Event Data</h2>
        <p><strong>User ID:</strong> {{$storedEvent->id}}</p>
        <div id="eventDetails">
            <p><strong>Name:</strong> {{$storedEvent->name}}</p>
            <p><strong>Email:</strong> {{$storedEvent->email}}</p>
            <p><strong>Date:</strong> {{$storedEvent->event_date}}</p>
            <p><strong>Event Type:</strong> {{$storedEvent->event_type}}</p>
        </div>
        <div class="qr-button">
            <button id="generateQr">Generate QR Code</button>
        </div>
    </div>
    {{-- {{$storedEvent->name}} --}}
</div>
@endsection

