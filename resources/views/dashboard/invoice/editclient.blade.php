@extends('dashboard.layout')



@section('content')
    <section class="p-3">

        <div class="bg-[#343A40] p-3 rounded text-white flex justify-between items-center">
            <h1 class="text-[20px] flex items-center">Edit Client</h1>
        </div>
        

        <form class="p-3 shadow-sm mt-3" method="POST" action="/dashboard/invoice/edit/{{ $invoice->id }}">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name<span class="text-red-500">*</span></label>
                    <input type="text" placeholder="Enter Customer  Name" name="name" required  class="form-control" value="{{ $invoice->name }}">
                </div>
                <input type="text" class="hidden" name="code" id="code">
                <div>
                    <label for="phone" class='text-[16px]'>Mobile (WhatsApp):</label>
                    <input type="number" value="{{$invoice->phone}}" name='phone' id="mobile_code" onkeyup="conutryCode(this)" class='form-control' style="width: 100% !importent;" placeholder='Mobile' required />
                    @error('phone')
                        <div class="text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                    <p id="error-message" style="color: red;"></p>
                </div>

                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" placeholder="Enter Customer Email" name="email" class="form-control" value="{{ $invoice->u_email }}">
                </div>

                <div class="form-group">
                    <label for="name">Currency</label>
                    <input type="text" name="currency" class="form-control"  value="{{ $invoice->currency }}">
                </div>
            </div>
           
               <div class="text-end px-3">
                <button id="add_button" type="submit" class="btn btn-success">Save</button>
               </div>
        </form>
    </section>


    <script>
        $("#mobile_code").intlTelInput({
            initialCountry: "bd",
            separateDialCode: true,
        });



        function validatePhoneNumber(phoneInput) {
            const errorMessage = document.getElementById('error-message');
            try {
                const phoneNumber = libphonenumber.parsePhoneNumber(phoneInput);
                if (phoneNumber.isValid()) {
                    errorMessage.textContent = '';
                    document.getElementById('add_button').removeAttribute("disabled");
                } else {
                    errorMessage.textContent = 'Invalid phone number';
                    document.getElementById('add_button').addAttribute("disabled");
                }
            } catch (error) {
                errorMessage.textContent = 'Invalid phone number format';

                const button = document.getElementById('add_button')
                button.setAttribute("disabled", "true");
            }
        }



        const conutryCode = (input) => {
            const text = document.getElementsByClassName('iti__selected-dial-code')?.[0].innerText;
            console.log(text)
            console.log(input.value)
            document.getElementById('code').value = text;
            validatePhoneNumber(text + input.value)
            console.log(text + input.value);
            if (input.value.startsWith('0')) {
                const errorMessage = document.getElementById('error-message');
                errorMessage.textContent = 'Invalid phone number format';
                document.getElementById('add_button').addAttribute("disabled");
            }
        }





        const handleCheckDelete = (id) => {
            const deleteButton = document.getElementById('delete-button' + id);
            const deleteInput = document.getElementById('delete-input' + id).value;
            if (deleteInput === "DELETE") {
                deleteButton.removeAttribute('disabled');
            } else {
                deleteButton.setAttribute('disabled', 'true');

            }

            console.log(deleteInput)
        }
    </script>

@endsection
