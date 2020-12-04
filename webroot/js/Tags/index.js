var app = angular.module('app', []);

app.controller('TagCRUDCtrl', ['$scope', 'TagCRUDService', function ($scope, TagCRUDService) {

        $scope.updateTag = function () {
            TagCRUDService.updateTag($scope.tag.id, $scope.tag.title)
                    .then(function success(response) {
                        $scope.message = 'Tag data updated!';
                        $scope.errorMessage = '';
                        // Rafraîchir la liste
                        $scope.getAllTags();
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error updating tag!';
                                $scope.message = '';
                            });
        }

        $scope.getTag = function () {
            var id = $scope.tag.id;
            TagCRUDService.getTag($scope.tag.id)
                    .then(function success(response) {
                        $scope.tag = response.data.tag;
                        $scope.tag.id = id;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                if (response.status === 404) {
                                    $scope.errorMessage = 'Tag not found!';
                                } else {
                                    $scope.errorMessage = "Error getting tag!";
                                }
                            });
        }

        $scope.addTag = function () {
            if ($scope.tag != null && $scope.tag.title) {
                TagCRUDService.addTag($scope.tag.title)
                        .then(function success(response) {
                            $scope.message = 'Tag added!';
                            $scope.errorMessage = '';
                            $scope.getAllTags();
                        },
                                function error(response) {
                                    $scope.errorMessage = 'Error adding tag!';
                                    $scope.message = '';
                                });
            } else {
                $scope.errorMessage = 'Please enter a name!';
                $scope.message = '';
            }
        }

        $scope.deleteTag = function () {
            TagCRUDService.deleteTag($scope.tag.id)
                    .then(function success(response) {
                        $scope.message = 'Tag deleted!';
                        $scope.tag = null;
                        $scope.errorMessage = '';
                        $scope.getAllTags();

                    },
                            function error(response) {
                                $scope.errorMessage = 'Error deleting tag!';
                                $scope.message = '';
                            })
        }

        $scope.getAllTags = function () {
            TagCRUDService.getAllTags()
                    .then(function success(response) {
                        $scope.tags = response.data.tags;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                $scope.errorMessage = 'Error getting tags!';
                            });
        }

    }]);

app.service('TagCRUDService', ['$http', function ($http) {

        this.getTag = function getTag(tagId) {
            return $http({
                method: 'GET',
                url: urlToRestApi + '/' + tagId,
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'}
            });
        }

        this.addTag = function addTag(title) {
            return $http({
                method: 'POST',
                url: urlToRestApi,
                data: {title: title},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'}
            });
        }

        this.deleteTag = function deleteTag(id) {
            return $http({
                method: 'DELETE',
                url: urlToRestApi + '/' + id,
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'}
            })
        }

        this.updateTag = function updateTag(id, title) {
            return $http({
                method: 'PATCH',
                url: urlToRestApi + '/' + id,
                data: {title: title},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'}
            })
        }

        this.getAllTags = function getAllTags() {
            return $http({
                method: 'GET',
                url: urlToRestApi,
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'}
            });
        }

    }]);


