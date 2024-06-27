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

        $('#dataTable').DataTable();
        var table = $('#dataTable').DataTable();

        //    detail
        $(document).on('click', '.detailBtn', function() {
            let itemId = $(this).data('id');

            console.log("Button clicked, data ID:", itemId);
            $.get("{{ url('thnakad') }}/" + itemId, function(response) {
                console.log("Server Response:", response);

                if (response && response.data) {
                    $('#detailModal').modal('show');
                    $('#editDataId').text(response.data.id);
                    $('#detailsemta').text(response.data.smt_thn_akd);

                    let status = response.data.status;
                    $('#detailstatus').attr('class', 'badge rounded-pill ' + (status == 1 ?
                            'bg-success text-light' : 'bg-danger text-light'))
                        .text(status == 1 ? 'Aktif' : 'Tidak Aktif');
                } else {
                    console.error("Invalid response structure");
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error('Failed to fetch data:', textStatus, errorThrown);
                console.log(jqXHR.responseText);
            });
        });
    });
</script>
