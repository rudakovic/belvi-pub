document.addEventListener('DOMContentLoaded', function () {
});

function openBeer(e, id) {
    e.preventDefault();

    const apiUrl = belviPlugin.api_url;
    const nonce = belviPlugin.nonce;

    console.log('Nonce:', belviPlugin.nonce);

    const postUrl = `${apiUrl}${id}`;

    fetch(postUrl, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-WP-Nonce': nonce
        },
        credentials: 'same-origin'
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
}
