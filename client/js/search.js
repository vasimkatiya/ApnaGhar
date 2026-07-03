
document.querySelector(".search-form")?.addEventListener("submit", (e) => {
    e.preventDefault();

    const search = document.querySelector(".search-form input")?.value.trim();

    if (!search) {
        alert("Please enter a location.");
        return;
    }

    window.location.href = `search.php?search=${encodeURIComponent(search)}`;
});