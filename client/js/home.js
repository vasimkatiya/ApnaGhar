
const con = document.querySelector('.con');

// console.log('this is home client');

async function fetchData() {
    try {
        
        const res = await fetch('getAllPro.php');

        const data = await res.json();

        console.log(data);

        data?.forEach(e => {
            const card = document.createElement("div");
            card.classList.add("card");

            card.innerHTML = `
             
            <div class="part1">
                <img src="./${e.img_url}" alt="">
            </div>
            <div class="part2">
                <h3>${e.title}</h3>
                <p>${e.description}</p>
                <h3 class='price' >₹${e.price}</h3>
                <h4>${e.location_name}</h4>
                
            </div>
            `;

            con.appendChild(card);
            document.querySelectorAll('.card')?.forEach(card => {
                card.addEventListener('click', () => {
                    view(e.id);
                });
            });
        });
        

    } catch (error) {
        console.log(error)
    }
}

fetchData();


function view(id) {
    window.location.href = `singlePage.php?id=${id}`;
}