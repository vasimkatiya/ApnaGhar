console.log("this is all users contents");

const con = document.querySelector(".con");

async function fetchData() {
    try {
        const res = await fetch("getAllUsers.php");

        const data = await res.json(); 
        console.log(data);

        data.forEach((ele) => {
            const userCard = document.createElement("div");
            userCard.classList.add("user-card");
            userCard.innerHTML = `
                <h2>${ele.name}</h2>
                <p>Email: ${ele.email}</p>
                <p>Phone: ${ele.phone}</p>
                <div class="user-btn">
                <button onclick="deleteUser(${ele.id})">Delete</button>
                </div>
            `;

            con?.appendChild(userCard);
        });

    } catch (error) {
        console.error("Error fetching user data:", error);
    }
}

fetchData();

function deleteUser(id) {

    if (confirm("Are you sure you want to delete this user?")) {
        window.location.href = "deleteUser.php?id=" + id;
    }

}