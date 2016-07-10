"use strict";
angular
    .module('app')
    .controller('AppCtrl', AppCtrl);

AppCtrl.$inject = [];
function AppCtrl() {

    toastr.options.closeButton = true;
    toastr.options.positionClass = 'toast-bottom-right';
    toastr.options.preventDuplicates = true;
    toastr.options.showDuration = '300';

    var rootVm = this;

}
