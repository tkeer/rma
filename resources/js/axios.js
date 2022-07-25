import axios from "axios";
axios.defaults.baseURL = '/api/';

function successCallback(vm, response) {
  if (response.config.method !== 'get' && response.data.message) {
    vm.$bvToast.toast(response.data.message, {
      variant: 'success',
      noCloseButton: true
    })
  }

  return response
}

function errorCallback(vm, error) {
  if (error.config.method !== 'get') {
    vm.$bvToast.toast(error.response.data.message, {
      variant: 'danger',
      toaster: 'b-toaster-top-center',
      noCloseButton: true
    })
  }
  return Promise.reject(error)

}

function setupAxios(vm) {

  axios.defaults.baseURL = '/api/';

  axios.interceptors.response.use(
    response => successCallback(vm, response),
    error => errorCallback(vm, error)
  )
}

export default setupAxios