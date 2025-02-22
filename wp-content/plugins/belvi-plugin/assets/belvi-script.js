document.addEventListener('DOMContentLoaded', function () {
});

function openBeer(e, id) {
    e.preventDefault();

    const apiUrl = belviPlugin.api_url;
    const nonce = document.querySelector('#belvi_nonce').value;

    console.log('Nonce:', nonce);

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
