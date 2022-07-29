<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.scss') }}" rel="stylesheet">

    @vite(['resources/js/app.js'])

    <title>Audibook Assignment</title>
</head>
<body class="bg-black bg-opacity-10">
<div class="px-4 py-3 my-5 text-center bg-white col-5 d-flex flex-column m-auto rounded-4">
    <img class="pt-2 mb-2 justify-content-start" src="{{ asset('img/logo.svg') }}" alt="Site Logo" width="150" height="50">
    <div class="col-10 mx-auto p-3">
        <h1 class="display-6 mx-auto fw-bold">Job Application Form</h1>
        <div class="pt-4 d-sm-flex justify-content-sm-center">
            <form class="col-8 pb-2">
                <div class="text-start">
                    <div class="mb-3">
                        <label for="full_name" class="form-label required">Full Name</label>
                        <input required type="text" name="full_name" class="form-control" id="full_name">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label required">Gender</label>
                        <select required name="gender" class="form-select">
                            <option selected>Choose...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="rather_not_say">I'd rather not say</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label required">Email Address</label>
                        <input required type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label required">Date of birth</label>
                        <input required type="date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label required">Link your CV or LinkedIn</label>
                        <input required type="text" class="form-control">
                    </div>
                </div>
            <button type="submit" action="POST" class="btn btn-primary btn-lg w-50 px-4 ms-auto">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
