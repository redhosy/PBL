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
            $.get("{{ url('matkul') }}/" + itemId, function(response) {
                console.log(response);
                $('#detailModal').modal('show');
                // Assuming response.data contains the needed data
                $('#editDataId').text(response.data.id);
                $('#detailkodemat').text(response.data.kode_matakuliah);
                $('#detailnamamat').text(response.data.nama_matakuliah);
                $('#detailtp').text(response.data.TP);
                $('#detailsks').text(response.data.sks);
                $('#detailjam').text(response.data.jam);
                $('#detailSKST').text(response.data.sks_teori);
                $('#detailSKSP').text(response.data.sks_praktek);
                $('#detailjamt').text(response.data.jam_teori);
                $('#detailjamp').text(response.data.jam_praktek);
                $('#detailsemester').text(response.data.semester);
                $('#detailNakur').text(response.data.kurikulum.nama_kurikulum);
                // $('#detailModal').modal('show');
            }).fail(function() {
                console.error('Failed to fetch data');
            });
        });

        // Pencarian
        $('#searchButton').on('click', function() {
            let value = $('#searchInput').val().toLowerCase();
            $("#dataTable tr").filter(function() {
                var nama_matakuliah = $(this).find('td:nth-child(3)').text().toLowerCase();
                // var nama = $(this).find('td:nth-child(3)').text().toLowerCase();

                $(this).toggle(nama_matakuliah.indexOf(value) > -1);
            });
        });
    });
</script>
