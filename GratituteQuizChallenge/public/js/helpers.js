const route = (name) => {
    axios
        .get(`${name}.html`)
        .then(function (response) {
            // handle success
            document.querySelector("#view").innerHTML = response.data;
        })
        .catch(function (error) {
            // handle error
            toastService("danger", "Something Went Wrong").show();
            console.log(error);
        })
        .then(function () {
            // always executed
        });
};

const fRoute = (name) => {
    axios
        .get(`${name}`)
        .then(function (response) {
            // handle success
            document.querySelector("#view").innerHTML = response.data;
        })
        .catch(function (error) {
            // handle error
            toastService("danger", "Something Went Wrong").show();
            console.log(error);
        })
        .then(function () {
            // always executed
        });
};

const postApiRequest = (apiUrl, data) => {
    axios
        .post(`${apiUrl}`, data)
        .then(function (response) {
            // handle success
            console.log(response);
        })
        .catch(function (error) {
            // handle error
            toastService("danger", "Something Went Wrong").show();
            console.log(error);
        })
        .then(function () {
            // always executed
        });
};

const getApiRequest = (apiUrl) => {
    return axios.get(`${apiUrl}`).catch(function (error) {
        // handle error
        toastService("danger", "Something Went Wrong").show();
        console.log(error);
    });
};

const toastService = (type, text) => {
    const cssClasses = ["primary", "info", "warning", "success", "danger"];
    const toastElement = document.querySelector(`#toast`);
    cssClasses.forEach((cssClass) => {
        toastElement.classList.remove(`bg-${cssClass}`);
    });
    toastElement.classList.add(`bg-${type}`);
    toastElement.querySelector("#toastMessage").innerHTML = text;
    return bootstrap.Toast.getOrCreateInstance(toastElement);
};

const toastElList = [].slice.call(document.querySelectorAll(".toast"));
const toastList = toastElList.map(function (toastEl) {
    return new bootstrap.Toast(toastEl, option);
});
