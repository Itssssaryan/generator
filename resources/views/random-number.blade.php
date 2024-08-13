<!DOCTYPE html>
<html>

<head>
    <title>Random Number Generator</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <h1>Khasi Lucky Draw: <span id="randomNumber">{{ $randomNumber }}</span></h1>
    <button id="changeButton">Change</button>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('changeButton').addEventListener('click', function() {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch('/generate-number', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('randomNumber').textContent = data.randomNumber;
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
</body>

</html>
