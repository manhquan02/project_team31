<script>
    $(document).on('click','.btn-del',function(e){
        e.preventDefault()
        const url = $(this).data('url')
        Swal.fire({
            title: "{{ translate('Are you sure you want to delete ?') }}",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "{{ translate('Delete') }}",
        }).then((result) => {
            if (result.isConfirmed) {
                console.log(result)
                window.location=url
                Swal.fire(
                    "{{ translate('OK') }}",
                    "{{ translate('Notice has been sent !') }}",
                    'success'
                )
            }
        })
    })
</script>
