$(document).ready(function(){
    $('#searchnav').keyup(function() {
        var value = $(this).val().toLowerCase();

        $.ajax({
            type: "POST",
            url: "{{ route('search') }}",
            data: { data: value, _token: '{{csrf_token()}}' },
            success: function (data) {
                console.log(data);
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
            },
        });
    });
});