<div style="width: 100%; background: ##edebe8">
    <table style="max-width: 600px; border: 1px solid #e3e0de; border-collapse:collapse;" align="center">
        <tr style="text-align: center; border: 1px solid #e3e0de; border-collapse:collapse;">
            <img align="center" class="center autowidth" src="{{ $message->embed('img/logoAntriedark.png') }}" alt="">
        </tr>
        <tr style="border: 1px solid #e3e0de; border-collapse:collapse; background:white;">
            <td style="padding: 15px;">
                <br>
                Halo, {{ $data['name'] }}
                <br><br>
                Selamat bergabung di Antrie!
                <br><br>
                Untuk menyelesaikan proses registrasi akun anda, klik link di bawah untuk memverifikasikan akun anda!
                <br><br>
                <a href="http://127.0.0.1:8000/verify/{{ $data['verification_code'] }}">Verifikasikan Akun</a>
                <br><br>
                - Antrie
            </td>
        </tr>
    </table>
</div>
