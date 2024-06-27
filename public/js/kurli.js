$.ajax({
    type: "get",
    url: "getMatkulKurikulum",
    dataType: "json",
    success: function (response) {
        console.log(response);
    }
});