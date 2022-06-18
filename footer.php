<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$('.confirm').click(function() {
    var id = $(this).attr('data-id')
    var nama = $(this).attr('data-nama')
    Swal.fire({
        title: 'Confirmasi',
        text: "apakah anda yakin menghapus data barang dengan nama " + nama + "?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Data Berhasil Di Hapus!!',
                showConfirmButton: false,
                timer: 1500
            })
            window.location = "delete.php?id=" + id;
        }
    })
});
</script>
</body>

</html>