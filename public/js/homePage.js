const link = document.querySelector('#menu');
  link.addEventListener('click', menu);

  function menu(event) {
    const menu2 = event.currentTarget;
    const link = document.querySelector('.hidden3');
    console.log(link)
    console.log(menu2)
 
    link.classList.remove('hidden3')
    link.classList.add('links2')

    document.body.classList.add('no-scroll');

    const exit= document.querySelector('.links2 img');
    exit.addEventListener('click', exitF);
  }


  function exitF(event) {
    const link = document.querySelector('.links2');
    link.classList.remove('links2')
    link.classList.add('hidden3')
    document.body.classList.remove('no-scroll');
  }