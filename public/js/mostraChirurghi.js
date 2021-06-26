function mostraChirurghi(json){

  const sect = document.createElement('section');
  sect.className = 'container';
  const currentDiv2 = document.getElementById("op");
  console.log(currentDiv2)
  document.body.insertBefore(sect, currentDiv2);
    
   const content = json;

  for (const a of content) {
    
    contentObj[content.indexOf(a)] = {};
    contentObj[content.indexOf(a)]["id_chirurgo"] = a.id_chirurgo;
    contentObj[content.indexOf(a)]["nomeC"] = a.nomeC;
    contentObj[content.indexOf(a)]["imageC"] = a.imageC;
    contentObj[content.indexOf(a)]["email"] = a.email;
    contentObj[content.indexOf(a)]["nomeR"] = a.nomeR;
    contentObj[content.indexOf(a)]["ospedale"] = a.nome;
    contentObj[content.indexOf(a)]["citta"] = a.citta;
    contentObj[content.indexOf(a)]["indirizzo"] = a.indirizzo;

    console.log(a);

    const div3 = document.createElement("div");
    div3.className = 'griglia';
    div3.id = content.indexOf(a);
    const span = document.createElement('span');
    div3.appendChild(span);
    const chirurgo = document.createElement('a');
    chirurgo.textContent = a.nomeC;
    const add = document.createElement("img");
    add.className = 'aggiungi';
    add.src = './images/'+'aggiungi.png';
    add.addEventListener('click', aggiungi);
    const newIm = document.createElement("img");
    newIm.className = 'chirurgo'; 
    newIm.src = './images/'+ a.imageC;
    span.appendChild(chirurgo);
    span.appendChild(add);
    
    div3.appendChild(newIm);
    const currentDiv3 = document.getElementById("p");
    document.body.insertBefore(div3, currentDiv3);
    const t = document.createElement('p');
    t.addEventListener('click', mostra);
    t.textContent = 'Clicca per dettagli';
    t.className = 'vista';
    t.id = content.indexOf(a);
    const t2 = document.createElement('p1');
    t2.textContent = 'email: ' +a.email;
    t2.className = 'hidden2';
    t2.id = json.indexOf(a);
    const t3 = document.createElement('p2');
    t3.textContent = 'Reparto: ' +a.nomeR;
    t3.className = 'hidden2';
    t3.id = content.indexOf(a);
    const t4 = document.createElement('p1');
    t4.textContent = 'Ospedale: ' +a.nome;
    t4.className = 'hidden2';
    t4.id = content.indexOf(a);
    sect.appendChild(div3);
    div3.appendChild(t);
    div3.appendChild(t2);
    div3.appendChild(t3);
    div3.appendChild(t4);
  }

}


function mostra(event) {
	const testo = event.currentTarget;
	
	if (testo.textContent === 'Clicca per dettagli'){
		testo.textContent = 'Nascondi Dettagli';
	} else {
		testo.textContent = 'Clicca per dettagli';
	}

	const ele = document.querySelectorAll('.hidden2');
	
	for (const e of ele){
        if (e.id === testo.id){
	e.classList.remove('hidden2');
	e.classList.add('mostra');
    }
}
  
	event.currentTarget.addEventListener('click', togli);
	event.currentTarget.removeEventListener('click', mostra);
}

function togli(event) {
	const testo = event.currentTarget;
	
	if (testo.textContent === 'Clicca per dettagli'){
		testo.textContent = 'Nascondi Dettagli';
	} else {
		testo.textContent = 'Clicca per dettagli';
	}

	const elem = document.querySelectorAll('.mostra');
	
	for (const e of elem){
		if (e.id === testo.id){
			e.classList.remove('mostra');
			e.classList.add('hidden2');
		}
	}
	event.currentTarget.addEventListener('click', mostra);
	event.currentTarget.removeEventListener('click', togli);
}


let contentObj ={};



function aggiungi(event){

  event.preventDefault();
  const _token = document.querySelector('.content input');
  const a = _token.value;
	const element = event.currentTarget;
  element.removeEventListener('click', aggiungi);
  console.log(element)
  const id3 = element.parentNode.parentNode.id;
  console.log(id3)
  console.log(contentObj[id3]);

  const formData = new FormData();
  
  formData.append('chirurgo', contentObj[id3].id_chirurgo);
  formData.append('nome', contentObj[id3].nomeC);
  formData.append('email', contentObj[id3].email);
  formData.append('image', contentObj[id3].imageC);
  formData.append('nomeR', contentObj[id3].nomeR);
  formData.append('ospedale', contentObj[id3].ospedale);
  formData.append('citta', contentObj[id3].citta);
  formData.append('indirizzo', contentObj[id3].indirizzo);

  console.log(formData)
  
  fetch('aggiungi', {method: 'post', headers:{"X-CSRF-Token": a}, body:formData}).then(onResponse);
  avvisa();
}


