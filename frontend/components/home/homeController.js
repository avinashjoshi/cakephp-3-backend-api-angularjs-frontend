angular
    .module('app')
    .controller('HomeController', HomeController);


HomeController.$inject = ['apiService'];
function HomeController(apiService) {
    var vm = this;

    vm.getBlobs = function() {
      vm.loading = true;

      apiService.request('GET', '/v1/blobs').then(function (response) {
          if (response.data) {
              vm.blobs = response.data;
              vm.loading = false;
          }
      });
    };

    apiService.request('GET', '/v1/errorPage').then(function (response) {
          toastr.error(response.data.message);
      });

    vm.getBlobs();

    vm.blobIt = function() {
      apiService.request('POST', '/v1/blobs', {blob_text: vm.blobText}).then(function (response) {
          if (response.success && response.data.id) {
              toastr.info('Added new blob!');
              vm.getBlobs();
          } else {
            toastr.error('Error adding blob!');
          }
      });
    };


    vm.deleteBlob = function(id) {
      apiService.request('DELETE', '/v1/blobs/' + id).then(function (response) {
          if (response.success) {
            vm.getBlobs();
            toastr.error('Blob deleted!');
          } else {
            toastr.error('Error in deleting blob!');
          }
      });
    };
}
