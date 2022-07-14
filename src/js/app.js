document.addEventListener('DOMContentLoaded', function(){
    eventListeners();
    darkMode();
})
function darkMode(){
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');


    if(prefiereDarkMode.matches){
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    }
//leer si el ususario cambia 
    prefiereDarkMode.addEventListener('change', function(){
        if(prefiereDarkMode.matches){
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode');
        }
    })
    const botonDarkmode= document.querySelector('.dark-mode-boton');
    botonDarkmode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    } )
}
function eventListeners(){
    const mobilMenu= document.querySelector('.mobile-menu');
    mobilMenu.addEventListener('click', navegacionResposive)
}

function navegacionResposive(){
    const navegacion = document.querySelector('.navegacion');
   
     navegacion.classList.toggle('mostrar')
  
}