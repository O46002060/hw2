function validazione(event)
{
  
    if(form.username.value.length == 0 ||
       form.password.value.length == 0)
    {
        const error = document.querySelector('.hidden'); 
        error.textContent= 'Compilare tutti i campi';
        error.classList.remove('hidden');
        error.classList.add('errore');
        event.preventDefault();
    }
        
}

/*
const form = document.forms['login'];
form.addEventListener('submit', validazione);*/
