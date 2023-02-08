<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeedBack form</title>
    <style>
        #fcf-form {
            display:block;
        }

        .fcf-body {
            margin: 0;
            font-family: -apple-system, Arial, sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
            padding: 30px;
            padding-bottom: 10px;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            max-width: 100%;
        }

        .fcf-form-group {
            margin-bottom: 1rem;
        }

        .fcf-input-group {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-align: stretch;
            align-items: stretch;
            width: 100%;
        }

        .fcf-form-control {
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            outline: none;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .fcf-form-control:focus {
            border: 1px solid #313131;
        }

        select.fcf-form-control[size], select.fcf-form-control[multiple] {
            height: auto;
        }

        textarea.fcf-form-control {
            font-family: -apple-system, Arial, sans-serif;
            height: auto;
        }

        label.fcf-label {
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .fcf-credit {
            padding-top: 10px;
            font-size: 0.9rem;
            color: #545b62;
        }

        .fcf-credit a {
            color: #545b62;
            text-decoration: underline;
        }

        .fcf-credit a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .fcf-btn {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        @media (prefers-reduced-motion: reduce) {
            .fcf-btn {
                transition: none;
            }
        }

        .fcf-btn:hover {
            color: #212529;
            text-decoration: none;
        }

        .fcf-btn:focus, .fcf-btn.focus {
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .fcf-btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .fcf-btn-primary:hover {
            color: #fff;
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .fcf-btn-primary:focus, .fcf-btn-primary.focus {
            color: #fff;
            background-color: #0069d9;
            border-color: #0062cc;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
        }

        .fcf-btn-lg, .fcf-btn-group-lg>.fcf-btn {
            padding: 0.5rem 1rem;
            font-size: 1.25rem;
            line-height: 1.5;
            border-radius: 0.3rem;
        }

        .fcf-btn-block {
            display: block;
            width: 100%;
        }

        .fcf-btn-block+.fcf-btn-block {
            margin-top: 0.5rem;
        }

        input[type="submit"].fcf-btn-block, input[type="reset"].fcf-btn-block, input[type="button"].fcf-btn-block {
            width: 100%;
        }

        .reload {
            font-family: Lucida Sans Unicode
        }
    </style>
</head>

<body>


<div class="fcf-body">

    <div id="fcf-form">
    <h3 class="fcf-h3">Feedback Form</h3>

    <form id="fcf-form-id" class="fcf-form-class" method="post" action="{{ route('feedback.store') }}">@csrf
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>

            @else
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
         @endif
        <div class="fcf-form-group">
            <label for="Name" class="fcf-label">Your name</label>
            <div class="fcf-input-group">
                <input type="text" id="Name" name="name" class="fcf-form-control" required>
            </div>
        </div>

        <div class="fcf-form-group">
            <label for="Email" class="fcf-label">Your email address</label>
            <div class="fcf-input-group">
                <input type="email" id="Email" name="email" class="fcf-form-control" required>
            </div>
        </div>


        <div class="fcf-form-group">
            <label for="Email" class="fcf-label">Your subject</label>
            <div class="fcf-input-group">
                <input type="text" id="Email" name="subject" class="fcf-form-control" required>
            </div>
        </div>

        <div class="fcf-form-group">
            <label for="Message" class="fcf-label">Your message</label>
            <div class="fcf-input-group">
                <textarea id="Message" name="message" class="fcf-form-control" rows="6" maxlength="3000" required></textarea>
            </div>
        </div>

        <div class="form-group mt-4 mb-4">
            <div class="captcha">
                <span>{!! captcha_img() !!}</span>
                <button type="button" class="btn btn-danger" class="reload" id="reload">
                    &#x21bb;
                </button>
            </div>
        </div>
        <div class="form-group mb-4">
            <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
        </div>

        <div class="fcf-form-group">
            <button type="submit" id="fcf-button" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">Send Message</button>
        </div>
    </form>
    </div>

</div>

</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#reload').click(function() {
            $.ajax({
                url: '{{ url("/feedback/reload-captcha") }}',
                type: 'GET',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    });
</script>
</html>
