<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MedicalRecord</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/wira.css" rel="stylesheet">
    <link href="css/agency.css" rel="stylesheet">
</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <div class="header_bg" style="font-family:Gill Sans"><!-- start header -->
        <div class="container">
            <div class="row header">
            <nav class="navbar" role="navigation">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="menu nav navbar-nav navbar-right">
                    <li id="profileLink"> <a href="/newPatient">Pasien Baru</a></li>
                    <li id="usersLink"> <a href="/listPatient">Daftar Pasien</a></li>
                    <li id="filesLink"> <a href="/searchPatient">Cari</a></li>
                    <li id="filesLink"> <a href="/">About</a></li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        @yield('content')
    </div>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
