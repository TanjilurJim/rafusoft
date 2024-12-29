@extends('ui.layout.common')

@section('meta')
    <meta name="description"
        content="Instantly create QR CODE, helping users to generate QR Code instantly">
    <meta name="keywords"
        content="IT Solution Dinajpur, Software Company, IT Training, Software Services, Firmware Development, ICT Courses" />
    <meta name="author" content="Developed by rafusoft.com">
    <title>QR Code Generator Online | Rafusoft</title>
    <link rel="canonical" href="https://rafusoft.com/tools/qr-code" />


    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="img/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/tools.css') }}">

    <meta property="og:title" content="QR Code Generator Online | Rafusoft">
    <meta property="og:site_name" content="Rafusoft">
    <meta property="og:url" content="https://rafusoft.com/tools/qr-code">
    <meta property="og:description"
        content="Rafusoft: more than a software company, a dream for Bangladeshi developers. Empowering aspirations, fostering innovation in the tech landscape.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/img/jim/rafusoft-403.png') }}">
    
    <meta property="og:logo" content="{{ asset('assets/img/jim/logo.webp') }}" />
        

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@rafusoft" />
    <meta name="twitter:title" content="QR Code Generator | Rafusoft" />
    <meta name="twitter:description"
        content="Rafusoft: more than a software company, a dream for Bangladeshi developers. Empowering aspirations, fostering innovation in the tech landscape." />
    <meta name="twitter:image" content="{{ asset('assets/img/favicon.png') }}" />
@endsection

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    .button-active {
        color: #F15A29; /* Text stays orange */
        border-color: #F15A29; /* Border stays orange */
    }
