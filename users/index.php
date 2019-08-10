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
                                <th>User</th>
                                <th>Full Name</th>
                                <th>Password</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Account Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" ng-model="addData.user" class="form-control" placeholder="Enter Price Per Day" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.pass" class="form-control" placeholder="Enter Make" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.fullname" class="form-control" placeholder="Enter Model" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.phone" class="form-control" placeholder="Enter Year" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.email" class="form-control" placeholder="Enter Color" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.account_type" class="form-control" placeholder="Enter Miles" ng-required="true" /></td>



                                <td><button type="submit" class="btn btn-success btn-sm" ng-disabled="testform.$invalid">Add</button></td>
                            </tr>
                            <tr ng-repeat="data in namesData" ng-include="getTemplate(data)">
                            </tr>
                            
                        </tbody>
                    </table>
                </form>
                <script type="text/ng-template" id="display">
                    <td>{{data.user}}</td>
                    <td>{{data.pass}}</td>
                    <td>{{data.fullname}}</td>
                    <td>{{data.phone}}</td>
                    <td>{{data.email}}</td>
                    <td>{{data.account_type}}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" ng-click="showEdit(data)">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm" ng-click="deleteData(data.id)">Delete</button>
                    </td>
                </script>
                <script type="text/ng-template" id="edit">
                    <td><input type="text" ng-model="formData.user" class="form-control"  /></td>
                    <td><input type="text" ng-model="formData.pass" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.fullname" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.phone" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.email" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.account_type" class="form-control" /></td>
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
        if (data.uid === $scope.formData.uid)
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

    $scope.deleteData = function(uid){
        if(confirm("Are you sure you want to remove it?"))
        {
            $http({
                method:"POST",
                url:"delete.php",
                data:{'uid':uid}
            }).success(function(data){
                $scope.success = true;
                $scope.successMessage = data.message;
                $scope.fetchData();
            }); 
        }
    };

});

</script>