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
            const beerView = document.getElementById('beer-view');
            const beerName = document.getElementById('beer-view-name');
            const beerImageWrap = document.getElementById('beer-view-image-wrap');
            const beerBrewery = document.getElementById('beer-view-brewery');
            const beerDescription = document.getElementById('beer-view-description');
            const beerType = document.getElementById('beer-view-type');
            const beerAVB = document.getElementById('beer-view-abv');
            const beerIBU = document.getElementById('beer-view-ibu');
            const beerBreweryIcon = document.getElementById('beer-view-brewery-icon');

            beerName.innerText = data['title'];
            beerImageWrap.innerHTML = '';
            const beerImage = document.createElement('img');
            beerImage.src = data['image'];
            beerImage.alt = data['title'];
            beerImage.classList.add('beer-view__image');
            beerImageWrap.appendChild(beerImage);
            beerBrewery.innerText = data['brewery'];
            beerDescription.innerHTML = data['content'];
            beerType.innerText = data['beer_style'];
            beerAVB.innerText = data['abv'] + '%';
            beerIBU.innerText = data['ibu'];
            beerBreweryIcon.src = data['brewery_icon'];
            beerBreweryIcon.removeAttribute('srcset');
            if(!beerView.classList.contains('open')) {
                beerView.classList.add('open');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}
