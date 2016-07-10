angular
    .module('app')
    .factory('apiService', apiService);

apiService.$inject = ['$http'];
function apiService($http) {
    return {
        request: sendRequest
    };

    function sendRequest(method, endpoint, data) {
        var API_HOST = 'http://api.blob.dev';
        var req = {
            method: method || 'GET',
            url: API_HOST + endpoint,
            data: data || '',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        };

        return $http(req)
            .then(successCallback, errorCallback);

        function successCallback(response) {
            return response.data;
        }

        function errorCallback(error) {
            var message = 'Something terrible happened!';
            if (error.data && error.data.code) {
                switch (error.data.code) {
                    case 500:

                        break;
                    case 401:

                        break;
                    case 403:

                        break;
                    case 404:
                        message = 'Could not find content';
                        break;
                    default:
                        break;
                }
            }
            return error.data;
        }
    }

}
