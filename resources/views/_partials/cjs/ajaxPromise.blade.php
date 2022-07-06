<script>
    function hitData(url, data, type) {
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
                success: function (response) {
                    resolve(response);
                },
                error: function (error) {
                    reject(error);
                }
            });
        })
    }
</script>