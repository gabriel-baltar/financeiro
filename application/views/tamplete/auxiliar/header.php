<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>RS SOLUÇÕES CORPORATIVAS</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style.css"> //base_url

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper bg-light">
        <!-- Sidebar  -->
        <nav id="sidebar" class="bg-secondary">
            <div class="sidebar-header bg-secondary">
                <h3>RS Soluções</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Opções</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle bg-secondary">Contas</a>
                    <ul class="collapse list-unstyled bg-secondary" id="homeSubmenu">
                        <li>
                            <a class="bg-secondary" href="index.html">Calendário</a>
                        </li>
                        <li>
                            <a class="bg-secondary" href="contas_a_pagar.html">Contas a Pagar</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="bg-secondary" href="convenio.html">Lista de Convênios</a>
                </li>
                <li>
                    <a href="boletos_pagos.html" class="dropdown-toggle bg-secondary">Boletos Pagos</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-secondary">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Olá Administrador</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <h1>RS SOLUÇÕES CORPORATIVAS</h1>
        </div>
    </div>