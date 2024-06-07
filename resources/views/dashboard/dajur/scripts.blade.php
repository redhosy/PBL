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
            $.get("{{ url('dajur') }}/" + itemId, function(response) {
                console.log(response);
                $('#detailModal').modal('show');
                // Assuming response.data contains the needed data
                $('#editDataId').text(response.data.id);
                $('#detailjur').text(response.data.kode_jurusan);
                $('#detailnama').text(response.data.jurusan);
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
                var kode_jurusan = $(this).find('td:nth-child(2)').text().toLowerCase();
                var jurusan = $(this).find('td:nth-child(3)').text().toLowerCase();

                // Check if the search value matches either 'nama' or 'kodekbk'
                $(this).toggle(kode_jurusan.indexOf(value) > -1 || jurusan.indexOf(value) >
                        -1);
            });
        });
    });
</script>