function avvisa() {
  const span = document.createElement('span');
  aggiunto.appendChild(span);
  const testo = document.createElement('h1');
	testo.textContent = 'Aggiunto in rubrica';
  const testo2 = document.createElement('p');
	testo2.textContent = 'Premi ESC per rimuovere avviso';
	span.appendChild(testo);
  span.appendChild(testo2);
	aggiunto.classList.remove('hidden');
	document.body.classList.add('no-scroll');
}


function chiudi(event) {
	console.log(event);
	if(event.key === 'Escape')
	{
		aggiunto.classList.add('hidden');
		testo = aggiunto.querySelector('h1');
		testo.remove();
    testo2 = aggiunto.querySelector('p');
		testo2.remove();
		document.body.classList.remove('no-scroll');
	}
}

window.addEventListener('keydown', chiudi);


function onResponse(response){
    return response.json();
}

fetch('chirurgo_fetch').then(onResponse).then(mostraChirurghi);




const input = document.querySelector(".elementi input");
console.log(input)
input.addEventListener('keyup', ricerca);

function ricerca(event){

  const input = document.querySelector('.elementi input').value.toUpperCase();
  const cont = document.querySelectorAll('.container p2')

  for(const c of cont){
    const t = c.textContent.toUpperCase();
    for(let i=0; i<t.length; i++){
      if(t.includes(input)){
   
      c.parentNode.classList.add('griglia')
      c.parentNode.classList.remove('hidden');
    }else{
      c.parentNode.classList.remove('griglia');
      c.parentNode.classList.add('hidden')
    }
    }
  }
}




const a1 = document.querySelector('.a1 p');
a1.addEventListener('click', search1);


function search1(event){
  event.preventDefault();
  fetch('api1').then(onResponse).then(onJson1);
  const a = event.currentTarget;
  const b = document.querySelector('form .submit2')
  console.log(b)
  b.classList.remove('submit2')
  b.classList.add('submit')

  b.addEventListener('submit', tornaIndietro1);
}

function tornaIndietro1(event){
  event.preventDefault();
  const a = document.querySelector('#album-view1')
  a.innerHTML='';
  const b = event.currentTarget;
  b.classList.remove('submit')
  b.classList.add('submit1');
  const c = document.querySelector('form')
  c.classList.remove('submit1')
  c.classList.add('submit')
}

function onJson1(json) {
  console.log('JSON ricevuto');
  console.log(json);
  const library = document.querySelector('#album-view1');
  
  library.innerHTML = '';
  console.log(json.All)
 
   const country = json.All.country;
    const conf = json.All.confirmed;
    const death = json.All.deaths;
    const reco = json.All.recovered;
    const population = json.All.population;
    const d1 = document.createElement('div');
    d1.className = 'country';
    const d12 = document.createElement('div');
    const d2 = document.createElement('div');
    const p1 = document.createElement('p');
    const p11 = document.createElement('p');
    d2.className = 'row';
    const d3 = document.createElement('div');
    const p2 = document.createElement('p');
    const p21 = document.createElement('p');
    d3.className = 'row';
    const d4 = document.createElement('div');
    const p3 = document.createElement('p');
    const p31 = document.createElement('p');
    d4.className = 'row';
    const d5 = document.createElement('div');
    const p4 = document.createElement('p');
    const p41 = document.createElement('p');
    d5.className = 'row';
    const d = document.createElement('div');
    d.className = 'api'
    p11.textContent = conf;
    p21.textContent = death;
    p31.textContent = reco;
    p41.textContent = population;

    d12.textContent = country;

    p1.textContent = 'Casi';
    p2.textContent = 'Deceduti';
    p3.textContent = 'Ricoverati';
    p4.textContent = 'Popolazione';
    d.appendChild(d1);
    d.appendChild(d2);
    d.appendChild(d3);
    d.appendChild(d4);
    d.appendChild(d5);
    d1.appendChild(d12);
    d2.appendChild(p1);
    d3.appendChild(p2);
    d4.appendChild(p3);
    d5.appendChild(p4);
    d2.appendChild(p11);
    d3.appendChild(p21);
    d4.appendChild(p31);
    d5.appendChild(p41);
    library.appendChild(d)
}

  /*
function apriModale(event) {
	const image = document.createElement('img');
	image.id = 'immagine_post';
	image.src = event.currentTarget.src;
	modale.appendChild(image);
	modale.classList.remove('hidden');
	document.body.classList.add('no-scroll');
}


function chiudiModale(event) {
	console.log(event);
	if(event.key === 'Escape')
	{
		modale.classList.add('hidden');
		img = modale.querySelector('img');
		img.remove();
		document.body.classList.remove('no-scroll');
	}
}
*/
//window.addEventListener('keydown', chiudiModale);

const op1 = document.querySelector('.op1 p');
op1.addEventListener('click', operazione1);


function operazione1(event){
  event.preventDefault();
  fetch('operazione1_fetch').then(onResponse).then(ope1);
  const a = event.currentTarget;
  const b = document.querySelector('form .submit1')
  console.log(b)
  b.classList.remove('submit1')
  b.classList.add('submit')

  b.addEventListener('submit', tornaIndietroOp);
}

