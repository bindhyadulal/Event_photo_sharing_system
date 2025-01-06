<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', Arial, sans-serif;
            background: linear-gradient(135deg, #f8eaf7, white);
            color: #6e3b6e;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 28px;
            font-weight: bold;
            color: #6e3b6e;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            font-size: 14px;
            line-height: 1.8;
            color: #333;
            margin-bottom: 20px;
        }

        .form-check {
            margin-top: 20px;
        }

        .btn-accept {
            display: block;
            width: 100%;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #6e3b6e;
            color: white;
            font-size: 14px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-accept:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .btn-accept:hover:not(:disabled) {
            background-color: #8b458b;
        }
    </style>
</head>
<body>
    <div class="container">
        {{-- @dd($storedEvent->id); --}}
        <h1>Terms and Conditions</h1>
        <p>
            By uploading photos to our platform, you confirm that you own the rights to the photos or have permission to share them. 
            You grant us the right to store and display your uploads as part of our services. Content that is inappropriate, violates 
            the rights of others, or breaks any laws is strictly prohibited and may be removed.
        </p>
        <p>
            You are responsible for the content you upload. By checking the box below, you agree to comply with these terms and 
            conditions.
        </p>

        <form id="termsForm" method="GET">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="agreeCheckbox" required>
                <label for="agreeCheckbox" class="form-check-label">I agree to the Terms and Conditions</label>
            </div>
            <button type="submit" class="btn-accept" id="submitButton" disabled>Proceed to Upload</button>
        </form>
    </div>

    <script>
        // Enable the button only when the checkbox is checked
        const checkbox = document.getElementById('agreeCheckbox');
        const button = document.getElementById('submitButton');
        const form = document.getElementById('termsForm');

        checkbox.addEventListener('change', () => {
            button.disabled = !checkbox.checked;
        });

        // Redirect to guest_landing.html when form is submitted
        form.addEventListener('submit', (e) => {
            e.preventDefault(); // Prevent the default form submission
            window.location.href = "{{route('admin.guest')}}?user_id={{$storedEvent->id}}"; // Redirect to the guest landing page
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
