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
            const beerView = document.getElementById('beer-view');
            const beerName = document.getElementById('beer-view-name');
            const beerImageWrap = document.getElementById('beer-view-image-wrap');
            const beerBrewery = document.getElementById('beer-view-brewery');
            const beerDescription = document.getElementById('beer-view-description');
            const beerType = document.getElementById('beer-view-type');
            const beerAVB = document.getElementById('beer-view-abv');
            const beerIBU = document.getElementById('beer-view-ibu');
            const beerBreweryIconWrap = document.getElementById('beer-view-brewery-icon-wrap');

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
            if (data['abv']) {
                beerAVB.innerText = 'ABV: ' + data['abv'] + '%';
            } else {
                beerAVB.innerText = '';
            }
            if(data['ibu']) {
                beerIBU.innerText = 'IBU: ' + data['ibu'];
            } else {
                beerIBU.innerText = '';
            }
            beerBreweryIconWrap.innerHTML = '';
            const beerBreweryIcon = document.createElement('img');
            beerBreweryIcon.src = data['brewery_icon'];
            beerBreweryIcon.alt = data['brewery'];
            beerBreweryIcon.classList.add('beer-view__brewery-icon');
            beerBreweryIconWrap.appendChild(beerBreweryIcon);
            if(!beerView.classList.contains('open')) {
                beerView.classList.add('open');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

function closeBeer(e) {
    e.preventDefault();

    const beerView = document.getElementById('beer-view');
    if(beerView.classList.contains('open')) {
        beerView.classList.remove('open');
    }
}
