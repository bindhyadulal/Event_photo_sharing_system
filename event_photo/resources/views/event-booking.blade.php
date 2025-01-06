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
        <div id="qr-code"></div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script>
{{-- <script>
    document.getElementById('generateQr').addEventListener('click', () => {
        const userId = String("{{$storedEvent->id}}"); // Ensure this is a string
        console.log("User ID:", userId); // Check if the correct ID is passed

        if (!userId) {
            alert("User ID is missing or invalid!");
            return;
        }

        const qrCodeContainer = document.getElementById('qr-code');
        qrCodeContainer.innerHTML = ''; // Clear previous QR code if any

        // Generate QR Code using the user ID
        QRCode.toDataURL(userId, { width: 250, errorCorrectionLevel: 'H' }, function (err, url) {
            if (err) {
                console.error("Error generating QR code:", err);
                return;
            }

            // Create and display the QR Code image
            const img = document.createElement("img");
            img.src = url;
            img.alt = "Generated QR Code";

            // Create a download link for the QR Code
            const downloadLink = document.createElement("a");
            downloadLink.href = url; // Set the image URL as the link href
            downloadLink.download = "event_qr_code.png"; // Set the file name for the downloaded QR code
            downloadLink.innerText = "Download QR Code";

            // Append the image and download link to the container
            qrCodeContainer.appendChild(img);
            qrCodeContainer.appendChild(downloadLink); // Add the download link
        });
    });

</script> --}}
<script>
    document.getElementById('generateQr').addEventListener('click', () => {
    const userId = String("{{$storedEvent->id}}"); // Ensure this is a string
    console.log("User ID:", userId); // Check if the correct ID is passed

    if (!userId) {
        alert("User ID is missing or invalid!");
        return;
    }

    const qrCodeContainer = document.getElementById('qr-code');
    qrCodeContainer.innerHTML = ''; // Clear previous QR code if any

    // Create a dynamic URL for redirection to guest-landing route
    const redirectUrl = `{{ route('admin.guest.terms') }}?user_id=${userId}`; // The URL with user ID as query parameter

    // Generate QR Code using the dynamic URL
    QRCode.toDataURL(redirectUrl, { width: 250, errorCorrectionLevel: 'H' }, function (err, url) {
        if (err) {
            console.error("Error generating QR code:", err);
            return;
        }

        // Create and display the QR Code image
        const img = document.createElement("img");
        img.src = url;
        img.alt = "Generated QR Code";

        // Create a download link for the QR Code
        const downloadLink = document.createElement("a");
        downloadLink.href = url; // Set the image URL as the link href
        downloadLink.download = "event_qr_code.png"; // Set the file name for the downloaded QR code
        downloadLink.innerText = "Download QR Code";

        // Append the image and download link to the container
        qrCodeContainer.appendChild(img);
        qrCodeContainer.appendChild(downloadLink); // Add the download link
    });
});

</script>
@endpush
