console.log("this is getUsers.js");

const con = document.querySelector(".con");

async function fetchData() {
    try {
        const res = await fetch("getInquiries.php");

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
                <p>${ele.location}</p>

                <h2>${ele.name}</h2>

                <p>Email: ${ele.email}</p>
                <p>Message: ${ele.message}</p>
                <p>${ele.date}</p>

                <div class="inquiry-btn">
                    <button class="delete-btn">Delete</button>
                    <button class="accept-btn">Accept</button>
                </div>
            `;

            const deleteBtn = inquiryCard.querySelector(".delete-btn");

            deleteBtn.addEventListener("click", () => {
                deleteInquiry(ele.id);
            });

            const acceptBtn = inquiryCard.querySelector(".accept-btn");

            acceptBtn.addEventListener("click", () => {
                confirmMessage(
                    ele.phone,
                    ele.property_title,
                    ele.location,
                    ele.ophone
                );
            });

            con.appendChild(inquiryCard);
        });

    } catch (error) {
        console.error("Error fetching inquiries:", error);
    }
}

fetchData();


function deleteInquiry(id) {

    if (confirm("Are you sure you want to delete this inquiry?")) {
        window.location.href = "deleteInquiry.php?id=" + id;
    }

}


function confirmMessage(phone, property, location, ophone) {

    const text = `Inquiry Confirmed 🏠

Hi! Your inquiry for this property has been successfully submitted. ✅

Property: ${property}
Location: ${location}

Owner Number: ${ophone}

The property owner will contact you soon.

You can also contact the owner directly using the number provided above to get more information and find your place.

📍 Find your perfect place with ApnaGhar!

Thank you for choosing ApnaGhar — your trusted place to find PGs, rental homes, and properties for sale. 🏡
`;

    const url = `https://wa.me/91${phone}?text=${encodeURIComponent(text)}`;

    window.open(url, "_blank");
}