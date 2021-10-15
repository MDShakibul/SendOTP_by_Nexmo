 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Account</title>
    <style>
    .container, .row, .center {
        display: flex;
        justify-content: center;
}
    </style>
</head>
<body>
    <div class="container">
       <div class="row" style="width: 100%;">
          <div class="col-md-6 child" style="margin-top:40px">
            @if(Session::has('message'))
                    <div class="alert alert-danger">{{Session::get('message')}}</div>
            @endif
             <h4>Send OTP number</h4><hr>

                <form action="{{URL::to('/send')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Mobile Number</label>
                        <input type="text" class="form-control" name="phone_number" placeholder="valid mobile number" pattern="[0-1]{2}[3-9]{1}[0-9]{8}" />
                    </div>

                     <div class="form-group">
                        <button type="submit" class="btn btn-primary">send</button>
                    </div>

                </form>

          </div>
       </div>
    </div>



</body>
</html>