</style>
<div>
    <div>
        <div class="tools-bg pt-10 pb-3">
            <h1 class="text-white mt-32 text-5xl text-center font-medium">QR CODE GENERATOR</h1>
            <h3 class="text-center mt-5 text-white text-3xl">Generate QR Codes Instantly for Your Links, Text, and More</h3>

            <div class="text-center my-20 ">
                <a href="#content" class="bg-[#F15A29] block px-4 py-2 w-14 mx-auto rounded">
                    <img class="animate-bounce" src="{{ asset('assets/img/arrow.png') }}" alt="scroll down image" />
                </a>
            </div>
        </div>

        <div class="max-w-6xl mx-auto my-10">

             <!-- Tabs Section -->
             <div class="flex flex-wrap justify-center gap-2 sm:gap-4 mb-5 p-3 border-2 border-orange-500 bg-white shadow rounded">
                <button id="btnURL" 
                    class="text-gray-500 hover:text-orange px-4 py-2 rounded border-b-2 border-transparent hover:border-orange-600 align-middle hover:bg-gray-100 text-sm sm:text-base">
                    URL
                </button>
                <button id="btnText" 
                    class="text-gray-500 hover:text-orange px-4 py-2 rounded border-b-2 border-transparent hover:border-orange-600 hover:bg-gray-200 text-sm sm:text-base">
                    Text
                </button>
                <button id="btnWiFi" 
                    class="text-gray-500 hover:text-orange px-4 py-2 rounded border-b-2 border-transparent hover:border-orange-600 hover:bg-gray-200 text-sm sm:text-base">
                    Wi-Fi
                </button>
                <button id="btnVCard" 
                    class="text-gray-500 hover:text-orange px-4 py-2 rounded border-b-2 border-transparent hover:border-orange-600 hover:bg-gray-200 text-sm sm:text-base">
                    vCard
                </button>
            </div>
            

        <!-- Two-Column Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <!-- Left Column: QR Code Generator Inputs -->
            <div class="p-5 bg-gray-100 shadow rounded">
                <!-- Button Selection -->
                {{-- <div class="flex justify-center space-x-4 mb-5">
                    <button id="btnURL" class="bg-[#F15A29] text-white px-5 py-2 rounded">URL</button>
                    <button id="btnText" class="bg-[#F15A29] text-white px-5 py-2 rounded">Text</button>
                    <button id="btnWiFi" class="bg-[#F15A29] text-white px-5 py-2 rounded">WiFi</button>
                    <button id="btnVCard" class="bg-[#F15A29] text-white px-5 py-2 rounded">vCard</button>
                </div>  --}}
                {{-- <h2 class="text-xl font-medium mb-4">Give your Information</h2> --}}
                <!-- Dynamic Input Section -->
                <form id="qrCodeForm">
                    <!-- Input for Text/URL -->
                    <div id="dynamicInputs" class="mt-5">
                        <label for="qrInput" class="text-xl font-medium text-zinc-800">
                            Enter Text or URL
                        </label>
                        <input 
                            type="text" 
                            id="qrInput" 
                            class="p-3 border border-gray-300 block w-full rounded mt-4 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:border-orange-600 hover:border-orange-600 transition-all duration-300"
                            placeholder="Enter the text or URL">
                    </div>
        <!-- Customization Options -->
        <div class="mt-5">
    <!-- Section Header -->
    <div 
        class="flex items-center justify-between p-4 bg-orange-500 text-white rounded-t-lg cursor-pointer shadow-md hover:shadow-lg bg-gradient-to-r from-orange-500 to-orange-500 hover:from-orange-500 hover:to-yellow-500 transition-all duration-300"
        id="toggleCustomizeSection">
        <span class="text-lg font-medium">Customize QR Code</span>
        <span id="customizeToggleArrow" class="material-icons"></span>
    </div>

    <!-- Collapsible Content -->
    <div id="customizeSectionContent" class="p-4 border border-orange-500 rounded-b-lg hidden shadow-lg">
        <div class="flex flex-col space-y-4">
            <!-- Pattern Color -->
            <div>
                <label class="text-sm font-medium block">Pattern Color:</label>
                <div class="flex items-center space-x-2">
                    <input type="color" id="patternColor" value="#000000" class="w-12 h-12 p-0 border rounded">
                    <input type="text" id="patternColorCode" value="#000000" 
                           class="border border-gray-300 p-2 rounded w-32 focus:outline-none focus:ring-2 focus:ring-orange-600">
                </div>
            </div>

            <!-- Background Color -->
            <div>
                <label class="text-sm font-medium block">Background Color:</label>
                <div class="flex items-center space-x-2">
                    <input type="color" id="bgColor" value="#FFFFFF" class="w-12 h-12 p-0 border rounded">
                    <input type="text" id="bgColorCode" value="#FFFFFF" 
                           class="border border-gray-300 p-2 rounded w-32 focus:outline-none focus:ring-2 focus:ring-orange-600">
                </div>
            </div>

            <!-- Marker Border Color and Shape -->
            <div>
                <label class="text-sm font-medium block">Marker Border:</label>
                <div class="flex items-center space-x-2">
                    <input type="color" id="markerBorderColor" value="#000000" class="w-12 h-12 p-0 border rounded">
                    <input type="text" id="markerBorderColorCode" value="#000000" 
                           class="border border-gray-300 p-2 rounded w-32 focus:outline-none focus:ring-2 focus:ring-orange-600">
                    <select id="markerShape" class="border border-gray-300 p-2 rounded w-32 focus:outline-none focus:ring-2 focus:ring-orange-600">
                        <option value="square">Square</option>
                        <option value="circle">Circle</option>
                        <option value="rounded">Rounded</option>
                    </select>
                </div>
            </div>

            <!-- QR Code Pattern Selection -->
            <div>
                <label class="text-sm font-medium block">QR Code Pattern:</label>
                <select id="patternType" class="p-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-orange-600">
                    <option value="square">Square</option>
                    <option value="dots">Dots</option>
                    <option value="extra-rounded">Extra Rounded</option>
                    <option value="classy">Classy</option>
                    <option value="classy-rounded">Classy Rounded</option>
                </select>
            </div>

            

            <!-- QR Code Size -->
            <div>
                <label class="text-sm font-medium block">QR Code Size (px):</label>
                <input type="number" id="qrSize" value="300" min="100" max="1000" 
                       class="border border-gray-300 p-2 rounded w-32 focus:outline-none focus:ring-2 focus:ring-orange-600">
            </div>
            {{-- upload logo --}}
            <div>
                <label class="text-sm font-medium block mb-2">Upload Logo (Optional):</label>
                <div class="flex items-center space-x-2">
                    <!-- Custom Button -->
                    <label for="logoImage" class="button bg-orange-500 text-white px-4 py-2 rounded cursor-pointer hover:bg-blue-600 transition-all duration-300">
                        Choose File
                    </label>
                    <!-- File Name Display -->
                    <span id="fileName" class="text-gray-500 text-sm italic">No file chosen</span>
                </div>
                <!-- Hidden Input -->
                <input type="file" id="logoImage" accept="image/*" class="hidden">
            </div>
        </div>
    </div>
</div>
    
       <!-- Frame Customization -->
