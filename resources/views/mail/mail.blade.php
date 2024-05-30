<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Hello, </p>
        <p>You have received a new quotation:</p>
        <p>Your Total value for quotation: Rs.{{ $quotationData['total_value'] }}</p>
        {{--  <p>{{ $quotation->message }}</p>  --}}

        <p>Please click the link below to accept or reject the quotation:</p>

        {{--  <a href="{{ route('quotation.accept', ['id' => $quotationData['user_id'], 'action' => 'accept']) }}">
            <button>Accept</button>
        </a>

        <a href="{{ route('quotation.reject', ['id' => $quotationData['user_id'], 'action' => 'reject']) }}">
            <button>Reject</button>
        </a>  --}}
        

        <a href="#"><button>Accept</button></a>
        <a href="#"><button>Reject</button></a>
</body>
</html>