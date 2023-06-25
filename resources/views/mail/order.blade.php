
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <h1 class="text-center">Zonex Shop</h1>
        <p style="padding-top: 10px;font-weight: bold;">Order Information</p>
        <table class="table table-bordered table-hover" style="border: 1px solid black;">
            <thead>
                <tr>
                    <th style="border: 1px solid black;">STT</th>
                    <th style="border: 1px solid black;">Name Product</th>
                    <th style="border: 1px solid black;">Color</th>
                    <th style="border: 1px solid black;">Size</th>
                    <th style="border: 1px solid black;">Quantity</th>
                    <th style="border: 1px solid black;">Total Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart->items as $value)
                <tr>
                    <td style="border: 1px solid black;">{{$loop->index + 1}}</td>
                    <td style="border: 1px solid black;">{{$value['name']}}</td>
                    <th style="border: 1px solid black;">{{$value['color']}}</th>
                    <td style="border: 1px solid black;">{{$value['quantity']}}</td>
                    <td style="border: 1px solid black;">{{$value['size']}}</td>
                    <td style="border: 1px solid black;">{{$value['price']*$value['quantity']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p>Please check your order information, if it is wrong, please contact phone number <b>0971888888</b> for support.</p>
        <p>Thank you very much for helping us become the number one brand in the hearts of customers. We could not have achieved this success without you as our customer. Your satisfaction is our number one concern and we promise to always be reliable.</p>
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>

