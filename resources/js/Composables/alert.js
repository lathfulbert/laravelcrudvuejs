export function useSwalSuccess (message){
                Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: message,
            animation: false,
            showConfirmButton: false,
            timer: 4000
            })
}


export function useSwalError (message){
                Swal.fire({
            position: 'top-end',         
            icon: 'error',
            title: message,
            animation: false,
            showConfirmButton: false,
            timer: 4000
            })
}