function tornaIndietroOp(event){
  event.preventDefault();
  const a = document.querySelector('#album-view')
  a.innerHTML='';
  const b = event.currentTarget;
  b.classList.remove('submit')
  b.classList.add('submit1');
  const c = document.querySelector('form')
  c.classList.remove('submit1')
  c.classList.add('submit')
}

function ope1(json){
  const library = document.querySelector('#album-view');
  library.innerHTML = '';
 
  for(const op of json){
    const div3 = document.createElement("div");
    div3.className = 'pazienti';
    div3.id = json.indexOf(op);
    library.appendChild(div3);
    const span= document.createElement('span');
    const p= document.createElement('p');
    p.textContent='Paziente: ';
    span.appendChild(p)
    const paziente= document.createElement('h1');
    paziente.textContent= op.nomeP;
    const span1= document.createElement('span');
    const p1= document.createElement('p');
    p1.textContent='Chirurgo: ';
    span1.appendChild(p1)
    const ch = document.createElement('h1');
    ch.textContent = op.nomeC;
    const span2= document.createElement('span');
    const p2= document.createElement('p');
    p2.textContent='Operazione: ';
    span2.appendChild(p2)
    const opera = document.createElement('h1');
    opera.textContent= op.data_operazione;
    const span3= document.createElement('span');
    const p3= document.createElement('p');
    p3.textContent='Sala operatoria: ';
    span3.appendChild(p3)
    const sala = document.createElement('h1');
    sala.textContent= op.sala_operatoria;
    const span4= document.createElement('span');
    const p4= document.createElement('p');
    p4.textContent='Reparto: ';
    span4.appendChild(p4)
    const rep = document.createElement('h1');
    rep.textContent= op.nomeR;
    div3.appendChild(span);
    div3.appendChild(span1);
    div3.appendChild(span2);
    div3.appendChild(span3);
    div3.appendChild(span4);
    span.appendChild(paziente);
    span1.appendChild(ch);
    span2.appendChild(opera);
    span3.appendChild(sala);
    span4.appendChild(rep);
   
  }
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


  
const a2 = document.querySelector('.a2 p');
a2.addEventListener('click', search2);


function search2(event){
  event.preventDefault();
  fetch('api2').then(onResponse).then(onJson);
  const a = event.currentTarget;
  const b = document.querySelector('form .submit3')
  console.log(b)
  b.classList.remove('submit3')
  b.classList.add('submit')

  b.addEventListener('submit', tornaIndietro2);
}

function tornaIndietro2(event){
  event.preventDefault();
  const a = document.querySelector('#album-view2')
  a.innerHTML='';
  const b = event.currentTarget;
  b.classList.remove('submit')
  b.classList.add('submit1');
  const c = document.querySelector('form')
  c.classList.remove('submit1')
  c.classList.add('submit')
}

function onJson(json) {
  console.log('JSON ricevuto');
  console.log(json);
  const library = document.querySelector('#album-view2');
  library.innerHTML = '';
  console.log(json.All)

   const country = json.All.country;
    const adm = json.All.administered;
    const pv = json.All.people_partially_vaccinated;
    const v = json.All.people_vaccinated;
    const population = json.All.population;
    const update = json.All.updated;
    const d1 = document.createElement('div');
    d1.className = 'country';
    const d12 = document.createElement('div');
    const d2 = document.createElement('div');
    const p1 = document.createElement('p');
    const p11 = document.createElement('p');
    d2.className = 'row';
    const d3 = document.createElement('div');
    const p2 = document.createElement('p');
    const p21 = document.createElement('p');
    d3.className = 'row';
    const d4 = document.createElement('div');
    const p3 = document.createElement('p');
    const p31 = document.createElement('p');
    d4.className = 'row';
    const d5 = document.createElement('div');
    const p4 = document.createElement('p');
    const p41 = document.createElement('p');
    d5.className = 'row';
    const d6 = document.createElement('div');
    const p5 = document.createElement('p');
    const p51 = document.createElement('p');
    d6.className = 'row';
    const d = document.createElement('div');
    d.className = 'api'
    p11.textContent = adm;
    p21.textContent = pv;
    p31.textContent = v;
    p41.textContent = population;
    p51.textContent = update;

    d12.textContent = country;

    p1.textContent = 'Ammininstrati';
    p2.textContent = 'Vaccinati-parziali';
    p3.textContent = 'Vaccinati';
    p4.textContent = 'Popolazione';
    p5.textContent = 'Aggiornamento';
    d.appendChild(d1);
    d.appendChild(d2);
    d.appendChild(d3);
    d.appendChild(d4);
    d.appendChild(d5);
    d.appendChild(d6);
    d1.appendChild(d12);
    d2.appendChild(p1);
    d3.appendChild(p2);
    d4.appendChild(p3);
    d5.appendChild(p4);
    d6.appendChild(p5);
    d2.appendChild(p11);
    d3.appendChild(p21);
    d4.appendChild(p31);
    d5.appendChild(p41);
    d6.appendChild(p51);
    library.appendChild(d);
}