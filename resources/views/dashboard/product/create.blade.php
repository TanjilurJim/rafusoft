@extends('dashboard.layout')


@section('content')
    <div class="p-3">
        <div class="bg-[#343A40] p-3 rounded text-white">
            <h1 class="text-[20px]">Create New Product Page</h1>
        </div>

        <form  method="POST" class="mt-4">

            @csrf
            <div>
                <div id="exTab2">
                    <ul class="nav  flex justify-between">
                        <li class="active">
                            <a href="#1" class="btn btn-orange" data-toggle="tab">Heading & Title</a>
                        </li>
                        <li><a href="#2" class="btn btn-orange" data-toggle="tab">OG & Favicon</a>
                        </li>
                        <li><a href="#3" class="btn btn-orange" data-toggle="tab">Product Information</a>
                        </li>
                        <li><a href="#4" class="btn btn-orange" data-toggle="tab">Content</a>
                        </li>
                    </ul>

                    <div class="tab-content mt-5">
                        <div class="tab-pane active" id="1">
                            <div class="grid grid-cols-2 gap-3">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" name="slug"
                                        placeholder="Enter Slug">
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title"
                                        placeholder="Enter Meta Title">
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <input type="text" class="form-control" name="meta_description"
                                        placeholder="Enter Meta Description">
                                </div>
                                <div class="form-group">
                                    <label for="meta_keyword">Meta Keyword</label>
                                    <input type="text" class="form-control" name="meta_keywords"
                                        placeholder="Enter Meta Keyword">
                                </div>
                                <div class="form-group">
                                    <label for="banner_h_one">Banner Head (h1)</label>
                                    <input type="text" class="form-control" name="banner_h_one"
                                        placeholder="Enter Heading (h1)">
                                </div>
                                <div class="form-group">
                                    <label for="banner_h_two">Banner Head (h2)</label>
                                    <input type="text" class="form-control" name="banner_h_two"
                                        placeholder="Enter Heading (h2)">
                                </div>
                                <div class="form-group">
                                    <label for="headline">Headline</label>
                                    <input type="text" class="form-control" name="headline"
                                        placeholder="Enter Schema Headline">
                                </div>
                            </div>
                            <div class="text-end">
                                <a href="#2" class="btn btn-orange" data-toggle="tab">Next</a>
                            </div>
                        </div>
                        <div class="tab-pane" id="2">
                            <div class="form-group">
                                <label for="favicon">Favicon* (.ico/.png - 16*16/32*32px)</label>
                                <input type="text" class="form-control" name="favicon" placeholder="Enter Favicon URL">
                            </div>
                            <div class="form-group">
                                <label for="og_image">Open Graph Image* (1200*630px)</label>
                                <input type="text" class="form-control" name="og_image"
                                    placeholder="Enter Opengraph Image URL">
                            </div>
                            <div class="form-group">
                                <label for="og_image">Schema Image* (92*92px)</label>
                                <input type="text" class="form-control" name="schema_image"
                                    placeholder="Enter Opengraph Image URL">
                            </div>
                            <div class="form-group">
                                <label for="og_image">Banner Image* (1200*630px)</label>
                                <input type="text" class="form-control" name="banner_image"
                                    placeholder="Enter Banner Image URL">
                            </div>
                            <div class="flex gap-5 justify-end">
                                <a href="#1" class="btn btn-orange" data-toggle="tab">Previous</a>
                                <a href="#3" class="btn btn-orange" data-toggle="tab">Next</a>
                            </div>
                        </div>

                       

                        <div class="tab-pane" id="3">
                          
                            <section class="grid grid-cols-2 gap-3">
                                <div class="form-group">
                                    <label for="product_title">Product Title</label>
                                    <input type="text" name="product_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="product_description">Product Description</label>
                                    <input type="text" name="product_description" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="r_price">Regular Price</label>
                                    <input type="number" name="r_price" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="o_price">Offer Price</label>
                                    <input type="number" name="o_price" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="brand">Brand Name</label>
                                    <input type="text" name="brand" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="product_image">Product Image URL* (380*300) px </label>
                                    <input type="text" name="product_image" class="form-control">
                                </div>
                            </section>


                            <section class="grid grid-cols-2 gap-3">
                                <div class="form-group">
                                    <label for="features_paragraph">Features Paragraph</label>
                                    <input type="text" name="features_paragraph" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="features_image">Features Image URL (380*300) px </label>
                                    <input type="text" name="features_image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="features_list">Features List <strong class="text-blue-500">Note: Use "//" after entering a line</strong></label>
                                    <textarea name="features_list" class="form-control" rows="5"></textarea>
                                </div>

                            </section>
                            <div class="flex gap-5 justify-end">
                                <a href="#2" class="btn btn-orange" data-toggle="tab">Previous</a>
                                <a href="#4" class="btn btn-orange" data-toggle="tab">Next</a>
                            </div>
                        </div>

                        <div class="tab-pane" id="4">


                            <textarea name="content" class="tinymce"></textarea>

                            <div class="flex gap-5 justify-end mt-5">
                                <a href="#3" class="btn btn-orange" data-toggle="tab">Previous</a>
                                <button class="btn btn-orange" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
@endsection
