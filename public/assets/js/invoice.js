

const curency = document.getElementsByClassName('curency');

for (let i = 0; i < curency.length; i++) {
    curency[i].innerText = document.getElementById('curencyinput').value;
}



const curencyChange = () => {
    for (let i = 0; i < curency.length; i++) {
        curency[i].innerText = document.getElementById('curencyinput').value;
    }
}




let allitem = [];
const itemParent = document.getElementById('item-parent');





const fetchData = () => {
    let subtotal = 0;
    itemParent.innerHTML = ``;
    allitem.map(item => {
      
        subtotal= subtotal +item.quantity * item.rate 
        const currency = document.getElementById('currency-value').innerText;

        const tr = document.createElement('tr');
        tr.classList.add('border-b')
        tr.classList.add('invoice-data')
        tr.innerHTML = `
        <td><textarea id="description${item.id}" rows="1"  onchange="descriptionChange(${item.id})" class=" focus:outline-none border-slate-100 w-full text-black  rounded"  placeholder="Description of service or product...">${item.description}</textarea></td>
        <td class="w-16"><input value="${item.quantity}" id="quantity${item.id}" onchange="quantityChange(${item.id})"  type="number"  class="p-2 mt-2  focus:outline-none text-black border-slate-100  rounded" autocomplete="off"></td>
        <td class="w-16 align-center px-2">
            ${item.type}
        </td>
        <td class="w-16 flex gap-3 items-center"><input  type="number"  id="rate${item.id}"  value="${item.rate}"  class="p-2 mt-2  focus:outline-none border-slate-100 text-black rounded" onchange="rateChange(${item.id})" autocomplete="off">  <button onclick="removeitem(${item.id})" class='border text-red-500 btn mt-2 hover:text-white hover:bg-red-500'><i id="remove-data" class="fa-solid fa-xmark"></i></button> </td>
        <td class="text-end text-black pr-2"><p>${item.quantity * item.rate}  <span class="curency ps-4">${currency}</span></p></td>`
        itemParent.appendChild(tr);
        document.getElementById('sub-total').value = subtotal;
    })



    // <button onclick="removeitem(${item.id})" class='btn btn-danger'><i id="remove-data" class="fa-solid text-orange-600 fa-xmark"></i></button>

    const textareas = document.querySelectorAll("textarea");
    function autoResize() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    }

    textareas.forEach(textarea => {
        textarea.addEventListener('input', autoResize);
        autoResize.call(textarea);
    });
}


const addItemline = () => {

    const description = document.getElementById('description').value;
    const quantity = parseInt(document.getElementById('quantity').value);
    const rate = parseInt(document.getElementById('rate').value);
    const type = document.getElementById('type').value;

    if (!description) {
        Toastify({
            text: "Item Value Can't be Empty",
            duration: 3000,
            newWindow: true,
            gravity: "bottom",
            position: "right",
            stopOnFocus: true,
            style: {
                background: "linear-gradient(to right, green, green)",
            },
            onClick: function () { }
        }).showToast();
    } else {
        itemParent.innerHTML = ``;

        const data = { description: description, quantity: quantity, rate: rate, id: Math.floor(Math.random() * 1000000000)  , type: type};
        allitem.push(data);

        document.getElementById('product').value = JSON.stringify(allitem);

        fetchData();
        totalAmount()

    
        document.getElementById('description').value = ''
        document.getElementById('quantity').value = '';
        document.getElementById('rate').value = '';
    }


    
}



function autoResize() {
    this.style.height = 'auto';
    this.style.height = this.scrollHeight + 'px';
}


const descriptionChange = (id) => {

    const textareas = document.querySelectorAll("textarea");
    function autoResize() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    }

    textareas.forEach(textarea => {
        textarea.addEventListener('input', autoResize);
        autoResize.call(textarea);
    });




    const description = document.getElementById('description' + id).value;



    const item = allitem.find(item => item.id === id);
    item.description = description;


    for (let i = 0; i < curency.length; i++) {
        curency[i].innerText = document.getElementById('curencyinput').value;
    }
}



const quantityChange = (id) => {
    const quantity = document.getElementById('quantity' + id).value;
    const item = allitem.find(item => item.id === id);
    item.quantity = quantity;
    fetchData();
}



const rateChange = (id) => {
    const rate = document.getElementById('rate' + id).value;
    const item = allitem.find(item => item.id === id);
    item.rate = rate;
    fetchData();
    for (let i = 0; i < curency.length; i++) {
        curency[i].innerText = document.getElementById('curencyinput').value;
    }
}


const removeitem = (id) => {
    allitem = allitem.filter(item => item.id !== id);
    fetchData();
    console.log(allitem);
}




document.addEventListener("DOMContentLoaded", function () {
    const textareas = document.querySelectorAll("textarea");

    function autoResize() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    }

    textareas.forEach(textarea => {
        textarea.addEventListener('input', autoResize);
        autoResize.call(textarea);
    });
});











const addshiping = ()=>{
    document.getElementById('shipping-body').classList.remove('hidden');
    document.getElementById('shipping-button').classList.add('hidden')
} 
const addDiscount = ()=>{
    document.getElementById('discount-body').classList.remove('hidden');
    document.getElementById('discount-button').classList.add('hidden')
} 
const addTax = ()=>{
    document.getElementById('tax-body').classList.remove('hidden');
    document.getElementById('tax-button').classList.add('hidden')
} 