<!-- Frame Options Section -->
<div class="mt-5">
    <!-- Section Header -->
    <div 
        class="flex items-center justify-between p-4 bg-orange-500 text-white rounded-t-lg cursor-pointer shadow-md hover:shadow-lg bg-gradient-to-r from-orange-500 to-orange-500 hover:from-orange-500 hover:to-yellow-500 transition-all duration-300"
        id="toggleFrameOptionsSection">
        <span class="text-lg font-medium">Frame Options</span>
        <span id="frameToggleArrow" class="material-icons">expand_more</span>
    </div>

    <!-- Collapsible Content -->
    <div id="frameOptionsContent" class="p-4 border border-orange-500 rounded-b-lg hidden shadow-lg">
        <div class="flex flex-col space-y-4">
            <!-- Enable Frame Checkbox -->
            <div>
                <label class="text-sm font-medium flex items-center">
                    <input type="checkbox" id="enableFrame" class="mr-2"> Enable Frame
                </label>
            </div>

            <!-- Frame Options (Visible when Enable Frame is Checked) -->
            <div id="frameOptions" class="space-y-4 hidden">
                <!-- Frame Position -->
                <div>
                    <label class="text-sm font-medium block">Frame Position:</label>
                    <select id="framePosition" class="p-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="above">Above QR Code</option>
                        <option value="below" selected>Below QR Code</option>
                    </select>
                </div>

                <!-- Frame Label -->
                <div>
                    <label class="text-sm font-medium block">Frame Label:</label>
                    <input type="text" id="frameLabel" placeholder="Enter frame text"
                        class="p-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500" value="SCAN ME">
                </div>

                <!-- Frame Background Color -->
                <div>
                    <label class="text-sm font-medium block">Frame Background Color:</label>
                    <div class="flex items-center space-x-2">
                        <input type="color" id="frameBgColor" value="#000000" class="w-12 h-12 p-0 border rounded">
                        <input type="text" id="frameBgColorCode" value="#000000" 
                               class="border border-gray-300 p-2 rounded w-32 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <!-- Frame Border Color -->
                <div>
                    <label class="text-sm font-medium block">Frame Border Color:</label>
                    <div class="flex items-center space-x-2">
                        <input type="color" id="frameBorderColor" value="#000000" class="w-12 h-12 p-0 border rounded">
                        <input type="text" id="frameBorderColorCode" value="#000000" 
                               class="border border-gray-300 p-2 rounded w-32 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- QR Code Pattern Selection -->

    
     
    
        <!-- Live Preview and Generate Button -->
       <!-- Generate Button -->
       {{-- <button type="button" id="generateQrCode"
       class="button mt-5 bg-[#F15A29] text-white px-5 py-2 rounded">Generate QR Code</button> --}}
</form>
</div>
    
    

    <!-- QR Code Output Section -->
