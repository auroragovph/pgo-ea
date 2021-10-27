<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        table {
            border-collapse: collapse;
            margin: 0 auto;
        }

        th, tr, td {
            border: 1px solid black;
        }
    </style>
</head>


<body>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>School</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applicants as $applicant)
                <tr>
                    <td>{{ name($applicant->name) }}</td>
                    <td>{{ $applicant->school['name'] }}</td>
                    <td>{{ $applicant->school['address'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>
</html>