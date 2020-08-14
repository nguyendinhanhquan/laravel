
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User list - PDF</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            font-family: DejaVu Sans;
        }
    </style>
</head>
<body>
<div class="container">
	
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fullname</th>
                <th>Salary Basic</th>
                <th>Total Time OT</th>
                <th>Salary Month {{ $month }}</th>
                <th>Date paid</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($data as $item)

                <tr>
                   
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->fullname }}</td>
                    <td>
                        {{ number_format($item->basic_salary, 0, ',', '.') }} VND
                    </td>

                    <td>
                        @if ($item->total_time != 0)
                            {{ floor($item->total_time / 60) }} hour
                        @endif
                    </td>
                  
                    <td>
                        {{ number_format($item->basic_salary + floor($item->total_time / 60) * 50000, 0, ',', '.') }}
                            VND 
                    </td>
                    <td>
                        {{ date_format(date_create($carbon), 'd-m-Y') }}
                    </td>
                </tr>

            @endforeach
        </tbody>

    </table>
</div>
</body>
</html>