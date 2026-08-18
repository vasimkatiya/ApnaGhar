console.log("this is getInquiries.js");

const con = document.querySelector(".con");

async function fetchData() {
    try {
        const res = await fetch("userInquiries.php");

        if (!res.ok) {
            throw new Error("Failed to fetch inquiries");
        }

        const data = await res.json();

        console.log(data);

        data.forEach((ele) => {
            const inquiryCard = document.createElement("div");

            inquiryCard.classList.add("inquiry-card");

            inquiryCard.innerHTML = `
                <h2>${ele.property_title}</h2>
                <p><strong>Location:</strong> ${ele.location}</p>
                <p><strong>Message:</strong> ${ele.inquiry}</p>
                <div class='btn'>
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