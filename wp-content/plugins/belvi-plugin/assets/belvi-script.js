document.addEventListener('DOMContentLoaded', function () {
    const apiUrl = belviPlugin.api_url;
    const nonce = belviPlugin.nonce;

    function openBear(e, id) {
        e.preventDefault();

        const postUrl = `${apiUrl}${id}`;

        fetch(postUrl, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-WP-Nonce': nonce
            }
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
});