const comm = document.querySelector('.scrivi');
comm.addEventListener('click', comme);

function comme(event) {
  event.preventDefault();
  const a = event.currentTarget;
  const b = document.querySelector('.comme')
  console.log(b)
  b.classList.remove('comme')
  b.classList.add('comm')
 a.removeEventListener('click', comme)

}



const vis = document.querySelector('.visualizza');
vis.addEventListener('click', visua);

function visua(event) {
  event.preventDefault();
  fetch('show').then(onResponse).then(addElement); 

  const a = event.currentTarget;
  const b = document.querySelector('.showC')
  console.log(b)
  b.classList.remove('showC')
  b.classList.add('show')
 a.removeEventListener('click', visua)
}


function addElement(json){

  const library = document.querySelector('.show');
   
  for (const a of json) {
    console.log(a)
    const div3 = document.createElement("div");
      div3.className = 'griglia';
      div3.id = json.indexOf(a);
      const span = document.createElement('span1');
      span.id= json.indexOf(a);
      div3.appendChild(span);
      const nome = document.createElement('p');
      nome.textContent = 'Utente: ' + a.utente;
      nome.id= json.indexOf(a);
      const ut = document.createElement('p');
      ut.textContent = 'Nome: ' + a.nome;
      ut.id= json.indexOf(a);
      const content = document.createElement("h1");
      content.className = 'Testo: ' +content; 
      content.textContent = a.content;
      div3.appendChild(nome)
      div3.appendChild(ut)
      const date = document.createElement('p');
      date.textContent = 'Recensito il: ' +a.date;
      div3.appendChild(content);
      div3.appendChild(date);
     library.appendChild(div3)
}
}

function onResponse(response){
  return response.json();
}


const link = document.querySelector('#menu');
  link.addEventListener('click', menu);

  function menu(event) {
    const menu2 = event.currentTarget;
    const link = document.querySelector('.hiddenL');
    console.log(link)
    console.log(menu2)
 
    link.classList.remove('hiddenL')
    link.classList.add('links2')

    document.body.classList.add('no-scroll');

    const exit= document.querySelector('.links2 img');
    exit.addEventListener('click', exitF);
  }


  function exitF(event) {
    const link = document.querySelector('.links2');
    link.classList.remove('links2')
    link.classList.add('hiddenL')
    document.body.classList.remove('no-scroll');
  }
