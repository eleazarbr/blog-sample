import { SnackbarProgrammatic as Snackbar } from 'buefy'

axios.interceptors.response.use(
    response => response,
    error => {
        switch (error.response.status) {
            case 422:
                var errors = Object.values(error.response.data.errors).flat()
                Snackbar.open({
                    type: 'is-danger',
                    position: 'is-bottom-left',
                    duration: 5000,
                    indefinite: false,
                    message: errors[0],
                    queue: false
                })
                break

            case 419:
                window.location.reload()
                break

            case 500:
            default:
                Snackbar.open({
                    type: 'is-danger',
                    position: 'is-bottom-left',
                    duration: 5000,
                    indefinite: false,
                    message: error.response.data.message,
                    queue: false
                })
                break
        }
        return Promise.reject(error)
    }
)
