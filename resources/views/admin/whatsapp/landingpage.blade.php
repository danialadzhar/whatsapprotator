<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Whatsapp| Eskayviecare</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container mx-auto">
    <div class="row text-center">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow" style="margin-top: 150px;">
                <div class="card-body pr-4 pl-4 pt-5 pb-5">
                    <div class="login-title">
                        <h4>Whatsapp | Brand Name</h4>
                    </div>
                    <div class="login-form mt-4">
                        <form action="{{ url('rotate') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="text" name="name" placeholder="Nama Panggilan Anda" class="form-control" required autofocus>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">+60</span>
                                        </div>
                                        <input type="number" name="phonenumber" class="form-control" placeholder="Nombor Whatsapp Anda" required>
                                    </div>
                                </div>
                            </div>
                            <!--
                            <div class="form-row">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="updatecheck1">
                                        <label class="form-check-label" for="updatecheck1">
                                        <small>By submitting this form you agree to our <a href="#">terms and conditions </a> </small>
                                        
                                        </label>
                                    </div>
                                </div>
                            </div>     
                            -->                   
                            <div class="form-row">
                                <button type="submit" class="btn btn-success btn-block"><i class="fab fa-whatsapp"></i> Whatsapp Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/5c12e9bac7.js" crossorigin="anonymous"></script>
</html>