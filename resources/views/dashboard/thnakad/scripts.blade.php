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

            $.ajax({
                type: "GET",
                url: "{{ url('thnakad') }}/" + itemId,
                dataType: "json",
                success: function(response) {
                    console.log("Server Response:", response);
                    $('#detailModal').modal('show');
                    $('#editDataId').text(response.data.id);
                    $('#detailsemta').text(response.data.smt_thn_akd);

                    let status = response.data.status;
                    $('#detailstatus').attr('class', 'badge rounded-pill ' + (status == 1 ? 'bg-danger text-light' : 'bg-success text-light'))
                        .text(status == 1 ? 'Tidak Aktif' : 'Aktif');
                },
                error: function(error) {
                    console.error('Failed to fetch data:', error);
                    alert('Failed to fetch data.');
                }
            });
        });
    });
</script>
