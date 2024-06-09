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
            
            $.get("{{ url('dados') }}/" + itemId, function(response) {
                console.log(response);
                $('#detailModal').modal('show');
                // Assuming response.data contains the needed data
                $('#editDataId').text(response.data.id);
                $('#detailnama').text(response.data.nama);
                $('#detailnidn').text(response.data.nidn);
                $('#detailnip').text(response.data.nip);
                $('#detailgender').text(response.data.gender);
                $('#detailjur').text(response.data.jurusan.jurusan);
                $('#detailprod').text(response.data.prodi.prodi);
                $('#detailemail').text(response.data.email);
                $('#detailstatus').text(response.data.status);
                $('#detailModal').modal('show');
            }).fail(function() {
                console.error('Failed to fetch data');
            });
        });

        // Pencarian
        $('#searchButton').on('click', function() {
            var value = $('#searchInput').val().toLowerCase();
            $("#dataTable tr").filter(function() {
                // Get the text content of the 'nama' and 'kodekbk' columns
                var nama = $(this).find('td:nth-child(2)').text().toLowerCase();
                var nip = $(this).find('td:nth-child(3)').text().toLowerCase();

                // Check if the search value matches either 'nama' or 'kodekbk'
                $(this).toggle(nama.indexOf(value) > -1 || nip.indexOf(value) >
                        -1);
            });
        });
    });
</script>
