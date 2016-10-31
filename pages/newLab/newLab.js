app.controller('newLabController', function ($scope, $http) {
    $scope.data = {};

    $scope.column = [
        { text: "ที่" },
        { text: "ชื่อ - นามสกุล" }];

    $scope.addData = function () {

        $http.post('http://localhost/ksn_lab/api/newLab.php', { 'year': $scope.data.year, 'month': $scope.data.month, 'date': $scope.data.date }).success(function (result) {
            $scope.Lab = result;


            console.log($scope.Lab);
        });
    }


$scope.sendData = function(data){

$scope.dd = data ;
var parm = {
    'var_laborder_number' : $scope.dd.lab_order_number 

} 
   
   console.log(parm)


$http(
        
        {
          url:'http://localhost/ksn_lab/api/insert_labhead.php',
          method:'GET',
          params: parm
        }
      ).then(function(response){
          console.log(response.data);
       
             alert("บันทึกข้อมูลสำเร็จ");


         
          
$scope.addData();
        },function(error){
          
        
        });
        
    }





 
           
    






});







