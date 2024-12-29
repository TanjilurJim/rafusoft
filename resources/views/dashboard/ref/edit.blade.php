@extends('dashboard.layout')

@section('content')
    <section class="p-3">
        <div class="bg-[#343A40] p-3 rounded text-white">
            <h4 class="text-[20px]">Dir Page Create</h4>
        </div>


        <div class="my-4 d-flex justify-content-between items-center">
            <button id="tab-one-button" onclick="tab_one()"  class="btn"><i class="fa-regular fa-clipboard  p-3"></i> Meta & Banner</button>
            <button id="tab-two-button" onclick="tab_two()" class="btn"><i class="fa-regular fa-clipboard  p-3"></i> Favicon And OG:Image</button>
            <button id="tab-three-button" onclick="tab_three()" class="btn"><i class="fa-regular fa-clipboard  p-3"></i> Schema</button>
            <button id="tab-four-button" onclick="tab_four()" class="btn"><i class="fa-solid fa-paper-plane  p-3"></i> Finish</button>
        </div>


        <form method="POST">
            @csrf

            {{-- tab 1 --}}
            <section id="tab_one" class="hidden">
                <div class="my-4 grid grid-cols-2 gap-5">
                    <div class="form-group">
                        <label for="slug">Slug *</label>
                        <input value="{{$dir->slug}}" type="text" placeholder="Slug" name="slug" class="form-control p-2">
                        @error('slug')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Title *</label>
                        <input value="{{$dir->title}}" type="text" placeholder="Title" name="title" class="form-control p-2">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="meta_keyword">Meta Keyword *</label>
                        <input value="{{$dir->meta_keyword}}" type="text" placeholder="Meta Keyword" name="meta_keyword" class="form-control p-2">
                        @error('meta_keyword')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="meta_keyword">Meta Description *</label>
                        <input value="{{$dir->meta_description}}" type="text" placeholder="Meta Description" name="meta_description" class="form-control p-2">
                        @error('meta_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="banner_head">Banner Head (h1) *</label>
                        <input value="{{$dir->banner_head}}" type="text" placeholder="Banner Head (h1)" name="banner_head" class="form-control p-2">
                        @error('banner_head')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="banner_head_two">Banner Head (h2) *</label>
                        <input value="{{$dir->banner_head_two}}" type="text" placeholder="Banner Head (h2)" name="banner_head_two" class="form-control p-2">
                        @error('banner_head_two')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="canonical">Canonical Link (Leave blank for default)</label>
                        <input value="{{$dir->canonical}}" type="text" placeholder="Canonical Link (Leave blank for default)" name="canonical" class="form-control p-2">
                        @error('canonical')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="page_url">Page url *</label>
                        <input value="{{$dir->page_url}}" type="text" value="https://rafusoft.com/ref" readonly name="page_url" class="form-control p-2">
                        @error('page_url')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
    
                     
                </div>

                <textarea  name="content" class="tinymce from-control">{!! $dir->content!!}</textarea>

                <div class="flex justify-end items-center w-full gap-5 mt-10">
                    
                    <label onclick="tab_two()" class="flex items-center gap-3 rounded w-28 btn-orange cursor-pointer justify-between px-4 py-2 text-white">Next <i class="fa-solid fa-arrow-right"></i></label>
                </div>
            </section>

            {{-- tab 2  --}}
            <section id="tab_two" class="hidden">
                <div class="flex justify-between gap-10">
                    <div  class="my-4 w-1/2">
                        <div class="form-group">
                            <label for="favicon">Favicon* (.ico/.png - 16*16/32*32px)</label>
                            <img class="my-3 rounded"  id="favicon_img" src="{{$dir->favicon}}" alt="favicon">
                            <input onchange="chnageFav()"" id="favicon" value="{{$dir->favicon}}" type="text" placeholder="url" name="favicon" class="form-control p-2">
                            @error('favicon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="og">Ope Graph Image* (1200*630px)</label>
                            <img class="my-3 rounded" id="og_image" src="{{$dir->og}}" alt="og image placeholder">
                            <input onchange="chnageOg()" value="{{$dir->og}}" type="text" id="og" placeholder="url" name="og" class="form-control p-2">
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
                                <input value="{{$dir->schema_company_name}}" type="text" placeholder="Company Name" name="schema_company_name" class="form-control p-2">
                                @error('schema_company_name')
                                <span class="text-danger">{{ $message }}</span>
                                 @enderror
                            </div>
                            <div class="form-group">
                                <label for="schema_description">Company Description</label>
                                <input value="{{$dir->schema_description}}" type="text" placeholder="Company Name" name="schema_description" class="form-control p-2">
                                @error('schema_description')
                                <span class="text-danger">{{ $message }}</span>
                                 @enderror
                            </div>
                            <section class="grid grid-cols-2 gap-x-4">
                                <div class="form-group">
                                    <label for="streetAddress">Street Address</label>
                                    <input value="{{$dir->streetAddress}}" type="text" placeholder="Street Address" name="streetAddress" class="form-control p-2">
                                    @error('streetAddress')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="addressLocality">Address Locality</label>
                                    <input value="{{$dir->addressLocality}}" type="text" placeholder="addressLocality" name="addressLocality" class="form-control p-2">
                                    @error('addressLocality')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="addressRegion">Address Region</label>
                                    <input value="{{$dir->addressRegion}}" type="text" placeholder="Address Region" name="addressRegion" class="form-control p-2">
                                    @error('addressRegion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="postalCode">Postal Code</label>
                                    <input value="{{$dir->postalCode}}" type="text" placeholder="Postal Code" name="postalCode" class="form-control p-2">
                                    @error('postalCode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="addressCountry">Address Country</label>
                                    <input value="{{$dir->addressCountry}}" type="text" placeholder="Address Country" name="addressCountry" class="form-control p-2">
                                    @error('addressCountry')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Telephone">Telephone</label>
                                    <input value="{{$dir->telephone}}" type="text" placeholder="Telephone" name="telephone" class="form-control p-2">
                                    @error('telephone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="schema_url">Website Url</label>
                                    <input value="{{$dir->schema_url}}" type="text" placeholder="url" name="schema_url" class="form-control p-2">
                                    @error('schema_url')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="schema_url">Industry Type</label>
                                    <input value="{{$dir->industry_type}}" type="text" placeholder="Industry Type (Software Development)" name="industry_type" class="form-control p-2">
                                    @error('industry_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="schema_url">Price Range</label>
                                    <input value="{{$dir->price_range}}" type="text" placeholder="Price Range (500$ -200$)" name="price_range" class="form-control p-2">
                                    @error('price_range')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="openingHours">Opening Hours</label>
                                    <input value="{{$dir->openingHours}}" type="text" placeholder="Sut-Th 09:00-17:00" name="openingHours" class="form-control p-2">
                                    @error('openingHours')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </section>
                        </div>

                    </div>
                </div>

                <div class="flex justify-end items-center w-full gap-5">
                    <label onclick="tab_one()" class="flex items-center gap-3 rounded w-28 btn-orange cursor-pointer justify-between px-4 py-2 text-white"><i class="fa-solid fa-arrow-left"></i> Prev</label>
                    <label onclick="tab_three()" class="flex items-center gap-3 rounded w-28 btn-orange cursor-pointer justify-between px-4 py-2 text-white">Next <i class="fa-solid fa-arrow-right"></i></label>
                </div>
            </section>

            {{-- tab3  --}}
            <section id="tab_three" class="hidden">
                <div class="grid grid-cols-2 gap-10">
                    <section class="mt-3">
                        <div class="form-group">
                            <label for="artical_headline">Headline*</label>
                            <input value="{{$dir->artical_headline}}" type="text" placeholder="Headline" name="artical_headline" class="form-control p-2">
                            @error('artical_headline')
                                        <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="artical_description">Artical Description*</label>
                            <input value="{{$dir->artical_description}}"  type="text" placeholder="Artical Description" name="artical_description" class="form-control p-2">
                            @error('artical_description')
                                        <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="artical_description">Author type*</label>
                            <select value="{{$dir->author_type}}" name="author_type" class="form-control p-2">
                                <option value="Organaization">Organaization</option>
                                <option value="Person">Person</option>
                            </select>
                            @error('author_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="artical_description">Author*</label>
                            <select value="{{$dir->author_name}}" name="author_name" class="form-control p-2">
                                <option value="Organaization">SM Refeat Hossian</option>
                            </select>
                            @error('author_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="author_url">Author url*</label>
                            <input value="{{$dir->author_url}}" type="text" placeholder="Author url" name="author_url" class="form-control p-2">
                            @error('author_url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="publisher">Publisher*</label>
                            <input value="{{$dir->publisher}}" type="text" placeholder="Publisher" name="publisher" class="form-control p-2">
                            @error('publisher')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="publisher">Date published:*</label>
                            <input value="{{$dir->published_date}}" type="date" placeholder="Date published" name="published_date" class="form-control p-2">
                            @error('published_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="publisher">Date modified*</label>
                            <input value="{{$dir->modified_date}}" type="date" placeholder="Date modified" name="modified_date" class="form-control p-2">
                            @error('modified_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </section>
                    <section>
                        <div class="form-group">
                            <label for="publisher">Publisher logo url*</label>
                            <img id="publisher_image" src="{{$dir->publisher_logo}}" class="my-2 rounded" alt="publisher logo">
                            <input id="publisher" onchange="handlePublisherLogo()" value="{{$dir->publisher_logo}}" type="text" placeholder="Publisher logo url" name="publisher_logo" class="form-control p-2 mt-full">
                            @error('publisher_logo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="publisher">Schema image url*</label>
                            <img id="schema_image" class="my-3 rounded" src="{{$dir->schema_image_url}}" alt="">
                            <input onchange="changeSchema()" id="schema" value="{{$dir->schema_image_url}}" type="text" placeholder="Schema image url*" name="schema_image_url" class="form-control p-2">
                            @error('schema_image_url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </section>
                </div>
                <div class="flex justify-end items-center w-full gap-5">
                    <label onclick="tab_two()" class="flex items-center gap-3 rounded w-28 btn-orange cursor-pointer justify-between px-4 py-2 text-white"><i class="fa-solid fa-arrow-left"></i> Prev</label>
                    <label onclick="tab_four()" class="flex items-center gap-3 rounded w-28 btn-orange cursor-pointer justify-between px-4 py-2 text-white">Next <i class="fa-solid fa-arrow-right"></i></label>
                </div>
            </section>

            {{-- tab 4 --}}

            <section id="tab_four" class="hidden">
                <section>
                    <div class="form-group">
                        <label for="artical_headline">Google Map Link*</label>
                        <input value="{{$dir->maps}}" type="text" placeholder="url only" name="map" class="form-control p-2">
                        @error('map')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="artical_headline">Publish Or Unpublish*</label>
                       <select name="status" class="form-control p-2">
                            <option {{$dir->status == "Unpublished" ? "selected" : ""}} value="Unpublished">Unpublished</option>
                            <option {{$dir->status == "Published" ? "selected" : ""}} value="Published">Published</option>
                       </select>
                       @error('status')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="artical_headline" >Category*</label>
                       <select name="category" class="form-control p-2">
                            @foreach ($category as $item)
                            <option value="{{$item->name}}">{{$item->name}}</option>
                            @endforeach
                       </select>
                       @error('category')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </section>
                <div class="flex justify-end items-center w-full gap-5">
                    <label onclick="tab_three()" class="flex items-center gap-3 mt-2 rounded w-28 btn-orange cursor-pointer justify-between px-4 py-2 text-white"><i class="fa-solid fa-arrow-left"></i> Prev</label>
                    <button class="flex items-center gap-3 font-bold rounded w-28 btn-orange cursor-pointer justify-between px-4 py-2 text-white">Save</button>
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


            const tab_two = ()=>{
                tab_one_button.classList.remove('btn-orange');
                tab_two_button.classList.add('btn-orange');
                tab_three_button.classList.remove('btn-orange');
                tab_four_button.classList.remove('btn-orange');


                tab_one_content.classList.add('hidden');
                tab_two_content.classList.remove('hidden');
                tab_three_content.classList.add('hidden');
                tab_four_content.classList.add('hidden');
            }
            const tab_one = ()=>{
                tab_one_button.classList.add('btn-orange');
                tab_two_button.classList.remove('btn-orange');
                tab_three_button.classList.remove('btn-orange');
                tab_four_button.classList.remove('btn-orange');

                tab_one_content.classList.remove('hidden');
                tab_two_content.classList.add('hidden');
                tab_three_content.classList.add('hidden');
                tab_four_content.classList.add('hidden');
            }
            const tab_three = ()=>{
                tab_one_button.classList.remove('btn-orange');
                tab_two_button.classList.remove('btn-orange');
                tab_three_button.classList.add('btn-orange');
                tab_four_button.classList.remove('btn-orange');


                tab_one_content.classList.add('hidden');
                tab_two_content.classList.add('hidden');
                tab_three_content.classList.remove('hidden');
                tab_four_content.classList.add('hidden');
            }
            const tab_four = ()=>{
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
    const chnageFav = ()=>{
        const favicon = document.getElementById('favicon');
        const img = document.getElementById('favicon_img');
        img.src = favicon.value;
        console.log(favicon.value);

    }


    const chnageOg = ()=>{
        const og = document.getElementById('og');
        const img = document.getElementById('og_image');
        img.src = og.value;
    }
    const handlePublisherLogo = ()=>{
        const og = document.getElementById('publisher');
        const img = document.getElementById('publisher_image');
        img.src = og.value;
    }
    const changeSchema = ()=>{
        const schema = document.getElementById('schema');
        const img = document.getElementById('schema_image');
        img.src = schema.value;
    }
</script>

    </section>
@endsection