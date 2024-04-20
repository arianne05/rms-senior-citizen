<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Total Female Record</title>
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
            <td> <p style="padding:0; margin:0;">Female Registered Senior Citizen Overall Report</p></td>
        </tr>
    </table>

    <br>

    <table class="headerTotal">
        <tbody>
            <tr>
                <td>Total Female: {{$totalFemaleCount}}</td>
                <td>Total PWD: {{$totalPWD}}</td>
            </tr>
            <tr>
                <td>Total Male: NA</td>
                <td>Total Pension: {{$totalPension}}</td>
            </tr>
            <tr>
                <td></td>
                <td>Total Non-Pension: {{$totalNonPension}}</td>
            </tr>
        </tbody>
    </table>

    <br>

        <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Birthdate</th>
                <th>Sex</th>
                <th>Civil Status</th>
                <th>Status Membership</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($totalusers as $senior)  
            <tr>
                <td>{{$senior->firstname.' '.$senior->lastname}}</td>
                <td>{{$senior->birthdate}}</td>
                <td>{{$senior->sex}}</td>
                <td>{{$senior->civil_status}}</td>
                <td>{{$senior->status_membership}}</td>
            </tr>
          @endforeach
        </tbody>
        
    </table>
</body>
</html>

<style>

</style>