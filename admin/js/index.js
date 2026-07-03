
const form  = document.querySelector('form');

console.log('Form found:', form);

form.addEventListener('submit', (e) => {
    const email = form.email.value;
    const password = form.password.value;
});