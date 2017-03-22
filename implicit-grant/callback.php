<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>test implicit grand</title>
</head>
<body>

</body>
<script>
    // 解析URL中hash
    function parseToken() {
        var hash, out = {};
        hash = window.location.hash || '';
        hash = hash.substring(1).split('&');

        for (var i = 0; i < hash.length; i++) {
            var arr = hash[i].split('=');
            if (arr[0] == 'access_token') {
                out.access_token = arr[1];
            } else if (arr[0] == 'token_type') {
                out.token_type = arr[1];
            } else if (arr[0] == 'expires_in') {
                out.expires_in = arr[1];
            }
        }

        return out;
    }

    var token = parseToken();
    console.log(token);

</script>
</html>
