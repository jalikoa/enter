function deleteActivity(){
    Swal.fire({
        title: 'Please confirm!',
        text: `Are you sure you want to delete this record ?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed){
            Swal.fire('Deleted','Delete successful','success');
        }
    });
}