<!-- QR Code Output Section -->
 <!-- Right Column: QR Code Preview -->
 <div class="p-5 bg-gray-100 shadow rounded">
    <h3 class="text-xl font-medium mb-4 text-center">Live QR Code Preview</h3>
    <div id="qrCodeContainer" class="flex flex-col justify-center items-center">
        <!-- Placeholder for QR Code -->
        <div id="qrPlaceholder" class="flex justify-center items-center text-gray-500 w-72 h-72 border-2 border-dashed border-gray-300 mx-auto my-5 text-lg bg-gray-100">
            QR Code will generate here
        </div>
        <!-- QR Code will be rendered here -->
        <div id="qrcode" class="flex justify-center"></div>
        <div id="frameLabelDisplay" class="mt-3 text-lg font-bold text-zinc-800"></div>
    </div>
    <!-- Download Buttons -->
    <div class="text-center mt-5">
        <a id="downloadPng" href="#"
            class="button bg-[#F15A29] text-white px-4 py-3 rounded inline-block"
            style="display: none;">Download PNG</a>
        <a id="downloadSvg" href="#"
            class="button bg-[#F15A29] text-white px-4 py-3 rounded inline-block"
            style="display: none;">Download SVG</a>
    </div>
      <!-- Share to Socials -->
    {{-- <div class="relative inline-block"> --}}
    <!-- Share Button and Options -->
    <div class="text-center mt-5">
        <!-- Share to Socials Button -->
        {{-- <button id="shareButton" 
            class="button bg-[#F15A29] text-white px-4 py-3 rounded inline-block mb-2">
            Share to Socials
        </button>

        <!-- Redirect to QR Code Scanner Button -->
        <button onclick="window.location.href='{{ route('tools.qrcodeScanner') }}'" 
            class="button bg-[#F15A29] text-white px-4 py-3 rounded inline-block">
            Go to QR Code Scanner
        </button> --}}

          <!-- Social Media Share Options and Scanner Button -->
          <div id="shareButton"> </div>
            {{-- <div class="relative min-h-screen flex flex-col justify-end bg-gray-100">
                <!-- Ensures content is at the bottom -->
                <div class="flex flex-col sm:flex-row justify-between items-center p-3 sm:p-5 bg-white">
                    <!-- Adjust padding and background as needed -->
                    <!-- Social media icons on the left -->
                    <div class="flex space-x-2 sm:space-x-4 justify-center mb-4 sm:mb-0"> --}}
                        <!-- Reduces spacing on smaller screens, no bottom margin on larger screens -->
                        <div class="flex flex-wrap items-center justify-between">
                            <!-- Icons on the left -->
                            <div class="flex items-center space-x-3">
                              <a href="#" id="shareFacebook" class="text-blue-600 text-2xl sm:text-3xl hover:text-blue-800">
                                <i class="fab fa-facebook-square"></i>
                              </a>
                              <a href="#" id="shareWhatsapp" class="text-green-500 text-2xl sm:text-3xl hover:text-green-700">
                                <i class="fab fa-whatsapp"></i>
                              </a>
                              <a href="#" id="shareTwitter" class="text-blue-400 text-2xl sm:text-3xl hover:text-blue-600">
                                <i class="fab fa-twitter-square"></i>
                              </a>
                              <a href="#" id="shareInstagram" class="text-pink-500 text-2xl sm:text-3xl hover:text-pink-700">
                                <i class="fab fa-instagram-square"></i>
                              </a>
                            </div>
                          
                            <!-- Button on the right -->
                            <button
                              onclick="window.location.href='{{ route('tools.qrcodeScanner') }}'"
                              class="bg-[#F15A29] text-white px-3 sm:px-4 py-1 sm:py-1 mb-[1px] rounded inline-block
                                     text-sm sm:text-base"
                            >
                              Go to QR Code Scanner
                            </button>
                          </div>

                          
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- QR Code Library -->
<script src="https://unpkg.com/qr-code-styling/lib/qr-code-styling.js"></script>

<script>

// async function shareQRCodeDirectly() {
//     const qrCodeCanvas = document.querySelector('#qrCodeContainer canvas'); // Locate the QR code canvas
//     if (!qrCodeCanvas) {
//         alert('No QR Code generated yet! Please generate one first.');
//         return;
//     }

//     // Convert the canvas to a Blob (image file)
//     qrCodeCanvas.toBlob(async (blob) => {
//         if (!blob) {
//             alert('Failed to generate QR Code image.');
//             return;
//         }

//         // Create a File object from the Blob
//         const qrCodeFile = new File([blob], 'QRCode.png', { type: 'image/png' });

//         // Check if the browser supports sharing files
//         if (navigator.canShare && navigator.canShare({ files: [qrCodeFile] })) {
//             try {
//                 // Share the QR code image using Web Share API
//                 await navigator.share({
//                     files: [qrCodeFile],
//                     title: 'QR Code',
//                     text: 'Here is your QR Code.',
//                 });
//                 alert('QR Code shared successfully!');
//             } catch (error) {
//                 console.error('Error sharing QR Code:', error);
//                 alert('Failed to share QR Code.');
//             }
//         } else {
//             alert('Your browser does not support direct file sharing.');
//         }
//     }, 'image/png');
// }

// Add an event listener for the new "Share QR Code" button
document.getElementById('shareDirectly').addEventListener('click', shareQRCodeDirectly);
    // Toggle "Frame Options" Section
    const toggleFrameOptionsSection = document.getElementById('toggleFrameOptionsSection');
const frameOptionsContent = document.getElementById('frameOptionsContent');
const frameToggleArrow = document.getElementById('frameToggleArrow');

toggleFrameOptionsSection.addEventListener('click', () => {
    frameOptionsContent.classList.toggle('hidden');
    frameToggleArrow.textContent = frameOptionsContent.classList.contains('hidden')
        ? 'expand_more' // Arrow points down when hidden
        : 'expand_less'; // Arrow points up when expanded
});

// Set default arrow icons on page load
document.addEventListener('DOMContentLoaded', () => {
    customizeToggleArrow.textContent = 'expand_more';
    frameToggleArrow.textContent = 'expand_more';
});

// Enable/Disable Frame Options
const enableFrameCheckbox = document.getElementById('enableFrame');
const frameOptions = document.getElementById('frameOptions');

