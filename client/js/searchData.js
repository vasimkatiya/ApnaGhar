const container = document.querySelector(".con");

const search = new URLSearchParams(window.location.search).get("search");

async function fetchData(search) {
    try {
        if (!search) {
            container.innerHTML = "<h2>No search value provided.</h2>";
            return;
        }

        const res = await fetch(`searchData.php?search=${encodeURIComponent(search)}`);
        const data = await res.json();

        console.log(data);

        container.innerHTML = "";

        if (!data || data.length === 0) {
            container.innerHTML = "<h2>No properties found.</h2>";
            return;
        }

        data.forEach((e) => {
            const card = document.createElement("div");
            card.classList.add("card");

            card.innerHTML = `
                <div class="part1">
                    <img src="./${e.img_url}" alt="${e.title}">
                </div>

                <div class="part2">
                    <h3>${e.title}</h3>
                    <p>${e.description}</p>
                    <h3 class="price">₹${e.price}</h3>
                    <h4>${e.location_name}</h4>
                </div>
            `;

            card?.addEventListener("click", () => {
                view(e.id);
            });

            container.appendChild(card);
        });

    } catch (error) {
        console.error(error);
    }
}

fetchData(search);

function view(id) {
    window.location.href = `singlePage.php?id=${id}`;
}