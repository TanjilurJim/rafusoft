@extends('ui.layout.common')
@section('meta')
    <meta name="description"
        content="Instantly create QR CODE, helping users to generate QR Code instantly">
    <meta name="keywords"
        content="IT Solution Dinajpur, Software Company, IT Training, Software Services, Firmware Development, ICT Courses" />
    <meta name="author" content="Developed by rafusoft.com">
    <title>QR Code Scanner Online | Rafusoft</title>
    <link rel="canonical" href="https://rafusoft.com/tools/qr-code-scanner" />


    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="img/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/tools.css') }}">

    <meta property="og:title" content="QR Code Scanner Online | Rafusoft">
    <meta property="og:site_name" content="Rafusoft">
    <meta property="og:url" content="https://rafusoft.com/tools/qr-code-scanner">
    <meta property="og:description"
        content="Rafusoft: more than a software company, a dream for Bangladeshi developers. Empowering aspirations, fostering innovation in the tech landscape.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/img/jim/rafusoft-403.png') }}">
    
    <meta property="og:logo" content="{{ asset('assets/img/jim/logo.webp') }}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@rafusoft" />
    <meta name="twitter:title" content="QR Code Scanner | Rafusoft" />
    <meta name="twitter:description"
        content="Rafusoft: more than a software company, a dream for Bangladeshi developers. Empowering aspirations, fostering innovation in the tech landscape." />
    <meta name="twitter:image" content="{{ asset('assets/img/favicon.png') }}" />
@endsection


@section('content')
<div>
    <div>
        <div class="tools-bg pt-10 pb-3">
            <h1 class="text-white mt-20 md:mt-32 text-3xl md:text-5xl text-center font-medium">
                QR CODE Scanner
            </h1>
            <h3 class="text-center mt-5 text-white text-xl md:text-3xl">
                Scan QR Codes Instantly for Your Links, Text, and More
            </h3>

            <div class="text-center my-10 md:my-20">
                <a href="#content" class="bg-[#F15A29] block px-4 py-3 w-10 md:w-14 mx-auto rounded">
                    <img
                        class="animate-bounce"
                        src="{{ asset('assets/img/arrow.png') }}"
                        alt="scroll down image"
                    />
                </a>
            </div>
        </div>
        <div class="p-4 md:p-5 rounded shadow-lg max-w-3xl md:max-w-6xl mx-auto my-8 md:my-12">
            <div class="text-center mb-2">
                <button
                    id="start-scan"
                    class="button bg-[#F15A29] text-white px-4 md:px-5 py-2 rounded inline-block"
                >
                    Scan QR Code
                </button>
                <label
                    for="upload-image"
                    class="button bg-[#F15A29] text-white px-4 md:px-5 py-2 rounded inline-block cursor-pointer"
                >
                    Upload Image
                </label>
                <input
                    type="file"
                    id="upload-image"
                    class="hidden"
                    accept="image/*"
                />
            </div>
            <!-- Placeholder -->
            <div
                id="placeholder-container"
                class="flex justify-center items-center bg-gray-100 border border-gray-300 rounded-lg h-48 md:h-64 text-gray-500"
            >
                <p class="text-center text-sm md:text-base">Scanning area will appear here</p>
            </div>
            <!-- Reader Div -->
            <div id="reader" class="mx-auto hidden mt-4" style="width: 100%; max-width: 500px; height: auto;"></div>
            <div class="text-center mt-5 text-green-600" id="qr-result">
                {{-- <strong>Scanned Result:</strong> --}}
                <!-- Result container is hidden by default -->
                <div id="reader" class="mx-auto hidden mt-4" style="width: 100%; max-width: 500px; height: auto;"></div>
<div class="text-center mt-5 text-green-600" id="qr-result">
    <strong>Scanned Result:</strong>
    <!-- Result container is hidden by default -->
    <div id="result-container" class="hidden mt-3">
        <img
            id="uploaded-image-preview"
            class="mx-auto mb-3 rounded shadow hidden"
            style="max-width: 150px;"
            alt="Uploaded QR Code"
        />
        <div
            class="bg-gray-800 text-white p-3 rounded text-xs md:text-sm flex justify-between items-center max-w-xl mx-auto"
        >
            <code id="scanned-result" class="break-all flex-1">Result will appear here</code>
            <button
                id="copy-button"
                class="text-gray-400 hover:text-white ml-4 px-3 py-1 bg-gray-700 rounded text-sm md:text-base"
                onclick="copyToClipboard()"
            >
                Copy
            </button>
        </div>
    </div>
    <br />
    <button
        onclick="window.location.href='{{ route('tools.qrcode') }}'"
        class="bg-gradient-to-r from-[#F15A29] to-[#d94d21] text-white px-3 py-2 rounded inline-block transform transition-all duration-500 bg-[length:200%_100%] bg-left hover:bg-right"
    >
        Go to QR Code Generator
    </button>
</div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/html5-qrcode/minified/html5-qrcode.min.js"></script>

