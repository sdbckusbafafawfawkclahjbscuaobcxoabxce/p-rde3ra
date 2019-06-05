{{-- /**
* Created by gilasweb.ir.
* User: paydar / sayed sajjad aleemohaammad (aleemohammad.ir)
* Date: 1/23/2019
* Time: 4:00 AM
*/ --}}

@if(admin_access(['09163151967','09161145220'],Auth::user()->status,Auth::user()->phone))
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        داشبورد مدیریت - GL5/1.0
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
    <meta name=theme-color content="#E00E01"/>
    <link rel="icon" href="{{(isset($generalinfo[6]->value) && strlen($generalinfo[6]->value)>0)? $generalinfo[6]->value :'/defaultassets/img/theme_gilasweb_ir/fv.png'}}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link href="/adminassets/css/material-dashboard.css?v=2.1.0" rel="stylesheet"/>
    <link href="/adminassets/css/material-dashboard-rtl.css?v=1.1" rel="stylesheet"/>
    <script src="/adminassets/js/core/jquery.min.js" type="text/javascript"></script>
</head>
<body class="IRANSans persianumber">
<div class="wrapper ">
@if(count($errors))
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <div class="alert alert-danger text-right IRANSans" role="alert">
                    @foreach($errors->all() as $error)
                        <strong>{{ $error }}</strong> - <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
@yield('content')
</div>
    <!--   Core JS Files   -->
    <script src="/adminassets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="/defaultassets/js/persianumber.min.js"></script>
    <script src="/adminassets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="/adminassets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Chartist JS -->
    <script src="/adminassets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="/adminassets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/adminassets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script>
        function openWin(content)
        {
            myWindow=window.open('','','width=695,height=820');
            myWindow.document.write('<div dir="rtl" class="pt-2 text-right">'+content+'</div><br>');
            myWindow.document.close(); //missing code
            myWindow.focus();
            myWindow.print();
        }
        $(document).ready(function (){

            $('.persianumber').persiaNumber();

        });
        $(document).ready(function () {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

        });
        $(document).ready(function () {
            setTimeout(function () {
                $('.mce-close').click();
                $('.mce-close').trigger('click');
            },3000)
        });
    </script>
</body>
</html>
@else
    <?php
    $actual_link ="http://$_SERVER[HTTP_HOST]";
    exit(redirect($actual_link));
    ?>
@endif