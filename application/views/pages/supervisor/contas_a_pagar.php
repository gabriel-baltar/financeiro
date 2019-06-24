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
    <link rel="stylesheet" href="css/style.css">

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

            <div class="container">
                <div class="card">
                    <h3 class="card-header text-dark bg-light">
                        Contas a Pagar
                    </h3>
                    <div class="container">
        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Segmento</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Favorecido</th>
                                    <th scope="col">Observações</th>
                                    <th scope="col">Total Dia</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Aguá</td>
                                    <td>12/05/2019</td>
                                    <td>12/06/2019</td>
                                    <td>Pago</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Telefonia</td>
                                    <td>01/04/2019</td>
                                    <td>01/05/2019</td>
                                    <td>Não pago</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Internet</td>
                                    <td>01/05/2019</td>
                                    <td>01/06/2019</td>
                                    <td>Fatura ainda não Chegou </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>