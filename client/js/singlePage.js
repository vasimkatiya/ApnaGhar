
const con = document.querySelector('.con');

const id = new URLSearchParams(window.location.search).get("id");

async function fetchData() {
    try {
        
        const res = await fetch(`singleData.php?id=${id}`);

        const data = await res.json();

        console.log(data);

        con.innerHTML = `
          <div class="first">
                <img src="./${data.img_url}" alt="">
            </div>
            <div class="second">
              <div class='pro-info'>
              <p><strong>Property Information:</strong></p>
                <h3>${data.title}</h3>
                <p>${data.description}</p>
                <h3 class='price' >₹${data.price}</h3>
                <p>${data.address}</p>
                <h4>${data.location_name}</h4>
                <h4>${data.type}</h4>
              </div>

                <div class='owner-info'>
                    <p><strong>Owner Information:</strong></p>
                    <p>Name: ${data.owner_name}</p>
                    <p>Email: ${data.owner_email}</p>
                    <p>Phone: ${data.owner_phone}</p>
                </div>
                <div class="btns">
                    <button onclick="inquiry(${data.id})" class="inq">inquiry</button>
                </div>

            </div>
        `
        

    } catch (error) {
        console.log(error)
    }
}

fetchData();


function inquiry(id){
    window.location.href = `inquiry.php?id=${id}`;
}