<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Upload Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8eaf7, #e0c3fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', Arial, sans-serif;
        }
        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            max-width: 380px;
            width: 100%;
            animation: fadeIn 0.8s ease-in-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .form-container h1 {
            font-size: 22px;
            font-weight: bold;
            color: #6e3b6e;
            text-align: center;
            margin-bottom: 20px;
        }
        .custom-file-upload {
            display: block;
            width: 100%;
            padding: 50px 15px;
            text-align: center;
            border: 2px dashed #ddd;
            border-radius: 12px;
            background-color: #fafafa;
            color: #888;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .custom-file-upload:hover {
            border-color: #8b458b;
            background-color: #f7ecf9;
            color: #6e3b6e;
        }
        .submit-btn {
            background: linear-gradient(45deg, #6e3b6e, #8b458b);
            color: #fff;
            border: none;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .form-label {
            font-weight: bold;
            color: #6e3b6e;
        }
        /*Modal Styling */
        .modal-header {
            background: linear-gradient(135deg, #f8eaf7, #e0c3fc);
            color: #6e3b6e;
            border-bottom: none;
        }
        .modal-title {
            font-weight: bold;
        }
        .modal-body {
            color: #6e3b6e;
            font-size: 16px;
            font-weight: bold;
        }
        .btn-secondary {
            background-color: #6e3b6e;
            color: #fff;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #8b458b;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Let's create lasting memories together!</h1>
        @if(Session::has('status'))
            <p class="alert alert-success">{{Session::get('status')}}</p>
        @endif
        {{-- @dd($storedEvent->name) --}}
        <p class="form-label">Event Organizer: {{ $storedEvent->name }}</p>

        <form id="photoForm" method="POST" action="{{route('guest.uploads')}}" enctype="multipart/form-data">
            @csrf
            <!-- Full Name -->
            <input type="hidden" name="id" value="{{ $storedEvent->id }}">
            <input type="hidden" name="user_name" value="{{ $storedEvent->name }}">
            <div class="mb-3">
                <label for="fullName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="name" placeholder="Enter your full name" required>
            </div>
            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <!-- File Upload -->
            <div class="mb-3">
                <label for="photos" class="form-label">Upload Photos <small>(Best photos)</small></label>
                <label for="photos" class="custom-file-upload">
                    <img src="https://via.placeholder.com/50" alt="Upload Icon" style="margin-bottom: 10px;">
                    <br>Click to upload your <br>10 best shots! 😍
                </label>
                <input type="file" id="photos" name="images[]" multiple class="form-control d-none" accept="image/*">
                <p id="filePreview" class="file-preview"></p>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalMessage">
                    <!-- Validation message-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const form = document.getElementById('photoForm');
        const emailInput = document.getElementById('email');
        const photosInput = document.getElementById('photos');
        const filePreview = document.getElementById('filePreview');
        const modalMessage = document.getElementById('modalMessage');
        const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));

        // Displaying selected file names
        photosInput.addEventListener('change', () => {
            const fileCount = photosInput.files.length;
            if (fileCount > 0) {
                filePreview.textContent = `${fileCount} file(s) selected`;
            } else {
                filePreview.textContent = '';
            }
        });

        // Form submission handler
        form.addEventListener('submit', (event) => {
            const fileCount = photosInput.files.length;

            // Validate email
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) {
                event.preventDefault();
                showModal('Please enter a valid email address.');
                return;
            }

            // Validate photo upload
            if (fileCount > 10) {
                event.preventDefault();
                showModal('You must upload exactly 10 photos.');
                return;
            }
        });

        //custom message
        function showModal(message) {
            modalMessage.textContent = message;
            errorModal.show();
        }
    </script>
</body>
</html>
