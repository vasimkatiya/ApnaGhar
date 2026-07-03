console.log("this is getUsers.js");

const con = document.querySelector(".con");

async function fetchData() {
    try {
        const res = await fetch("getInquiries.php");
        const data = await res.json();
        console.log(data);
        data.forEach((ele) => {
            const inquiryCard = document.createElement("div");
            inquiryCard.classList.add("inquiry-card");
            inquiryCard.innerHTML = `
                <h2>${ele.name}</h2>
                <p>Email: ${ele.email}</p>
                <p>Message: ${ele.message}</p>
                <p>${ele.date}</p>
                <div class="inquiry-btn">
                    <button onclick="deleteInquiry(${ele.id})">Delete</button>
                </div>
            `;
            con.appendChild(inquiryCard);
        });

    } catch (error) {
        console.error("Error fetching inquiries:", error);
    }
}

fetchData();

function deleteInquiry(id) {
    if(confirm("are you sure you want to delete this inquiry ?")){
        window.location.href = "deleteInquiry.php?id=" + id;
    }
}