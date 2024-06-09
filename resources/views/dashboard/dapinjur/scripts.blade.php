<script>

if (typeof jQuery !== 'undefined') {
        console.log("jQuery is loaded");
    } else {
        console.error("jQuery is not loaded");
    }

    $(document).ready(function() {
        // Setup CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //    detail
        $(document).on('click', '.detailBtn', function() {
            let itemId = $(this).data('id');

            console.log("Button clicked, data ID:", itemId);
            // $.ajax({
            //     type: "GET",
            //     url: "{{ url('dajur') }}/" + itemId,
            //     dataType: "json",
            //     success: function (response) {
            //         console.log(response)
            //     }
            // });
            $.get("{{ url('dapinjur') }}/" + itemId, function(response) {
                console.log(response);
                $('#detailModal').modal('show');
                // Assuming response.data contains the needed data
                $('#editDataId').text(response.data.id);
                $('#detailjabatan').text(response.data.jabpim.jabatan_pimpinan);
                $('#detailnama').text(response.data.dosen.nama);
                $('#detailjurusan').text(response.data.jurusan.jurusan);
                $('#detailperiode').text(response.data.periode);
                $('#detailstatus').text(response.data.status);
                // $('#detailModal').modal('show');
            }).fail(function() {
                console.error('Failed to fetch data');
            });
        });

        // Pencarian
        $('#searchButton').on('click', function() {
            let value = $('#searchInput').val().toLowerCase();
            $("#dataTable tr").filter(function() {
                var jabatan_pimpinan = $(this).find('td:nth-child(2)').text().toLowerCase();
                var nama = $(this).find('td:nth-child(3)').text().toLowerCase();

                $(this).toggle(jabatan_pimpinan.indexOf(value) > -1 || nama.indexOf(value) >
                        -1);
            });
        });
    });
</script>
