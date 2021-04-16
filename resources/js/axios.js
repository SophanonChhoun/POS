window.axios = require('axios');

axios.interceptors.response.use(
    function (response) {
        return response;
    },
    function (error) {
        var status = 200;
        if (error.hasOwnProperty('response') && error.response.hasOwnProperty('status')) {
            status = error.response.status;
        }

        if (status == 403) {
            window.location.href = '/403';
        } else {
            return Promise.reject(error);
        }
    }
)
