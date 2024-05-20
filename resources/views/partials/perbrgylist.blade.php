<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Total Record</title>
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
</head>
<body>
    <table style="width: 100%; text-align:center;">
        <tr>
            <td><img src="img/indang.png" width="70" height="70" alt=""></td>
        </tr>
        <tr>
            <td><h4 style="padding:0; margin:0;">OFFICE OF THE SENIOR CITIZEN INDANG</h4></td>
        </tr>
        <tr>
            <td> <p style="padding:0; margin:0;">{{$header}}</p></td>
        </tr>
    </table>

    <br>
    
    <h4>Total: {{$totalPerBrgy}}</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Sex</th>
                <th>Birthdate</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
            @if($brgylist)
                @foreach ($brgylist as $brgy)  
                    <tr>
                        <td>{{$brgy->firstname.' '.$brgy->lastname}}</td>
                        <td>{{$brgy->sex}}</td>
                        <td>{{$brgy->birthdate}}</td>
                        <td>
                            {{\Carbon\Carbon::parse($brgy->birthdate)->age}}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">No data found</td>
                </tr>
            @endif
        </tbody>
    </table>
    
</body>
</html>
