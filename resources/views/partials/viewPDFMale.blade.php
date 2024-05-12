<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Total Male Record</title>
</head>

<style>
    .table {
        width: 100%;
        border: 1px solid #000;
        border-collapse: collapse;
    }
    .headerTotal{
        width: 100%;
        /* border: 1px solid #000;
        border-collapse: collapse; */
    }

    .table th, 
    .table td {
        border: 1px solid #000; /* 1px solid black border for table cells */
        padding: 5px;
    }
     /* Style even rows */
     .table tbody tr:nth-child(even) {
        background-color: #f2f2f2; /* Light gray */
    }
    /* Style odd rows */
    .table tbody tr:nth-child(odd) {
        background-color: #fff; /* White */
    }
    
</style>

<body>
    <table style="width: 100%; text-align:center;">
        <tr>
            <td><img src="img/indang.png" width="70" height="70" alt=""></td>
        </tr>
        <tr>
            <td><h4 style="padding:0; margin:0;">OFFICE OF THE SENIOR CITIZEN INDANG</h4></td>
        </tr>
        <tr>
            <td> <p style="padding:0; margin:0;">Male Registered Senior Citizen Overall Report</p></td>
        </tr>
    </table>

    <br>

    <table class="headerTotal">
        @php
            $totalOctogenarian = 0;
            $totalNonagenarian = 0;
            $totalCentenarian = 0;
        @endphp

        @foreach ($totalusers as $senior)  
            @php
                $age = \Carbon\Carbon::parse($senior->birthdate)->age;
                if ($age >= 100) {
                    $totalCentenarian++;
                } elseif ($age >= 90) {
                    $totalNonagenarian++;
                } elseif ($age >= 80) {
                    $totalOctogenarian++;
                }
            @endphp
        @endforeach

        <tbody>
            <tr>
                <td>Total Male: {{$totalMaleCount}}</td>
                <td>Total PWD: {{$totalPWD}}</td>
                <td>Total Octagenarian: {{$totalOctogenarian}}</td>
            </tr>
            <tr>
                <td>Total Female: NA</td>
                <td>Total Pension: {{$totalPension}}</td>
                <td>Total Nonagenarian: {{$totalNonagenarian}}</td>
            </tr>
            <tr>
                <td></td>
                <td>Total Non-Pension: {{$totalNonPension}}</td>
                <td>Total Centenarian: {{$totalCentenarian}}</td>
            </tr>
        </tbody>
    </table>

    <br>

    <table class="table">
        <thead>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Birthdate</th>
                <th>Age</th>
                <th>Sex</th>
                <th>Civil Status</th>
                <th>Status Membership</th>
                <th>Classification</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($totalusers as $senior)  
                <tr>
                    <td>{{$senior->lastname}}</td>
                    <td>{{$senior->firstname}}</td>
                    <td>{{$senior->middlename}}</td>
                    <td>{{$senior->birthdate}}</td>
                    <td>{{ \Carbon\Carbon::parse($senior->birthdate)->age }}</td>
                    <td>{{$senior->sex}}</td>
                    <td>{{$senior->civil_status}}</td>
                    <td>{{$senior->status_membership}}</td>
                    <td>
                        @php
                            $age = \Carbon\Carbon::parse($senior->birthdate)->age;
                            if ($age >= 100) {
                                echo 'Centenarian';
                            } elseif ($age >= 90) {
                                echo 'Nonagenarian';
                            } elseif ($age >= 80) {
                                echo 'Octogenarian';
                            } else {
                                echo 'NA';
                            }
                        @endphp
                    </td>
                </tr>
              @endforeach
        </tbody>

    </table>
</body>
</html>

<style>

</style>