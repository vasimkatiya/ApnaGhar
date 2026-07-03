console.log("properties are displayed");

const con = document.querySelector(".con");

async function fetchData() {

    try {

        const res = await fetch("get_pro_data.php");

        const data = await res.json();

        console.log(data);

        data.forEach((ele) => {

            const card = document.createElement("div");

            card.classList.add("pro-card");

            card.innerHTML = `
                <div class="first">
                    <img src="./${ele.img_url}" alt="">
                </div>

                <div class="second">
                    <h3>${ele.title}</h3>
                    <p>${ele.description}</p>
                    <h2>${ele.price}</h2>
                    <h4>${ele.location_name}</h4>
                    <p>${ele.address}</p>
                    <h4>${ele.owner_name}</h4>
                    <h4>${ele.owner_email}</h4>
                    <h4>${ele.owner_phone}</h4>

                    <button onclick="editProperty(${ele.id})">Edit</button>
                    <button onclick="deleteProperty(${ele.id})">Delete</button>
                </div>
            `;

            con.appendChild(card);

        });

    } catch (error) {

        console.log(error);

    }

}

fetchData();


function editProperty(id){
    console.log("Edit:", id);

    window.location.href = "editProperty.php?id=" + id;
}

function deleteProperty(id){

    if(confirm("Delete this property?")){

        window.location.href = "deleteProperty.php?id=" + id;

    }

}