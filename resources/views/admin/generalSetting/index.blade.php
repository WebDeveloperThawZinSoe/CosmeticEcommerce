@extends('layouts.admin')

@section('body')
<div class="container card">
    
@if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Error!</strong> Please check the form below for errors.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    <h2>Edit General Settings</h2>

    <form action="{{ route('admin.general_settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')



        <div class="form-group mb-3">
            <label for="logo_image">Logo Image</label>
            @if(isset($generalSettings['logo']) && $generalSettings['logo']->value)
            <div class="mb-2">
                <img src="{{ asset('images/general_settings/' . $generalSettings['logo']->value) }}" alt="logo Image"
                    class="img-fluid" style="max-height: 150px;">
            </div>
            @endif
            <input type="file" class="form-control-file" name="logo" id="logo">
        </div>



        <div class="form-row mb-3">
            <div class="form-group col-md-4">
                <label for="phone_number_1">Phone Number 1</label>
                <input type="text" class="form-control" name="phone_number_1" id="phone_number_1"
                    value="{{ $generalSettings['phone_number_1']->value ?? '' }}" placeholder="09111">
            </div>
            <div class="form-group col-md-4">
                <label for="phone_number_2">Phone Number 2</label>
                <input type="text" class="form-control" name="phone_number_2" id="phone_number_2"
                    value="{{ $generalSettings['phone_number_2']->value ?? '' }}" placeholder="09222">
            </div>
            <div class="form-group col-md-4">
                <label for="email_1">Email 1</label>
                <input type="email" class="form-control" name="email_1" id="email_1"
                    value="{{ $generalSettings['email_1']->value ?? '' }}" placeholder="example1@example.com">
            </div>

        </div>



        <div class="form-group mb-3">
            <label for="facebook">Facebook</label>
            <input type="url" class="form-control" name="facebook" id="facebook"
                value="{{ $generalSettings['facebook']->value ?? '' }}" placeholder="https://facebook.com/example">
        </div>

        <div class="form-group mb-3">
            <label for="telegram">Telegram</label>
            <input type="url" class="form-control" name="telegram" id="telegram"
                value="{{ $generalSettings['telegram']->value ?? '' }}" placeholder="https://t.me/example">
        </div>

        <div class="form-group mb-3">
            <label for="discord">Discord</label>
            <input type="url" class="form-control" name="discord" id="discord"
                value="{{ $generalSettings['discord']->value ?? '' }}" placeholder="https://discord.gg/example">
        </div>


        <div class="form-group mb-3">
            <label for="viber">Viber</label>
            <input type="tel" class="form-control" name="viber" id="viber"
                value="{{ $generalSettings['viber']->value ?? '' }}" placeholder="Viber Phone Number">
        </div>

        <div class="form-group mb-3">
            <label for="skype">Skype</label>
            <input type="text" class="form-control" name="skype" id="skype"
                value="{{ $generalSettings['skype']->value ?? '' }}" placeholder="Skype Number">
        </div>


        <div class="form-group mb-3">
            <label for="ig">IG</label>
            <input type="text" class="form-control" name="ig" id="ig"
                value="{{ $generalSettings['ig']->value ?? '' }}" placeholder="instagram">
        </div>


        <div class="form-group mb-3">
            <label for="address">Address</label>
            <textarea type="text" class="form-control" name="address" id="address"
                 placeholder="Address">{{ $generalSettings['address']->value ?? '' }}</textarea>
        </div>


        <div class="form-group mb-3">
            <label for="m_delivery">Myanmar Delivery</label>
            <textarea type="text" class="form-control" name="mm_delivery" id="mm_delivery"
                 placeholder="Address">{{ $generalSettings['mm_delivery']->value ?? '' }}</textarea>
        </div>


        <div class="form-group mb-3">
            <label for="s_delivery">Korea Address</label>
            <textarea type="text" class="form-control" name="sk_delivery" id="sk_delivery"
                 placeholder="Address">{{ $generalSettings['sk_delivery']->value ?? '' }}</textarea>
        </div>



        <button type="submit" class="btn btn-primary">Update Settings</button>
    </form>


</div>

<div class="container card">
    <div class="row">
        <div class="col-xl-6">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Banner Create Form</h5> <small class="text-muted float-end"></small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.photos.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="photo_name">Photo Name <span style="color:red"> * </span></label>
                        <input type="text" class="form-control" id="photo_name" name="name" placeholder=""
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="sort">Sort <span style="color:red"> * </span></label>
                        <input type="text" class="form-control" id="sort" name="sort" placeholder=""
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload Photo <span style="color:red"> * </span></label>
                        <input name="photo" class="form-control" type="file" id="formFile" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>

        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Photo Lists</h5> 
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Sort</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php     
                            $photos = App\Models\Gallery::orderBy("id","desc")->get();
                        @endphp
                        @forelse($photos as $index => $photo)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $photo->name }}</td>
                           
                            <td><img src="{{ asset($photo->image) }}" alt="Photo" style="max-width: 100px;"></td>
                            <td>{{ $photo->sort }}</td>
                            <td>
                                <form action="{{ route('admin.photos.delete', $photo->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger " onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No photos found</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Load CKEditor script -->
<script src="https://cdn.ckeditor.com/ckeditor5/ckeditor5-build-classic/ckeditor.js" defer></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    ClassicEditor
        .create(document.querySelector('#about_us'))
        .catch(error => {
            console.error('Error initializing CKEditor for about_us:', error);
        });

    ClassicEditor
        .create(document.querySelector('#how_to_sell_us'))
        .catch(error => {
            console.error('Error initializing CKEditor for how_to_sell_us:', error);
        });
});
</script>

@endsection