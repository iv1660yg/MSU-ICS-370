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
                                <th>userID</th>
                                <th>carID</th>
                                <th>pickupdate</th>
                                <th>returndate</th>
                                <th>destination</th>
                                <th>total</th>
                                <th>statusID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" ng-model="addData.userID" class="form-control" placeholder="Enter Price Per Day" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.carID" class="form-control" placeholder="Enter Make" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.pickupdate" class="form-control" placeholder="Enter Model" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.returndate" class="form-control" placeholder="Enter Year" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.destination" class="form-control" placeholder="Enter Color" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.total" class="form-control" placeholder="Enter Miles" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.statusID" class="form-control" placeholder="Enter Status" ng-required="true" /></td>
                               




                                <td><button type="submit" class="btn btn-success btn-sm" ng-disabled="testform.$invalid">Add</button></td>
                            </tr>
                            <tr ng-repeat="data in namesData" ng-include="getTemplate(data)">
                            </tr>
                            
                        </tbody>
                    </table>
                </form>
                <script type="text/ng-template" id="display">
                    <td>{{data.userID}}</td>
                    <td>{{data.carID}}</td>
                    <td>{{data.pickupdate}}</td>
                    <td>{{data.returndate}}</td>
                    <td>{{data.destination}}</td>
                    <td>{{data.total}}</td>
                    <td>{{data.statusID}}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" ng-click="showEdit(data)">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm" ng-click="deleteData(data.id)">Delete</button>
                    </td>
                </script>
                <script type="text/ng-template" id="edit">
                    <td><input type="text" ng-model="formData.userID" class="form-control"  /></td>
                    <td><input type="text" ng-model="formData.carID" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.pickupdate" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.returndate" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.destination" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.total" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.statusID" class="form-control" /></td>
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