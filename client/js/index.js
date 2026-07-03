
const serCon = document.querySelector('.con');

const data = [
    {
        title:" 1. PG & Hostel Finder",
        text:"Find comfortable and affordable PGs and hostels with detailed information, photos, pricing, and essential amenities. Choose the perfect stay that matches your lifestyle and budget."
    },
     {
        title:"2. Rental Property Search",
        text:"Explore a wide range of rental rooms, flats, apartments, and houses in your preferred location. Filter properties by price, type, and other preferences to find your ideal home quickly."
    },
     {
        title:"3.Direct Owner Connection",
        text:"Connect directly with property owners through inquiry features to ask questions, discuss availability, and finalize your rental without unnecessary hassle."
    },
     {
        title:"4. Easy Property Listings",
        text:"Property owners can easily list their rooms, PGs, flats, or houses with complete details and images, making it simple to reach genuine tenants looking for accommodation."
    },

]


data?.forEach(ele=>{
    const serCard = document.createElement('div');
    serCard.classList.add('services');

    serCard.innerHTML=`
    <h4>${ele.title}</h4>
    <div>${ele.text}</div>
    `

    serCon.appendChild(serCard)

})