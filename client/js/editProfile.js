const formCon = document.querySelector('.form-con');


async function fetchData() {
    try {
        
        const res = await fetch('profileData.php');

        const data = await res.json();

        console.log(data);

        
        formCon.innerHTML = `
        <form action="" method='post' >
            <input type="text" value="${data.name}" required name="name" placeholder='update Name' id="">
            <input type="email" value="${data.email}" name="email" placeholder='example@email.com'  required id="">
            <input type="tel" value="${data.phone}" name="phone" required placeholder='88492XXXXX' id="">
            <input type="password" value="${data.cpassword}" name="password" required minlength='6' placeholder='update password' id="">
                <button class="edit" type="submit">edit</button>
         </form>
        `
   
        

    } catch (error) {
        console.log(error)
    }
}

fetchData();

// const editProfile = (id) =>{
//     console.log(id)
//     window.location.href='editProfile.php'
// }



const colse = () =>{
     if(confirm('are you sure you want to leave ? '))
    {
       
    window.location.href='profile.php';
    }
}