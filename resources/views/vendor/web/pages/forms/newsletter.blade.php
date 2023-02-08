<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter</title>
    <style>
        /* Style the form element with a border around it */
        form {
        border: 4px solid #f1f1f1;
        }

        /* Add some padding and a grey background color to containers */
        .container {
        padding: 20px;
        background-color: #f1f1f1;
        }

        /* Style the input elements and the submit button */
        input[type=text], input[type=email], input[type=submit] {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        }

        /* Add margins to the checkbox */
        input[type=checkbox] {
        margin-top: 16px;
        }

        /* Style the submit button */
        input[type=submit] {
        background-color: #04AA6D;
        color: white;
        border: none;
        }

        input[type=submit]:hover {
        opacity: 0.8;
        }

        .reload {
            font-family: Lucida Sans Unicode
        }
    </style>
</head>
<body>
<form method="POST" action="{{ route('newsletter.store') }}">@csrf
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>

        @else
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
  <div class="container">
    <h2>Subscribe to our Newsletter</h2>
    <p>Lorem ipsum..</p>
  </div>

  <div class="container" style="background-color:white">
    <input type="text" placeholder="Name" name="name" required>
  </div>

  <div class="container" style="background-color:white">
    <input type="email" placeholder="Email" name="email" required>
  </div>

  <div class="container" style="background-color:white">
    <div class="captcha">
        <span>{!! captcha_img() !!}</span>
        <button type="button" class="btn btn-danger" class="reload" id="reload">
            &#x21bb;
        </button>
    </div>
</div>
<div class="container" style="background-color:white">
    <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
</div>

  <div class="container">
    <input type="submit" value="Subscribe">
  </div>
</form>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#reload').click(function() {
            $.ajax({
                url: '{{ url("/newsletter/reload-captcha") }}',
                type: 'GET',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    });
</script>
</html>
