"use strict";
angular
    .module('app')
    .run(runBlock)
    .config(runConfig);

runBlock.$inject = ['$rootScope', '$state', '$stateParams', '$http'];
function runBlock($rootScope, $state, $stateParams, $http) {
    $rootScope.$state = $state;
    $rootScope.$stateParams = $stateParams;

    $http.defaults.headers.common.Accept = 'application/json';
}

runConfig.$inject = ['$stateProvider', '$urlRouterProvider', '$locationProvider', '$provide'];
function runConfig($stateProvider, $urlRouterProvider, $locationProvider, $provide) {

    $stateProvider
        .state('home', {
            url: '/',
            title: '',
            controller: 'HomeController',
            controllerAs: 'vm',
            templateUrl: 'components/home/homeView.html'
        })
        .state('404', {
            templateUrl: 'tpl/404.html'
        });

    $urlRouterProvider.otherwise(function ($injector, $location) {
        var $state = $injector.get('$state');
        $state.go('404');
        return $location.path();
    });

    $locationProvider.html5Mode(true);
}
