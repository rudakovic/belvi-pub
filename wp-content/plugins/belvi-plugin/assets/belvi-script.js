document.addEventListener('DOMContentLoaded', function () {
});

function openBeer(e, id) {
    e.preventDefault();

    const postUrl = `/wp-json/belvi/v1/get-beer/${id}`;

    fetch(postUrl, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
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