enableFrameCheckbox.addEventListener('change', () => {
    frameOptions.style.display = enableFrameCheckbox.checked ? 'block' : 'none';
});

// Sync Frame Color Inputs
syncColorInputs('frameBgColor', 'frameBgColorCode');
syncColorInputs('frameBorderColor', 'frameBorderColorCode');

</script>

<script>
const dynamicInputs = document.getElementById('dynamicInputs');
const qrCodeOutput = document.getElementById('qrcode');
const downloadPng = document.getElementById('downloadPng');
const downloadSvg = document.getElementById('downloadSvg');
let currentMode = 'url';
let qrCode; 
// Holds the QR CodeStyling instance
const buttons = document.querySelectorAll('button');


// Add event listeners to each button
buttons.forEach(button => {
    button.addEventListener('click', () => {
        // Remove 'button-active' from all buttons
        buttons.forEach(btn => btn.classList.remove('button-active'));

        // Add 'button-active' to the clicked button
        button.classList.add('button-active');
    });
});
function syncColorInputs(colorInputId, colorCodeInputId) {
    const colorInput = document.getElementById(colorInputId);
    const colorCodeInput = document.getElementById(colorCodeInputId);

    // Update text input when the color picker changes
    colorInput.addEventListener('input', () => {
        colorCodeInput.value = colorInput.value.toUpperCase();
        updatePreview(); // Update QR code preview when color changes
    });

    // Update color picker when the text input changes
    colorCodeInput.addEventListener('input', () => {
        const colorCode = colorCodeInput.value.trim();
        if (/^#([0-9A-F]{3}|[0-9A-F]{6})$/i.test(colorCode)) {
            colorInput.value = colorCode;
            updatePreview(); // Update QR code preview when color changes
        }
    });
}
// Mode Switching Logic
document.getElementById('btnURL').addEventListener('click', () => switchMode('url'));
document.getElementById('btnText').addEventListener('click', () => switchMode('text'));
document.getElementById('btnWiFi').addEventListener('click', () => switchMode('wifi'));
document.getElementById('btnVCard').addEventListener('click', () => switchMode('vcard'));

function switchMode(mode) {
    currentMode = mode;
    let html = '';

    switch (mode) {
        case 'url':
            html = `
                <label for="qrInput" class="text-xl font-medium text-zinc-800 pl-1">
                    Enter URL
                </label>
                <input 
                    type="text" 
                    id="qrInput" 
                    class="p-3 border border-gray-300 block w-full rounded mt-4 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:border-orange-600 hover:border-orange-600 transition-all duration-300"
                    placeholder="Enter the URL">
            `;
            break;

        case 'text':
            html = `
                <label for="qrInput" class="text-xl font-medium text-zinc-800 pl-1">
                    Enter Text
                </label>
                <input 
                    type="text" 
                    id="qrInput" 
                    class="p-3 border border-gray-300 block w-full rounded mt-4 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:border-orange-600 hover:border-orange-600 transition-all duration-300"
                    placeholder="Enter the text">
            `;
            break;

        case 'wifi':
            html = `
                <label class="text-xl font-medium text-zinc-800 pl-1">
                    Network Name
                </label>
                <input 
                    type="text" 
                    id="wifiName" 
                    class="p-3 border border-gray-300 block w-full rounded mt-4 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:border-orange-600 hover:border-orange-600 transition-all duration-300"
                    placeholder="Enter Network Name"> <br>

                <label class="text-xl font-medium text-zinc-800 pl-1 ">
                    Password
                </label>
                <input 
                    type="text" 
                    id="wifiPassword" 
                    class="p-3 border border-gray-300 block w-full rounded mt-4 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:border-orange-600 hover:border-orange-600 transition-all duration-300"
                    placeholder="Enter Password"> <br>

                <label class="text-xl font-medium text-zinc-800 pl-1">
                    Encryption
                </label>
                <select 
                    id="wifiEncryption" 
                    class="p-3 border border-gray-300 block w-full rounded mt-4 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:border-orange-600 hover:border-orange-600 transition-all duration-300">
                    <option value="WPA">WPA/WPA2</option>
                    <option value="WEP">WEP</option>
                    <option value="None">None</option>
                </select>
            `;
            break;

        case 'vcard':
            html = `
                <label class="text-xl font-medium text-zinc-800 pl-1">
                    Your Name
                </label>
                <input 
                    type="text" 
                    id="vName" 
                    class="p-3 border border-gray-300 block w-full rounded mt-4 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:border-orange-600 hover:border-orange-600 transition-all duration-300"
                    placeholder="Enter Name"> <br>

                <label class="text-xl font-medium text-zinc-800 pl-1">
                    Job Title
                </label>
                <input 
                    type="text" 
                    id="vJobTitle" 
                    class="p-3 border border-gray-300 block w-full rounded mt-4 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:border-orange-600 hover:border-orange-600 transition-all duration-300"
                    placeholder="Enter Job Title">

                <!-- Repeat for other fields like Contact, Email, etc. -->
            `;
            break;
    }

    dynamicInputs.innerHTML = html;
    attachInputListeners(); // Attach listeners for live preview
}

