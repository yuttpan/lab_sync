app.controller('HeaderController', function($scope) { 
    $scope.name = "Keangsanamnang Lab System" ;
    console.log("test") 
})

app.directive('myCustom', function () {
        return {
            templateUrl: 'directives/header/header.html'
        };
    });