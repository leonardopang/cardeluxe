const depItem = document.querySelector('.depoimentos_holder')

if( depItem ){
  const depoimentos = new SiemaWithDots({
    selector: '.depoimentos_holder',
    duration: 250,
    threshold: 0,
    loop: true,
    onInit: function(){
        this.addDots();
        this.updateDots();
    },
    onChange: function(){
        this.updateDots()
    },
  })
  setInterval(() => depoimentos.next(), 10000)
}

const opcoesCarros = document.querySelector('.opcoes-tranporte-siema')

if( opcoesCarros ){
  const carros = new Siema({
    selector: '.opcoes-tranporte-siema',
    duration: 250,
    threshold: 0,
    loop: true,
  })
  setInterval(() => carros.next(), 10000)
  const carros_left = document.querySelector('.opcoes-transporte_container .arrows-left')
  const carros_right = document.querySelector('.opcoes-transporte_container .arrows-right')

  carros_left.addEventListener('click', () => carros.prev())
  carros_right.addEventListener('click', () => carros.next())
}

const planosItem = document.querySelector('.planos-luxo-siema');

if( planosItem ){
  const planos = new SiemaWithDots({
    selector: '.planos-luxo-siema',
    duration: 250,
    threshold: 0,
    loop: true,
    onInit: function(){
        this.addDots();
        this.updateDots();
    },
    onChange: function(){
        this.updateDots()
    },
  })
  setInterval(() => planos.next(), 10000)
}

const galeSlides = document.querySelector('.slides_siema')

if( galeSlides ){
  const galeria_slides = new SiemaWithDots({
    selector: '.slides_siema',
    duration: 250,
    threshold: 0,
    loop: true,
    onInit: function(){
        this.addDots();
        this.updateDots();
    },
    onChange: function(){
        this.updateDots()
    },
  })
  setInterval(() => galeria_slides.next(), 10000)

  const galeria_prev = document.querySelector('.slides-container .arrows-left')
  const galeria_next = document.querySelector('.slides-container .arrows-right')

  galeria_prev.addEventListener('click', () => galeria_slides.prev())
  galeria_next.addEventListener('click', () => galeria_slides.next())
}