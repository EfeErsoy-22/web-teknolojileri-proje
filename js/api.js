const apiIcerik = document.getElementById('api-icerik');
const loadingSpinner = document.getElementById('loading-spinner');

// Sevdiğim filmler
const filmler = [
    "The Perks of Being a Wallflower",
    "Drive",
    "The Matrix",
    "John Wick",
    "Fight Club",
    "Split",
    "Project Hail Mary",
    "Leon: The Professional"
];

// OMDb API için test anahtarı
const apiKey = "44ddba56"; 

// Yükleniyor animasyonunu kaldır
loadingSpinner.style.display = 'none';

filmler.forEach(filmAdi => {
    // Film isimlerini API'nin anlayacağı formata (boşlukları %20 yaparak) çevirip URL'ye ekliyoruz
    fetch(`https://www.omdbapi.com/?t=${encodeURIComponent(filmAdi)}&apikey=${apiKey}`)
        .then(response => response.json())
        .then(film => {
            // Eğer API filmi başarıyla bulduysa ekrana bas
            if (film.Response === "True") {
                const cardCol = document.createElement('div');
                cardCol.className = 'col-md-3 mb-4'; 

                cardCol.innerHTML = `
                    <div class="card h-100 shadow-sm border-0">
                        <img src="${film.Poster !== 'N/A' ? film.Poster : 'https://via.placeholder.com/210x295'}" class="card-img-top rounded" alt="${film.Title}" style="height: 380px; object-fit: cover;">
                        <div class="card-body d-flex flex-column text-center">
                            <h5 class="card-title fw-bold">${film.Title}</h5>
                            <p class="card-text text-muted mb-2">⭐ IMDB: ${film.imdbRating}</p>
                            <p class="card-text small text-truncate mb-3" title="${film.Plot}">${film.Plot}</p>
                            <a href="https://www.imdb.com/title/${film.imdbID}" target="_blank" class="btn btn-sm btn-outline-dark w-100 mt-auto">IMDB'de Gör</a>
                        </div>
                    </div>
                `;
                apiIcerik.appendChild(cardCol);
            } else {
                console.log(`${filmAdi} bulunamadı:`, film.Error);
            }
        })
        .catch(error => console.error('API Hatası:', error));
});