// Attach listeners to all inputs for live updates
function attachInputListeners() {
    document.querySelectorAll('#qrCodeForm input, #qrCodeForm select').forEach(input => {
        input.addEventListener('input', updatePreview);
    });
}

// Update QR Code Preview (Live)
function updatePreview() {
    // Get the logo file
const logoInput = document.getElementById('logoImage');
const logoFile = logoInput.files[0];
const fileNameDisplay = document.getElementById('fileName');

if (logoFile) {
    // Validate file type
    const validFileTypes = ['image/jpeg', 'image/png'];
    if (!validFileTypes.includes(logoFile.type)) {
        alert('Only JPG and PNG files are allowed.');
        logoInput.value = ''; // Clear the input
        fileNameDisplay.textContent = 'No file chosen'; // Reset file name
        return; // Stop the preview update
    }

    // Validate file size
    const maxFileSize = 100 * 1024; // 100 KB
    if (logoFile.size > maxFileSize) {
        alert('File size must not exceed 100 KB.');
        logoInput.value = ''; // Clear the input
        fileNameDisplay.textContent = 'No file chosen'; // Reset file name
        return; // Stop the preview update
    }

    // Display file name
    fileNameDisplay.textContent = logoFile.name;
} else {
    fileNameDisplay.textContent = 'No file chosen'; // Reset if no file is selected
}

    // Generate the QR code if the logo is valid or not provided
    const logoURL = logoFile ? URL.createObjectURL(logoFile) : null;

    // Get other input values
    const patternColor = document.getElementById('patternColor').value;
    const bgColor = document.getElementById('bgColor').value;
    const markerBorderColor = document.getElementById('markerBorderColor')?.value || "#000000";
    const markerShape = document.getElementById('markerShape')?.value || "square";
    const qrSize = parseInt(document.getElementById('qrSize').value, 10);
    const patternType = document.getElementById('patternType').value; // New pattern type
    const enableFrame = document.getElementById('enableFrame').checked;

    const frameLabel = document.getElementById('frameLabel')?.value || "";
    const framePosition = document.getElementById('framePosition')?.value || "below";
    const frameBgColor = document.getElementById('frameBgColor')?.value || "#000000";
    const frameBorderColor = document.getElementById('frameBorderColor')?.value || "#000000";

    // Determine QR Code content based on the current mode
    let qrText = "";

    switch (currentMode) {
        case 'url':
        case 'text':
            qrText = document.getElementById('qrInput')?.value || "";
            break;

        case 'wifi':
            const wifiName = document.getElementById('wifiName').value;
            const wifiPassword = document.getElementById('wifiPassword').value;
            const wifiEncryption = document.getElementById('wifiEncryption').value;
            qrText = `WIFI:T:${wifiEncryption};S:${wifiName};P:${wifiPassword};;`;
            break;

        case 'vcard':
            const vName = document.getElementById('vName')?.value || "";
            const vJobTitle = document.getElementById('vJobTitle')?.value || "";
            const vContact = document.getElementById('vContact')?.value || "";
            const vEmail = document.getElementById('vEmail')?.value || "";
            const vCompany = document.getElementById('vCompany')?.value || "";
            const vAddress = document.getElementById('vAddress')?.value || "";
            const vCity = document.getElementById('vCity')?.value || "";
            const vCountry = document.getElementById('vCountry')?.value || "";
            qrText = `BEGIN:VCARD\nVERSION:3.0\nN:${vName}\nTITLE:${vJobTitle}\nTEL:${vContact}\nEMAIL:${vEmail}\nORG:${vCompany}\nADR:${vAddress};${vCity};;${vCountry}\nEND:VCARD`;
            break;

        default:
            qrText = "Live Preview";
    }

    

    // Clear and regenerate the QR code
const qrCodeContainer = document.getElementById('qrCodeContainer');
qrCodeContainer.innerHTML = ''; // Clear existing QR code content

// Initialize or update the QR CodeStyling instance
if (!qrCode) {
    qrCode = new QRCodeStyling({
        width: qrSize,
        height: qrSize,
        data: qrText,
        dotsOptions: { color: patternColor, type: patternType },
        cornersSquareOptions: { color: markerBorderColor, type: markerShape },
        backgroundOptions: { color: bgColor },
        image: logoURL,
        imageOptions: { crossOrigin: "anonymous", margin: 10 },
    });
} else {
    qrCode.update({
        width: qrSize,
        height: qrSize,
        data: qrText,
        dotsOptions: { color: patternColor, type: patternType },
        cornersSquareOptions: { color: markerBorderColor, type: markerShape },
        backgroundOptions: { color: bgColor },
        image: logoURL,
        imageOptions: { crossOrigin: "anonymous", margin: 10 },
    });
}

// Append the QR Code to the container
qrCode.append(qrCodeContainer);

    // Add frame only if enabled
    if (enableFrame) {
        const frameDiv = document.createElement('div');
        frameDiv.style.cssText = `
            background-color: ${frameBgColor};
            color: white;
            border: 2px solid ${frameBorderColor};
            width: ${qrSize}px;
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
            padding: 8px 0;
            margin-top: ${framePosition === 'below' ? '10px' : '0'};
            margin-bottom: ${framePosition === 'above' ? '10px' : '0'};
        `;
        frameDiv.textContent = frameLabel;

        if (framePosition === 'above') {
            qrCodeContainer.prepend(frameDiv);
        } else {
            qrCodeContainer.appendChild(frameDiv);
        }
    }

    // Show download buttons
    downloadPng.style.display = 'inline-block';
    downloadSvg.style.display = 'inline-block';

    downloadPng.onclick = () => qrCode.download({ name: "qrcode", extension: "png" });
    downloadSvg.onclick = () => qrCode.download({ name: "qrcode", extension: "svg" });
}

