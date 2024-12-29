@extends('dashboard.layout')

@section('content')
    <section class="p-3">
        <div class="bg-[#343A40] p-3 rounded text-white">
            <h1 class="text-[20px]">Ref Page Create</h1>
        </div>

        <div class="my-4 d-flex justify-content-between items-center">
            <button id="tab-one-button" onclick="tab_one()" class="btn"><i class="fa-regular fa-clipboard  p-3"></i> Meta &
                Banner</button>
            <button id="tab-two-button" onclick="tab_two()" class="btn"><i class="fa-regular fa-clipboard  p-3"></i>
                Favicon And OG:Image</button>
            <button id="tab-three-button" onclick="tab_three()" class="btn"><i class="fa-regular fa-clipboard  p-3"></i>
                Schema</button>
            <button id="tab-four-button" onclick="tab_four()" class="btn"><i class="fa-solid fa-paper-plane  p-3"></i>
                Finish</button>
        </div>


        <form method="POST">
            @csrf

            {{-- tab 1 --}}
            <section id="tab_one" class="hidden">
                <div class="my-4 grid grid-cols-2 gap-5">
                    <div class="form-group">
                        <label for="slug">Slug *</label>
                        <input type="text" value="{{ old('slug') }}" placeholder="Slug" name="slug"
                            class="form-control p-2">
                        @error('slug')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Title *</label>
                        <input type="text" value="{{ old('title') }}" placeholder="Title" id="title" onchange="handlechange_title()" name="title"
                            class="form-control p-2">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="meta_keyword">Meta Keyword *</label>
                        <input type="text" value="{{ old('meta_keyword') }}" placeholder="Meta Keyword"
                            name="meta_keyword" class="form-control p-2">
                        @error('meta_keyword')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="meta_keyword">Meta Description *</label>
                        <input type="text" placeholder="Meta Description" id="meta_description" onchange="handlechange_description()" name="meta_description"
                            value="{{ old('meta_description') }}" class="form-control p-2">
                        @error('meta_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="banner_head">Banner Head (h1) *</label>
                        <input type="text" placeholder="Banner Head (h1)" name="banner_head" class="form-control p-2"
                            value="{{ old('banner_head') }}">
                        @error('banner_head')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="banner_head_two">Banner Head (h2) *</label>
                        <input type="text" placeholder="Banner Head (h2)" name="banner_head_two"
                            value="{{ old('banner_head_two') }}" class="form-control p-2">
                        @error('banner_head_two')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="canonical">Canonical Link (Leave blank for default)</label>
                        <input type="text" placeholder="Canonical Link (Leave blank for default)" name="canonical"
                            value="{{ old('canonical') }}" class="form-control p-2">

                    </div>
                    <div class="form-group">
                        <label for="page_url">Page url *</label>
                        <input type="text" value="https://rafusoft.com/ref" readonly name="page_url"
                            value="{{ old('page_url') }}" class="form-control p-2">
                        @error('page_url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                </div>

                <textarea name="content" class="tinymce from-control">{{ old('content') }}</textarea>
                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="flex justify-end items-center w-full gap-5 mt-10">

                    <label onclick="tab_two()"
                        class="flex items-center gap-3 rounded w-28 btn-orange cursor-pointer justify-between px-4 py-2 text-white">Next
                        <i class="fa-solid fa-arrow-right"></i></label>
                </div>
            </section>

            {{-- tab 2  --}}
            <section id="tab_two" class="hidden">
                <div class="flex justify-between gap-10">
                    <div class="my-4 w-1/2">
                        <div class="form-group">
                            <label for="favicon">Favicon* (.ico/.png - 16*16/32*32px)</label>
                            <img class="my-3 rounded" id="favicon_img" src="{{ asset('assets/img/favicon.png') }}"
                                alt="favicon">
                            <input id="favicon" onchange="chnageFav()" type="text" placeholder="url"
                                name="favicon" class="form-control p-2"
                                value="{{ old('url') ? old('url') : asset('assets/img/favicon.png') }}">
                            @error('favicon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="og">Ope Graph Image* (1200*630px)</label>
                            <img class="my-3 rounded" id="og_image" src="{{ asset('/og_image/rafusoft.jpg') }}"
                                alt="og image placeholder">
                            <input type="text" onchange="chnageOg()" id="og" placeholder="url"
                                value="{{ old('url') ? old('url') : asset('/og_image/rafusoft.jpg') }}" name="og"
                                class="form-control p-2">
                            @error('og')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="my-4 w-1/2">
                        <h5 class="text-[20px] font-bold text-center">Local Business Schema</h5>
                        <div class="mt-10">
                            <div class="form-group">
                                <label for="schema_company_name">Company Name</label>
                                <input type="text" placeholder="Company Name" name="schema_company_name"
                                    value="{{ old('schema_company_name') }}" class="form-control p-2">
                                @error('schema_company_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="schema_description">Company Description</label>
                                <input type="text" placeholder="Company Name" name="schema_description"
                                    value="{{ old('schema_description') }}" class="form-control p-2">
                                @error('schema_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <section class="grid grid-cols-2 gap-x-4">
                                <div class="form-group">
                                    <label for="streetAddress">Street Address</label>
                                    <input type="text" placeholder="Street Address" name="streetAddress"
                                        value="{{ old('streetAddress') }}" class="form-control p-2">
                                    @error('streetAddress')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="addressLocality">Address Locality</label>
                                    <input type="text" placeholder="addressLocality" name="addressLocality"
                                        value="{{ old('addressLocality') }}" class="form-control p-2">
                                    @error('addressLocality')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="addressRegion">Address Region</label>
                                    <input type="text" placeholder="Address Region" name="addressRegion"
                                        value="{{ old('addressRegion') }}" class="form-control p-2">
                                    @error('addressRegion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="postalCode">Postal Code</label>
                                    <input type="text" placeholder="Postal Code" name="postalCode"
                                        value="{{ old('postalCode') }}" class="form-control p-2">
                                    @error('postalCode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="addressCountry">Address Country</label>
                                    <input type="text" placeholder="Address Country" name="addressCountry"
                                        value="{{ old('addressCountry') }}" class="form-control p-2">
                                    @error('addressCountry')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Telephone">Telephone</label>
                                    <input type="text" placeholder="Telephone" name="telephone"
                                        value="{{ old('telephone') }}" class="form-control p-2">
                                    @error('telephone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="schema_url">Website Url</label>
                                    <input type="text" placeholder="url" name="schema_url"
                                        value="{{ old('schema_url') }}" class="form-control p-2">
                                    @error('schema_url')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="schema_url">Industry Type</label>
                                    <input type="text" placeholder="Industry Type (Software Development)"
                                        name="industry_type" value="{{ old('industry_type') }}"
                                        class="form-control p-2">
                                    @error('industry_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="schema_url">Price Range</label>
                                    <input type="text" placeholder="Price Range (500$ -200$)" name="price_range"
                                        value="{{ old('price_range') }}" class="form-control p-2">
                                    @error('price_range')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="openingHours">Opening Hours</label>
                                    <input type="text" placeholder="Sut-Th 09:00-17:00" name="openingHours"
                                        value="{{ old('openingHours') }}" class="form-control p-2">
                                    @error('openingHours')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </section>
                        </div>

                    </div>
                </div>

                <div class="flex justify-end items-center w-full gap-5">
                    <label onclick="tab_one()"
                        class="flex items-center gap-3 rounded w-28 btn-orange cursor-pointer justify-between px-4 py-2 text-white"><i
                            class="fa-solid fa-arrow-left"></i> Prev</label>
                    <label onclick="tab_three()"
                        class="flex items-center gap-3 rounded w-28 btn-orange cursor-pointer justify-between px-4 py-2 text-white">Next
                        <i class="fa-solid fa-arrow-right"></i></label>
                </div>
            </section>

            {{-- tab3  --}}
            <section id="tab_three" class="hidden">
                <div class="grid grid-cols-2 gap-10">
                    <section class="mt-3">
                        <div class="form-group">
                            <label for="artical_headline">Headline</label>
                            <input type="text" placeholder="Headline" id="artical_headline" name="artical_headline"
                                value="{{ old('artical_headline') }}" class="form-control p-2">
                            @error('artical_headline')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="artical_description">Artical Description</label>
                            <input type="text" placeholder="Artical Description" name="artical_description"
                                id="artical_description" value="{{ old('artical_description') }}"
                                class="form-control p-2">
                            @error('artical_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="artical_description">Author type</label>
                            <select name="author_type" class="form-control p-2">
                                <option @selected(old('author_type') == 'Organaization') value="Organaization">Organaization</option>
                                <option @selected(old('author_type') == 'Person') value="Person">Person</option>
                            </select>
                            @error('author_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="artical_description">Author</label>
                            <select name="author_name" class="form-control p-2">
                                <option value="Rafusoft">Rafusoft</option>
                                <option value="{{ auth()->user()->email }}">{{ auth()->user()->name }}</option>
                            </select>
                            @error('author_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="author_url">Author url</label>
                            <input type="text" placeholder="Author url" name="author_url"
                                value="{{ old('author_url') ? old('author_url') : "https://rafusoft.com"  }}"  class="form-control p-2">
                            @error('author_url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="publisher">Publisher</label>
                            <input type="text" placeholder="Publisher" name="publisher"
                                value="{{ old('publisher') ? old('publisher') : "Rafusoft"  }}" class="form-control p-2">
                            @error('publisher')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="publisher">Date published:</label>
                            <input type="date" placeholder="Date published" name="published_date"
                                value="{{ old('published_date') }}" class="form-control p-2">
                            @error('published_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="publisher">Date modified</label>
                            <input type="date" placeholder="Date modified" name="modified_date"
                                value="{{ old('modified_date') }}" class="form-control p-2">
                            @error('modified_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </section>
                    <section>
                        <div class="form-group">
                            <label for="publisher">Publisher logo url</label>
                            <img id="publisher_image" src="{{ asset('publisher_image/rafusoft_logo.jpg') }}"
                                class="my-2 rounded" alt="publisher logo">
                            <div class="text-end">
                                <a href="" target="_blank" class="text-blue-500">Get Image</a>
                            </div>
                            <input onchange="handlePublisherLogo()" id="publisher"
                                value="{{ asset('publisher_image/rafusoft_logo.jpg') }}" type="text"
                                placeholder="Publisher logo url" name="publisher_logo" class="form-control p-2 mt-full">
                            @error('publisher_logo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="publisher">Schema image url</label>
                            <img id="schema_image" class="my-3 rounded h-[92px]"
                                src="{{ asset('schema_image/Rafusoft_logo_Image_black.jpg') }}" alt="">
                            <div class="text-end">
                                <a target="_blank" href="/dashboard/file/schema-image" class="text-blue-500">Get
                                    Image</a>
                            </div>
                            <input id="schema" onchange="changeSchema()" type="text"
                                value="{{ asset('schema_image/Rafusoft_logo_Image_black.jpg') }}"
                                placeholder="Schema image url*" name="schema_image_url" class="form-control p-2">
                            @error('schema_image_url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </section>
                </div>
                <div class="flex justify-end items-center w-full gap-5">
                    <label onclick="tab_two()"
                        class="flex items-center gap-3 rounded w-28 btn-orange cursor-pointer justify-between px-4 py-2 text-white"><i
                            class="fa-solid fa-arrow-left"></i> Prev</label>
                    <label onclick="tab_four()"
                        class="flex items-center gap-3 rounded w-28 btn-orange cursor-pointer justify-between px-4 py-2 text-white">Next
                        <i class="fa-solid fa-arrow-right"></i></label>
                </div>
            </section>

            {{-- tab 4 --}}

            <section id="tab_four" class="hidden">
                <section>
                    <div class="form-group">
                        <label for="artical_headline">Google Map Link</label>
                        <input type="text" placeholder="url only" name="map" class="form-control p-2"
                            value="{{ old('map') }}">
                        @error('map')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="artical_headline">Publish Or Unpublish*</label>
                        <select name="status" class="form-control p-2">
                            <option value="Unpublished">Unpublished</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="artical_headline">Category*</label>
                        <select name="category" class="form-control p-2">
                            @foreach ($category as $item)
                                <option @selected(old('category') == $item->name) value="{{ $item->name }}">{{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </section>
                <div class="flex justify-end items-center w-full gap-5">
                    <label onclick="tab_three()"
                        class="flex items-center gap-3 mt-2 rounded w-28 btn-orange cursor-pointer justify-between px-4 py-2 text-white"><i
                            class="fa-solid fa-arrow-left"></i> Prev</label>
                    <button
                        class="flex items-center gap-3 font-bold rounded w-28 btn-orange cursor-pointer justify-between px-4 py-2 text-white">Submit</button>
                </div>
            </section>

        </form>


        <script>
            const tab_one_button = document.getElementById('tab-one-button');
            const tab_two_button = document.getElementById('tab-two-button');
            const tab_three_button = document.getElementById('tab-three-button');
            const tab_four_button = document.getElementById('tab-four-button');

            // tab content 

            const tab_one_content = document.getElementById('tab_one');
            const tab_two_content = document.getElementById('tab_two');
            const tab_three_content = document.getElementById('tab_three');
            const tab_four_content = document.getElementById('tab_four');

            tab_one_button.classList.add('btn-orange');
            tab_one_content.classList.remove('hidden')


            const tab_two = () => {
                tab_one_button.classList.remove('btn-orange');
                tab_two_button.classList.add('btn-orange');
                tab_three_button.classList.remove('btn-orange');
                tab_four_button.classList.remove('btn-orange');


                tab_one_content.classList.add('hidden');
                tab_two_content.classList.remove('hidden');
                tab_three_content.classList.add('hidden');
                tab_four_content.classList.add('hidden');
            }
            const tab_one = () => {
                tab_one_button.classList.add('btn-orange');
                tab_two_button.classList.remove('btn-orange');
                tab_three_button.classList.remove('btn-orange');
                tab_four_button.classList.remove('btn-orange');

                tab_one_content.classList.remove('hidden');
                tab_two_content.classList.add('hidden');
                tab_three_content.classList.add('hidden');
                tab_four_content.classList.add('hidden');
            }
            const tab_three = () => {
                tab_one_button.classList.remove('btn-orange');
                tab_two_button.classList.remove('btn-orange');
                tab_three_button.classList.add('btn-orange');
                tab_four_button.classList.remove('btn-orange');


                tab_one_content.classList.add('hidden');
                tab_two_content.classList.add('hidden');
                tab_three_content.classList.remove('hidden');
                tab_four_content.classList.add('hidden');
            }
            const tab_four = () => {
                tab_one_button.classList.remove('btn-orange');
                tab_two_button.classList.remove('btn-orange');
                tab_three_button.classList.remove('btn-orange');
                tab_four_button.classList.add('btn-orange');


                tab_one_content.classList.add('hidden');
                tab_two_content.classList.add('hidden');
                tab_three_content.classList.add('hidden');
                tab_four_content.classList.remove('hidden');
            }
        </script>



        <script>
            const chnageFav = () => {
                const favicon = document.getElementById('favicon');
                const img = document.getElementById('favicon_img');
                img.src = favicon.value;
                console.log(favicon.value);

            }


            const chnageOg = () => {
                const og = document.getElementById('og');
                const img = document.getElementById('og_image');
                img.src = og.value;
            }
            const handlePublisherLogo = () => {
                const og = document.getElementById('publisher');
                const img = document.getElementById('publisher_image');
                img.src = og.value;
            }
            const changeSchema = () => {
                const schema = document.getElementById('schema');
                const img = document.getElementById('schema_image');
                img.src = schema.value;
            }




            const handlechange_title = () => {
                const title = document.getElementById('title').value;
                document.getElementById('artical_headline').value = title;
            }


            const handlechange_description = () => {
                const artical_description = document.getElementById('meta_description').value;
                document.getElementById('artical_description').value = artical_description;
            }
        </script>


    </section>
@endsection
