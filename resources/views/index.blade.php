<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patient Details</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">

</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="header">
                    Patient
                </div>
                <div class="panel-body">
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Gender</th>
                                <th>Details</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($jsonData as $data)
                                <tr data-toggle="collapse" data-target="#demo{{ $data['Id'] }}"
                                    class="accordion-toggle">
                                    <td>{{ $data['Id'] }}</td>
                                    <td>{{ $data['Name'] }}</td>
                                    <td>{{ $data['Surname'] }}</td>
                                    <td>{{ $data['Gender'] }}</td>
                                    <td><button class="btn btn-primary btn-sm">Details</button></td>
                                </tr>

                                <tr>
                                    <td colspan="6" class="hiddenRow">
                                        <div id="demo{{ $data['Id'] }}" class="accordian-body collapse">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12 col-lg-3">
                                                    <h4 class="title text-info"><u>Other Informations</u></h4>
                                                    <strong>Date of Birth:</strong>
                                                    {{ date('d/m/Y', strtotime($data['DateOfBirth'])) }}<br>
                                                    <strong>Address:</strong> {{ $data['Address'] }}<br>
                                                    <strong>Postcode:</strong> {{ $data['Postcode'] }}<br>
                                                    <strong>Contact Number 1:</strong>
                                                    {{ $data['ContactNumber1'] }}<br>
                                                    <strong>Contact Number 2:</strong>
                                                    {{ $data['ContactNumber2'] }}<br>
                                                </div>


                                                <div class="col-md-6 col-sm-12 col-lg-3">
                                                    <h4 class="title text-info"><u>Next of Kin</u></h4>
                                                    @foreach ($data['NextOfKin'] as $nextOfKin)
                                                        <strong>Name:</strong> {{ $nextOfKin['Name'] }}
                                                        {{ $nextOfKin['Surname'] }}<br>
                                                        <strong>Contact Number 1:</strong>
                                                        {{ $nextOfKin['ContactNumber1'] }}<br>
                                                        <strong>Contact Number 2:</strong>
                                                        {{ $nextOfKin['ContactNumber2'] }}<br>
                                                        <br>
                                                    @endforeach
                                                </div>
                                                <div class="col-md-6 col-sm-12 col-lg-3">
                                                    <h4 class="title text-info"><u>Medical</u></h4>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12 col-lg-12">
                                                            <h6><u>Conditions</u></h6>
                                                            @foreach ($data['Medical']['Conditions'] as $condition)
                                                                <strong>Name:</strong> {{ $condition['Name'] }}<br>
                                                                <strong>Notes:</strong>
                                                                {{ $condition['Notes'] ? $condition['Notes'] : '-' }}<br>
                                                                <br>
                                                            @endforeach
                                                        </div>
                                                        <div class="col-md-6 col-sm-12 col-lg-12">
                                                            <h6><u>Alergies</u></h6>
                                                            @foreach ($data['Medical']['Alergies'] as $allergy)
                                                                <strong>Name:</strong> {{ $allergy['Name'] }}<br>
                                                                <strong>Notes:</strong>
                                                                {{ $allergy['Notes'] ? $allergy['Notes'] : '-' }}<br>
                                                                <br>
                                                            @endforeach
                                                        </div>
                                                        <div class="col-md-6 col-sm-12 col-lg-12">
                                                            <h6><u>Medication</u></h6>
                                                            @foreach ($data['Medical']['Medication'] as $medication)
                                                                <strong>Name:</strong> {{ $medication['Name'] }}<br>
                                                                <strong>Notes:</strong>
                                                                {{ $medication['Notes'] ? $medication['Notes'] : '-' }}<br>
                                                                <strong>Start Date:</strong>
                                                                {{ $medication['StartDate'] ? date('d/m/Y', strtotime($medication['StartDate'])) : '-' }}<br>
                                                                <strong>End Date:</strong>
                                                                {{ $medication['EndDate'] ? date('d/m/Y', strtotime($medication['EndDate'])) : 'Ongoing' }}<br>
                                                                <br>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="footer">
                    <span class="firm">
                        <a href="https://extratik.com">Extratik</a>
                    </span>
                    <span class="dev">
                        Ahmet CAN
                    </span>
                </div>
            </div>

        </div>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
</body>

</html>
