<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patient Details</title>
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Patient Details</h1>
        <div class="table-responsive">
            <table class="table  table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Gender</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach ($jsonData as $data)
                    <tr class="accordion-row">
                        <td>{{ $data['Name'] }}</td>
                        <td>{{ $data['Surname'] }}</td>
                        <td>{{ $data['Gender'] }}</td>
                        <td><button class="btn btn-primary btn-sm">Details</button></td>
                     </tr>
                    <tr class="accordion-content ">
                        <td>
                            <h4 class="title text-info"><u>Other Informations</u></h4>
                            <strong>Date of Birth:</strong> {{ date("d/m/Y", strtotime($data['DateOfBirth'])) }}<br>
                            <strong>Address:</strong> {{ $data['Address'] }}<br>
                            <strong>Postcode:</strong> {{ $data['Postcode'] }}<br>
                            <strong>Contact Number 1:</strong> {{ $data['ContactNumber1'] }}<br>
                            <strong>Contact Number 2:</strong> {{ $data['ContactNumber2'] }}<br>
                        </td>
                        <td class="td_border">
                            <h4 class="title text-info"><u>Next of Kin</u></h4>
                            @foreach ($data['NextOfKin'] as $nextOfKin)
                            <strong>Name:</strong> {{ $nextOfKin['Name'] }} {{ $nextOfKin['Surname'] }}<br>
                            <strong>Contact Number 1:</strong> {{ $nextOfKin['ContactNumber1'] }}<br>
                            <strong>Contact Number 2:</strong> {{ $nextOfKin['ContactNumber2'] }}<br>
                            <br>
                            @endforeach
                        </td>
                        <td>
                            <h4 class="title text-info"><u>Medical</u></h4>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-lg-3">
                                    <h6><u>Conditions</u></h6>
                                    @foreach ($data['Medical']['Conditions'] as $condition)
                                    <strong>Name:</strong> {{ $condition['Name'] }}<br>
                                    <strong>Notes:</strong> {{ $condition['Notes'] ? $condition['Notes'] : '-' }}<br>
                                    <br>
                                    @endforeach
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-3">
                                    <h6><u>Alergies</u></h6>
                                    @foreach ($data['Medical']['Alergies'] as $allergy)
                                    <strong>Name:</strong> {{ $allergy['Name'] }}<br>
                                    <strong>Notes:</strong> {{ $allergy['Notes'] ? $allergy['Notes'] : '-' }}<br>
                                    <br>
                                    @endforeach
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <h6><u>Medication</u></h6>
                                    @foreach ($data['Medical']['Medication'] as $medication)
                                    <strong>Name:</strong> {{ $medication['Name'] }}<br>
                                    <strong>Notes:</strong> {{ $medication['Notes'] ? $medication['Notes'] : '-' }}<br>
                                    <strong>Start Date:</strong> {{ $medication['StartDate'] ? date("d/m/Y", strtotime($medication['StartDate'])) : '-' }}<br>
                                    <strong>End Date:</strong> {{ $medication['EndDate'] ? date("d/m/Y", strtotime($medication['EndDate'])) : 'Ongoing' }}<br>
                                    <br>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/script.js')}}"></script>
</body>

</html>
