<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>laravel_project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-4">
                    <div class="card form-holder">
                        <div class="card-body">
                            <h1>Two Factor Authentication</h1>

                            @if (Session::has('error'))
                                <p class="text-danger">{{ Session::get('error') }}</p>
                            @endif
                            @if(Session::has('success'))
                                <p class="text-success">{{ Session::get('success')}}</p>
                            @endif
                            <p>OTP has been sent to email</p>
                            <form action="{{ route('twoFactorAuthentication.update',[ 'email' => $email ]) }}" method="post">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label>Enter OTP</label>
                                    <input type="text" name="two_factor_code" class="form-control" placeholder="OTP" />
                                    @if ($errors->has('two_factor_code'))
                                        <p class="text-danger">{{ $errors->first('two_factor_code') }}</p>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-4 text-right">
                                        <input type="submit" class="btn btn-primary" value="Submit" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