document.getElementById('logoImage').addEventListener('change', () => {
    const file = document.getElementById('logoImage').files[0];
    const fileNameDisplay = document.getElementById('fileName');

    if (file) {
        fileNameDisplay.textContent = file.name;
    } else {
        fileNameDisplay.textContent = 'No file chosen';
    }
});

syncColorInputs('patternColor', 'patternColorCode');
syncColorInputs('bgColor', 'bgColorCode');
syncColorInputs('markerBorderColor', 'markerBorderColorCode');
// Toggle frame options visibility
document.getElementById('enableFrame').addEventListener('change', (e) => {
    const frameOptions = document.getElementById('frameOptions');
    frameOptions.style.display = e.target.checked ? 'block' : 'none';
});

document.getElementById('shareButton').addEventListener('click', () => {
    const shareOptions = document.getElementById('shareOptions');
    shareOptions.classList.toggle('hidden');
});

async function shareToSocial(platform) {
    const qrTextInput = document.getElementById('qrInput'); // Replace with your actual input field for QR text
    const qrData = qrTextInput ? qrTextInput.value : 'Default QR Data'; // Get the input or use default

    if (!qrData) {
        alert('No QR Code data provided!');
        return;
    }

    // Generate a URL with query parameters for the QR code data
    const hostedPageURL = `${window.location.origin}/tools/qr-code-show?data=${encodeURIComponent(qrData)}`;

    // If on mobile and Web Share API is supported, use it
    if (isMobileDevice() && navigator.share) {
        try {
            await navigator.share({
                title: 'Check out this QR code!',
                text: 'Scan this QR code or share it with others.',
                url: hostedPageURL,
            });
            return; // Exit after successful sharing
        } catch (error) {
            console.error('Web Share API failed:', error);
            alert('Sharing failed. Falling back to traditional methods.');
        }
    }

    // Fallback for unsupported platforms (desktop and other cases)
    let shareURL = '';
    switch (platform) {
        case 'facebook':
            shareURL = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(hostedPageURL)}`;
            break;
        case 'whatsapp':
            shareURL = `https://api.whatsapp.com/send?text=${encodeURIComponent(hostedPageURL)}`;
            break;
        case 'twitter':
            shareURL = `https://twitter.com/intent/tweet?url=${encodeURIComponent(hostedPageURL)}&text=${encodeURIComponent('Check out this QR code!')}`;
            break;
        case 'instagram':
            const copySuccess = copyToClipboard(hostedPageURL);
            if (copySuccess) {
                alert('The link has been copied to your clipboard. Paste it in an Instagram DM or post.');
            } else {
                alert('Unable to copy the link. Please copy it manually:\n' + hostedPageURL);
            }
            return;
        default:
            alert('Unsupported platform!');
            return;
    }

    // Open the share URL for desktop
    if (shareURL) {
        window.open(shareURL, '_blank');
    }
}

