<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.scss') }}" rel="stylesheet">

    @vite(['resources/js/app.js'])

    <title>Audibook Assignment</title>
</head>
<body class="bg-black bg-opacity-10">
<div class="px-4 py-3 my-5 text-center bg-white col-5 d-flex flex-column m-auto rounded-4">
    <img class="pt-2 mb-2 justify-content-start" src="{{ asset('img/logo.svg') }}" alt="Site Logo" width="150" height="50">
    <div class="position-relative col-10 mx-auto p-3">
        <h1 class="display-6 mx-auto fw-bold">Job Application Form</h1>
        <div class="pt-4 d-sm-flex justify-content-sm-center">
            <form id="applicationForm" class="col-8 pb-2">
                @csrf
                <div class="text-start">
                    <div class="mb-3">
                        <label for="full_name" class="form-label required">Full Name</label>
                        <input required type="text" name="full_name" class="form-control" id="full_name">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label required">Gender</label>
                        <select required name="gender" id="gender" class="form-select">
                            <option selected>Choose...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="rather_not_say">I'd rather not say</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label required">Email Address</label>
                        <input required type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label required">Date of birth</label>
                        <input required type="date" name="date_of_birth" id="date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label required">Link your CV or LinkedIn</label>
                        <input required type="text" name="link" id="link" class="form-control">
                    </div>
                </div>

                <button id="submitBtn" type="button" class="btn btn-primary btn-lg w-50 px-4 ms-auto">Submit</button>
                <div class="spinner-grow text-primary" id="loading" role="status"></div>
                <div class="alert alert-success m-2" id="successAlert" role="alert">Form sent! Thank you!</div>
                <div class="alert alert-danger m-2" id="errorAlert" role="alert">Form sent! Thank you!</div>
            </form>

        </div>
    </div>
</div>
</body>
</html>
