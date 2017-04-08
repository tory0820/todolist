var app=angular.module('todo', []);

app.controller('list', function($scope,$http){
    $scope.showpage=1;

        $http.get('back.php',{
        params: {act: 'get'},
        responseType: 'json'
        }).then(function(res){
            $scope.lists=res.data;
        },function(){});






    $scope.add=function () {
        $scope.lists.push({
            cont: $scope.add_text,
            sta: "Active"
        });
        $http.get('back.php',{
        params: {act: 'add', cont: $scope.add_text, sta: "Active"},
        responseType: 'json'
        }).then(function(res){
            alert(res.data);
            location.reload([true])
        },function(){});

    }

    $scope.complete=function (list){
        list.sta="Complete";
        $http.get('back.php',{
        params: {act: 'update',id: list.id, sta: "Complete"},
        responseType: 'json'
        }).then(function(res){
            alert(res.data);
        },function(){});


    }

    $scope.delete=function(list){
        $http.get('back.php',{
        params: {act: 'delete',id: list.id},
        responseType: 'json'
        }).then(function(res){
            alert(res.data);
        },function(){});


        var index=$scope.lists.indexOf(list);
        $scope.lists.splice(index,1);


    }






    $scope.change=function(num){
        $scope.showpage=num;
    }
});