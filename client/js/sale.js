const con = document.querySelector('.con');

async function fetchData() {
    try {
        const res = await fetch('saleData.php');
        const data = await res.json();

        console.log(data);

        // Clear previous cards (optional but recommended)
        con.innerHTML = "";

        data?.forEach((e) => {
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

            con.appendChild(card);
        });

    } catch (error) {
        console.error(error);
    }
}

fetchData();

function view(id) {
    window.location.href = `singlePage.php?id=${id}`;
}