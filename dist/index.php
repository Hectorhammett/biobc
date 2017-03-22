<?php
    session_start();
    if (empty($_SESSION['token'])) {
        if (function_exists('mcrypt_create_iv')) {
            $_SESSION['token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
        } else {
            $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
        }
    }
    $token = $_SESSION['token'];
?>
<!doctype html>
<html lang='en' ng-app="app">
    <head>
        <meta charset='utf-8'>
        <title>Grupo Bio</title>
        <meta name='description' content='GrupoBioBC, manifiestos y control de datos'>
        <meta name='author' content='GrupoBioBC'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600|Rufina" rel="stylesheet">
        <script src='index.bundle.js'></script>
        <!--[if lt IE 9]>
            <script src='http://html5shiv.googlecode.com/svn/trunk/html5.js'></script>
        <![endif]-->
    </head>
    <body ng-controller="MainCtrl" scroll>
        <nav class="navbar navbar-default navbar-fixed-top" ng-class="{ 'navbar-large':!shrink }">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="img/logobc.PNG" class="img-responsive"/></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" ng-click="toSection('section-1')">Sobre Nosotros</a></li>
                        <li><a href="#" ng-click="toSection('section-2')">Capacidades</a></li>
                        <li><a href="#" ng-click="toSection('section-3')">Beneficios</a></li>
                        <li><a href="#" ng-click="toSection('section-4')">Paquetes</a></li>
                        <li><a href="#" ng-click="toSection('section-5')">Estoy Interesado</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <section class="section-middle-align" id="section-1">
            <div class="bg-overlay" ng-style="{'filter': 'blur(' + blur + 'px)'}">
            </div>
            <div class="color-overlay">

            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <h1>
                            El Software para el manejo amigable de manifiestos ha llegado.
                        </h1>
                        <h3>
                            <strong>Impresión y digitalización</strong> de manifiestos de manera sencilla e intuitiva.
                            Fácil creación de manifiestos y fácil remanifestado, sin perder tus folios desde cualquier lugar y dispositivo.
                            Sencillo de operar, edita y optimiza tus folios.
                        </h3>
                    </div>
                    <div class="col-sm-5 col-xs-8 col-xs-offset-2 col-sm-offset-0">
                        <img class="img-responsive" src="img/screens.png" />
                    </div>
                </div>
            </div>
        </section>

        <section id="section-2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h1>Bondades del Sistema</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 text-center capacity" ng-repeat="capacity in capacities">
                        <i class="fa fa-5x" ng-class="capacity.icon" aria-hidden="true"></i>
                        <br/>
                        <h3>
                            {{ capacity.text }}
                        </h3>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h1>Beneficios</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <h4 class="text-center">
                            Nuestro sistema ofrece múltiples beneficios para tu empresa y tus clientes, agilizando la producción y la velocidad de captura y creación de manifiestos.
                        <h4>
                        <table class="table">
                            <tr ng-repeat="benefit in benefits">
                                <td class="text-center">{{ benefit }}</td>
                                <td><i class="fa fa-check" aria-hidden="true"></i></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-4">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h1>Paquetes a tu medida</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="panel panel-success">
                            <div class="panel-heading text-center"><h3>Paquete<br class="visible-sm-block"/> Micro</h3></div>
                            <div class="panel-body text-center">
                                50 Manifiestos<br>
                                $4.50 MXN por manifiesto extra<br/>
                                2 Usuarios

                                <h1 class="text-success">$1950.00 MXN/mex</h3>
                            </div>
                        </div>                    
                    </div>

                    <div class="col-sm-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading text-center"><h3>Paquete Mediano</h3></div>
                            <div class="panel-body text-center">
                                200 Manifiestos<br>
                                $3.50 MXN por manifiesto extra<br/>
                                3 Usuarios

                                <h1 class="text-warning">$2400.00 MXN/mex</h3>
                            </div>
                        </div>                    
                    </div>

                    <div class="col-sm-4">
                        <div class="panel panel-danger">
                            <div class="panel-heading text-center"><h3>Paquete Empresarial</h3></div>
                            <div class="panel-body text-center">
                                400 Manifiestos<br>
                                $1.00 MXN por manifiesto extra<br/>
                                5 Usuarios

                                <h1 class="text-danger">$2850.00 MXN/mex</h3>
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
        </section>

        <section id="section-5">
            <div class="bg-overlay" ng-style="{ 'filter': 'blur(' + bottomBlur + 'px)' }">
            </div>
            <div class="color-overlay">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1>Contacto</h1>
                    </div>
                    <div class="col-sm-6">
                        <small style="color: #fff">(Todos los campos son obligatorios)</small>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" ng-model="message.nombre" ng-disabled="sent"/>
                        </div>
                        <div class="form-group">
                            <label>Empresa</label>
                            <input type="text" class="form-control" ng-model="message.empresa" ng-disabled="sent"/>
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="text" class="form-control" ng-model="message.correo" ng-disabled="sent"/>
                        </div>
                        <div class="form-group">
                            <label>Tipo de Paquete</label>
                            <select class="form-control" ng-model="message.paquete" ng-disabled="sent">
                                <option>Micro</option>
                                <option>Mediano</option>
                                <option>Empresarial</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Comentarios</label>
                            <textarea class="form-control" rows="5" ng-model="message.comentarios" ng-disabled="sent"></textarea>
                        </div>
                        <input type="hidden" ng-model="message.token" ng-init="message.token = '<?php echo $token ?>'"/>
                        <div class="form-group">
                            <div class="alert alert-danger" ng-if="errors.length > 0">
                                <p>
                                    {{ errors }}
                                </p>
                            </div>
                            <div class="alert alert-info" ng-if="sent">
                                {{ successMessage }}
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" ng-click="sendMessage()" ng-disabled="avoidEmpty() || sent">Enviar <i class="fa fa-circle-o-notch fa-spin" ng-if="sending" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h3>Sin Compromiso</h3>
                        <p>
                            Al enviarnos un correo, nos pondremos en contacto. Si estás interesado, sólo llena la forma para contactarnos de manera rápida y sencilla. Una vez enviado el correo, nosotros nos comunicaremos para confirmar el acceso al sistema.
                        </p>
                        <h3>¿Qué necesito?</h3>
                        <p>
                             <i class="fa fa-user" aria-hidden="true"></i> Un nombre de Usuario
                        </p>
                        <p>
                             <i class="fa fa-building" aria-hidden="true"></i> El nombre de la empresa
                        </p>
                        <p>
                             <i class="fa fa-envelope-o" aria-hidden="true"></i> Correo del Administrador del sistema
                        </p>
                        <p>
                             <i class="fa fa-lock" aria-hidden="true"></i> Nombre completo del administrador
                        </p>
                        <p>
                             <i class="fa fa-key" aria-hidden="true"></i> Contraseña
                        </p>
                        <p>
                            Esta información es necesaria para brindarte el acceso en línea y contacto
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <div class="container">
                <div class="col-sm-12 text-center">
                    <h4>
                        Grupo Bio-Bc
                        <br/>
                        contacto@grupobiobc.com
                        <br/>
                        Todos los derechos reservados &copy;.
                    </h4>
                </div>
            </div>
        </footer>

    </body>
</html>