let alreadyRedirected = false;

function sendHeartbeat() {
    fetch('heartbeat.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ timestamp: Date.now() })
    })
    .then(res => res.json())
    .then(data => {
        if (data.redirect && !alreadyRedirected) {
            alreadyRedirected = true;
            window.location.href = data.redirect;
        }

        if (data.ozel_mesaj) {
            Swal.fire({
                icon: 'info',
                title: 'Özel Mesaj',
                text: data.ozel_mesaj,
                showConfirmButton: false
            });
        }
    })
    .catch(err => console.error('Heartbeat failed', err));
}

setInterval(sendHeartbeat, 5000);