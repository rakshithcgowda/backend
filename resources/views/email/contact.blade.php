<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Email</title>
</head>
<body>
    <h2> you have received enquiry</h2>
    <p>Name: {{ $mailData['name'] }}
        <br>
        Email: {{ $mailData['email'] }}
        <br>
        Location: {{ $mailData['location'] }}
        <br>
        Phone: {{ $mailData['phone'] }}

        <p>Thanks</p>
    </p>
</body>
</html>