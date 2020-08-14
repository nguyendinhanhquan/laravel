<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fullname</th>
                <th>Salary Basic</th>
                <th>Total Time OT</th>
                <th>Salary Month {{$month}}</th>
                <th>Date paid</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->fullname }}</td>
                    <td>{{ number_format($item->basic_salary, 0, ',', '.') }} VND</td>
                    <td>
                        @if ($item->total_time != 0)
                            {{ floor($item->total_time / 60) }} hour
                        @endif
                    </td>
                    <td>{{ number_format($item->basic_salary + floor($item->total_time / 60) * 50000, 0, ',', '.') }}
                        VND
                    </td>
                    <td>
                        {{ date_format(date_create($carbon), 'd-m-Y') }}
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
