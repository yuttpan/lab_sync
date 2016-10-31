var app = angular.module('myApp', ['ngRoute']);

app.controller('MyController', function($scope) { 
    $scope.name = "Test" ;
    console.log("test") 
})

app.config(['$routeProvider', function($routeProvider) {
  $routeProvider
      .when('/', {
        templateUrl: 'directives/home/home.html',
        controller: 'HomeController'
      })
      .when('/LabPcu', {
        templateUrl: 'pages/newLab/newLab.html',
        controller: 'newLabController'
      })
      .when('/LabResult', {
        templateUrl: 'pages/lab_result/labresult.html',
        controller: 'labResultController'
      })


      .otherwise({redirectTo: '/'});
}]);



