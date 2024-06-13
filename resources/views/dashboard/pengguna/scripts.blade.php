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
            $.get("{{ url('dapro') }}/" + itemId, function(response) {
                console.log(response);
                $('#detailModal').modal('show');

                // Assuming response.data contains the needed data
                $('#editDataId').text(response.data.id);
                $('#detailsemta').text(response.data.smt_thn_akd);

                // Handle status badge
                const statusBadge = $('#detailstatus');
                const isActive = response.data.status;
                if (isActive) {
                    statusBadge.text('Tidak Aktif');
                    statusBadge.removeClass('bg-success').addClass('bg-danger text-white');
                } else {
                    statusBadge.text('Aktif');
                    statusBadge.removeClass('bg-danger').addClass('bg-success text-white');
                }

            }).fail(function() {
                console.error('Failed to fetch data');
            });
        });

        // Pencarian
        $('#searchButton').on('click', function() {
            let value = $('#searchInput').val().toLowerCase();
            $("#dataTable tr").filter(function() {
                var smt_thn_akd = $(this).find('td:nth-child(2)').text().toLowerCase();
                // var nama = $(this).find('td:nth-child(3)').text().toLowerCase();

                $(this).toggle(smt_thn_akd.indexOf(value) > -1);
            });
        });
    });
</script>
