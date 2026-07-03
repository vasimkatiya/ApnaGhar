
const con = document.querySelector('.con');

const fetchData = async () => {
    try {
        const res = await fetch('getInfo.php');
        const data = await res.json();
        console.log(data);

   
            con.innerHTML = `
            <div>
                <h4> Total Users.</h4>
                <h1>${data.users['COUNT(*)']}</h1>
            </div>
             <div>
                <h4> Total Properties.</h4>
                <h1>${data.properties['COUNT(*)']}</h1>
            </div>
            <div>
                <h4> Total Inquiries.</h4>
                <h1>${data.inquiries['COUNT(*)']}</h1>
            </div>
            `;

       
    } catch (error) {
        console.error('Error fetching data:', error);
    }
};

fetchData();