<script>
const startScanButton = document.getElementById('start-scan');
const uploadImageInput = document.getElementById('upload-image');
const readerDiv = document.getElementById('reader');
const resultContainer = document.getElementById('result-container');
const resultSpan = document.getElementById('scanned-result');
const copyButton = document.getElementById('copy-button');
const uploadedImagePreview = document.getElementById('uploaded-image-preview');
const placeholderContainer = document.getElementById('placeholder-container');

let html5QrCode;

// Function to copy the scanned result to clipboard
function copyToClipboard() {
    const text = resultSpan.textContent;
    navigator.clipboard.writeText(text).then(() => {
        alert('Scanned result copied to clipboard!');
    }).catch(err => {
        console.error('Failed to copy text:', err);
        alert('Failed to copy. Please try again.');
    });
}

// Function to hide the placeholder
function hidePlaceholder() {
    placeholderContainer.classList.add('hidden');
}

// Function to parse Wi-Fi QR code result
function parseQrCode(data) {
    // Updated Wi-Fi pattern to stop capturing after the password field
    const wifiPattern = /WIFI:S:(.*?);T:(.*?);P:(.*?);(?:H:.*?;)?;/;
    const simplifiedWifiPattern = /WIFI:S:(.*?);P:(.*?);(?:H:.*?;)?;/;
    const urlPattern = /^(https?:\/\/[^\s]+)$/;
    const vcardPattern = /^BEGIN:VCARD[\s\S]*END:VCARD$/i;

    if (wifiPattern.test(data)) {
        const match = data.match(wifiPattern);
        const ssid = match[1];
        const password = match[3];
        return `\nSSID: ${ssid}\nPassword: ${password}`;
    } else if (simplifiedWifiPattern.test(data)) {
        const match = data.match(simplifiedWifiPattern);
        const ssid = match[1];
        const password = match[2];
        return `\nSSID: ${ssid},\nPassword: ${password}`;
    } else if (urlPattern.test(data)) {
        return `URL:\n<a href="${data}" target="_blank" class="text-blue-500 underline">${data}</a>`;
    } else if (vcardPattern.test(data)) {
        const nameMatch = data.match(/FN:(.*?)(\n|$)/);
        const phoneMatch = data.match(/TEL:(.*?)(\n|$)/);
        const emailMatch = data.match(/EMAIL:(.*?)(\n|$)/);
        const name = nameMatch ? nameMatch[1] : "Not available";
        const phone = phoneMatch ? phoneMatch[1] : "Not available";
        const email = emailMatch ? emailMatch[1] : "Not available";
        return `VCard:\nName: ${name}\nPhone: ${phone}\nEmail: ${email}`;
    } else {
        return `Text:\n${data}`;
    }
}

// Update live QR code scanning logic
startScanButton.addEventListener('click', () => {
    hidePlaceholder();

    if (!html5QrCode) {
        html5QrCode = new Html5Qrcode("reader");
    }

    if (readerDiv.classList.contains('hidden')) {
        readerDiv.classList.remove('hidden');
        startScanButton.textContent = 'Stop Scanning';

        html5QrCode.start(
            { facingMode: "environment" },
            { fps: 10, qrbox: 250 },
            (decodedText) => {
                // Parse and display the scanned result
                const parsedResult = parseQrCode(decodedText);
                resultSpan.innerHTML = parsedResult; // Use innerHTML for clickable links
                resultContainer.classList.remove('hidden');
                html5QrCode.stop().then(() => {
                    readerDiv.classList.add('hidden');
                    startScanButton.textContent = 'Scan QR Code';
                });
            },
            (errorMessage) => {
                console.log(`Scanning error: ${errorMessage}`);
            }
        ).catch((err) => {
            console.error(`Unable to start scanning: ${err}`);
        });

    } else {
        html5QrCode.stop().then(() => {
            readerDiv.classList.add('hidden');
            startScanButton.textContent = 'Scan QR Code';
        });
    }
});

// Update image upload logic
uploadImageInput.addEventListener('change', (event) => {
    hidePlaceholder();

    const file = event.target.files[0];
    if (file) {
        const html5QrCode = new Html5Qrcode("reader");

        // Show the uploaded image
        const reader = new FileReader();
        reader.onload = (e) => {
            uploadedImagePreview.src = e.target.result;
            uploadedImagePreview.classList.remove('hidden'); // Show the image
        };
        reader.readAsDataURL(file);

        // Scan the uploaded image
        html5QrCode.scanFile(file, true)
            .then(decodedText => {
                // Parse and display the scanned result
                const parsedResult = parseQrCode(decodedText);
                resultSpan.innerHTML = parsedResult; // Use innerHTML for clickable links
                resultContainer.classList.remove('hidden');
            })
            .catch(err => {
                console.error(`Error scanning file: ${err}`);
                alert("Failed to scan QR code from the image. Please try again.");
            });
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
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+8801234567890",
    "contactType": "Customer Service",
    "areaServed": "BD",
    "availableLanguage": ["en", "bn"]
  }
}
</script>


@endsection
