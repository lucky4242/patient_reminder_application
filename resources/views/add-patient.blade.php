<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            background-color: #f0f2f5;
            font-family: "Poppins", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .main-con {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-top: 5rem;

        }

        .right-con {
            margin-right: 40px;
            width: 100%;
        }

        .right-con input {
            width: 100%;
            padding: 8px;
            border-radius: 10px;
            margin-bottom: 22px;
            border: 1px solid #999;
            outline: none;
        }

        .right-con input::placeholder {
            font-size: 11px;
        }

        .right-con h1 {
            font-size: 33px;
            margin-top: -25px;
            color: #0079ff;
        }

        .small-div {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .small-div input {
            width: 90%;
        }

        label {
            display: flex;
            font-weight: 300;
            font-size: 15px;
        }

        .sign-btn button {
            width: 105%;
            background-color: #fff;
            color: #0079ff;
            border: 1px solid #0079ff;
            border-radius: 10px;
            font-size: 18px;
            padding: 3px 8px;
            margin-top: 20px;
            transition: 0.3s;
        }

        .sign-btn button:hover {
            background-color: #0079ff;
            color: #fff;
        }
    </style>
</head>

<body class="antialiased">
    <div class="main-con">
        <div class="login-con">
            <div class="right-con">
                <h1>Patient Reminder Form</h1>
                @if ($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (session('success'))
                <div style="color: green;">
                    {{ session('success') }}
                </div>
                @endif
                <form action="/add-patient" method="post">
                    <!-- <form action="/send-medication-reminders" method="post"> -->
                    @csrf
                    <label>Full name</label>
                    <input type="text" placeholder="Enter full name" name="name" />

                    <div class="small-div">
                        <div class="phone">
                            <label>Phone_Number</label>
                            <input type="number" placeholder="Enter phone number" name="phone_number" />
                        </div>
                        <div class="address">
                            <label>Email</label>
                            <input type="email" placeholder="Enter email address" name="email" />

                        </div>
                    </div>

                    <div class="small-div">
                        <div class="gender">
                            <label>Gender</label>
                            <select id="gender" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="Others">
                            <label for="appt">Medication Time:</label>

                            <input type="time" name="reminder_time" required />
                        </div>
                    </div>
                    <label>Drugs </label>
                    <input type="text" placeholder="Enter the Drugs" name="drug_name" />

                    <label>Drugs Description</label>
                    <input type="text" placeholder="Enter Drug Dosage" name="dosage" />

                    <div class="sign-btn">
                        <a href="google-page.html">
                            <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
        <!-- <a href="{{ route("send-medication-reminders") }}">Send Medication Reminders</a> -->

    </div>
</body>

</html>