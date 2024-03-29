<html>  
    <head>  
        <title>Manage Cars</title>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>  
    </head>  
    <body>  
        <div class="container">  
   <br />
            <h3 align="center"> </h3><br />
   <div class="table-responsive" ng-app="liveApp" ng-controller="liveController" ng-init="fetchData()">
                <div class="alert alert-success alert-dismissible" ng-show="success" >
                    <a href="#" class="close" data-dismiss="alert" ng-click="closeMsg()" aria-label="close">&times;</a>
                    {{successMessage}}
                </div>
                <form name="testform" ng-submit="insertData()">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Price Per Day</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Color</th>
                                <th>Miles</th>
                                <th>Status</th>
                                <th>Car Type</th>                                
                                <th>Create Date</th>
                                <th>End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" ng-model="addData.priceperday" class="form-control" placeholder="Enter Price Per Day" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.make" class="form-control" placeholder="Enter Make" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.model" class="form-control" placeholder="Enter Model" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.year" class="form-control" placeholder="Enter Year" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.color" class="form-control" placeholder="Enter Color" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.miles" class="form-control" placeholder="Enter Miles" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.status" class="form-control" placeholder="Enter Status" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.type" class="form-control" placeholder="Enter Car Type" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.createDate" class="form-control" placeholder="Enter Create Date" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.endDate" class="form-control" placeholder="Enter End Date" ng-required="true" /></td>




                                <td><button type="submit" class="btn btn-success btn-sm" ng-disabled="testform.$invalid">Add</button></td>
                            </tr>
                            <tr ng-repeat="data in namesData" ng-include="getTemplate(data)">
                            </tr>
                            
                        </tbody>
                    </table>
                </form>
                <script type="text/ng-template" id="display">
                    <td>{{data.priceperday}}</td>
                    <td>{{data.make}}</td>
                    <td>{{data.model}}</td>
                    <td>{{data.year}}</td>
                    <td>{{data.color}}</td>
                    <td>{{data.miles}}</td>
                    <td>{{data.status}}</td>
                    <td>{{data.type}}</td>
                    <td>{{data.createDate}}</td>
                    <td>{{data.endDate}}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" ng-click="showEdit(data)">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm" ng-click="deleteData(data.id)">Delete</button>
                    </td>
                </script>
                <script type="text/ng-template" id="edit">
                    <td><input type="text" ng-model="formData.priceperday" class="form-control"  /></td>
                    <td><input type="text" ng-model="formData.make" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.model" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.year" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.color" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.miles" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.status" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.type" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.createDate" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.endDate" class="form-control" /></td>
                    <td>
                        <input type="hidden" ng-model="formData.data.id" />
                        <button type="button" class="btn btn-info btn-sm" ng-click="editData()">Save</button>
                        <button type="button" class="btn btn-default btn-sm" ng-click="reset()">Cancel</button>
                    </td>
                </script>         
   </div>  
  </div>
    </body>  
</html>  
<script>
var app = angular.module('liveApp', []);

app.controller('liveController', function($scope, $http){

    $scope.formData = {};
    $scope.addData = {};
    $scope.success = false;

    $scope.getTemplate = function(data){
        if (data.id === $scope.formData.id)
        {
            return 'edit';
        }
        else
        {
            return 'display';
        }
    };

    $scope.fetchData = function(){
        $http.get('select.php').success(function(data){
            $scope.namesData = data;
        });
    };

    $scope.insertData = function(){
        $http({
            method:"POST",
            url:"insert.php",
            data:$scope.addData,
        }).success(function(data){
            $scope.success = true;
            $scope.successMessage = data.message;
            $scope.fetchData();
            $scope.addData = {};
        });
    };

    $scope.showEdit = function(data) {
        $scope.formData = angular.copy(data);
    };

    $scope.editData = function(){
        $http({
            method:"POST",
            url:"edit.php",
            data:$scope.formData,
        }).success(function(data){
            $scope.success = true;
            $scope.successMessage = data.message;
            $scope.fetchData();
            $scope.formData = {};
        });
    };

    $scope.reset = function(){
        $scope.formData = {};
    };

    $scope.closeMsg = function(){
        $scope.success = false;
    };

    $scope.deleteData = function(id){
        if(confirm("Are you sure you want to remove it?"))
        {
            $http({
                method:"POST",
                url:"delete.php",
                data:{'id':id}
            }).success(function(data){
                $scope.success = true;
                $scope.successMessage = data.message;
                $scope.fetchData();
            }); 
        }
    };

});

</script>