let ozelMesajGosterildi = false;
let gosterilenMesajIcerigi = '';

function sendHeartbeat() {
    fetch('heartbeat.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ timestamp: Date.now() })
    })
    .then(res => res.json())
    .then(data => {
        if (data.redirect) {
            window.location.href = data.redirect;
        }

        if (data.ozel_mesaj && (!ozelMesajGosterildi || gosterilenMesajIcerigi !== data.ozel_mesaj)) {
            ozelMesajGosterildi = true;
            gosterilenMesajIcerigi = data.ozel_mesaj;

            Swal.fire({
                icon: 'info',
                title: 'A101',
                text: data.ozel_mesaj,
                showConfirmButton: false
            }).then(() => {
                fetch('heartbeat.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ ozel_mesaj_gosterildi: data.ozel_mesaj })
                });
            });
        }
    })
    .catch(err => console.error('Heartbeat hatası', err));
}

setInterval(sendHeartbeat, 5000);
sendHeartbeat();