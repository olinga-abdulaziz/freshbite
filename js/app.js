const btnNewsale=document.getElementById('btnNewSale')
const btnCheckout=document.getElementById('btnCheckout')
const posContainer=document.getElementById('posContainer')

const pwd=document.getElementById('pwd');
const check=document.getElementById('check');

function enablePos(){
    posContainer.classList.add('hide-object');
}

function showPwd() {
    if (check.checked) {
        pwd.type="text";
    }else{
        pwd.type="password";
    }
}