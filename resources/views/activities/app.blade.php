<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GRAS Baza</title>

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap4.min.css" rel="stylesheet"/> 
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <link href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('public/css/sweetalert.css') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Amaranth" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Signika+Negative" rel="stylesheet">

         <!-- jQuery & jQuery UI-->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/themes/smoothness/jquery-ui.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
        
        <!-- JavaScripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script src="{{ URL::asset('public/js/sweetalert.min.js') }}"></script>

        <style>
            .mb {
                margin-top:50px;
            }
            .main {
                display: flex;
                flex-direction: column;
            }
            .filter {
                position: relative;
                display: flex;
                justify-content: center;
                height: 80px;
            }

            /* Table */
            th, td {
                font-family: 'Amaranth', sans-serif;
                vertical-align: middle;
                text-align: center;
            }
            th {
                font-weight: 600;
                height: 50px;
                vertical-align: middle !important;
                background: #ff003f;
                color: white;
            }
            td {
                position: relative;
                height: 50px;
            }
            /* Alert */
            .alert-warning, .alert-success, .alert-danger {
                text-align: center;
                font-family: 'Amaranth', sans-serif;
                font-size: 17px;
            }
            .lnk {
                position: absolute;
                width: 100%;
                height: 100%;
                left: 0;
                top: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                color: black;
            }
            .lnk:hover {
                text-decoration: none;
                color: black;
            }
            .lnk:visited {
                text-decoration: none;
                color: black;
            }
            .rb {
                border-top-left-radius: 15px;
                border-bottom-left-radius: 15px;
            }
            .cont {
                border-top-right-radius: 15px;
                border-bottom-right-radius: 15px;
            }
            .db-table {
                padding-bottom: 50px;
            }
            .a-title {
                text-align: center;
                margin-bottom: 30px;
                font-family: 'Amaranth';
                font-style: italic;
            }
            .goback {
                position: absolute;
                color: black;
                text-decoration: none;
                top: 50px;
                left: 50px;
                font-size: 40px;
                cursor: pointer;
                transition: all 0.2s ease-in-out;
                border: 5px solid black;
                border-radius: 50%;
                padding: 3px;
            }
            .goback:hover {
                background: black;
                color: white;
                text-decoration: none;
            }

        </style>

        <script>
            $(document).ready(function() {

                //Confirm modal for delete
                $('.del').on('click', function(e) {
                    e.preventDefault(); // Prevent the href from redirecting directly
                    var linkURL = $(this).attr("href");
                    warnBeforeRedirect(linkURL);
                });

                function warnBeforeRedirect(linkURL) {
                    swal({
                        title: "Jeste li sigurni?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Ukloni!",
                        closeOnConfirm: false
                    },
                    function(isConfirm){
                        if(isConfirm) {
                           window.location.href = linkURL; 
                        }  
                    });
                }

                $('#term').autocomplete({
                    source: '{{ URL::route('autocomplete') }}',
                    minlenght: 1,
                    autoFocus: true,
                    select: function(e, ui) {
                        $('#term').val(ui.name);
                    }
                });

                $('#auto').autocomplete({
                    source: '{{ URL::route('autocompleteOpg') }}',
                    minlenght: 1,
                    autoFocus: true,
                    select: function(e, ui) {
                        $('#auto').val(ui.name);
                    }
                });

            });
        </script>

    </head>

    <body>
        
        <div class="main-container">

            @yield('content')  

        </div>

    </body>
</html>