// Utility to detect mobile devices
function isMobileDevice() {
    return /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
}

// Clipboard copy function
function copyToClipboard(text) {
    try {
        navigator.clipboard.writeText(text);
        return true;
    } catch (err) {
        console.error('Failed to copy text: ', err);
        return false;
    }
}
// Add event listeners to the buttons
document.getElementById('shareFacebook').addEventListener('click', () => shareToSocial('facebook'));
    document.getElementById('shareWhatsapp').addEventListener('click', () => shareToSocial('whatsapp'));
    document.getElementById('shareTwitter').addEventListener('click', () => shareToSocial('twitter'));
    document.getElementById('shareInstagram').addEventListener('click', () => shareToSocial('instagram'));

// Function to copy text to clipboard
function copyToClipboard(text) {
    try {
        navigator.clipboard.writeText(text);
        return true;
    } catch (err) {
        console.error('Failed to copy text: ', err);
        return false;
    }
}

async function saveQRCodeImage() {
    const qrCodeCanvas = document.querySelector('#qrCodeContainer canvas');
    if (!qrCodeCanvas) {
        alert('No QR Code generated yet! Please generate one first.');
        return null;
    }
    return qrCodeCanvas.toDataURL('image/png'); // Convert the canvas to an image URL
}

// Initialize
switchMode(currentMode);
attachInputListeners();



</script>

<script>
    const toggleCustomizeSection = document.getElementById('toggleCustomizeSection');
const customizeSectionContent = document.getElementById('customizeSectionContent');
const customizeToggleArrow = document.getElementById('customizeToggleArrow');

toggleCustomizeSection.addEventListener('click', () => {
    customizeSectionContent.classList.toggle('hidden');
    customizeToggleArrow.textContent = customizeSectionContent.classList.contains('hidden')
        ? 'expand_more' // When hidden, show "expand_more"
        : 'expand_less'; // When visible, show "expand_less"


});
</script>
<script>
    // Get the file input element
    const logoInput = document.getElementById('logoImage');

    // Add event listener for file change
    logoInput.addEventListener('change', () => {
        const file = logoInput.files[0]; // Get the selected file

        if (file) {
            // Validate file type (allow only JPG and PNG)
            const validFileTypes = ['image/jpeg', 'image/png'];
            if (!validFileTypes.includes(file.type)) {
                alert('Only JPG and PNG files are allowed.');
                logoInput.value = ''; // Clear the input
                return;
            }

            // Validate file size (must not exceed 100 KB)
            const maxFileSize = 100 * 1024; // 100 KB in bytes
            if (file.size > maxFileSize) {
                alert('File size must not exceed 100 KB.');
                logoInput.value = ''; // Clear the input
                return;
            }

            // File is valid
            console.log('File is valid:', file.name);
        }
    });
</script>

<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Rafusoft",
      "url": "https://rafusoft.com",
      "logo": "https://rafusoft.com/assets/img/favicon.png",
      "description": "Top Best Software Company in Bangladesh for IOS And Android Development, Professional SEO Service. 100% Free Support",
      "sameAs": [
        "https://www.facebook.com/rafusoft",
        "https://twitter.com/rafusoft"
      ],
      "keywords": ["Rafusoft", "Software Company", "Bangladesh", "Android Development", "SEO Service", "QR", "QR-Code", "QRCODE", "QRCode Generator"],
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+8801234567890",
        "contactType": "Customer Service",
        "areaServed": "BD",
        "availableLanguage": ["en", "bn"]
      }
    }
    </script>
    
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Article",
      "headline": "Rafusoft QR Code Generator",
      "image": "https://rafusoft.com/schema_image/rafusoft-qr-code-generator.jpg",
      "datePublished": "2024-04-30T06:00:00+08:00",
      "dateModified": "2024-04-30T06:00:00+08:00",
      "author": {
        "@type": "Person",
        "name": "SM Rafeat Hossian"
      },
      "publisher": {
        "@type": "Organization",
        "name": "Rafusoft",
        "logo": {
          "@type": "ImageObject",
          "url": "https://rafusoft.com/assets/img/favicon.png"
        }
      },
      "description": "Rafusoft provides an advanced QR Code Generator tool with additional features, making it a top choice for businesses and developers in Bangladesh."
    }
    </script>
    
@endsection