const totalAmount = ()=>{

    const total = document.getElementById("total");

    const shiping = parseInt(document.getElementById('shipping').value)
    const tax = parseInt(document.getElementById('tax').value);
    const discount = parseInt(document.getElementById('discount').value);
    const discountType = document.getElementById('discountType').value;
    const taxType = document.getElementById('taxType').value;


    const paid = document.getElementById('paid').value;

    document.getElementById('amount-pay').innerText = paid;

    document.getElementById('_paid').innerText = paid;

    let subtotal = 0;
    allitem.map(item=>{
        subtotal= subtotal +item.quantity * item.rate 
    })


    let taxs = 0 ;
    let discounts =0 ;  

    

    if(taxType == "%"){
       let  taxparcent =  tax/100;
       taxs = subtotal*taxparcent;
    }else{
        taxs= tax;
    }


    if(discountType == "%"){
       let  discountparcent =  discount/100;
       discounts = subtotal*discountparcent;
    }else{
        discounts= discount;
    }

    console.log(taxs, discounts, shiping);

    const currentTotal = (subtotal+shiping+taxs)-discounts;
    total.value = currentTotal.toFixed();

    document.getElementById('_total').innerText= currentTotal.toFixed();


    const paids = currentTotal - paid;
    document.getElementById('due-blance').value= paids.toFixed();
    document.getElementById('_due').innerText= paids.toFixed();

}






const print = () => {
    document.getElementById('item-button').style.display= "none";
    document.getElementById('item-form').style.display= "none";
    document.getElementById('shiping-button-group').style.display= "none";

    const textareas = document.querySelectorAll('textarea');
    const inputs = document.querySelectorAll('input');
    textareas.forEach(textarea => {
        textarea.classList.remove('border')
    });
    inputs.forEach(inputs => {
        inputs.classList.remove('border')
    });
    // fixed  top-[-15px]
    const content = document.getElementById('content');
    content.style.position= "fixed"
    content.style.top ='-15px'
    content.classList.add('w-full')
    content.classList.remove('container')

    window.print();
    content.classList.add('container')
    content.style.position= ""

    // document.getElementById('form-text-ariea').value= document.getElementById('content').innerHTML;
    document.getElementById('item-button').style.display= "block";
    document.getElementById('item-form').style.display= "";
    document.getElementById('shiping-button-group').style.display= "block";


    textareas.forEach(textarea => {
        textarea.classList.add('border')
    });
    inputs.forEach(inputs => {
        inputs.classList.add('border')
    });

    saveFileInDB();
};





const reprint =()=>{
    document.getElementById('item-button').style.display= "none";

    const textareas = document.querySelectorAll('textarea');
    const inputs = document.querySelectorAll('input');
    textareas.forEach(textarea => {
        textarea.classList.remove('border')
    });
    inputs.forEach(inputs => {
        inputs.classList.remove('border')
    });
    // fixed  top-[-15px]
    const content = document.getElementById('content');
    content.style.position= "fixed"
    content.style.top ='-15px'
    content.classList.add('w-full')
    content.classList.remove('container')

    window.print();
    content.classList.add('container')
    content.style.position= ""

    // document.getElementById('form-text-ariea').value= document.getElementById('content').innerHTML;
    document.getElementById('item-button').style.display= "block";
    document.getElementById('item-form').style.display= "";
    document.getElementById('shiping-button-group').style.display= "block";


    textareas.forEach(textarea => {
        textarea.classList.add('border')
    });
    inputs.forEach(inputs => {
        inputs.classList.add('border')
    });
}


const saveFileInDB = ()=>{

   const  date = document.getElementById('date_value').value;
   const  payment_term_value = document.getElementById('payment_term_value').value;
   const  due_date = document.getElementById('due_date').value;

    if (allitem.length == 0) {
        toastr.error('Please Add at least one item');
    } else if(!date){
        toastr.error('Please Select date');
    } else if(!payment_term_value){
        toastr.error('Please Select Payment Terms');
    }else if(!due_date){
        toastr.error('Please Select Due Date');
    }else{
        document.getElementById('confirm-modal').click()
        // document.getElementById('content-form').submit();
    }
}



const submitpayment =()=>{
    document.getElementById('content-form').submit();
}





function handleFileSelect(input) {
    const file = input.files[0];
    const label = document.getElementById('logo-label');
    const logo = document.getElementById('logo-base');
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            // Convert the selected file to base64
            const base64Image = e.target.result;
            // Display the base64 image in the label
            label.innerHTML = `<img id="logo-image" src="${base64Image}" class="w-80" alt="Selected Image">`;
            logo.value = base64Image;
        };
        reader.readAsDataURL(file);
    } else {
        // If no file is selected, revert to the default label
        label.innerText = '+ Add Your Logo';
    }
}






const handlePartialPay =()=>{
    const partial = parseInt(document.getElementById('partial_pay').value);
    const due = parseInt(document.getElementById('due-blance').value);
    if(partial >= due){
        document.getElementById('payment_status').value = "Paid"
    }else{
        document.getElementById('payment_status').value = "Unpaid";
    }


    document.getElementById('current_due').value = due -partial;
    document.getElementById('_c_due').innerText = due -partial;
    document.getElementById('amount-pay').innerText = partial;
    document.getElementById('_p_pay').innerText = partial;
}
handlePartialPay();




const handleSavePartial =()=>{
    document.getElementById('partial-pay-form').submit();
}



function goBack() {
    window.history.back();
}