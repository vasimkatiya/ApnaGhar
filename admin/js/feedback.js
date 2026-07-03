const con = document.querySelector(".con");

async function fetchData() {
    try {
        const res = await fetch("getfeedback.php");

        if (!res.ok) {
            throw new Error("Failed to fetch feedback.");
        }

        const data = await res.json();
        console.log(data);

        con.innerHTML = "";

        if (data.length === 0) {
            con.innerHTML = "<h2>No feedback found.</h2>";
            return;
        }

        data.forEach((ele) => {
            const feedbackCard = document.createElement("div");
            feedbackCard.classList.add("feedback-card");

            feedbackCard.innerHTML = `
                <h2>${ele.name}</h2>
                <p><strong>Email:</strong> ${ele.email}</p>
                <p><strong>Message:</strong> ${ele.message}</p>
                <p><strong>Date:</strong> ${ele.created_at}</p>

                <div class="inquiry-btn">
                    <button onclick="deleteInquiry(${ele.id})">Delete</button>
                </div>
            `;

            con.appendChild(feedbackCard);
        });

    } catch (error) {
        console.error(error);
        con.innerHTML = "<h2>Something went wrong.</h2>";
    }
}

fetchData();

function deleteInquiry(id) {
    if (confirm("Are you sure you want to delete this feedback?")) {
        window.location.href = `deleteFeed.php?id=${id}`;
    }
}