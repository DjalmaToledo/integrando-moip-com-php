<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="">
        <input type="text" id="number">
        <input type="text" id="cvc">
        <input type="text" id="month">
        <input type="text" id="year">
        <input type="button" id="encrypt">
    </form>

    <div id="debug"></div>

    <script src="https://assets.moip.com.br/v2/moip.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#encrypt').click(function () {
                var cc = new Moip.CreditCard({
                    number: $('#number').val(),
                    cvc: $('#cvc').val(),
                    expMonth: $('#month').val(),
                    expYear: $('#year').val(),
                    pubKey: `-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAjh+pxrTSmg5/bFF4S7nC
fntG13NbUo19B2CTr6pmXgD0eKL8CufleOrv5BmyxKXKo9+ouw93A7WVvElkG4x9
HMcXX0XuEERv7pLc1tEsNAd9NRZ/27IOxdAXgATvs+3KdJg6/V45xHm2wDDjfzNA
ib58g6SZSc3Wpl76ojCqATQh33XLfGqQXIYJdVJ/mUb7A27VEcw6l+G61qkhbQmW
Im20DqWrMYGeWioB5+5YNkE4sGVUf3H/P6SdLhcXttd9RWUirIszi2e4Va+P0/zn
ePDKWL87C+OQMHCIowwhvHk46DhT4bwwu5E3H/nsecpVlRHTfP/HonvQY3DhzaVu
5wIDAQAB
-----END PUBLIC KEY-----
`
                });

                if (cc.isValid()) {
                    $('#debug').text(cc.hash());
                } else {
                    console.log('Cartão inválido');
                }
            });
        });
    </script>
</body>
</html>
