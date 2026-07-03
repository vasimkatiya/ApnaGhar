

const con = document.querySelector('.con');

// console.log('this is home client');

async function fetchData() {
    try {
        
        const res = await fetch('profileData.php');

        const data = await res.json();

        console.log(data);

            con.innerHTML = `
          <div class="part1">
                <img src="./assets/profile.jpg" alt="">
            </div>
            <div class="part2">
                <h3>${data.name}</h3>
                <h4>${data.email}</h4>
                <h4>${data.phone}</h4>
                <div class="btns">
                    <button onclick="logoutUser()" class="logout">logout</button>
                    <button onclick="editProfile(${data.id})" class="edit">Edit</button>
                </div>
            </div>
            `;

            // con.appendChild(card);
   
        

    } catch (error) {
        console.log(error)
    }
}

fetchData();

const editProfile = (id) =>{
    console.log(id)
    window.location.href='editProfile.php'
}



const logoutUser = () =>{
     if(confirm('are you sure you want to logout ? '))
    {
        alert('logout successfully.');
    window.location.href='logout.php';
    }
}