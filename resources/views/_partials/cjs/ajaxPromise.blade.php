<script>
    function hitData(url, data, type, ...args) {
        return new Promise((resolve, reject)=>{
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            $.ajax({
                url: url,
                type: type,
                data: data,
                ...args,
                success: function (response) {
                    resolve(response);
                },
                error: function (error) {
                    reject(error);
                }
            });
        })
    }

    function inputInvalid(responseError) {
        for (var i in responseError) {
            $(`#${i + '-input'}`).addClass("is-invalid");
            for (var j in responseError[i]) {
                $(`#${i + '-input'}`).parent().find('.invalid-feedback').html(`${responseError[i][j]}`)
            }
        }
    }
</script>