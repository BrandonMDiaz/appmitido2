
function show(id){
  if(id.id == 'btn-asp'){
    let form = document.getElementById(`form-asp`);
    if(form.classList.contains('hide')){
      form.classList.remove('hide');
      let form2 = document.getElementById(`form-uni`);
      form2.classList.add('hide');
      let btn = document.getElementById(`btn-uni`);
      btn.classList.remove('button-selected')
      id.classList.add('button-selected')
    }
  }
  else if(id.id == 'btn-uni'){
    let form = document.getElementById(`form-uni`);
    if(form.classList.contains('hide')){
      form.classList.remove('hide');
      let form2 = document.getElementById(`form-asp`);
      form2.classList.add('hide');
      let btn = document.getElementById(`btn-asp`);
      btn.classList.remove('button-selected')
      id.classList.add('button-selected')
    }
  }
}
