<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Total Record</title>
</head>
<body>
    <table>
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