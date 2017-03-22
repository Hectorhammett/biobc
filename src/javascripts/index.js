require('../index.html');
require('bootstrap-sass/assets/stylesheets/_bootstrap.scss');
require('../css/custom.scss');
require('../css/custom.css');
require('font-awesome/css/font-awesome.css');
var angular = require('angular');
var smoothScroll = require('angular-scroll');
require('bootstrap-sass');

var app = angular.module("app",['duScroll']);

app.controller("MainCtrl",function($scope, $document, $http){
    $scope.shrink = false;
    $scope.blur = 4;
    $scope.bottomBlur = 15;
    $scope.grow = 1.03;
    $scope.offset = 0;
    $scope.sent = false;
    $scope.message = {
        nombre: "",
        empresa: "",
        correo: "",
        paquete: "",
        comentarios: "",
        token: ""
    };
    $scope.errors = "";
    $scope.successMessage = "";
    $scope.sending = false;

    $scope.capacities = [
        {
            icon:"fa-mobile",
            text:"La capacidad de crear y consultar manifiestos sobre la marcha."
        },
        {
            icon:"fa-file",
            text:"Reportes anuales o personalizados para clientes o distintos tipo de necesidades."
        },
        {
            icon:"fa-print",
            text:"Impresión y digitalizaciYn de manifiestos de manera sencilla e intuitiva."
        },
        {
            icon:"fa-pencil",
            text:"Fácil creación de manifiestos y fácil remanifestado, sin perder rótulos."
        },
        {
            icon:"fa-sort-numeric-asc",
            text:"Mantener el registro de cuántos manifiestos en el rango asignado por el gobierno se han utilizado."
        },
        {
            icon:"fa-lock",
            text:"Control administrativo y creación de distintos usuarios con permisos para un control de la cuenta."
        }
    ]
    $scope.benefits = ["Digitalización de documents","Reportes inmediatos","Reportes Pre-establecidos y Personalizables","Fácil edición y creación de manifiestos","Múltiples cuentas de usuarios","Respaldo en la nube"]

    $scope.toSection = function(id) {
        var section = document.getElementById(id);
        $document.scrollToElementAnimated(section,55,500,EasingFunctions.easeInOutCubic);
    }

    $scope.sendMessage = function(){
        $scope.sending = true;
        $scope.errors = "";
        $http.post('mail.php', $scope.message).then(function(response){
            $scope.successMessage = response.data;
            $scope.sent = true;
            $scope.sending = false;
        })
        .catch(function(err){
            $scope.errors = err.data;
            $scope.sending = false;
        })
    }

    $scope.avoidEmpty = function(){
        for( var prop in $scope.message )
            if($scope.message[prop] === "")
                return true;
        return false;
    }
})

app.directive("scroll", function ($window) {
    return function(scope, element, attrs) {
        angular.element($window).bind("scroll", function() {
            scope.blur = 4 + (pageYOffset / 30);
            scope.blur = (scope.blur > 20) ? 20 : scope.blur;
            scope.bottomBlur = 2 + (((document.body.scrollHeight - pageYOffset) - window.innerHeight) / 30);
            scope.bottomBlur = (scope.bottomBlur > 20) ? 20 : scope.bottomBlur;
            if (this.pageYOffset >= 1) {
                scope.shrink = true;
            } else {
                scope.shrink = false;
            }
            scope.$apply();
        });
    };
});

/*
 * Easing Functions - inspired from http://gizma.com/easing/
 * only considering the t value for the range [0, 1] => [0, 1]
 */
EasingFunctions = {
  // no easing, no acceleration
  linear: function (t) { return t },
  // accelerating from zero velocity
  easeInQuad: function (t) { return t*t },
  // decelerating to zero velocity
  easeOutQuad: function (t) { return t*(2-t) },
  // acceleration until halfway, then deceleration
  easeInOutQuad: function (t) { return t<.5 ? 2*t*t : -1+(4-2*t)*t },
  // accelerating from zero velocity 
  easeInCubic: function (t) { return t*t*t },
  // decelerating to zero velocity 
  easeOutCubic: function (t) { return (--t)*t*t+1 },
  // acceleration until halfway, then deceleration 
  easeInOutCubic: function (t) { return t<.5 ? 4*t*t*t : (t-1)*(2*t-2)*(2*t-2)+1 },
  // accelerating from zero velocity 
  easeInQuart: function (t) { return t*t*t*t },
  // decelerating to zero velocity 
  easeOutQuart: function (t) { return 1-(--t)*t*t*t },
  // acceleration until halfway, then deceleration
  easeInOutQuart: function (t) { return t<.5 ? 8*t*t*t*t : 1-8*(--t)*t*t*t },
  // accelerating from zero velocity
  easeInQuint: function (t) { return t*t*t*t*t },
  // decelerating to zero velocity
  easeOutQuint: function (t) { return 1+(--t)*t*t*t*t },
  // acceleration until halfway, then deceleration 
  easeInOutQuint: function (t) { return t<.5 ? 16*t*t*t*t*t : 1+16*(--t)*t*t*t*t }
}