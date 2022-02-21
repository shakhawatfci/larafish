<!-- build a html form to verify the user with bootstrap 5 css   -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
     rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous">
    <title>Please Verify</title>
</head>
<body>

  <div class="container mt-4">
      <div class="row">
          <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Enter Purchase Code</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('code.verify') }}" method="POST">
                            @csrf
                            <!-- laravel error show  -->
                            <div class="form-group mt-2">
                                <label for="code mb-2">Please Enter Purchase  Code To Continue</label>

                                <input type="text" name="code" id="code" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-primary">Verify</button>
                            </div>
                        </form>
                    </div>
                </div>
          </div>
      </div>
  </div>

</body>
</html>
