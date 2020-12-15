var onloadCallback = function () {
    widgetId1 = grecaptcha.render('example1', {
        'sitekey': '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
        'theme': 'light'
    });
};


var app = angular.module('app', []);
var urlToRestApiUsers = urlToRestApi.substring(0, urlToRestApi.lastIndexOf('/') + 1) + 'users';

app.controller('TagCRUDCtrl', ['$scope', 'TagCRUDService', function ($scope, TagCRUDService) {

        $scope.editModal = function(){
            $scope.addEditTitle = "Modifier le tag";
            $scope.editButton = true;
            $scope.addButton = false;
        }
        $scope.updateTag = function (id, title) {
            TagCRUDService.updateTag(id, title)
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

        $scope.getTag = function (id) {
            $scope.editModal();
            TagCRUDService.getTag(id)
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

         $scope.addModal = function(){
            $scope.addEditTitle = "Ajouter un tag";
            $scope.editButton = false;
            $scope.addButton = true;
        }
        $scope.addTag = function (title) {
            if ($scope.tag != null && title) {
                TagCRUDService.addTag(title)
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
                $scope.errorMessage = 'Please enter a title!';
                $scope.message = '';
            }
        }

        $scope.deleteTag = function (id) {
            TagCRUDService.deleteTag(id)
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

        $scope.login = function () {
            if (grecaptcha.getResponse(widgetId1) == '') {
                $scope.captcha_status = 'Please verify captha.';
                return;
            }
            if ($scope.user != null && $scope.user.username) {
                TagCRUDService.login($scope.user)
                        .then(function success(response) {
                            $scope.message = $scope.user.username + ' en session!';
                            $scope.errorMessage = '';
                            localStorage.setItem('token', response.data.data.token);
                            localStorage.setItem('user_id', response.data.data.id);
                        },
                                function error(response) {
                                    $scope.errorMessage = 'Nom d\'utilisateur ou mot de passe invalide...';
                                    $scope.message = '';
                                });
            } else {
                $scope.errorMessage = 'Entrez un nom d\'utilisateur s.v.p.';
                $scope.message = '';
            }

        }
        $scope.logout = function () {
            localStorage.setItem('token', "no token");
            localStorage.setItem('user', "no user");
            $scope.message = '';
            $scope.errorMessage = 'Utilisateur déconnecté!';
        }
        $scope.changePassword = function () {
            TagCRUDService.changePassword($scope.user.password)
                    .then(function success(response) {
                        $scope.message = 'Mot de passe mis à jour!';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.errorMessage = 'Mot de passe inchangé!';
                                $scope.message = '';
                            });
        }

    }]);

app.service('TagCRUDService', ['$http', function ($http) {

        this.getTag = function getTag(tagId) {
            return $http({
                method: 'GET',
                url: urlToRestApi + '/' + tagId,
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")}
            });
        }

        this.addTag = function addTag(title) {
            return $http({
                method: 'POST',
                url: urlToRestApi,
                data: {title: title},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                }
            });
        }

        this.deleteTag = function deleteTag(id) {
            return $http({
                method: 'DELETE',
                url: urlToRestApi + '/' + id,
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                }
            })
        }

        this.updateTag = function updateTag(id, title) {
            return $http({
                method: 'PATCH',
                url: urlToRestApi + '/' + id,
                data: {title: title},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                }
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

        this.login = function login(user) {
            return $http({
                method: 'POST',
                url: urlToRestApiUsers + '/token',
                data: {username: user.username, password: user.password},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'}
            });
        }
        this.changePassword = function changePassword(password) {
            return $http({
                method: 'PATCH',
                url: urlToRestApiUsers + '/' + localStorage.getItem("user_id"),
                data: {password: password},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                }
            })
        }

    }]);


